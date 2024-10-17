<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>

<body>
    <?php 
        if (isset($_SESSION["userdata"])) {
            echo "<a href=\"./pages/profile.php\">
                    <button>Perfil</button>
                </a>
                
                <a href=\"./pages/logout.php\">
                    <button>Logout</button>
                </a>
                
                <a href=\"./pages/post_news.php\">
                    <button>Criar notícia</button>
                </a>
                
                <a href=\"./pages/news.php\">
                <button>Notícias</button>
                </a>";
            
            if ($_SESSION["userdata"]["adm"]) {
                echo "<a href=\"./pages/adm_register.php\">
                    <button>Registrar Administrador</button>
                </a>
                
                <a href=\"./pages/reports.php\">
                    <button>Relatórios</button>
                </a>";
            }
        } else {
            echo "<a href=\"./pages/register.php\">
                <button>Registrar</button>
            </a>

            <a href=\"./pages/login.php\">
                <button>Entrar</button>
            </a>";
        }
    ?>

    <?php
    include "./db/dbconnect.php";

    
    
    $query = "SELECT titulo, descricao, texto, usuario_id, categoria, img_url, id 
            FROM postagens 
            ORDER BY id DESC 
            LIMIT 10";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p><strong>Descrição:</strong> " . $row["descricao"] . "</p>";
            echo "<p><strong>Texto:</strong> " . $row["texto"] . "</p>";
            echo "<p><strong>Usuário ID:</strong> " . $row["usuario_id"] . " | <strong>Categoria:</strong> " . $row["categoria"] . "</p>";
            echo "<img src='" . $row["img_url"] . "' alt='Imagem da postagem' style='max-width: 100%; height: auto;'><br>";
            echo "<small>Publicado em: " . $row["id"] . "</small><br><br>";
        }
    } else {
        echo "Nenhuma postagem encontrada.";
    }
    
    $conn->close();
    ?>

</body>
</html>

