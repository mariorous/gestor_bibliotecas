<?php

include_once '../db/db.php';

$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$language = $_POST['language'];
$id_library = $_POST['id_library'];

$id_library_value = empty($id_library) ? "NULL" : "'" . $id_library . "'";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/books.css">
    <title>Libros</title>
</head>
<body>
    <?php if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['isbn']) || empty($_POST['language'])) : ?>
        <h2>No has rellenado todos los campos</h2>
        <div class="backContainer">
            <a href="index.php">Volver</a>
        </div>
    <?php else : ?>
        <?php
        $query = "INSERT INTO book (title, author, isbn, language, id_library) 
        VALUES ('$title', '$author', '$isbn', '$language', $id_library_value)";
        $result = mysqli_query($conn, $query);
        header('Location: index.php');
        ?>
    <?php endif; ?>
</body>
</html>