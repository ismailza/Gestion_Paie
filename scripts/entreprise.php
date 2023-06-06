<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  require_once 'entreprise.inc.php';
  
  if (isset($_POST['submit']))
  {

  }
  elseif (isset($_POST['update']))
  {
    $values = [
      'nomEntreprise'=> $_POST['nomEntreprise'],
      'adresse'      => $_POST['adresse'],
      'ville'        => $_POST['ville'],
      'descriptif'   => $_POST['descriptif']
    ];
    $stm = updateEntreprise($values, $_SESSION['entreprise_id']);
    unset($_SESSION['entreprise_id']);
    if ($stm) $_SESSION['success'] = "L'entreprise a été modifier avec succès";  
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_entreprises.php");
  }
  elseif (isset($_POST['update_id']))
  {
    $_SESSION['entreprise_id'] = $_POST['id'];
    header("location: ../views/update_entreprise.php");
  }
  elseif (isset($_POST['delete']))
  {
    if (deleteEntreprise($_POST['id'])) $_SESSION['success'] = "L'entreprise est supprimé avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_entreprises.php");
  }
  else header("location: ../views/home.php");