<?php include "../auth/logout_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Formulário de Cadastro</h1>
    <form>
        <label for="name" required>Nome:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="password" required>Senha:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email" required>Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="gender" required>Gênero:</label>
        <select id="gender" name="gender">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select><br><br>

        <label for="birthdate" required>Data de Nascimento:</label>
        <input type="date" id="birthdate" name="birthdate" required><br><br>

        <label for="school_level">Etapa Escolar:</label>
        <select id="school_level" name="school_level">
            <option value="f1">Fundamental 1</option>
            <option value="f2">Fundamental 2</option>
            <option value="em">Médio</option>
            <option value="">Nenhum</option>
        </select><br><br>

        <label for="cep" required>CEP:</label>
        <input type="text" id="cep" name="cep" required><br><br>

        <label for="neighborhood" required>Bairro:</label>
        <input type="text" id="neighborhood" name="neighborhood" required><br><br>

        <label for="city" required>Município:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="school">Escola:</label>
        <input type="text" id="school" name="school"><br><br>

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

    <a href="./entrar.php">
        <button>Entrar</button>
    </a>

    <br>
    <br>
    <a href="..">
        <button>Início</button>
    </a>


    <script>
    $(document).ready(() => {
        $("form").submit((event) => {
            let formData = new FormData(event.target);

            $.ajax({
                type: "POST",
                url: "../process/register.php",
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                encode: true,
            }).done(({
                success,
                message
            }) => {
                alert(message);

                if (success) {
                    window.location.href = "./entrar.php";
                }
            });

            event.preventDefault();
        })

        $("#school").on("input", (event) => {
            if ($("#school").val().length < 3) return;

            let formData = {
                school_name: $("#school").val()
            }

            $.ajax({
                type: "POST",
                url: "../process/get_schools.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message,
                schools
            }) => {
                console.log(schools);
            });

            event.preventDefault();
        });
    });
    </script>

</body>

</html>