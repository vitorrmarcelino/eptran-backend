<?php 

include "../auth/login_required.php";
include "../db/dbconnect.php";

// //variáveis
$id = $_SESSION['userdata']['id'];
$full_name = $_POST['full_name'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$school_level = $_POST['school_level'];
$cep = $_POST['cep'];
$neighborhood = $_POST['neighborhood'];
$city = $_POST['city'];
$school = $_POST['school'];
$uf = $_POST['uf'];

$update_full_name = !empty($full_name) ? "full_name = '$full_name', " : "";
$update_password = !empty($password) ? "password = '" . 
    password_hash($password, PASSWORD_DEFAULT) . "' , " : "";
$update_email = !empty($email) ? "email = '$email', " : "";
$update_gender = !empty($gender) ? "gender = '$gender', " : "";
$update_birthdate = !empty($birthdate) ? "birthdate = '$birthdate', " : "";
$update_school_level = !empty($school_level) ? "school_level = '$school_level', " : "";
$update_cep = !empty($cep) ? "cep = '$cep', " : "";
$update_neighborhood = !empty($neighborhood) ? "neighborhood = '$neighborhood', " : "";
$update_city = !empty($city) ? "city = '$city', " : "";
$update_school = !empty($school) ? "school = '$school', " : "";
$update_uf = !empty($uf) ? "uf = '$uf', " : "";

$query = "UPDATE usuarios SET " . "$update_full_name" . "$update_password" . "$update_email" . 
    "$update_gender" . "$update_birthdate" . "$update_school_level" . 
    "$update_cep" . "$update_neighborhood" . "$update_city" . "$update_school" . "$update_uf" . 
    "WHERE id = $id";

$query = str_replace(", WHERE", " WHERE", $query);

$executa_update = mysqli_query($conn, $query);

$data = [];

if($executa_update){
    // Busca os dados atualizados
    $query_select = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query_select);

    $data["success"] = true;
    
    if($result && mysqli_num_rows($result) > 0){
        $userdata = mysqli_fetch_assoc($result);
        $_SESSION["userdata"] = $userdata; // Atualiza a sessão com todos os dados

        $data["message"] = "Usuário atualizado com sucesso.";
    } else {
        $data["message"] = "Usuário atualizado porém erro ao recuperar as informações, tente logar novamente.";
    }
} else {
    $data["success"] = false;
    $data["message"] = "Erro ao atualizar o usuário.";
}

echo json_encode($data);

?>