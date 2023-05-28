<?php

  require "../CONFIG.php";

  try
  {
    $sgbd   = DB_SGBD;
    $host   = DB_HOST;
    $dbname = DB_NAME;
    $user   = DB_USER;
    $pass   = DB_PASS;
    $pdo = new PDO("$sgbd:host=$host;dbname=$dbname",$user,$pass);
    $db = "hello";
  }
  catch (PDOException $e)
  {
    die("Erreur lors de la connexion à la base de données: ".$e->getMessage());
  }