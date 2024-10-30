<?php

session_start();

include "../../../db/dbconnect.php";

$data = [];

$chosen = $_POST["chosen"];
$id = $_SESSION["quiz"]["id"];

try {
    $query = "SELECT * FROM quiz WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $question_data = mysqli_fetch_assoc($result);

    $data["success"] = $question_data;

    $data["correct"] = $question_data['correct'];

    //Salvando respostas certas e erradas
    if ($chosen == $data["correct"]) {
        $_SESSION["quiz"]["right"] += 1;
    } else {
        $_SESSION["quiz"]["wrong"] += 1;
    };

    $_SESSION["quiz"]["id"] += 1;
} catch (Exception $err) {
    $data["success"] = $err;
}

echo json_encode($data);


?>