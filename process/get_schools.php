<?php

include "../db/dbconnect.php";

$school_name = $_POST["school_name"];

$regex = "/(escola)|(colégio)|(centro educacional)|(centro de educação infantil)|(municipal)|([[:<:]]de[[:>:]])|([[:<:]]do[[:>:]])|([[:<:]]do[[:>:]])|(^\s)|(\s$)/i";

$cleaned_name = str_replace("  ", " ", preg_replace($regex, "", $school_name));

$arr_name = explode(" ", $cleaned_name);

$select = "SELECT name FROM schools WHERE name LIKE '%$arr_name[0]%' ";


for ($i = 1; $i < count($arr_name); $i++) {
    $select .= "OR name LIKE '%$arr_name[$i]%' ";
}

$select = str_replace("name LIKE '%%' OR", "", $select);

$query = $conn->prepare($select);

$query->execute();

$result = $query->get_result();

$data = [];

while ($school = $result->fetch_assoc()) {
    $data["schools"][] = $school["name"];
}

$data["success"] = true;
$data["message"] = null;

echo json_encode($data);

?>