<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo_index.css">
    <link rel="stylesheet" href="css/estilo_cadastro.css">
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
                <li><a href="#">Masculinos</a></li>
                <li><a href="#">Femininos</a></li>
                <li><a href="#">Brinquedos</a></li>
                <li><a href="cadastro.php">Cadastrar-se</a></li>
            </ul>
        </nav>
        <form>
        <h2>Endereço</h2>
        CEP: <a href="https://buscacepinter.correios.com.br/app/endereco/index.php">Não sabe o CEP?</a><br><br>
        <input type="text" id="cep" name="cep" onblur="buscarCEP()" placeholder="SOMENTE NÚMEROS" required><br><br>
        

        Endereço: <br><br>
        <input type="text" id="logradouro" name="logradouro"><br><br>
        Bairro: <br><br>
        <input type="text" id="bairro" name="bairro"><br><br>
        Cidade: <br><br>
        <input type="text" id="cidade" name="cidade"><br><br>
        Estado: <br><br>
        <input type="text" id="estado" name="estado"><br><br>
        Número: <br><br>
        <input type="text" name="numero"><br><br>
        Complemento: <br><br>
        <input type="text" name="complemento"><br><br>
        Apelido: <br><br>
        <input type="text" name="apelido"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <script>
    $(document).ready(function(){
      $('#cep').mask('00000-000');           // CEP com traço
    });
  </script>
    <footer class="rodape">
            Site desenvolvido por Rafael Baumgarte dos Reis - Todos os direitos reservados - 2025.
        </footer>
</body>
</html>