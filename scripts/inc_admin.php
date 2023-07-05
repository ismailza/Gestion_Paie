<?php
session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
if (!isset($_SESSION['admin'])) 
{
  $_SESSION['session'] = "Vous devez se connecter pour acceder à cette page";
  header("location: ../views/admin.php");
  exit();
}
