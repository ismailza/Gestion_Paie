<?php
if ($_SESSION['auth']['poste'] != "Responsable Ressources Humaines")
  {
    $_SESSION['warning'] = "Vous n'avez pas l'autorisation d'acces";
    header("location: ../views/home");
    exit();
  }