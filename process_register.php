<?php
include "dbconnect.php";

session_start();

$nome = $_POST['nome'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$genero = $_POST['genero'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$escolaridade = $_POST['escolaridade'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$municipio = $_POST['municipio'];
$escola = $_POST['escola'];
$uf = $_POST['uf'];

$query = "INSERT INTO usuarios (nome, senha, adm, email, genero, cpf, nascimento, escolaridade, cep, bairro, municipio, escola, uf) 
VALUES ('$nome', '$senha', false, '$email', '$genero', '$cpf', '$nascimento', '$escolaridade', '$cep', '$bairro', '$municipio', '$escola', '$uf')";

$executa_insert = mysqli_query($conn, $query);

if($executa_insert){
    session_unset();
    session_destroy();
    echo "<script>
    alert('Usuário cadastrado com sucesso');
    window.location.href = 'login_teste.php';
    </script>";
}else{
    echo "<script>
    alert('Erro ao cadastrar usuário');
    window.location.href = 'cadastro_teste.php';
    </script>";
}
?>
