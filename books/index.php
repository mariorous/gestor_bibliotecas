<?php

include_once '../db/db.php';

$query = 'SELECT * FROM book';
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="../css/styles.css">
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
                        <td></td>
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
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <option value="<?php $row['id']; ?>"><?php $row['name']; ?></option>;
                    <?php endwhile; ?>
                    ?>
                <input type="submit" value="Añadir" name="addBook">
            </form>
        </div>
        

    </div>
    

    <a href="createBook.php">Añadir Nuevo Libro</a>
</body>
</html>