<?php
include "dbconnect.php";
// Inicia a sessao para acessar 
@session_start();

// Verifica usuario logado é administrador
// Se 'adm' não for verdadeiro 
if (!isset($_SESSION['userdata']['adm']) || $_SESSION['userdata']['adm'] !== true) {
    header('location:perfil.php');
    exit; // Encerra o script para garantir que o resto do codigo nao seja executado
}

// Captura os dados enviados via POST pelo formulário
$nome = $_POST['nome'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$municipio = $_POST['municipio'];
$uf = $_POST['uf'];

$query = "INSERT INTO usuarios (nome, senha, adm, email, genero, cpf, nascimento, escolaridade, cep, bairro, municipio, escola, uf) 
VALUES ('$nome', '$senha', true, '$email', '$genero', '$cpf', '$nascimento', null, '$cep', '$bairro', '$municipio', null, '$uf')";

if($executa_insert){
    session_unset();
    session_destroy();
    echo "<script>
    alert('Administrador cadastrado com sucesso');
    window.location.href = '../login.php';
    </script>";
}else{
    echo "<script>
    alert('Erro ao cadastrar administrador');
    window.location.href = '../cadastro1.php';
    </script>";
}
?>
