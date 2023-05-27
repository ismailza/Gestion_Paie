<?php
  session_start();
  if (!isset($_SESSION['auth']))
  {
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    header("location: ../views/login.php");
  }