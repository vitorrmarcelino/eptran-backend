<?php 
include 'db_connection.php';

session_start();

$title = $_SERVER['REQUEST_URI'];
$user_id = $_SESSION['userdata']['id'];
$game_data = $_POST['game_data'];

$data = [];

try {
    $query = "INSERT INTO game_data (title, user_id, save_data) VALUES ('$title', '$user_id','$game_data')";

    $executa_insert = mysqli_query($conn, $query);

    $data["success"] = true;
    $data["message"] = "Jogo salvo com sucesso.";
} catch (Exception $e) {
    $data["success"] = false;
    $data["message"] = "Erro ao salvar o jogo: " . $e->getMessage();
}

echo json_encode($data);

?>