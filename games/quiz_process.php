<?php

include "../db/dbconnect.php";

$i = 0;
$data[]


//Pegando do banco
$query = "SELECT * FROM quiz WHERE id=$i"
$result = mysqli_query($conn, $query);
$question_data = mysqli_fecht_assoc($result)

//Separando os dados
$data["id"] = $question_data["id"];
$data["question"] = $question_data["question"];
$data["answer1"] = $question_data["answer_1"];
$data["answer2"] = $question_data["answer_2"];
$data["answer3"] = $question_data["answer_3"];
$data["answer4"] = $question_data["answer_4"];
$data["right"] = $question_data["right"];


function (){

}
?>

<?php

$chosen = $_POST["chosen"];


?>