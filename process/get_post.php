<?php

include "../db/dbconnect.php";

$id = $_POST["id"];

$data = [];

try {
    $query = "SELECT P.title, P.description, P.content, P.category, P.img_url, U.full_name " . 
    "FROM posts as P " . 
    "INNER JOIN users as U " . 
    "ON U.id = P.user_id " .
    "WHERE P.id = $id";

    $result = mysqli_query($conn, $query);
    $newsdata = mysqli_fetch_assoc($result);

    //variáveis
    $data['news']['title'] = $newsdata['title'];
    $data['news']['autor'] = $newsdata['full_name']; 
    $data['news']['description'] = $newsdata['description'];
    $data['news']['content'] = $newsdata['content'];
    $data['news']['category'] = $newsdata['category'];
    $data['news']['img_url'] = $newsdata['img_url'];

    $data['success'] = true;  
    $data['message'] = 'Notícia carregada com sucesso!';
} catch (Exception $err) {
    $data['success'] = false;  
    $data['message'] = 'Erro ao carregar notícia.';
    $data['news'] = null;
}

echo json_encode($data);

?>
