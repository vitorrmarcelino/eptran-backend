
<!DOCTYPE html>
<html lang="pt-br"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<body>

<h1 id="titulo"></h1>
<p id="autor"></p>
<h3 id="descricao"></h3>
<img src="" alt="" id="imagem">
<p id="texto"></p>

</body>

<script>
    $(documet).ready(() => {
        let news_id = 1;

        $.ajax(
            type: "POST",
            url: "../process/create_post.php",
            data: { news_id },
            dataType: "json",
            encode: true,
        ).done(({success, message, {titulo, autor, descricao, img_url, texto}}) => {
            if (!success) {
                alert(message);
                return;
            }

            $("#titulo")[0].html(titulo);
            $("#autor")[1].html(autor);
            $("#descricao")[2].html(descricao);
            $("#imagem")[3].attr("src", "../" + img_url);
            $("#texto")[4].html(texto);

        

        })
    })
</script>