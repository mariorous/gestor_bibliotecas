<?php

include_once '../db/db.php';

//Query para mostrar tabla

$queryMostrar = "SELECT * FROM library";
$resultado = mysqli_query($conn, $queryMostrar);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bibliotecas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Listado de Bibliotecas</h1>
    <a class="createButton" href="createLibrary.php">Añadir Nueva Biblioteca</a>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>PHONE</th>
            <th>ACCIONES</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td class="textLeft"><?php echo $row['name']; ?></td>
                <td class="textLeft"><?php echo $row['address']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>