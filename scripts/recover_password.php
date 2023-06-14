<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  require 'employe.inc.php';

  if (isset($_POST['submit']))
  {
    $to   = $_POST['login'];
    $user = checkLogin($to);
    if (!empty($user)) 
    {
      $code = "";
      for ($i = 0; $i < 6; $i++) $code .= rand(0, 9);
      if (!setResetCode($to, $code)) $_SESSION['error'] = "Error: Somthing is wrong!";
      elseif (!sendResetCode($to, $code)) $_SESSION['error'] = "Code de verification n'est pas envoyé";
      else $_SESSION['success'] = "Code de verification est envoyé";
    }
    else $_SESSION['error'] = "Cet email n'existe pas";
    header("location: ../views/forget_password");
  }
  else header("location: ../views/forgot_password");