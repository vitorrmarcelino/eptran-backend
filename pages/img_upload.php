<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <form enctype="multipart/form-data">
        <h1>Upload de Imagem</h1>
        <label for="arquivo">Escolha uma imagem:</label>
        <input type="file" id="arquivo" name="arquivo" accept="image/*" required>
        <br><br>
        <input type="submit" value="Carregar Imagem">
    </form>
    <script>
    $(document).ready(() => {
        $('form').submit((event) => {
            event.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '../process/upload_img.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
            }).done(({
                success,
                message
            }) => {
                alert(message)

                if (success) {
                    window.location.reload()
                }
            });
        });
    });
    </script>
</body>

</html>