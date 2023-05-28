<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  $_SESSION['id'] = 1;

  include ('employe.inc.php');

  if (isset($_POST['submit']))
  {
    // informations personnelle
    $nom          = $_POST['nom'];
    $prenom       = $_POST['prenom'];
    $cin          = $_POST['cin'];
    $sexe         = $_POST['sexe'];
    $dateNais     = $_POST['dateNais'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $adresse      = $_POST['adresse'];
    $ville        = $_POST['ville'];
    $image        = $_FILES['image'];

    // situation familiale
    $situation    = $_POST['situation'];
    $nbEnfants    = $_POST['nbEnfants'];

    // informations salariale
    $diplome      = $_POST['diplome'];
    $post         = $_POST['post'];
    $salaire      = $_POST['salaire'];
    $cnss         = $_POST['cnss'];
    $amo          = $_POST['amo'];
    $cimr         = $_POST['cimr'];
    $igr          = $_POST['igr'];
    
    $password     = $nom."_".$cin;
    $h_pswd       = password_hash($password, PASSWORD_DEFAULT);
    $dateEmbauche = "04-17-2001";
    $role         = "Employe";
    $createdBy    = "Ismail ZAHIR";

    if (!upload_image($image))
    {
      $_SESSION['error'] = "Erreur lors de télechargement de l'image";
      header("location: ../views/home.php");
      exit();
    } 

    $stm = $pdo->prepare("INSERT INTO employe VALUES 
        ('',;ln, :fn, :cin, :s, :bd, :em, :ph, :ad, :vl, :img, :stf, :nbf, :dpl, :pst, :slr, 
        :dem, :cnss, ;amo, :igr, :cimr, :role, :pswd, CURRENT_TIMESTAMP, :crby)");

    $stm->bindValue("ln",   $nom,           PDO::PARAM_STR);
    $stm->bindValue("fn",   $prenom,        PDO::PARAM_STR);
    $stm->bindValue("cin",  $cin,           PDO::PARAM_STR);
    $stm->bindValue("s",    $sexe,          PDO::PARAM_STR);
    $stm->bindValue("bd",   $dateNaiss,     PDO::PARAM_STR);
    $stm->bindValue("em",   $email,         PDO::PARAM_STR);
    $stm->bindValue("ph",   $phone,         PDO::PARAM_STR);
    $stm->bindValue("ad",   $adresse,       PDO::PARAM_STR);
    $stm->bindValue("vl",   $ville,         PDO::PARAM_STR);
    $stm->bindValue("img",  $image,         PDO::PARAM_STR);
    $stm->bindValue("stf",  $situation,     PDO::PARAM_STR);
    $stm->bindValue("nbf",  $nbEnfants,     PDO::PARAM_STR);
    $stm->bindValue("dpl",  $diplome,       PDO::PARAM_STR);
    $stm->bindValue("pst",  $post,          PDO::PARAM_STR);
    $stm->bindValue("slr",  $salaire,       PDO::PARAM_STR);
    $stm->bindValue("dem",  $dateEmbauche,  PDO::PARAM_STR);
    $stm->bindValue("cnss", $cnss,          PDO::PARAM_STR);
    $stm->bindValue("amo",  $amo,           PDO::PARAM_STR);
    $stm->bindValue("igr",  $igr,           PDO::PARAM_STR);
    $stm->bindValue("cimr", $cimr,          PDO::PARAM_STR);
    $stm->bindValue("role", $role,          PDO::PARAM_STR);
    $stm->bindValue("pswd", $h_pswd,        PDO::PARAM_STR);
    $stm->bindValue("crby", $createdBy,     PDO::PARAM_STR);
    $stm->execute();

    if ($stm) 
    {
      $_SESSION['success'] = "Employe ajouté avec succès";  
      if (!sendInfoLogin($email, $nom, $prenom, $login, $password)) $_SESSION['error'] = "Les informations de connexion ne sont pas envoyé!";  
      header("location: ../views/view_employes.php");
    }
    else 
    {
      $_SESSION['error'] = "Something is wrong!";
      header("location: ../views/add_employe.php");
    }
  }
  else if (isset($_POST['update']))
  {

    header("location: ../views/view_employes.php");
  }
  else if (isset($_POST['delete']))
  {
    if (delete($_POST['id'])) $_SESSION['success'] = "L'employe est supprimé avec succès";
    else $_SESSION['error'] = "Something is wrong!";
    header("location: ../views/view_employes.php");
  }
  else if (isset($_POST['reset']))
  {
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $id               = $_SESSION['id'];

    $emp = getEmploye($id);
    if (!$emp) $_SESSION['error'] = "Something is wrong!";
    elseif (!password_verify($current_password, $emp['password'])) $_SESSION['error'] = "Mot de passe actuel est incorrect!";
    elseif ($new_password != $confirm_password) $_SESSION['error'] = "Mot de passe de confirmation est incorrecct!";
    elseif (resetPassword($new_password, $id)) 
    {
      $_SESSION['success'] = "Votre mot de passe est modifié avec succès";
      header("location: ../views/home.php");
      exit();
    }
    header("location: ../views/reset_password.php");
  }
  else header("location: ../views/home.php");