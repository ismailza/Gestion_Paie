<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  include ('entreprise.inc.php');
  
  if (isset($_POST['submit']))
  {

  }
  else if (isset($_POST['update']))
  {
    
    header("location: ../views/view_entreprises.php");
  }
  else if (isset($_POST['delete']))
  {
    if (delete($_POST['id'])) $_SESSION['success'] = "L'entreprise est supprimé avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_entreprises.php");
  }
  else header("location: ../views/home.php");