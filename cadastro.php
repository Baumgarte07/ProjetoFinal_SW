<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/estilo_index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
    <form action="processacadastro.php" method="post">
        <h2>Dados Pessoais</h2>
        Nome Completo: <input type="text" id="nome" name="nome" required><br><br>
        CPF: <input type="text" name="cpf" id="cpf" placeholder="SOMENTE NÚMEROS" required><br><br>
        Data de Nascimento: <input type="text" id="nascimento" name="nascimento" placeholder="SOMENTE NÚMEROS" required><br><br>
        Celular: <input type="text" id="celular" name="celular" placeholder="SOMENTE NÚMEROS" required><br><br>
        E-mail: <input type="email" id="email" name="email"  required><br><br>
        Senha: <input type="password" id="senha" name="senha" required><br><br>

        <h2>Endereço</h2>
        CEP: <input type="text" id="cep" name="cep" onblur="buscarCEP()" placeholder="SOMENTE NÚMEROS" required>
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
    <script>
    $(document).ready(function(){
      $('#cpf').mask('000.000.000-00');       // CPF com pontos e traço
      $('#nascimento').mask('00/00/0000');   // Data com barras
      $('#cep').mask('00000-000');           // CEP com traço
      $('#celular').mask('(00) 00000-0000'); // Celular com DDD e traço
    });
  </script>
    <footer class="rodape">
            Site desenvolvido por Rafael Baumgarte dos Reis - Todos os direitos reservados - 2025.
        </footer>
</body>
</html>