<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar todos os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $apelido = $_POST['apelido'];

    // Converter data para formato MySQL
    $nascimento_mysql = date('Y-m-d', strtotime(str_replace('/', '-', $nascimento)));

    // Inserir tudo na ÚNICA tabela (ajuste os nomes das colunas conforme sua tabela)
    $sql = "INSERT INTO clients (nome, cpf, nascimento, celular, email, senha, cep, logradouro, bairro, cidade, estado, numero, complemento, apelido) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssss", $nome, $cpf, $nascimento_mysql, $celular, $email, $senha, $cep, $logradouro, $bairro, $cidade, $estado, $numero, $complemento, $apelido);

    if ($stmt->execute()) {
        header("Location: sucesso.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>