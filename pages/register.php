<?php include "../auth/logout_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Formulário de Registro</h1>
    <form>
        <label for="nome" required>Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="senha" required>Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="email" required>Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="genero" required>Gênero:</label>
        <select id="genero" name="genero">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select><br><br>

        <label for="nascimento" required>Data de Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" required><br><br>

        <label for="etapaEscolar">Etapa Escolar:</label>
        <select id="etapaEscolar" name="etapaEscolar">
            <option value="f1">Fundamental 1</option>
            <option value="f2">Fundamental 2</option>
            <option value="em">Médio</option>
            <option value="">Nenhum</option>
        </select><br><br>

        <label for="cep" required>CEP:</label>
        <input type="text" id="cep" name="cep" required><br><br>

        <label for="bairro" required>Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br><br>

        <label for="municipio" required>Município:</label>
        <input type="text" id="municipio" name="municipio" required><br><br>

        <label for="escola">Escola:</label>
        <input type="text" id="escola" name="escola"><br><br>

        <label for="uf" required>Estado (UF):</label>
        <select id="uf" name="uf" required>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
        </select><br><br>

        <input type="submit" value="Registrar">
    </form>

    <br>
    <br>

    <a href="./login.php">
        <button>Login</button>
    </a>

    <br>
    <br>
    <a href="..">
        <button>Início</button>
    </a>


    <script>
    $(document).ready(() => {
        $("form").submit((event) => {
            var formData = {
                nome: $("#nome").val(),
                senha: $("#senha").val(),
                email: $("#email").val(),
                genero: $("#genero").val(),
                nascimento: $("#nascimento").val(),
                etapaEscolar: $("#etapaEscolar").val(),
                cep: $("#cep").val(),
                bairro: $("#bairro").val(),
                municipio: $("#municipio").val(),
                escola: $("#escola").val(),
                uf: $("#uf").val(),
            };


            $.ajax({
                type: "POST",
                url: "../process/register.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message
            }) => {
                alert(message);

                if (success) {
                    window.location.href = "./login.php";
                }
            });

            event.preventDefault();
        })
    });
    </script>

</body>

</html>