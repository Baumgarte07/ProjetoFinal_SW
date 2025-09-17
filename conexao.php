<?php
$servername = "localhost";
$username = "root"; // usuário MySQL
$password = "";     // senha MySQL
$dbname = "mydb"; // coloque o nome do seu banco

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>