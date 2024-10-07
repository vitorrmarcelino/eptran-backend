<?php 

include "../db/dbconnect.php";

session_start();

if (!isset($_SESSION['userdata']['id'])) {
    die('User not logged in.');
}

$usuario_id = $_SESSION['userdata']['id'];
$rota_acessada = $_SERVER['REQUEST_URI'];

$query = "SELECT atividades WHERE id = $usuario_id";

$query = str_replace(", WHERE", " WHERE", $query);

$executa_update = mysqli_query($conn, $query);

$data = [];

if($executa_update){
    // Busca os dados atualizados
    $query_select = "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $query_select);

    $data["success"] = true;
    
    if($result && mysqli_num_rows($result) > 0){
        $userdata = mysqli_fetch_assoc($result);
        $_SESSION["userdata"] = $userdata; // Atualiza a sessão com todos os dados

        $data["message"] = "Usuário atualizado com sucesso.";
    } else {
        $data["message"] = "Usuário atualizado porém erro ao recuperar as informações, tente logar novamente.";
    }

    try {
        $query = "INSERT INTO atividades (rota_acessada, usuario_id) VALUES ('$rota_acessada', '$usuario_id')";
    
        $executa_insert = mysqli_query($conn, $query);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
} else {
    $data["success"] = false;
    $data["message"] = "Erro ao atualizar o usuário.";
}

echo json_encode($data);

?>
