<?php include "../process/access_register.php" ?>
<!DOCTYPE html>
<html lang="pt-br"></html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulário de Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1 id="title"></h1>
    <p id="author"></p>
    <small id="category"></small>
    <h3 id="description"></h3>
    <img src="" alt="" id="image" />
    <p id="content"></p>

    <br>
    <br>

    <div>
        <?php

        if (true) {
            echo "<a href='./editar-postagem.php'></a>";
        }

        ?>
    </div>

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
                console.log(post)
                if (!success) {
                    alert(message);
                    return;
                }


                $("#title").html(post.title);
                $("#category").html("Postado em " + post.date + " | " + post.category.toUpperCase());
                $("#author").html("Por " + post.author);
                $("#description").html(post.description);
                $("#image").attr("src", "../" + post.img_url);
                $("#content").html(post.content);
            });
        });
    </script>
</body>
