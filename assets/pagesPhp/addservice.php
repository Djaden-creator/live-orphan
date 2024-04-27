<?php 
if (!isset($_SESSION['idUser'])) {
    header('location:login.php');
  }else{
    require_once '../functions/userClass.php';
    require_once '../phpbaseTemplate/headerlistofbabies.php';
    require_once '../phpbaseTemplate/addservicebase.php';
    require_once '../phpbaseTemplate/footerteam.php';
  }