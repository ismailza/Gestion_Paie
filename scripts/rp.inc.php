<?php
if ($_SESSION['auth']['poste'] != "Responsable Paie")
  {
    $_SESSION['warning'] = "Vous n'avez pas l'autorisation d'acces";
    header("location: ../views/home");
    exit();
  }