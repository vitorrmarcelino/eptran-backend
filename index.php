<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPTRAN</title>
</head>

<body>
    <?php 
        if (isset($_SESSION["userdata"])) {
            echo "<a href=\"./pages/perfil.php\">
                    <button>Perfil</button>
                </a>
                
                <a href=\"./pages/sair.php\">
                    <button>Sair</button>
                </a>
                
                <a href=\"./pages/postar.php\">
                    <button>Postar Algo</button>
                </a>";
            
            if ($_SESSION["userdata"]["adm"]) {
                echo "<a href=\"./pages/cadastro-adm.php\">
                    <button>Cadastrar Administrador</button>
                </a>
                
                <a href=\"./pages/relatorio.php\">
                    <button>Relatório</button>
                </a>";
            }
        } else {
            echo "<a href=\"./pages/cadastro.php\">
                <button>Registrar</button>
            </a>

            <a href=\"./pages/entrar.php\">
                <button>Entrar</button>
            </a>";
        }
    ?>
    <?php
    include "./db/dbconnect.php";
    
    $query = "SELECT title, description, content, user_id, category, img_url, create_date 
            FROM posts 
            ORDER BY create_date DESC 
            LIMIT 10";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p><strong>Descrição:</strong> " . $row["description"] . "</p>";
            echo "<p><strong>Texto:</strong> " . $row["content"] . "</p>";
            echo "<p><strong>Usuário ID:</strong> " . $row["user_id"] . " | <strong>Categoria:</strong> " . $row["category"] . "</p>";
            echo "<img src='" . $row["img_url"] . "' alt='Imagem da postagem' style='max-width: 100%; height: auto;'><br>";
            echo "<small>Publicado em: " . $row["create_date"] . "</small><br><br>";
        }
    } else {
        echo "Nenhuma postagem encontrada.";
    }
    
    $conn->close();
    ?>

</body>

</html>