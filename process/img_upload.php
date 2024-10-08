<?php
    include "../auth/login_required.php";
    include "../db/dbconnect.php";

    $id = $_SESSION['userdata']['id'];

    $img_url = "";
    $data = [];

    if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
        $nome = $_FILES['arquivo']['name'];
    
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        $extensao = strtolower($extensao);
        if(strstr ('.jpg;.jpeg;.gif;.png', $extensao)) {
            $novoNome = $id . '.' . $extensao;
            $img_url = "assets/imgs/users/" . $novoNome;
            $destino = "../" . $img_url;

            move_uploaded_file($arquivo_tmp, $destino);
        }
    }

    $_SESSION['userdata']['imagem_url'] = $img_url;

    $query = "UPDATE usuarios SET imagem_url = '$img_url' WHERE id = $id";

    $result = mysqli_query($conn, $query);

    
    if ($result) {
        $data["success"] = true;
        $data["message"] = "Imagem de perfil atualizada com sucesso.";
    } else {
        $data["success"] = false;
        $data["message"] = "Erro ao atualizar imagem de perfil.";
    }

    echo json_encode($data);
?>