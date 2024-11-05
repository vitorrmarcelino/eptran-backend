<?php

include "../../db/dbconnect.php";

$json_input = file_get_contents('php://input');
$quiz = json_decode($json_input);

$name = $quiz->name;
$theme = $quiz->theme;
$questions = $quiz->questions;

$query = $conn->prepare("INSERT INTO quizes (name, theme) VALUES (?, ?)");

$query->bind_param("ss", $name, $theme);

$query->execute();

$quiz_id = $conn->insert_id;

$query_question = $conn->prepare("INSERT INTO quiz_questions (question, correct, quiz_id) VALUES (?, ?, ?)");
$query_question->bind_param("sii", $q, $c, $qz);

$query_answer = $conn->prepare("INSERT INTO quiz_question_answers (answer, num, question_id) VALUES (?, ?, ?)");
$query_answer->bind_param("sii", $a, $n, $qst);

foreach ($questions as $question) {
    $q = $question->question;
    $c = $question->correct;
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
$data["message"] = "Quiz created successfully"

echo json_encode($data);

?>