<?php

  function saveEntreprise ($values)
  {
    require_once 'connect.php';

  }

  function updateEntreprise ($values, $id)
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("UPDATE entreprise SET nomEntreprise = :nomEntreprise, adresse = :adresse, ville = :ville, descriptif = :descriptif
            WHERE idEntreprise = $id");
    return $stm->execute($values);
  }

  function deleteEntreprise ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("DELETE FROM entreprise WHERE idEntreprise = $id");
    return $stm->execute();
  }

  function getEntreprise ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM entreprise WHERE idEntreprise = $id");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getAllEntreprise ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM entreprise");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }