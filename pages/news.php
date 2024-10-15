<?php include "../auth/login_required.php" ?>
<!DOCTYPE html>
<html lang="pt-br"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícia</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<body>

<h1 id="titulo"></h1>
<p id="autor"></p>
<h3 id="descricao"></h3>
<img src="" alt="" id="imagem">
<p id="texto"></p>

<div>
    <?php
        if ($_SESSION["userdata"]["adm"]) {
            $queries;
            parse_str($_SERVER["QUERY_STRING"], $queries);
            $id = $queries['id'];
            echo "
                <a href='./update_news.php?id=$id'>Editar postagem</a>
            ";
        }
    ?>
</div>

<script>
    $(document).ready(() => {
        const searchParams = new URLSearchParams(window.location.search);

        let news_id = 1;

        $.ajax({
            type: "POST",
            url: "../process/get_news.php",
            data: { id: searchParams.get('id') },
            dataType: "json",
            encode: true,
        }).done(({success, message, news}) => {
            if (!success) {
                alert(message);
                return;
            }

            $("#titulo").html(news.titulo);
            $("#autor").html(news.autor);
            $("#descricao").html(news.descricao);
            $("#imagem").attr("src", "../" + news.img_url);
            $("#texto").html(news.texto);
        })
    })
</script>

</body>