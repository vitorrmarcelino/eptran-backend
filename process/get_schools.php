<?php

include "../db/dbconnect.php";

$school_name = $_POST["school_name"];

$regex = "/(escola)|(colegio)|(centro educacional)|(centro de educacao infantil)|(municipal)|([[:<:]]de[[:>:]])|([[:<:]]do[[:>:]])|([[:<:]]do[[:>:]])|(^\s)|(\s$)|(\b\w\b)/i";

$cleaned_name = str_replace("  ", " ", preg_replace($regex, "", $school_name));

$use_name;


if (strlen($cleaned_name) < 3) {
    $use_name = $school_name;
} else {
    $use_name = $cleaned_name;
}

$arr_name = explode(" ", $use_name);

$select = "SELECT name FROM schools WHERE name LIKE '%$arr_name[0]%' ";

for ($i = 1; $i < count($arr_name); $i++) {
    $select .= "AND name LIKE '%$arr_name[$i]%' ";
}

$select = str_replace("name LIKE '%%' OR", "", $select);

$select .= " Order By name ASC LIMIT 100";

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