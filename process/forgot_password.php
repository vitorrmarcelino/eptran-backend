<?php

if(!empty($_POST)){
    $email = $_POST["email"];
  
    $success = mail($email,
        "Recuperação de senha",
        "Para recuperar a senha acesse o seguinte link: linkrecuperação.com");
    
        if($success){
            echo "<script>
                alert('Email enviado com sucesso!.');
                window.location.href = '/';
            </script>";
        }else{
            echo "<script>
                alert('Erro ao enviar email.');
                window.location.href = '/';
            </script>";
        }
}else{
    echo "<script>
            alert('Erro ao recuperar senha!');
            window.location.href = '/';
        </script>";
}

?>