<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start(); 

  require 'employe.inc.php';

  if (isset($_POST['submit']))
  {
    $login    = $_POST['login'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];

    $user = checkLogin($login);
    
    if (empty($user))
    {
      $_SESSION['error'] = "Email incorrect!";
      header("location: ../views/login.php");
    }
    else
    {
      if (password_verify($password, $user['password']))
      {
        $_SESSION['auth'] = $user['poste'];
        $_SESSION['id']   = $user['idEmploye'];
        if (!empty($remember))
        {
          $expired = time()+3600*24*60;
          setcookie('login', $login, $expired);
          setcookie('password', password_hash($password, PASSWORD_DEFAULT), $expired);
        }
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