<?php
// Inclui o arquivo de conexão
require_once 'conexao.php';

// Coleta e preparação dos dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento']; // o nome do campo do formulário
$celular = $_POST['celular'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$apelido = $_POST['apelido'];

// Criptografa a senha para segurança
$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

// Formata a data de nascimento para o formato do MySQL (YYYY-MM-DD)
$data_mysql = DateTime::createFromFormat('d/m/Y', $nascimento)->format('Y-m-d');

// Prepara a query SQL com os nomes exatos da sua tabela
$sql = "INSERT INTO clientes (nome, cpf, nascimento, celular, email, senha, cep, logradouro, bairro, cidade, estado, numero, complemento, apelido) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepara a declaração
if ($stmt = $conn->prepare($sql)) {
    // Vincula os parâmetros na ordem correta
    $stmt->bind_param("ssssssssssssss", $nome, $cpf, $data_mysql, $celular, $email, $senha_hashed, $cep, $logradouro, $bairro, $cidade, $estado, $numero, $complemento, $apelido);
    
    // Executa a inserção
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Erro na preparação da query: " . $conn->error;
}
?>