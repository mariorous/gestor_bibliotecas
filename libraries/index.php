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
    <link rel="stylesheet" href="../css/libraries.css">
</head>
<body>
    <h1>Listado de Bibliotecas</h1>
    <div class="container">
        <div class="divTable">
            <table>
                <tr>
                    <th class="tableHeaderLeft">ID</th>
                    <th>NOMBRE</th>
                    <th>DIRECCIÓN</th>
                    <th>TELÉFONO</th>
                    <th class="tableHeaderRight">ACCIONES</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td class="textLeft"><?php echo $row['name']; ?></td>
                        <td class="textLeft"><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td class="rowButtons">
                            <form action="editLibrary.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="editLibrary">EDIT</button>
                            </form>
                            <form action="deleteLibrary.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="deleteLibrary">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <div class="divForm">
            <h2>Añadir Bibliotecas</h2>
            <form action="createLibrary.php" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name">
                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address">
                <label for="phone">Teléfono:</label>
                <input type="text" id="phone" name="phone">
                <input type="submit" value="Crear" name="addLibrary">
            </form>
        </div>  
    </div>
</body>
</html>