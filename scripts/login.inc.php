<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start(); 

  require_once('../controllers/UserController.php');
  require_once('../models/Employe.class.php');

  if (isset($_POST['submit']))
  {
    $login    = $_POST['login'];
    $password = $_POST['password'];

    $uc = new UserController();
    $user = $uc->checkLogin($login);
    if (!$user)
    {
      $_SESSION['error'] = "Email incorrect!";
      header("location: ../views/login.php");
    }
    else
    {
      if (password_verify($password, $user->password))
      {
        $_SESSION['auth'] = $user->idEmploye;
        header("location: ../views/home.php");
      }
      else
      {
        $_SESSION['error'] = "Mot de passe incorrect!";
        header("location: ../views/login.php");
      }
    }
  } 
  else header("location: ../views/login.php");