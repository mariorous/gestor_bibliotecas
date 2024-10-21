<?php

// Datos de conexión a la base de datos
$host = '127.0.0.1'; // Dirección del servidor
$user = 'root';      // Nombre de usuario de la base de datos
$pass = '';          // Contraseña de la base de datos
$db = 'gestor_bibliotecas';    // Nombre de la base de datos

// Crear conexión a la base de datos
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar si la conexión fue exitosa
if ($conn) {
    // Conexión exitosa
} else {
    // Mostrar error si la conexión falla
    echo 'No se ha podido conectar: ' . mysqli_connect_error();
}
