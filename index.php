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
$noticia = "Título da notícia";
$descricao = "Descrição da notícia";
$imagem_url = "caminho/para/imagem.jpg";
$id = indefinido;
?>

<a href="./pages/news.php?id=<?= $id ?>">
  <?= $noticia ?>
</a>
<p><?= $descricao ?></p>
<img src="<?= $imagem_url ?>" alt="Imagem da notícia">

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

</body>

</html>