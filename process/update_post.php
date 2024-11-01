<?php
session_start();

include "../db/dbconnect.php";

$id = $_POST["id"];
$title = $_POST["title"];
$description = $_POST["description"];
$content = $_POST["content"];
$category = empty($_POST["category"]) ? "" : $_POST["category"];

$data = [];

$update_img = empty($_POST["update_img"]) ? false : $_POST["update_img"];

$file_tmp;
$extension;

if ($update_img && isset($_FILES["image"]["name"])) {
    if ($_FILES["image"]["error"] > 0) {
        echo json_encode($_FILES["image"]);
        $data["success"] = false;
        $data["message"] = "Erro ao carregar imagem.";
        echo json_encode($data);
        exit;
    }

    $file_tmp = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];

    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $extension = strtolower($extension);

    if(!strstr(".jpg;.jpeg;.gif;.png", $extension)) {
        $data["success"] = false;
        $data["message"] = "Arquivo inválido.";
        echo json_encode($data);
        exit;
    }
}


try {
    $query;

    if ($update_img) {
        $novoNome = uniqid(time()) . "." . $extension;
        $img_url = "assets/imgs/posts/" . $novoNome;
        $destino = "../" . $img_url;
    
        $query = "INSERT INTO posts (title, description, content, user_id, category, img_url) " .
        "VALUES ('$title', '$description', '$content', $id, '$category', '$img_url')";

        $query = $conn->prepare("UPDATE posts SET title = ?, description = ?, content = ?, category = ?, img_url = ? WHERE id = ?");
        $query->bind_param("sssssi", $title, $description, $content, $category, $img_url, $id);

        move_uploaded_file($file_tmp, $destino);
    } else {
        $query = $conn->prepare("UPDATE posts SET title = ?, description = ?, content = ?, category = ? WHERE id = ?");
        $query->bind_param("ssssi", $title, $description, $content, $category, $id);
    }
    

    if(!$query->execute()) {
        throw new Exception();
    }
    

    $data["success"] = true;
    $data["message"] = "Postagem atualizada com sucesso.";
} catch (Exception $err) {
    $data["success"] = false;
    $data["message"] = "Erro ao atualizar postagem.";
}

echo json_encode($data);


?>