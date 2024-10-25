<?php 

if (session_status() != 2) {
    session_start();
}

include __DIR__ . '/../db/dbconnect.php';

if (isset($_SESSION['userdata']['id'])) {
    $title = $_SERVER['REQUEST_URI'];
    $user_id = $_SESSION['userdata']['id'];
    
    $query = "INSERT INTO accesses (title, user_id) VALUES ('$title', '$user_id')";
    
    $executa_insert = mysqli_query($conn, $query);
}

?>