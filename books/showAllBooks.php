<?php

include_once '../db/db.php';

// Obtener el ISBN y el ID de la biblioteca desde el formulario
$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

// Consulta para obtener todos los libros que coincidan con el ISBN y estén en la misma biblioteca
$query = "SELECT * FROM book WHERE isbn = '$isbn' ORDER BY id DESC";
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
    <h1>Libros con ISBN "<?php echo $isbn; ?>"</h1>
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
                    <th>UBICACIÓN</th>
                    <th class="tableHeaderRight">ACCIONES</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['isbn']; ?></td>
                        <td><?php echo $row['language']; ?></td>
                        <td><?php echo $row['id_library']; ?></td>
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