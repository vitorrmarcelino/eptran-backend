<?php

include "../../db/dbconnect.php";

header("Content-type: application/json; charset=utf-8");

$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input);
$user_id = empty($_GET["user_id"]) ? $data_input->user_id : $_GET["user_id"];
$quiz_id = empty($_GET["quiz_id"]) ? $data_input->quiz_id : $_GET["quiz_id"];
$score = empty($_GET["score"]) ? $data_input->score : $_GET["score"];

$data = [];
$data["user_id"] = $user_id;
$data["quiz_id"] = $quiz_id;
$data["score"] = $score;

$exists_query = $conn->prepare("SELECT COUNT(user_id) AS u_count FROM quiz_user_data WHERE user_id = ? and quiz_id = ?");
$exists_query->bind_param("ii", $user_id, $quiz_id);
$exists_query->execute();

$exists = (boolean) $exists_query->get_result()->fetch_assoc()["u_count"];

if ($exists) {
    $update_query = $conn->prepare("UPDATE quiz_user_data SET best_score =? WHERE user_id =? AND quiz_id =?");
    $update_query->bind_param("dii", $score, $user_id, $quiz_id);
    $update_query->execute();
} else {
    $insert_query = $conn->prepare("INSERT INTO quiz_user_data (best_score, user_id, quiz_id) VALUES (?, ?, ?)");
    $insert_query->bind_param("dii", $score, $user_id, $quiz_id);
    $insert_query->execute();
}

echo json_encode($data);

?>