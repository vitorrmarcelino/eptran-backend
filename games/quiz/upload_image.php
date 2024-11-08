<?php

$json_input = file_get_contents("php://input");
$data_input = json_decode($json_input);

$b64 = $data_input->image;
$output_dir = $data_input->output_dir;
$file_name = $data_input->file_name;

$b64 = explode(",", $b64);
$extension = str_replace("/", ".", strstr(strstr($b64[0], "/"), ";", true));
$raw = base64_decode($b64[1]);
$new_file_name = strlen($file_name) > 0 ? $file_name . $extension : uniqid() . $extension;
$file_path = "assets/imgs/games/" . $output_dir . "/" . $new_file_name;
$success = file_put_contents("../../" . $file_path, $raw);

$data = [];
$data["sucess"] = true;
$data["file_path"] = $file_path;

echo json_encode($data);

?>