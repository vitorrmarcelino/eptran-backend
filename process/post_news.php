<?php
session_start();

include "../db/dbconnect.php";

$id = $_SESSION["userdata"]["id"];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$texto = $_POST['texto'];
$escolaridade = empty($_POST['escolaridade']) ? 'null' : $_POST['escolaridade'];

$data = [];

$img_url = '';

if (!isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] > 0) {
    $data["success"] = false;
    $data["message"] = "Erro ao carregar imagem.";
    echo json_encode($data);
    exit;
}

$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome = $_FILES['arquivo']['name'];

$extensao = pathinfo($nome, PATHINFO_EXTENSION);
$extensao = strtolower($extensao);

if(!strstr ('.jpg;.jpeg;.gif;.png', $extensao)) {
    $data["success"] = false;
    $data["message"] = "Arquivo inválido.";
    echo json_encode($data);
    exit;
}


try {
    $novoNome = uniqid(time()) . '.' . $extensao;
    $img_url = "assets/imgs/news/" . $novoNome;
    $destino = "../" . $img_url;
    
    
    $query = "INSERT INTO noticias (titulo, descricao, texto, usuario_id, escolaridade_minima, img_url) " .
    "VALUES ('$titulo', '$descricao', '$texto', $id, '$escolaridade', '$img_url')";

    $result = $conn->query($query);
    
    move_uploaded_file($arquivo_tmp, $destino);

    $data["success"] = true;
    $data["message"] = "Notícia postada com sucesso.";
} catch (Exception $err) {
    $data["success"] = false;
    $data["message"] = "Erro ao cadastrar notícia.";
}

echo json_encode($data);


?>