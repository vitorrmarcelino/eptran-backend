<?php

include "../db/dbconnect.php";

$gender = $_POST['gender'];
$school_level = $_POST['school_level'];
$uf = $_POST['uf'];
$city = $_POST['city'];
$neighborhood = $_POST['neighborhood'];
$school = $_POST['school'];
$initial_date = $_POST['periodoInicial'];
$end_date = $_POST['periodoFinal'];
$content = $_POST['content'];

$filter_gender = !empty($gender) ? "and U.gender = '$gender'" : "";
$filter_school_level = !empty($school_level) ? "and U.school_level = '$school_level'" : "";
$filter_uf = !empty($uf) ? "and U.uf = '$uf'" : "";
$filter_city = !empty($city) ? "and U.city = '$city'" : "";
$filter_neighborhood = !empty($neighborhood) ? "and U.neighborhood = '$neighborhood'" : "";
$filter_school = !empty($school) ? "and U.school = '$school'" : "";
$initial_date = !empty($initial_date) ? "and A.acesso > '$initial_date'" : "";
$end_date = !empty($end_date) ? "and A.acesso < '$end_date'" : "";

$query = "select $content as label, count(U.id) as u_count 
            from activities as A 
            inner join users as U 
            on U.id = A.user_id 
            where U.active = true $filter_gender $filter_school_level $filter_uf $filter_city $filter_neighborhood $filter_school $initial_date $end_date
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
        $data["message"] = "Erro ao carregar usuários.";
        $data["accesses"] = null;
}

echo json_encode($data);

?>