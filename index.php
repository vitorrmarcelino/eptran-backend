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

</body>

</html>