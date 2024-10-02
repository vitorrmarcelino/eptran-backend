<html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>

</head>
    
    <p>Olá, 
        <?php session_start(); echo $_SESSION['nome'];?> 
    </p>

    <form action="process_update.php" method="post">
    
    <?php 
        echo $_SESSION['nome'];

    
    
    
    ?>

    </form>




</html>