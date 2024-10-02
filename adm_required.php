<?php
@session_start();
if(!$_SESSION['userdata']['adm'])
{
  header('location:perfil.php');
}
?>