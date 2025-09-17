<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/estilo_index.css">

    <script>
        function buscarCEP() {
            let cep = document.getElementById("cep").value.replace(/\D/g, '');
            if (cep.length != 8) return;

            fetch("https://viacep.com.br/ws/" + cep + "/json/")
            .then(res => res.json())
            .then(data => {
                if (!("erro" in data)) {
                    document.getElementById("logradouro").value = data.logradouro;
                    document.getElementById("bairro").value = data.bairro;
                    document.getElementById("cidade").value = data.localidade;
                    document.getElementById("estado").value = data.uf;
                } else {
                    alert("CEP não encontrado!");
                }
            })
            .catch(() => alert("Erro ao buscar CEP."));
        }
    </script>
</head>
<body>
     <!--HEADER Cabeçalho do sistema WEB - página-->
     <header class="banner">Happy Toys</header>
    <!-- navegação da página WEB - MENU-->
        <nav class="menu">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="cadastro.php">Cadastrar-se</a></li>
            </ul>
        </nav>

    <h1>Cadastro</h1>
    <form method="post" action="">
        <h2>Dados Pessoais</h2>
        Nome Completo: <input type="text" name="nome" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>
        Data de Nascimento: <input type="date" name="nascimento" required><br><br>
        Celular: <input type="text" name="celular" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>

        <h2>Endereço</h2>
        CEP: <input type="text" id="cep" name="cep" onblur="buscarCEP()" required>
        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php">Não sabe o CEP?</a><br><br>

        Endereço: <input type="text" id="logradouro" name="logradouro"><br><br>
        Bairro: <input type="text" id="bairro" name="bairro"><br><br>
        Cidade: <input type="text" id="cidade" name="cidade"><br><br>
        Estado: <input type="text" id="estado" name="estado"><br><br>
        Número: <input type="text" name="numero"><br><br>
        Complemento: <input type="text" name="complemento"><br><br>
        Apelido: <input type="text" name="apelido"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <footer class="rodape">
            Site desenvolvido por Rafael Baumgarte dos Reis - Todos os direitos reservados - 2025.
        </footer>
</body>
</html>