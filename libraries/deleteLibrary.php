<?php

include_once '../db/db.php';

$info_library = "SELECT * FROM library WHERE id = '" . $_POST['id'] . "'";
$result_library = mysqli_query($conn, $info_library);
$libraries = mysqli_fetch_assoc($result_library);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/libraries.css">
    <title>Bibliotecas</title>
</head>
<body>
    <h2>¿Estás completamente seguro de querer eliminar esta biblioteca: <?php echo $libraries['name']; ?></h2>
    <div>
        <a href="index.php">Volver</a>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
            <button type="submit" name="confirm">Eliminar</button>
        </form>
    </div>
    <?php
    if (isset($_POST['confirm'])) {
        $queryDelete = "DELETE FROM library WHERE id = '" . $_POST['id'] . "'";
        $resultDelete = mysqli_query($conn, $queryDelete);
        header('Location: index.php');
    }
    ?>
</body>
</html>