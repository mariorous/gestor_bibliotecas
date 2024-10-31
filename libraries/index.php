<?php

include_once '../db/db.php';

//Query para mostrar tabla

$queryMostrar = "SELECT * FROM library ORDER BY id DESC";
$resultado = mysqli_query($conn, $queryMostrar);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bibliotecas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/libraries.css">
</head>
<body>
    <h1>Listado de Bibliotecas</h1>
    <div class="container">
        <div class="divTable">
            <table>
                <tr>
                    <th class="tableHeaderLeft">NOMBRE</th>
                    <th>DIRECCIÓN</th>
                    <th>TELÉFONO</th>
                    <th class="tableHeaderRight">ACCIONES</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td class="textLeft"><?php echo $row['name']; ?></td>
                        <td class="textLeft"><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td class="rowButtons">
                            <form action="editLibrary.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="editButton"><i class="fas fa-edit"></i></button>
                            </form>
                            <form action="deleteLibrary.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="deleteButton"><i class="fas fa-trash"></i></button>
                            </form>
                            <form action="showBooksOfLibrary.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button type="submit" class="searchButton"><i class="fas fa-search"></i></button>
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
                <a href="../index.php" class="backButton">Volver</a>
            </form>
        </div>  
    </div>
</body>
</html>