<?php

  function saveEntreprise ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO entreprise VALUES ('',:nomEntreprise, :adresse, :ville, :descriptif, CURRENT_TIMESTAMP, :createdBy)");
    return $stm->execute($values);
  }

  function updateEntreprise ($values, $id)
  {
    require 'connect.php';
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

  function getNbEntreprise ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT COUNT(*) nbEntreprise FROM entreprise");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }