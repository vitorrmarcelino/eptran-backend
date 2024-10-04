<?php

include "dbconnect.php";

$genero = $_POST['genero'];
$escolaridade = $_POST['escolaridade'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$escola = $_POST['escola'];
$periodoInicial = $_POST['periodoInicial'];
$periodoFinal = $_POST['periodoFinal'];
$content = $_POST['content'];

$filter_genero = !empty($genero) ? "and U.genero = '$genero'" : "";
$filter_escolaridade = !empty($escolaridade) ? "and U.escolaridade = '$escolaridade'" : "";
$filter_uf = !empty($uf) ? "and U.uf = '$uf'" : "";
$filter_cidade = !empty($cidade) ? "and U.cidade = '$cidade'" : "";
$filter_bairro = !empty($bairro) ? "and U.bairro = '$bairro'" : "";
$filter_escola = !empty($escola) ? "and U.escola = '$escola'" : "";

$query = "select $content as label, count(U.id) as u_count 
            from atividades as A 
            inner join usuarios as U 
            on U.id = A.usuario_id 
            where true $filter_genero $filter_escolaridade $filter_uf $filter_cidade $filter_bairro $filter_escola 
            group by $content";

$executa_select = mysqli_query($conn, $query);

if ($executa_select->num_rows > 0) {
    $data = [];
    while($row = $executa_select->fetch_assoc()) {
        $row_data = [];
        $row_data['label'] = $row['label'];
        $row_data['count'] = $row['u_count'];
        $data[] = $row_data;
    }
    echo json_encode($data);
} else {
    echo "No user found";
}

?>