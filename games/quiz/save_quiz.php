<?php

include "../../db/dbconnect.php";
include "../cors.php";

header("Content-type: application/json; charset=utf-8");

$json_input = file_get_contents('php://input');
$quiz = json_decode($json_input);

$name = $quiz->name;
$theme = $quiz->theme;
$img_url = $quiz->img_url;
$questions = $quiz->questions;

$query = $conn->prepare("INSERT INTO quizes (name, theme, img_url) VALUES (?, ?, ?)");

$query->bind_param("sss", $name, $theme, $img_url);

$query->execute();

$quiz_id = $conn->insert_id;

$query_question = $conn->prepare("INSERT INTO quiz_questions (question, correct, img_url, quiz_id) VALUES (?, ?, ?, ?)");
$query_question->bind_param("sisi", $q, $c, $i, $qz);

$query_answer = $conn->prepare("INSERT INTO quiz_answers (answer, num, question_id) VALUES (?, ?, ?)");
$query_answer->bind_param("sii", $a, $n, $qst);

foreach ($questions as $question) {
    $q = $question->question;
    $c = $question->correct;
    $i = $question->img_url ? $question->img_url : null;
    $qz = $quiz_id;

    $query_question->execute();

    $question_id = $conn->insert_id;
    
    $i = 0;
    foreach ($question->answers as $answer) {
        $a = $answer;
        $n = $i;
        $qst = $question_id;

        $query_answer->execute();

        $i++;
    }
}

$data = [];
$data["message"] = "Quiz created successfully";

echo json_encode($data);

?>