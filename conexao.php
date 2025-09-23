<?php
$servername = "localhost";
$username = "root";      // Substitua pelo seu usuário do MySQL
$password = "";          // Substitua pela sua senha
$dbname = "happytoysdb";        // Substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão falhou
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>