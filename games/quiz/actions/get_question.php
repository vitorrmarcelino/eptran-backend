<?php

session_start();

include "../../../db/dbconnect.php";

// Criação do quiz ID que identifica no banco
$id;

if (isset($_SESSION["quiz"]["id"])) {
    $id = (int) $_SESSION["quiz"]["id"];
} else {
    $id = 1;
    $_SESSION["quiz"]["id"] = $id;
}

$data = [];

//Pegando do banco
$query = "SELECT * FROM quiz WHERE id=$id";
$result = mysqli_query($conn, $query);
$question_data = mysqli_fetch_assoc($result);

//Separando os dados
$data["id"] = $question_data["id"] . "/5" ;
$data["question"] = $question_data['question'];
$data["answer1"] = $question_data['answer_1'];
$data["answer2"] = $question_data['answer_2'];
$data["answer3"] = $question_data['answer_3'];
$data["answer4"] = $question_data['answer_4'];

//Devolvendo Dados
echo json_encode($data);

?>
