<?php

include "../../db/dbconnect.php";

header("Content-type: application/json; charset=utf-8");

$json_input = file_get_contents('php://input');
$data_input = json_decode($json_input);
$id = empty($_GET["id"]) ? $data_input->id : $_GET["id"];

$data;

$data["quiz"] = [];

$query = $conn->prepare("SELECT Qz.name, Qz.theme, Qz.img_url FROM quizes AS Qz WHERE Qz.id = ?");

$query->bind_param("d", $id);

$query->execute();

$result = $query->get_result();

$value = $result->fetch_assoc();

$data["quiz"]["name"] = $value["name"];
$data["quiz"]["theme"] = $value["theme"];
$data["quiz"]["img_url"] = $value["img_url"];

$query_question = $conn->prepare("SELECT Qs.id, Qs.question, Qs.correct, Qs.img_url FROM quiz_questions as Qs WHERE Qs.quiz_id = ?");
$query_question->bind_param("d", $id);
$query_question->execute();

$question_result = $query_question->get_result();

$data["quiz"]["questions"] = [];

$query_answer = $conn->prepare("SELECT A.answer FROM quiz_answers AS A WHERE A.question_id = ? ORDER BY A.num");
$query_answer->bind_param("i", $qid);

while ($row = $question_result->fetch_assoc()) {
    $question = [];
    $question["question"] = $row["question"];
    $question["correct"] = $row["correct"];
    $question["img_url"] = $row["img_url"];

    $question["answers"] = [];

    $qid = $row["id"];
    $query_answer->execute();

    $answer_result = $query_answer->get_result();
    while ($row = $answer_result->fetch_assoc()) {
        $question["answers"][] = $row["answer"];
    }

    $data["quiz"]["questions"][] = $question;
}


echo json_encode($data);

?>