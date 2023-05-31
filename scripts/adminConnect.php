<?php

require "connect.php";

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

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
  $users = $stmt->fetchAll();

  foreach ($users as $user) {

    if (($user['username'] == $username) &&
      ($user['password'] == $password)
    ) {
      header("location: adminpage.php");
    } else {
      echo "<script language='javascript'>";
      echo "alert('WRONG INFORMATION')";
      echo "</script>";
      die();
    }
  }
}
