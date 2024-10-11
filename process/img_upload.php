<?php
include "../auth/login_required.php";
include "../db/dbconnect.php";

$id = $_SESSION["userdata"]["id"];

$data = [];

if (!isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] > 0) {
    $data["success"] = false;
    $data["message"] = "Erro ao carregar imagem.";
    echo json_encode($data);
    exit;
}

$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome = $_FILES['arquivo']['name'];

$extensao = strtolower(pathinfo($nome, PATHINFO_EXTENSION));

if(!strstr ('.jpg;.jpeg;.gif;.png', $extensao)) {
    $data["success"] = false;
    $data["message"] = "Arquivo inválido.";
    echo json_encode($data);
    exit;
}

try {
    $novoNome = $id . '.' . $extensao;
    $img_url = "assets/imgs/users/" . $novoNome;
    $destino = "../" . $img_url;

    $query = "UPDATE usuarios SET imagem_url = '$img_url' WHERE id = $id";
    
    $result = $conn->query($query);

    if (!move_uploaded_file($arquivo_tmp, $destino)) {
        throw new Exception("Erro ao salvar imagem.");
    }
    
    $_SESSION['userdata']['imagem_url'] = $img_url;

    $data["success"] = true;
    $data["message"] = "Imagem de perfil atualizada com sucesso.";
} catch (Exception $err) {
    $data["success"] = false;
    $data["message"] = "Erro ao atualizar imagem de perfil.";
}

echo json_encode($data);


?>