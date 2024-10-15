<?php 

include "../db/dbconnect.php";
session_start();

if (!isset($_SESSION['userdata']['id'])) {
    die('User not logged in.');
}

$usuario_id = $_SESSION['userdata']['id'];
$rota_acessada = $_SERVER['REQUEST_URI'];
// $usuario_id = 1;
// $rota_acessada = "ruanbombado.com.br";

$query = "SELECT *  FROM atividades WHERE usuario_id = $usuario_id AND acesso >= NOW() - INTERVAL 30 MINUTE";
$executa_select = mysqli_query($conn, $query);

// echo json_encode($executa_select);


if(mysqli_num_rows($executa_select) == 0){
    // echo "Nice";

    try {
        $query = "INSERT INTO atividades (rota_acessada, usuario_id) VALUES ('$rota_acessada', '$usuario_id')";
    
        $executa_insert = mysqli_query($conn, $query);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
} else {
    // echo "Droga!";
}

?>
