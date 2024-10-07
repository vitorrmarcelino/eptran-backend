<?php
    include "../auth/login_required.php";
    include "../db/dbconnect.php";

    $id = $_SESSION['userdata']['id'];

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    $img_url = "";

    if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
        $nome = $_FILES['arquivo']['name'];
    
        $extensao = strtolower(string: pathinfo($nome, PATHINFO_EXTENSION));
        if(in_array($extensao, $valid_extensions)) {
            $novoNome = $id . '.' . $extensao;
            $img_url = "assets/imgs/$folder/$novoNome";
            $destino = "../" . $img_url;

            echo $destino;
            
            if (move_uploaded_file($arquivo_tmp, $destino)) {
                $_SESSION['userdata']['imagem_url'] = $img_url;

                $query = "UPDATE usuarios SET imagem_url = '$img_url' WHERE id = $id";

                $result = mysqli_query($conn, $query);
                if ($result) {
                        echo "<script>
                        alert('Usuário atualizado com sucesso');
                        window.location.href = \"../pages/profile.php\";
                        </script>";

                } else {
                        echo "<script>
                        alert('Erro ao atualizar imagem do usuário');
                        window.location.href = \"../pages/img_upload.php\";
                        </script>";
                }
            } 
        }
    }
?>