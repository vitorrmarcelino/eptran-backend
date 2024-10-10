<?php

$conn = mysqli_connect("localhost", "root", "root", "eptran");

if(!$conn){
    die("Connection failed." . mysqli_connect_error());
}

?>