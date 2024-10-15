<?php

include "../db/dbconnect.php";

$genero = $_POST['genero'];
$etapa_escolar = $_POST['etapa_escolar'];
$uf = $_POST['uf'];
$municipio = $_POST['municipio'];
$bairro = $_POST['bairro'];
$escola = $_POST['escola'];
$periodo_inicial = $_POST['periodoInicial'];
$periodo_final = $_POST['periodoFinal'];
$content = $_POST['content'];

$filter_genero = !empty($genero) ? "and U.genero = '$genero'" : "";
$filter_etapa_escolar = !empty($etapa_escolar) ? "and U.etapa_escolar = '$etapa_escolar'" : "";
$filter_uf = !empty($uf) ? "and U.uf = '$uf'" : "";
$filter_municipio = !empty($municipio) ? "and U.municipio = '$municipio'" : "";
$filter_bairro = !empty($bairro) ? "and U.bairro = '$bairro'" : "";
$filter_bairro = !empty($bairro) ? "and U.bairro = '$bairro'" : "";
$filter_escola = !empty($escola) ? "and U.escola = '$escola'" : "";
$filter_periodo_inicial = !empty($periodo_inicial) ? "and A.acesso > '$periodo_inicial'" : "";
$filter_periodo_final = !empty($periodo_final) ? "and A.acesso < '$periodo_final'" : "";

$query = "select $content as label, count(U.id) as u_count 
            from atividades as A 
            inner join usuarios as U 
            on U.id = A.usuario_id 
            where U.ativo = true $filter_genero $filter_etapa_escolar $filter_uf $filter_municipio $filter_bairro $filter_escola $filter_periodo_inicial $filter_periodo_final
            group by $content";

$data = [];

try {
    $result = mysqli_query($conn, $query);

    $data["success"] = true;
    $data["message"] = $query;
    // $data["message"] = mysqli_num_rows($result) . " usuários encontrados.";
    $data["accesses"] = [];
    
    while($row = $result->fetch_assoc()) {
        $row_data = [];
        $row_data['label'] = $row['label'];
        $row_data['count'] = $row['u_count'];
        $data["accesses"][] = $row_data;
    }
} catch (Exception $err) {
        $data["sucess"] = false;
        $data["message"] = $err->getMessage();
        $data["accesses"] = null;
}

echo json_encode($data);

?>