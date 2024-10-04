<?php 
include("login_required.php");
include "dbconnect.php";

$rota_acessada = $_SERVER['REQUEST_URI'];
$usuario_id = $_SESSION['userdata']['id'];

try {
    $query = "INSERT INTO atividades (rota_acessada, usuario_id) VALUES ('$rota_acessada', '$usuario_id')";

    $executa_insert = mysqli_query($conn, $query);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>

<!DOCTYPE html>  
<html lang="pt-BR">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Tela Inicial</title>  
</head>  
<body>  

<a href="teste_tela_de_edicao.php">
    <button>Perfil</button>
</a>   



</body>  
</html>