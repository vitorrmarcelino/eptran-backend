<?php

include "../db/dbconnect.php";

$id = $_POST["id"];

$data = [];

try {
    $query = "SELECT P.titulo, P.descricao, P.texto, P.escolaridade_minima, P.img_url, U.nome " . 
    "FROM postagens as P " . 
    "INNER JOIN usuarios as U " . 
    "ON U.id = P.usuario_id " .
    "WHERE P.id = $id";

    $result = mysqli_query($conn, $query);
    $newsdata = mysqli_fetch_assoc($result);

    //variáveis
    $data['news']['titulo'] = $newsdata['titulo'];
    $data['news']['autor'] = $newsdata['nome']; 
    $data['news']['descricao'] = $newsdata['descricao'];
    $data['news']['texto'] = $newsdata['texto'];
    $data['news']['escolaridade_minima'] = $newsdata['escolaridade_minima'];
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
