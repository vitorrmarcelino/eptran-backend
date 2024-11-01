<?php
session_start();

include "../db/dbconnect.php";

$school_name = empty($_POST['school']) ? 'null' : $_POST['school'];

$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$school_level = empty($_POST['school_level']) ? 'null' : $_POST['school_level'];
$cep = $_POST['cep'];
$neighborhood = $_POST['neighborhood'];
$city = $_POST['city'];
$uf = $_POST['uf'];

include "../process/get_school_id.php";

$query = "INSERT INTO users (name, password, email, gender, birthdate, school_level, cep, neighborhood, city, school_id, uf) " . 
    "VALUES ('$name', '$password', '$email', '$gender', '$birthdate', '$school_level', '$cep', '$neighborhood', '$city', '$school_id', '$uf')";

$data = [];

try {
    $result = $conn->query($query);

    session_unset();
    session_destroy();
    
    $data["success"] = true;
    $data["message"] = "Usuário cadastrado com sucesso.";
} catch (Exception $err) {
    $data["success"] = false;
    if ($err->getCode() == 1062) {
        if (str_contains($err->getMessage(), 'email')) {
            $data["message"] = "Este email já está sendo usado por outra pessoa.";
        }
    } else {
        throw new Exception("Erro: " . $err->getMessage());
    }
}

echo json_encode($data);

?>

