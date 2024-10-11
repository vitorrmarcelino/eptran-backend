<?php 
include 'db_connection.php';

session_start();

$rota_acessada = $_SERVER['REQUEST_URI'];
$usuario_id = $_SESSION['userdata']['id'];
$dados_jogo = $_POST['dados_jogo'];

$data = [];

try {
    $query = "INSERT INTO atividades (nome_jogo, usuario_id,dados) VALUES ('$rota_acessada', '$usuario_id','$dados_jogo')";

    $executa_insert = mysqli_query($conn, $query);

    $data["success"] = true;
    $data["message"] = "Jogo salvo com sucesso.";
} catch (Exception $e) {
    $data["success"] = false;
    $data["message"] = "Erro ao salvar o jogo: " . $e->getMessage();
}

echo json_encode($data);

?>