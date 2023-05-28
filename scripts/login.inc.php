<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start(); 

  require 'employe.inc.php';

  if (isset($_POST['submit']))
  {
    $role     = $_POST['role'];
    $login    = $_POST['login'];
    $password = $_POST['password'];

    $user = checkLogin($login, $role);
    
    if (empty($user))
    {
      $_SESSION['error'] = "Email incorrect!";
      header("location: ../views/login.php");
    }
    else
    {
      if (password_verify($password, $user['password']))
      {
        $_SESSION['auth'] = $user['role'];
        $_SESSION['id']   = $user['idEmploye'];
        if (isset($_SESSION['url'])) header("location: ".$_SESSION['url']);
        else header("location: ../views/home.php");
      }
      else
      {
        $_SESSION['error'] = "Mot de passe incorrect!";
        header("location: ../views/login.php");
      }
    }
  } 
  else header("location: ../views/login.php");