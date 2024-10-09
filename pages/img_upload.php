<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <form id="form" enctype="multipart/form-data">
        <h1>Upload de Imagem</h1>
        <label for="arquivo">Escolha uma imagem:</label>
        <input type="file" id="arquivo" name="arquivo" accept="image/*" required>
        <br><br>
        <input type="submit" value="Carregar Imagem">
    </form>

    <script>
    $(document).ready(() => {
        $("form").submit((event) => {
            let formData = new FormData(event.target)
            console.log(formData)

            $.ajax({
                type: "POST",
                url: "../process/img_upload.php",
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
            })

            event.preventDefault();
        });
    });
    </script>
</body>

</html>