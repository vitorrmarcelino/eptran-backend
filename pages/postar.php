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
    <h1>Nova Postagem</h1>

    <form action="../process/create_post.php" method="post" enctype="multipart/form-data">
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

        <label for="file">Imagem:
            <input type="file" id="file" name="file" accept=".jpg, .jpeg, .gif, .png" required />
        </label>

        <button type="submit">Enviar Postagem</button>
    </form>
</body>
</html>

