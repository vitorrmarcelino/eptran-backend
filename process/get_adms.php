<?php

include "../db/dbconnect.php";

$select = "select id, email from usuarios where adm = true;"; 
$executar_select = $conn -> query($select);
$data =[];

$data["success"] = true;
$data["message"] = "Deu";
$data["users"] = [];

if ($executar_select -> num_rows > 0) {
    while($row = $executar_select -> fetch_assoc()) {
        $user = [];
        $user["id"] = $row ['id'];
        $user["email"] = $row ['email'];
        $data["users"][] = $user;
    }
}

echo json_encode($data)

?>