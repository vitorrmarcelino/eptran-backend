<?php
session_start();
if((!isset ($_SESSION['userdata']) == true))
{
  header('location:login.php');
}
?>