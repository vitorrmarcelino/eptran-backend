<?php

include "../db/dbconnect.php";

$school_name = "SESI";

$query = $conn->prepare("SELECT id FROM schools WHERE name = ?");
$query->bind_param("s", $school_name);

$query->execute();

$result = $query->get_result();

$school_id;

if ($school = $result->fetch_assoc()) {
    $school_id =  $school["id"];
} else {
    $query = $conn->prepare("INSERT INTO schools (name) VALUES (?)");
    $query->bind_param("s", $school_name);

    $query->execute();

    $school_id = $conn->insert_id;
}

?>