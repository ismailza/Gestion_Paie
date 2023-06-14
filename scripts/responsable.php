<?php
  require_once '../CONFIG.php';
  require_once '../scripts/inc_admin.php';

require "./employe.inc.php";

if (isset($_POST['submit'])) {
  $values = [
    'idEmploye'   => '',
    'nom'         => $_POST['nom'],
    'prenom'      => $_POST['prenom'],
    'cin'         => $_POST['cin'],
    'sexe'        => $_POST['sexe'],
    'dateNaiss'   => $_POST['dateNaiss'],
    'adresse'     => $_POST['adresse'],
    'ville'       => $_POST['ville'],
    'email'       => $_POST['email'],
    'phone'       => $_POST['phone'],
    'image'       => $_FILES['image']['name'],
    'situationF'  => $_POST['situationF'],
    'nbEnfants'   => $_POST['nbEnfants'],
    'diplome'     => $_POST['diplome'],
    'numCNSS'     => $_POST['numCNSS'],
    'numAMO'      => $_POST['numAMO'],
    'numCIMR'     => $_POST['numCIMR'],
    'numIGR'      => $_POST['numIGR'],
    'password'    => password_hash($_POST['nom'] . "_" . $_POST['cin'], PASSWORD_DEFAULT),
  ];
  $contrat = [
    'numContrat'  => '',
    'idEmploye'   => '',
    'idEntreprise' => "JI2A",
    'type'        => $_POST['contrat'],
    'poste'       => $_POST['poste'],
    'salaireBase' => $_POST['salaireB'],
    'dateFin'     => NULL,
    'motif'       => NULL
  ];

  if (!upload_image($_FILES['image'])) {
    $_SESSION['error'] = "Erreur lors de télechargement de l'image";
    header("location: ../views/home.php");
    exit();
  }


  $stm = saveEmploye($values, $contrat);

  if ($stm) {
    $_SESSION['success'] = "Employe ajouté avec succès";
    if (!sendInfoLogin($values['email'], $values['nom'], $values['prenom'], $values['nom'] . "_" . $values['cni'])) $_SESSION['error'] = "Les informations de connexion ne sont pas envoyé!";
    header("location: ../views/view_employes.php");
  } else {
    $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/add_employe.php");
  }
} elseif (isset($_POST['update'])) {
  $values = [
    'nom'         => $_POST['nom'],
    'prenom'      => $_POST['prenom'],
    'cin'         => $_POST['cin'],
    'sexe'        => $_POST['sexe'],
    'dateNaiss'   => $_POST['dateNaiss'],
    'adresse'     => $_POST['adresse'],
    'ville'       => $_POST['ville'],
    'email'       => $_POST['email'],
    'phone'       => $_POST['phone'],
    'image'       => $_FILES['image']['name'],
    'situationF'  => $_POST['situationF'],
    'nbEnfants'   => $_POST['nbEnfants'],
    'diplome'     => $_POST['diplome'],
    'numCNSS'     => $_POST['numCNSS'],
    'numAMO'      => $_POST['numAMO'],
    'numCIMR'     => $_POST['numCIMR'],
    'numIGR'      => $_POST['numIGR'],
  ];
  $stm = updateEmploye($values, $_SESSION['employe_id']);
  unset($_SESSION['employe_id']);
  if ($stm) $_SESSION['success'] = "L'employé a été modifier avec succès";
  else $_SESSION['error'] = "Something is wrong!";
  header("location: ../views/view_employes.php");
} elseif (isset($_POST['update_id'])) {
  $_SESSION['employe_id'] = $_POST['id'];
  header("location: ../views/update_employe.php");
} elseif (isset($_POST['delete'])) {
  if (deleteEmploye($_POST['id'])) $_SESSION['success'] = "L'employe est supprimé avec succès";
  else $_SESSION['error'] = "Something is wrong!";
  header("location: ../views/view_employes.php");
} elseif (isset($_POST['reset'])) {
  $current_password = $_POST['current_password'];
  $new_password     = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $emp              = $_SESSION['auth'];

  if (!$emp) $_SESSION['error'] = "Something is wrong!";
  elseif (!password_verify($current_password, $emp['password'])) $_SESSION['error'] = "Mot de passe actuel est incorrect!";
  elseif ($new_password != $confirm_password) $_SESSION['error'] = "Mot de passe de confirmation est incorrecct!";
  elseif (resetPassword($new_password, $emp['idEmploye'])) {
    $_SESSION['success'] = "Votre mot de passe est modifié avec succès";
    header("location: ../views/home.php");
    exit();
  }
  header("location: ../views/reset_password.php");
} else header("location: ../views/home.php");