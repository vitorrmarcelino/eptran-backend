<?php
include "../auth/login_required.php";
include "../db/dbconnect.php";

$id = $_SESSION["userdata"]["id"];

$data = [];

if (!isset($_FILES['image']['name']) && $_FILES['image']['error'] > 0) {
    $data["success"] = false;
    $data["message"] = "Erro ao carregar imagem.";
    echo json_encode($data);
    exit;
}

$file_tmp = $_FILES['image']['tmp_name'];
$name = $_FILES['image']['name'];

$extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

if(!strstr ('.jpg;.jpeg;.gif;.png', $extension)) {
    $data["success"] = false;
    $data["message"] = "Arquivo inválido.";
    echo json_encode($data);
    exit;
}

try {
    $new_date = $id . '.' . $extension;
    $img_url = "assets/imgs/users/" . $new_date;
    $destine = "../" . $img_url;

    $query = "UPDATE users SET img_url = '$img_url' WHERE id = $id";
    
    $result = $conn->query($query);

    if (!move_uploaded_file($file_tmp, $destine)) {
        throw new Exception("Erro ao salvar imagem.");
    }
    
    $_SESSION['userdata']['img_url'] = $img_url;

    $data["success"] = true;
    $data["message"] = "Imagem de perfil atualizada com sucesso.";
} catch (Exception $err) {
    $data["success"] = false;
    $data["message"] = "Erro ao atualizar imagem de perfil.";
}

echo json_encode($data);


?>