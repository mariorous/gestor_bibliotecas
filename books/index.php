<?php

include_once '../db/db.php';

$query = 'SELECT * FROM book ORDER BY id DESC';
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/books.css">
</head>
<body>
    <h1>Listado de Libros</h1>

    <div class="container">
        <div class="divTable">
            <table>
                <tr>
                    <th class="tableHeaderLeft">TÍTULO</th>
                    <th>AUTOR</th>
                    <th>ISBN</th>
                    <th>LENGUAJE</th>
                    <th>UBICACIÓN</th>
                    <th class="tableHeaderRight">ACCIONES</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td class="textLeft"><?php echo $row['title']; ?></td>
                        <td class="textLeft"><?php echo $row['author']; ?></td>
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

        <div class="divForm">
            <h2>Añadir libro</h2>
            
            <form action="createBook.php" method="POST">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" required>
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>
                <label for="language">Lenguaje:</label>
                <input type="text" id="language" name="language" required>
                <label for="id_library">Biblioteca:</label>
                <select name="id_library" id="id_library">
                    <option value="">Seleccione una biblioteca</option>
                    <?php
                    $query = 'SELECT * FROM library';
                    $result = mysqli_query($conn, $query);
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>;
                    <?php endwhile; ?>
                    
                <input type="submit" value="Añadir" name="addBook">
            </form>
        </div>
    </div>
</body>
</html>