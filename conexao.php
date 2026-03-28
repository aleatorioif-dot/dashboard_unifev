<?php
$hostname = "localhost";
$bancodedados = "sistema_web"; // Verifique se o nome no PHPMyAdmin é este
$usuario = "root";
$senha = "";

$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($conn->connect_error) {
    die("Falha ao conectar: " . $conn->connect_error);
}
?>