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
    <div class="divUpdateForm">
        <form action="" method="POST">
            <h2>Editando la biblioteca: <?php echo $libraries['name']; ?></h2>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?php echo $libraries['name']; ?>" required>
            <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" value="<?php echo $libraries['address']; ?>" required>
            <label for="phone">Teléfono:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $libraries['phone']; ?>" required>
            <input type="submit" value="Actualiza" name="updateLibrary">
            <a href="index.php" class="backButton">Volver</a>
        </form>
    </div>
    <?php if (isset($_POST['updateLibrary'])) : ?>
        <?php if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone'])) : ?>
            <script>alert('Tienes que rellenar todos los campos')</script>
        <?php else : ?>
            <?php
            $queryUpdate = "UPDATE Library SET name = '" . $_POST['name'] . "', address = '" . $_POST['address'] . "', phone = '" . $_POST['phone'] . "' WHERE id = '" . $_POST['id'] . "'";
            $resultUpdate = mysqli_query($conn, $queryUpdate);
            header('Location: index.php');
            ?>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>