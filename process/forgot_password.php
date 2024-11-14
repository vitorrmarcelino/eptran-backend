<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    $query = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $query->execute([':email' => $email]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($usuario) {
        $token = bin2hex(random_bytes(50));

        $expira = date("Y-m-d H:i:s", strtotime('+1 hour'));
        $query = $pdo->prepare("INSERT INTO redefinir_senha (email, token, expira_em) VALUES (:email, :token, :expira_em)");
        $query->execute([':email' => $email, ':token' => $token, ':expira_em' => $expira]);
        
   
        $resetLink = "https://eptran.com/redefinir_senha.php?token=$token";
  
        $assunto = "Redefinição de senha";
        $mensagem = "Olá, clique no link a seguir para redefinir sua senha: $resetLink";
        $headers = "From: no-reply@eptran.com\r\n" .
                   "Content-Type: text/html; charset=UTF-8\r\n";
        
        if (mail($email, $assunto, $mensagem, $headers)) {
            echo "E-mail de redefinição enviado.";
        } else {
            echo "Falha ao enviar o e-mail.";
        }
    } else {
        echo "E-mail não encontrado.";
    }
}

?>