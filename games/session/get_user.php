<?php

session_start();
include "../../db/dbconnect.php";
header("Content-Type: application/json");

$data = [];
$data["message"] = "Hello, world!";
$data["user"] = isset($_SESSION["userdata"]) ? $_SESSION["userdata"] : null;

echo json_encode($data);

?>