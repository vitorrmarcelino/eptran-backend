<?php
    include "../auth/login_required.php";
    include "../db/dbconnect.php";

    $id = $_SESSION['userdata']['id'];

    $img_url = "";

    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];

        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        $extensao = strtolower ( $extensao );
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;
            $destino = '../uploads/imgs/' . $novoNome;
     
            move_uploaded_file( $arquivo_tmp, $destino);
        }
    }
    
    $img_url = $destino;    

    $_SESSION['userdata']['imagem_url'] = $img_url;


    $query = "UPDATE usuarios SET imagem_url = '$img_url' WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if ($result) {
            echo "<script>
            alert('Usuário atualizado com sucesso');
            </script>";

    } else {
            echo "<script>
            alert('Erro ao atualizar imagem do usuário');
            </script>";
    }
?>