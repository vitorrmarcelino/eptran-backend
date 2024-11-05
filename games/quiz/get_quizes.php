<?php

include "../../db/dbconnect.php";

header("Content-type: application/json; charset=utf-8");

$query = $conn->prepare("SELECT Qz.id, Qz.name, Qz.theme, COUNT(Qs.id) as question_count FROM quizes AS Qz INNER JOIN quiz_questions AS Qs ON Qs.quiz_id = Qz.id GROUP BY Qz.id LIMIT 5");

$query->execute();

$result = $query->get_result();

$data = [];
$data["quizes"] = [];

while ($row = $result->fetch_assoc()) {
    $data["quizes"][] = $row;
}

echo json_encode($data);

?>