<?php

include "../../db/dbconnect.php";

header("Content-type: application/json; charset=utf-8");

$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input);
$id = empty($_GET["id"]) ? $data_input->id : $_GET["id"];

$query = $conn->prepare("SELECT * FROM ( SELECT Qz.id, Qz.name, Qz.theme, Qz.img_url, Ud.best_score, COUNT(Qs.id) question_count FROM quizes Qz LEFT JOIN quiz_questions as Qs ON Qs.quiz_id = Qz.id LEFT JOIN quiz_user_data Ud ON Ud.quiz_id = Qz.id WHERE Ud.user_id = ? GROUP BY Qz.id, Ud.id UNION SELECT Qz.id, Qz.name, Qz.theme, Qz.img_url, 0, COUNT(Qs.id) question_count FROM quizes Qz LEFT JOIN quiz_questions as Qs ON Qs.quiz_id = Qz.id WHERE NOT EXISTS ( SELECT NULL FROM quiz_user_data Ud WHERE Ud.quiz_id = Qz.id && Ud.user_id = ? ) GROUP BY Qz.id ) a ORDER BY id");
$query->bind_param("ii", $id, $id);
$query->execute();

$result = $query->get_result();

$data = [];
$data["quizes"] = [];

while ($row = $result->fetch_assoc()) {
    $data["quizes"][] = $row;
}

echo json_encode($data);

?>