<?php include "../auth/adm_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro de Administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <table id="tabela">
        <thead>
            <th>ID</th>
            <th>Email</th>
        </thead>
        <tbody>

        </tbody>
    </table>


    <h1>Registrar Administrador</h1>
    <form>
        <label for="email" required>Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input id="registrar" type="submit" value="Registrar">
        <input id="remover" type="submit" value="Remover">
    </form>

    <br>
    <br>
    <a href="..">
        <button>Início</button>
    </a>


    <script>
    $(document).ready(() => {
        $("#registrar").click((event) => {
            let formData = {
                email: $("#email").val(),
            };

            $.ajax({
                type: "POST",
                url: "../process/adm_register.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                message
            }) => {
                alert(message);

                updateTable();
            });


            event.preventDefault();
        });


        $("#remover").click((event) => {
            let formData = {
                email: $("#email").val(),
            };

            $.ajax({
                type: "POST",
                url: "../process/adm_delete.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                message
            }) => {
                alert(message);

                updateTable();
            });


            event.preventDefault();
        });
        
        updateTable();
    });

    function updateTable() {
        $("#tabela tbody").html('');

        $.ajax({
            type: "GET",
            url: "../process/get_adms.php",
            dataType: "json",
            encode: true
        }).done(({success, message, users}) => {
            if (success) {
                users.forEach((user) => {
                    $("table tbody").append(`
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.email}</td>
                        </tr>`);
                    });
                return;
            }

            $("table tbody").html(`
                <tr>
                    <td>Erro ao buscar usuários, tente novamente.</td>
                </tr>`);
        });
    }
    </script>

</body>

</html>