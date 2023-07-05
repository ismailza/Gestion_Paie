<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  require_once 'employe.inc.php';
  require_once 'sendMail.php';
  // ** Demande de conge
  if (isset($_POST['conge']))
  {
    $values = [
      'typeConge'   => $_POST['typeConge'],
      'dateDebut'   => $_POST['dateDebut'],
      'dateFin'     => $_POST['dateFin'],
      'status'      => 'En cours',
      'idEmploye'   => $_SESSION['auth']['idEmploye']
    ];
    if (saveConge($values))
    {
      $_SESSION['success'] = "Votre demande de congé est effectuée avec succès";  
      header("location: ../views/home");
    }
    else 
    {
      $_SESSION['error'] = "Something is wrong!";
      header("location: ../views/home");
    }
  }
  // ** Déclaration des heures supp
  elseif (isset($_POST['heuressupp']))
  {
    $values = [
      'status'      => 'En cours',
      'dateTravail' => $_POST['dateTravail'],
      'nbHs'        => $_POST['nbHs'],
      'idEmploye'   => $_SESSION['auth']['idEmploye']
    ];
    if (saveHeuresSupp($values))
    {
      $_SESSION['success'] = "La déclaration des heures supplémentaire est effectuée avec succès";  
      header("location: ../views/home");
    }
    else 
    {
      $_SESSION['error'] = "Something is wrong!";
      header("location: ../views/home");
    }
  }
  // ** Déclaration d'une réclamation
  elseif (isset($_POST['reclamation']))
  {
    $values = [
      'sujet'       => $_POST['sujet'],
      'contenu'     => $_POST['contenu'],
      'status'      => 'En cours',
      'idEmploye'   => $_SESSION['auth']['idEmploye'],
      'responsable' => $_POST['responsable'],
      'pieceJoint'  => $_FILES['pieceJoint']['name']
    ];
    if (!empty($_FILES['pieceJoint']['name']))
    {
      if (!upload_file($_FILES['pieceJoint'], 'reclamations'))
      {
        $_SESSION['error'] = "Erreur lors de télechargement du fichier";
        header("location: ../views/home");
        exit();
      }
    }
    if (saveReclamation($values))
    {
      $_SESSION['success'] = "Reclamation est effectuée avec succès";  
      header("location: ../views/home");
    }
    else 
    {
      $_SESSION['error'] = "Something is wrong!";
      header("location: ../views/home");
    }
  }
  // ** Demande d'avance
  elseif (isset($_POST['avance']))
  {
    $values = [
      'status'      => 'En cours',
      'avance'      => $_POST['montant'],
      'idEmploye'   => $_SESSION['auth']['idEmploye']
    ];
    if (saveAvance($values))
    {
      $_SESSION['success'] = "Votre demande d'avance est effectuée avec succès";  
      header("location: ../views/home");
    }
    else 
    {
      $_SESSION['error'] = "Something is wrong!";
      header("location: ../views/home");
    }
  }
  elseif (isset($_POST['addJustification']))
  {
    $values = [
      'justification'   => $_POST['justification'],
      'pieceJoint'      => $_FILES['pieceJoint']['name']
    ];
    upload_file($_FILES['pieceJoint'],'absences');
    if (addJustification($values, $_POST['id'])) $_SESSION['success'] = 'Justification bien enregistrer';
    else $_SESSION['error'] = 'Something is wrong!!';
    header("location: ../views/visualiserabscence");
  }
  elseif (isset($_POST['view_id']))
  {
    header("location: ../views/view_employe?id=".$_POST['id']);
  }
  elseif (isset($_POST['declarer_absence']))
  {
    $values = [
      'dateAbsence' => $_POST['dateAbsence'],
      'nbJours'     => $_POST['nbJours'],
      'idEmploye'   => $_POST['id']
    ];
    if (saveAbsence($values)) $_SESSION['success'] = "La déclaration d'absence est bien effectuée";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_employes");
  }
  elseif (isset($_POST['view_bulletin']))
  {
    header("location: ../views/calculer_salaire?id=".$_POST['id']);
  }
  // ** Ajouter un employe
  elseif (isset($_POST['submit']))
  { 
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
      'password'    => password_hash($_POST['nom']."_".$_POST['cin'], PASSWORD_DEFAULT),
      'createdBy'   => $_SESSION['auth']['idEmploye']
    ];
    $contrat = [
      'numContrat'  => '',
      'idEmploye'   => '',
      'idEntreprise'=> $_POST['entreprise'],
      'type'        => $_POST['contrat'],
      'poste'       => $_POST['poste'],
      'salaireBase' => $_POST['salaireB'],
      'dateFin'     => NULL,
      'motif'       => NULL
    ];

    if (!upload_image($_FILES['image']))
    {
      $_SESSION['error'] = "Erreur lors de télechargement de l'image";
      header("location: ../views/home");
      exit();
    }
    
    if (!empty(checkLogin($values['email'])))
    {
      $_SESSION['error'] = "Email déja existe!";
      header("location: ../views/add_employe");
      exit();
    }
    if (!empty(checkCIN($values['cin'])))
    {
      $_SESSION['error'] = "CIN déja existe!";
      header("location: ../views/add_employe");
      exit();
    }

    if (saveEmploye ($values, $contrat)) 
    {
      $_SESSION['success'] = "Employe ajouté avec succès";  
      if (!sendInfoLogin($values['email'],$values['nom'], $values['prenom'], $values['nom']."_".$values['cin'])) $_SESSION['error'] = "Les informations de connexion ne sont pas envoyé!";  
      header("location: ../views/view_employes");
    }
    else 
    {
      $_SESSION['error'] = "Something is wrong!";
      header("location: ../views/add_employe");
    }
  }

  elseif (isset($_POST['update']))
  {
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
    header("location: ../views/view_employes");
  }

  elseif (isset($_POST['update_id']))
  {
    $_SESSION['employe_id'] = $_POST['id'];
    header("location: ../views/update_employe");
  }

  elseif (isset($_POST['delete']))
  {
    if (deleteEmploye($_POST['id'])) $_SESSION['success'] = "L'employe est supprimé avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_employes");
  }

  elseif (isset($_POST['reset']))
  {
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $emp              = $_SESSION['auth'];

    if (!$emp) $_SESSION['error'] = "Something is wrong!";
    elseif (!password_verify($current_password, $emp['password'])) $_SESSION['error'] = "Mot de passe actuel est incorrect!";
    elseif ($new_password != $confirm_password) $_SESSION['error'] = "Mot de passe de confirmation est incorrecct!";
    elseif (resetPassword($new_password, $emp['idEmploye'])) 
    {
      $_SESSION['success'] = "Votre mot de passe est modifié avec succès";
      header("location: ../views/home");
      exit();
    }
    header("location: ../views/reset_password");
  }
  elseif (isset($_POST['validate']))
  {
    require 'bulletin.inc.php';
    $month = date('m');
    $employes = getAllEmployes();
    foreach ($employes as $employe) 
    {
      $file_name = generate_bulletin_paie ($employe['idEmploye'], $month);
      $values = [
        'mois'      => $month,
        'bulletin'  => $file_name,
        'idEmploye' => $employe['idEmploye']
      ];
      saveBulletin($values);
    }
    $_SESSION['success'] = "La paie est validée avec succès";
    header("location: ../views/home");
  }
  else header("location: ../views/home");