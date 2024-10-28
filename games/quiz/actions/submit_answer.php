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

    $_SESSION["quiz"]["id"] += 1;
} catch (Exception $err) {
    $data["success"] = $err;
}

echo json_encode($data);


?>
