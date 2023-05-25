<?php
  if (isset($_POST['submit']))
  {
    $login = $_POST['login'];
    $login = $_POST['password'];



  }
  else header("location: ../views/login.php");