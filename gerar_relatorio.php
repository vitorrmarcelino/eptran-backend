<?php

include "dbconnect.php";

$genero = $_POST['genero'];
$escolaridade = $_POST['escolaridade'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$escola = $_POST['escola'];
$acessos = $_POST['acessos'];
$periodoInicial = $_POST['periodoInicial'];
$periodoFinal = $_POST['periodoFinal'];

$select = "select A.rota_acessada, count(U.id)
            from atividades as A
            inner join usuarios as U
            on U.id = A.usuario_id
            where U.genero = 'M'
            group by A.rota_acessada";

?>