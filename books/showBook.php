<?php

include_once '../db/db.php';

// Obtener el ISBN y el ID de la biblioteca desde el formulario
$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
$id_library = mysqli_real_escape_string($conn, $_POST['id_library']);

$library_name_query = "SELECT name FROM library WHERE id = '$id_library'";
$library_name_result = mysqli_query($conn, $library_name_query);
$library_names = mysqli_fetch_assoc($library_name_result);

// Consulta para obtener todos los libros que coincidan con el ISBN
// y, si id_library es null, obtener todos los libros con ese ISBN.
$query = "SELECT * FROM book WHERE isbn = '$isbn' ";
if ($id_library !== '') {
    $query .= "AND id_library = '$id_library' ";
} else {
    $query .= "AND id_library IS NULL ";
}
$query .= "ORDER BY id DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/showBook.css">
    <title>Libros con ISBN: <?php echo $isbn; ?></title>
</head>
<body>
    <h1>Libros con ISBN "<?php echo $isbn; ?>" en la Biblioteca "
    <?php echo isset($library_names) ? $library_names['name'] : 'Sin asignar';?>"</h1>
    <div class="backContainer">
        <a href="../index.php" class="backButton">Volver al inicio</a>
    </div>
    <div class="container">
        <div class="divTable">
            <table>
                <tr>
                    <th class="tableHeaderLeft">ID</th>
                    <th>TÍTULO</th>
                    <th>AUTOR</th>
                    <th>ISBN</th>
                    <th>LENGUAJE</th>
                    <th class="tableHeaderRight">ACCIONES</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['isbn']; ?></td>
                        <td><?php echo $row['language']; ?></td>
                        <td class="rowButtons">
                            <form action="editBook.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="editButton"><i class="fas fa-edit"></i></button>
                            </form>
                            <form action="deleteBook.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="deleteButton"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>