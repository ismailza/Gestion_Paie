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
      header("location: ../views/login");
    }
    else
    {
      if (password_verify($password, $user['password']))
      {
        unset($_SESSION['admin']);
        $_SESSION['info'] = "Bienvenue";
        $_SESSION['auth']   = getEmploye($user['idEmploye']);

        if (!empty($remember))
        {
          $expired = time()+3600*24*60;
          setcookie('login', $login, $expired);
          setcookie('password', password_hash($password, PASSWORD_DEFAULT), $expired);
        }
        if (isset($_SESSION['url'])) header("location: ".$_SESSION['url']);
        else header("location: ../views/home");
      }
      else
      {
        $_SESSION['error'] = "Mot de passe incorrect!";
        header("location: ../views/login");
      }
    }
  } 
  else header("location: ../views/login");