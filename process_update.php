<?php 

include("login_required.php");
include("dbconnect.php");

//variáveis
$id = $_SESSION['userdata']['id'];
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

//Confirmando Update
$query = "UPDATE usuarios SET";

     if($nome){
          $query = $query . " nome = '$nome',";
     }
     if($usuario){
          $query = $query . " usuario = '$usuario',";
     }
     if($email){
          $query = $query . " email = '$email',";
     }
     if($senha){
          $query = $query . " senha = '$senha',";
     }
     if($genero){
        $query = $query . " genero = '$genero',";
    }
    if($cpf){
        $query = $query . " cpf = '$cpf',";
    }
    if($nascimento){
        $query = $query . " nascimento = '$nascimento',";
    }
    if($escolaridade){
        $query = $query . " escolaridade = '$escolaridade',";
    }
    if($cep){
        $query = $query . " cep = '$cep',";
    }
    if($bairro){
        $query = $query . " bairro = '$bairro',";
    }
    if($municipio){
     $query = $query . " municipio = '$municipio',";
     }
     if($escola){
          $query = $query . " escola = '$escola',";
     }
     if($uf){
          $query = $query . " escola = '$uf',";
     }

     //Tira a vírgula do último texto de update
     $query = substr($query,0,-1);
     
     $query = $query . " WHERE id = $id";

     //Executa update
     $executa_update = mysqli_query($conn, $query);
     if($executa_update){
          echo "<script>
          alert('Usuário atualizado com sucesso');
          window.location.href = 'teste_tela_de_edicao.php';
          </script>";

     }else{
          echo "<script>
          alert('Erro ao atualizar usuário');
          window.location.href = 'teste_tela_de_edicao.php';
          </script>";
     }

?>