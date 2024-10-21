<?php
session_start();

include "../db/dbconnect.php";

$nome = $_POST['nome'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$genero = $_POST['genero'];
$nascimento = $_POST['nascimento'];
$etapa_escolar = empty($_POST['etapa_escolar']) ? 'null' : $_POST['etapa_escolar'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$municipio = $_POST['municipio'];
$escola = empty($_POST['escola']) ? 'null' : $_POST['escola'];
$uf = $_POST['uf'];

$query = "INSERT INTO usuarios (nome, senha, email, genero, nascimento, etapa_escolar, cep, bairro, municipio, escola, uf) 
VALUES ('$nome', '$senha', '$email', '$genero', '$nascimento', '$etapa_escolar', '$cep', '$bairro', '$municipio', '$escola', '$uf')";

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