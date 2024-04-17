<?php 

$servername = "localhost";
$username = "id20757300_unachh";
$password = "mike2928.A";
$database = "id20757300_ulises";

// Crear la conexión
$connect = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$connect) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>