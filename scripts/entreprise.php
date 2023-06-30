<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  require_once 'entreprise.inc.php';
  
  if (isset($_POST['submit']))
  {
    $values = [
      'nomEntreprise' => $_POST['nomEntreprise'],
      'adresse'       => $_POST['adresse'],
      'ville'         => $_POST['ville'],
      'descriptif'    => $_POST['descriptif'],
      'createdBy'     => $_SESSION['auth']['idEmploye']
    ];
    $stm = saveEntreprise($values);
    if (!$stm)
    {
      $_SESSION['error'] = "Somthing is wrong!";
      header("location: ../views/add_entreprise");
    }
    else 
    {
      $_SESSION['success'] = "Entreprise est ajoutée avec succès";
      header("location: ../views/view_entreprises");
    }
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
    header("location: ../views/view_entreprises");
  }
  elseif (isset($_POST['update_id']))
  {
    $_SESSION['entreprise_id'] = $_POST['id'];
    header("location: ../views/update_entreprise");
  }
  elseif (isset($_POST['delete']))
  {
    if (deleteEntreprise($_POST['id'])) $_SESSION['success'] = "L'entreprise est supprimé avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_entreprises");
  }
  elseif (isset($_POST['add_regle']))
  {
    $values = [
      'idEntreprise'  => $_POST['entreprise'],
      'idRubrique'    => $_POST['rubrique'],
      'formule'       => $_POST['formule']
    ];
    if (saveRegle($values)) $_SESSION['success'] = "La règle de paie est ajoutée avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_regle");
  }
  elseif (isset($_POST['rubrique']))
  {
    $values = [
      'nomRubrique'   => $_POST['nomRubrique'],
      'shortName'     => $_POST['shortName']
    ];
    if (saveRubrique($values)) $_SESSION['success'] = "La rubrique est ajoutée avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    if (isset($_SESSION['url'])) header("location: ".$_SESSION['url']);
    else header("location: ../views/view_rubriques");
  }
  elseif (isset($_POST['view_bulletin']))
  {
    view_bulletin($_POST['file'].'.pdf');
  }
  else header("location: ../views/home");