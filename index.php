<?php

require_once 'db/db.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Bibliotecas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Gestión Centralizada de Bibliotecas</h1>

    <!-- Buscador de libros -->
    <form method="" action="">
        <label for="search">Buscar libros por título, autor o ISBN:</label>
        <input type="text" id="search" name="search" value="">
        <button type="submit">Buscar</button>
    </form>


    <hr>

    <!-- Enlaces a la gestión de bibliotecas y libros -->
    <h2>Gestión</h2>
    <ul>
        <li><a href="libraries/index.php">Gestionar Bibliotecas</a></li>
        <li><a href="books/index.php">Gestionar Libros</a></li>
    </ul>
</body>
</html>
