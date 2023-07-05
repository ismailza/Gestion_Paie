<?php
require "connect.php";
session_start();
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);
  $stmt = $pdo->prepare("SELECT * FROM admin where email='$username' and password='$password'");
  $stmt->execute();
  $user = $stmt->fetch();
  if (($user['email'] != $username) || ($user['password'] != $password)) {
    session_destroy();
    session_start();
    $_SESSION['erreur'] = "Email ou mot de passe est inccorecte";
    header("location:../views/admin.php");
  } else {
    unset($_SESSION['auth']);
    $_SESSION['admin'] = $user;
    $_SESSION['welcome'] = "Bienvenue dans votre espace administrateur";
    header("location:../views/admin_home.php");
  }
}
