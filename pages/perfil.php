<?php include "../auth/login_required.php"; ?>
<?php include "./process/access_register.php" ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <p>Olá,
        <?php echo $_SESSION['userdata']['name'];?>
        <?php echo $_SESSION['userdata']['name'];?>
    </p>

    <img src="../<?php echo $_SESSION['userdata']['imagem_url'] ?>" alt="foto">
    <a href="./img_upload.php">
        <button>Alterar imagem</button>
    </a>
    <br>

    <div>
        <?php 
        echo 'Nome:' . $_SESSION['userdata']['name'] . '<br>';
        echo 'Email:' . $_SESSION['userdata']['email'] . '<br>';
        echo 'Genero:' . $_SESSION['userdata']['gender'] . '<br>';
        echo 'Data de Nascimento:' . $_SESSION['userdata']['birthdate'] . '<br>';
        echo 'Escolaridade:' . $_SESSION['userdata']['school_level'] . '<br>';
        echo 'CEP:' . $_SESSION['userdata']['cep'] . '<br>';
        echo 'Bairro:' . $_SESSION['userdata']['neighborhood'] . '<br>';
        echo 'Município:' . $_SESSION['userdata']['city'] . '<br>';
        echo 'Escola:' . $_SESSION['userdata']['school'] . '<br>';
        echo 'Estado:' . $_SESSION['userdata']['uf'] . '<br>';    
    ?>
    </div>

    <p>Mudar Informações</p>

    <form>

        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="gender">Gênero:</label>
        <select id="gender" name="gender">
            <option value=""></option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="O">Outro</option>
        </select><br><br>

        <label for="birthdate">Data de Nascimento:</label>
        <input type="date" id="birthdate" name="birthdate" value=""><br><br>

        <label for="school_level">Escolaridade:</label>
        <select id="school_level" name="school_level">
            <option value=""></option>
            <option value="f1">Fundamental 1</option>
            <option value="f2">Fundamental 2</option>
            <option value="em">Médio</option>
        </select><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep"><br><br>

        <label for="nighborhood">Bairro:</label>
        <input type="text" id="nighborhood" name="nighborhood"><br><br>

        <label for="city">Município:</label>
        <input type="text" id="city" name="city"><br><br>

        <label for="school">Escola:</label>
        <input type="text" id="school" name="school"><br><br>

        <label for="uf">Estado (UF):</label>
        <select id="uf" name="uf">
            <option value=""></option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>

        </select>

        <br>
        <br>

        <input type="submit" value="Alterar Dados">
    </form>

    <br>
    <a href="./sair.php">
        <button id="logout">Sair da Conta</button>
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

            if (!formData.name && !formData.password && !formData.email && !formData.gender &&
                !formData.cpf && !formData.birthdate && !formData.school_level && !formData.cep &&
                !formData.nighborhood && !formData.city && !formData.school && !formData.uf) {
                event.preventDefault();
                return;
            }


            $.ajax({
                type: "POST",
                url: "../process/update_user.php",
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
                    window.location.href = "./profile.php";
                }
            });

            event.preventDefault();
        })
    });
    </script>

</body>

</html>