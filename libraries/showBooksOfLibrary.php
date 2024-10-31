<?php

include_once '../db/db.php';

$info_library = "SELECT * FROM library WHERE id = '" . $_POST['id'] . "'";
$result_library = mysqli_query($conn, $info_library);
$libraries = mysqli_fetch_assoc($result_library);

$bookFromLibrary = "SELECT * FROM book WHERE id_library = '" . $_POST['id'] . "'";
$resultBook = mysqli_query($conn, $bookFromLibrary);

/* $stockLibrary = "SELECT isbn, COUNT(*) AS stock FROM book WHERE id_library = '" . $_POST['id'] . "' GROUP BY isbn";
$resultStock = mysqli_query($conn, $stockLibrary); */

$query = "SELECT title, author, isbn, language, id_library, COUNT(*) as stock 
    FROM book 
    WHERE id_library = '" . $_POST['id'] . "' GROUP BY isbn, id_library ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/libraries.css">
    <title>Bibliotecas</title>
</head>
<body>
    <header class="infoLibraryContainer">
        <div class="divInfoLibrary">
            <li class="infoLibrary">
                <ul class="libraryRow"><b>Nombre</b> <?php echo $libraries['name']?></ul>
                <ul class="libraryRow"><b>Dirección</b> <?php echo $libraries['address']?></ul>
                <ul class="libraryRow"><b>Teléfono</b> <?php echo $libraries['phone']?></ul>
            </li>
        </div>
    </header>

    <div class="divTableLibrary">
        <table>
            <tr>
                <th>TÍTULO</th>
                <th>AUTOR</th>
                <th>ISBN</th>
                <th>LENGUA</th>
                <th>STOCK</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td class="textLeft"><?php echo $row['title'] ?></td>
                <td class="textLeft"><?php echo $row['author'] ?></td>
                <td><?php echo $row['isbn'] ?></td>
                <td><?php echo $row['language'] ?></td>
                <td><?php echo $row['stock']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <a href="index.php" class="backButtonLibrary">Volver</a>
</body>
</html>