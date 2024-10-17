<!DOCTYPE html>
<html lang="pt-br"></html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

<h1 id="title"></h1>
<p id="author"></p>
<h3 id="description"></h3>
<img src="" alt="" id="image">
<p id="content"></p>

<script>
    $(documet).ready(() => {
        let news_id = 1;

        $.ajax(
            type: "POST",
            url: "../process/create_post.php",
            data: { news_id },
            dataType: "json",
            encode: true,
        ).done(({success, message, {title, author, description, img_url, content}}) => {
            if (!success) {
                alert(message);
                return;
            }

            $("#title")[0].html(title);
            $("#author")[1].html(author);
            $("#description")[2].html(description);
            $("#image")[3].attr("src", "../" + img_url);
            $("#content")[4].html(content);
        })
    })
</script>

</body>