<?php

include_once '../db/db.php';

$info_library = "SELECT * FROM library WHERE id = '" . $_POST['id'] . "'";
$result_library = mysqli_query($conn, $info_library);
$libraries = mysqli_fetch_assoc($result_library);

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
                <th class="tableHeaderLeft">TÍTULO</th>
                <th>AUTOR</th>
                <th>ISBN</th>
                <th class="tableHeaderRight">ACCIONES</th>
            </tr>
        </table>
    </div>
</body>
</html>