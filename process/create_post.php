<?php
session_start();

include "../db/dbconnect.php";

$id = $_SESSION["userdata"]["id"];
$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];
$category = empty($_POST['category']) ? 'null' : $_POST['category'];

$data = [];

$img_url = '';

if (!isset($_FILES['image']['name']) && $_FILES['image']['error'] > 0) {
    $data["success"] = false;
    $data["message"] = "Erro ao carregar imagem.";
    echo json_encode($data);
    exit;
}

$file_tmp = $_FILES['image']['tmp_name'];
$name = $_FILES['image']['name'];

$extension = pathinfo($name, PATHINFO_EXTENSION);
$extension = strtolower($extension);

if(!strstr ('.jpg;.jpeg;.gif;.png', $extension)) {
    $data["success"] = false;
    $data["message"] = "Arquivo inválido.";
    echo json_encode($data);
    exit;
}


try {
    $novoNome = uniqid(time()) . '.' . $extension;
    $img_url = "assets/imgs/posts/" . $novoNome;
    $destino = "../" . $img_url;
    
    
    $query = "INSERT INTO posts (title, description, content, user_id, category, img_url) " .
    "VALUES ('$title', '$description', '$content', $id, '$category', '$img_url')";

    $result = $conn->query($query);
    
    move_uploaded_file($file_tmp, $destino);

    $data["success"] = true;
    $data["message"] = "Notícia postada com sucesso.";
} catch (Exception $err) {
    $data["success"] = false;
    $data["message"] = "Erro ao cadastrar notícia.";
}

echo json_encode($data);


?>