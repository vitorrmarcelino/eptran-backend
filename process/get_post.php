<?php

include "../db/dbconnect.php";

$id = $_POST["id"];

$data = [];

try {
    $select = "SELECT P.title, P.description, P.content, P.category, P.img_url, P.create_date, U.name " . 
    "FROM posts as P " . 
    "INNER JOIN users as U " . 
    "ON U.id = P.user_id " .
    "WHERE P.id = ?";

    $query = $conn->prepare($select);
    $query->bind_param("d", $id);
    $query->execute();

    $result = $query->get_result();
    $newsdata = mysqli_fetch_assoc($result);

    //variáveis
    $data['post']['title'] = $newsdata['title'];
    $data['post']['author'] = $newsdata['name']; 
    $data['post']['description'] = $newsdata['description'];
    $data['post']['content'] = $newsdata['content'];
    $data['post']['category'] = $newsdata['category'];
    $data['post']['img_url'] = $newsdata['img_url'];
    $data['post']['date'] = date("d/m/Y", strtotime($newsdata["create_date"]));

    $data['success'] = true;  
    $data['message'] = 'Notícia carregada com sucesso!';
} catch (Exception $err) {
    $data['success'] = false;  
    $data['message'] = 'Erro ao carregar notícia.';
    $data['post'] = null;
}

echo json_encode($data);

?>
