<?php
include "dbconnect.php";

session_start();

$query = "INSERT INTO usuarios ();";

$executa_insert = mysqli_query($conn, $query);

if($executa_insert){
    session_unset();
    session_destroy();
    echo "<script>
    alert('Usuário cadastrado com sucesso');
    window.location.href = '../login.php';
    </script>";
}else{
    echo "<script>
    alert('Erro ao cadastrar usuário');
    window.location.href = '../cadastro1.php';
    </script>";
}

?>
