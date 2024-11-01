<?php session_start(); ?>
<?php include "./process/access_register.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPTRAN</title>
    <style>
        .post {
            border: 1px solid black;
            padding: .5rem;
            width: fit-content;
            height: fit-content;
        }
    </style>
</head>

<body>
    <?php 
        if (isset($_SESSION["userdata"])) {
            echo "<a href=\"./pages/perfil.php\">
                    <button>Perfil</button>
                </a>
                
                <a href=\"./pages/sair.php\">
                    <button>Sair</button>
                </a>";
            
            if ($_SESSION["userdata"]["adm"]) {
                echo "<a href=\"./pages/cadastro-adm.php\">
                    <button>Cadastrar Administrador</button>
                </a>
                
                <a href=\"./pages/relatorio.php\">
                    <button>Relatório</button>
                </a>
                
                <a href=\"./pages/postar.php\">
                    <button>Postar Algo</button>
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
    
    $query = "SELECT P.id, P.title, P.description, P.content, P.category, P.img_url, P.create_date, U.name 
            FROM posts as P
            inner join users as U
            on P.user_id = U.id
            ORDER BY create_date DESC 
            LIMIT 10";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<a href='./pages/postagem.php?id=" . $row['id'] . "'>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p>" . $row["name"] . " | " . date("d/m/Y", strtotime($row["create_date"])) . " | " . $row["category"] . "</p>";
            echo "<img src='" . $row["img_url"] . "' alt='Imagem da postagem' style='max-width: 100%; height: auto;'><br>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "Nenhuma postagem encontrada.";
    }
    
    $conn->close();
    ?>

</body>

</html>