<?php

include "../db/dbconnect.php";

$id = $_POST["id"];

$data = [];

try {
    $query = "SELECT N.titulo, N.descricao, N.texto, N.escolaridade_minima, N.img_url, U.nome " . 
    "FROM noticias as N " . 
    "INNER JOIN usuarios as U " . 
    "ON U.id = N.usuario_id " .
    "WHERE N.id = $id";

    $result = mysqli_query($conn, $query);
    $newsdata = mysqli_fetch_assoc($result);

    //variáveis
    $titulo = $newsdata['titulo'];
    $autor = $newsdata['nome']; 
    $descricao = $newsdata['descricao'];
    $texto = $newsdata['texto'];
    $escolaridade_minima = $newsdata['escolaridade_minima'];
    $img_url = $newsdata['img_url'];

    $data['success'] = true;  
    $data['message'] = 'Notícia carregada com sucesso!';
    $data['news'] = $newsdata;
} catch (Exception $err) {
    $data['success'] = false;  
    $data['message'] = 'Erro ao carregar notícia.';
    $data['news'] = null;
}

echo json_encode($data);

?>
