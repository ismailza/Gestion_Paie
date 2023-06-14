<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
  if (!isset($_SESSION['auth']))
  {
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    header("location: ../views/login");
    exit();
  }