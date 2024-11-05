<?php

include "../db/dbconnect.php";

// $name = $_POST["name"];
// $theme = $_POST["theme"];
// $questions = $_POST["questions"];

// $query = $conn->prepare("INSERT INTO quizes (name, theme) VALUES (?. ?");

// $query->bind_param("ss", $name, $theme);

// $query->execute();

// $quiz_id = $conn->insert_id;

// $query_question = $conn->prepare("INSERT INTO quiz_questions (question, correct, quiz_id) VALUES (?, ?, ?)");
// $query->bind_param("sdd", $q, $c, $qz);

// $query_answer = $conn->prepare("INSERT INTO quiz_question_answers (answer, num, question_id");
// $query_answer->bind_param("sdd", $a, $n, $qst);

// foreach ($questions as $question) {
//     $q = $question["question"];
//     $c = $question["correct"];
//     $qz = $quiz_id;

//     $query->execute();

//     $question_id = $conn->insert_id;
    
//     $i = 0;
//     foreach ($question["answers"] as $answer) {
//         $a = $answer;
//         $n = $i;
//         $qst = $question_id;

//         $query_answer->execute();

//         $i++;
//     }
// }

$data["message"] = $_POST["name"];

echo json_encode($data);

?>