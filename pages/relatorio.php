<?php include "../auth/adm_required.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relatórios</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        th,
        td {
            margin: 0;
            padding: 8px;
            border: 1px solid black;
            text-align: left;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }
        
        form {
            margin-bottom: 20px;
        }

        button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Relatórios</h1>

    <form>
        <label for="gender">Gênero
            <select id="gender" name="gender">
                <option value="">Qualquer</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
        </label>
        <label for="school_level">Escolaridade
            <select id="school_level" name="school_level">
                <option value="">Qualquer</option>
                <option value="f1">Fundamental 1</option>
                <option value="f2">Fundamental 2</option>
                <option value="em">Ensino Médio</option>
            </select>
        </label>
        <label for="uf">UF
            <select id="uf" name="uf">
                <option value="">Qualquer</option>
                <option value="sc">SC</option>
                <option value="rs">RS</option>
                <option value="pr">PR</option>
            </select>
        </label>
        <label for="city">Município
            <select id="city" name="city">
                <option value="">Qualquer</option>
                <option value="Joinville">Joinville</option>
                <option value="Curitiba">Curitiba</option>
                <option value="Porto Alegre">Porto Alegre</option>
            </select>
        </label>
        <label for="neighborhood">Bairro
            <select id="neighborhood" name="neighborhood">
                <option value="">Qualquer</option>
                <option value="Glória">Glória</option>
                <option value="Aventureiro">Aventureiro</option>
                <option value="Bucarein">Bucarein</option>
            </select>
        </label>
        <label for="school">Escola
            <select id="school" name="school">
                <option value="">Qualquer</option>
                <option value="SESI">SESI</option>
                <option value="Outra">Outra</option>
            </select>
        </label>
        <label for="initialDate">Periodo Inicial
            <input type="date" id="initialDate" name="initialDate" />
        </label>
        <label for="end_date">Periodo Final
            <input type="date" id="end_date" name="end_date" />
        </label>
        <label for="content">Mostrar
            <select name="content" id="content">
                <option value="U.gender">Gênero</option>
                <option value="U.school_level">Escolaridade</option>
                <option value="U.uf">UF</option>
                <option value="U.city">Município</option>
                <option value="U.neighborhood">Bairro</option>
                <option value="S.name">Escola</option>
                <option value="A.title">Conteúdo</option>
            </select>
        </label>
        <label>
            <input type="submit" value="Enviar">
        </label>
    </form>
    <table>
        <tr>
            <th id="label">Bairro</th>
            <th id="count">Nº de Usuários</th>
        </tr>
    </table>

    <a href="..">
        <button>Início</button>
    </a>


    <script>
    $(document).ready(() => {
        $("form").submit((event) => {
            var formData = {
                gender: $("#gender").val(),
                school_level: $("#school_level").val(),
                uf: $("#uf").val(),
                city: $("#city").val(),
                neighborhood: $("#neighborhood").val(),
                school: $("#school").val(),
                initialDate: $("#initialDate").val(),
                end_date: $("#end_date").val(),
                content: $("#content").val(),
            };

            $("table tbody").html(`
            <tr>
                <th>${$('#content').find(":selected").text()}</th>
                <th>Nº de Usuários</th>
            </tr>`);

            $.ajax({
                type: "POST",
                url: "../process/get_report.php",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(({
                success,
                message,
                accesses
            }) => {
                let format = "Setores"

                if (!success) {
                    $("table tbody").html(`
                        <tr>
                            <td>Erro ao buscar usuários, tente novamente.</td>
                        </tr>`);

                    return;
                }

                switch (format) {
                    case "Tabela":
                        if (accesses.length < 1) {
                            $("table tbody").html(`
                        <tr>
                            <td>Nenhum usuário encontrado</td>
                        </tr>`);
                        } else {
                            accesses.forEach((row) => {
                                $("table tbody").append(`
                        <tr>
                            <td>${row.label}</td>
                            <td>${row.count}</td>
                        </tr>`);
                            });
                        }
                        break;
                    case "Setores":
                        
                        break;
                }
            });

            event.preventDefault();
        });

        $("form input").change(() => {
            $("form").submit();
        })

        $("form select").change(() => {
            $("form").submit();
        })

        $("form").submit();
    });
    </script>
</body>

</html>