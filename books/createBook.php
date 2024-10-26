<?php

include_once '../db/db.php';

if (isset($_POST['addBook'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $language = $_POST['language'];
    $id_library = $_POST['id_library'];

    $query = 'INSERT INTO book (title, author, isbn, language, id_library) 
    VALUES ("' . $title . '", "' . $author . '", "' . $isbn . '", "' . $language . '", "' . $id_library . '")';
    $result = mysqli_query($conn, $query);
}

header('Location: index.php');
