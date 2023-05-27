<?php

include ('../controllers/UserController.php');
include ('../models/Employe.class.php');
include ('../scripts/sendMail.php');

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

function upload_image($img)
{
  $valid_extension  = array("png","jpeg","jpg");
  $target_file      = "../views/images/profile/".$img['name'];
  $file_extension   = pathinfo($target_file, PATHINFO_EXTENSION);     
  $file_extension   = strtolower($file_extension);
  if (in_array($file_extension, $valid_extension))
  {
    if (move_uploaded_file($img['tmp_name'], $target_file)) return true;
  }
  return false;
}

if (isset($_POST['addEmploye']))
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
  $image = $_FILES['image'];

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
  
  $password = $nom."_".$cin;
  $dateEmbauche = "04-17-2001";
  $role = "Employe";
  $createdBy = "Ismail ZAHIR";

  if (!upload_image($image))
  {
    $_SESSION['error'] = "Erreur lors de télechargement de l'image";
    header("location: ../views/home.php");
    exit();
  } 

  $emp = new Employe($nom, $prenom, $email, $image['name'], password_hash($password, PASSWORD_DEFAULT), 
                    $cin,$sexe,$dateNais, $phone, $adresse, $ville, $situation, $nbEnfants,$salaire, $diplome, 
                    $post, $dateEmbauche, $cnss, $cimr, $amo, $igr,$role, $createdBy);

  if ($emp->ajouterEmploye()) 
  {
    $_SESSION['success'] = "Employe ajouté avec succès";  
    if (!sendInfoLogin($email, $nom, $prenom, $login, $password)) $_SESSION['error'] = "Les informations de connexion ne sont pas envoyé!";  
  }
  else $_SESSION['error'] = "Something is wrong!";
  
  header("location: ../views/home.php");

}
else header("location: ../views/addEmploye.php");