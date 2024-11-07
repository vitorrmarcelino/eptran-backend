<?php

$json_input = file_get_contents("php://input");
$data_input = json_decode($json_input);

$b64 = $data_input->image;

$b64 = explode(",", $b64);
$extension = str_replace("/", ".", strstr(strstr($b64[0], "/"), ";", true));
$data = base64_decode($b64[1]);
$file_name = uniqid() . $extension;
$file_path = "images/" . $file_name;
$path = "eptran/backend/games/quiz/" . $file_path;
$success = file_put_contents($file_path, $data);
 
echo json_encode($path);

?>