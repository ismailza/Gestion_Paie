<?php

  if (isset($_POST['submit']))
  {
    // informations personnelle
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $sexe = $_POST['sexe'];
    $dateNais = $_POST['dateNais'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $image = $_POST['image'];

    // situation familiale
    $situation = $_POST['situation'];
    $nbEnfants = $_POST['nbEnfants'];

    // informations salariale
    $diplome = $_POST['diplome'];
    $post = $_POST['post'];
    $salaire = $_POST['salaire'];
    $cnss = $_POST['cnss'];
    $amo = $_POST['amo'];
    $cimr = $_POST['cimr'];
    $igr = $_POST['igr'];
  
  }
  else header("location: ../views/addEmploye.php");

?>