<?php

include_once '../db/db.php';

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

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
    <?php if (empty($name) || empty($address) || empty($phone)) : ?>
        <h2>No has rellenado todos los campos.</h2>
        <div>
            <a href="index.php">Volver</a>
        </div>
    <?php else : ?>
        <?php
            $queryInsert = 'INSERT INTO library (name, address, phone) VALUES ("' . $name . '", "' . $address . '", "' . $phone . '")';
            $resultInsert = mysqli_query($conn, $queryInsert);
            header('Location: index.php');
        ?>
    <?php endif ?>
</body>
</html>