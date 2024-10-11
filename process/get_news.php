<?php

include "../db/dbconnect.php";


//seleciona a notícia
$id = 1;

$query = "SELECT N.titulo, N.descricao, N.texto, N.escolaridade_minima, N.img_url, U.nome ' . 
    'FROM noticias as N ' . 
    'INNER JOIN usuarios as U ' . 
    'ON U.id = N.usuario_id ' .
    'WHERE N.id = $id";

$result = mysqli_query($conn, $query);
$newsdata = mysqli_fetch_array($result);
echo $newsdata;

//variáveis
$titulo = $newsdata['titulo'];
$autor = $newsdata['nome']; 
$descricao = $newsdata['descricao'];
$texto = $newsdata['texto'];
$escolaridade_minima = $newsdata['escolaridade_minima'];
$img_url = $newsdata['img_url'];

?>


