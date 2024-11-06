<?php

include "../../db/dbconnect.php";

header("Content-type: application/json; charset=utf-8");

$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input);
$id = empty($_GET["id"]) ? $data_input->id : $_GET["id"];

$query = $conn->prepare("SELECT Qz.id, Qz.name, Qz.theme, COUNT(Qs.id) as question_count, Ud.best_score FROM quizes AS Qz INNER JOIN quiz_questions AS Qs ON Qs.quiz_id = Qz.id INNER JOIN quiz_user_data as Ud ON Ud.quiz_id = Qz.id and Ud.user_id = ? GROUP BY Qz.id LIMIT 5");
$query->bind_param("i", $id);
$query->execute();

$result = $query->get_result();

$data = [];
$data["quizes"] = [];

while ($row = $result->fetch_assoc()) {
    $data["quizes"][] = $row;
}

echo json_encode($data);

?>