<?php include "../auth/adm_required.php" ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criação de Postagem</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 10px;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <h1>Atualizar Postagem</h1>

    <form enctype="multipart/form-data">
        <label for="title">Título:
            <input type="text" id="title" name="title" required />
        </label>

        <label for="description">Descrição:
            <textarea id="description" name="description" required></textarea>
        </label>

        <label for="content">Texto Completo:
            <textarea id="content" name="content" required></textarea>
        </label>

        <label for="category">Categoria:
            <select id="category" name="category" required>
                <option value="">Selecione</option>
                <option value="legislação">Legislação</option>
            </select>
        </label>

        <label for="image">Imagem:
            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .gif, .png" />
        </label>

        <button type="submit">Atualizar Postagem</button>
    </form>

    <script>
    $(document).ready(() => {
        const searchParams = new URLSearchParams(window.location.search);

        $.ajax({
            type: "POST",
            url: "../process/get_post.php",
            data: { id: searchParams.get("id") },
            dataType: "json",
            encode: true,
        }).done(({success, message, post}) => {
            if (!success) {
                alert(message);
                window.location.href = "..";
                return;
            }


            $("#title").val(post.title);
            $("#category").val(post.category);
            $("#author").val(post.author);
            $("#description").val(post.description);
            $("#content").val(post.content);
        });

        $("form").submit((event) => {
            let formData = new FormData(event.target);
            formData.append("id", searchParams.get("id"));
            if ($("#image").val()) {
                formData.append("update_img", true);
            }

            $.ajax({
                type: "POST",
                url: "../process/update_post.php",
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                encode: true,
                error(e) {
                    console.log(e)
                }
            }).done(({
                success,
                message
            }) => {
                alert(message);

                if (success) {
                    window.location.href = "./postagem.php?id=" + searchParams.get("id");
                }
            });


            event.preventDefault();
        });
    });
    </script>
</body>
</html>

