<?php 
include 'db_connection.php';

session_start();

if (!isset($_SESSION['userdata']['id'])) {
    die('User not logged in.');
}

$title = $_SERVER['REQUEST_URI'];
$user_id = $_SESSION['userdata']['id'];

try {
    $query = "INSERT INTO activities (title, user_id) VALUES ('$title', '$user_id')";

    $executa_insert = mysqli_query($conn, $query);
} catch (Exception $e) {
    exit;
}

?>