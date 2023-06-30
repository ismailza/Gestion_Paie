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

  function saveRubrique ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO rubrique VALUES ('',:nomRubrique, :shortName)");
    return $stm->execute($values);
  }

  function getAllRubriques ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM rubrique");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function saveRegle ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO regle VALUES (:idEntreprise, :idRubrique, :formule)");
    return $stm->execute($values);
  }
  
  function deleteRegle ($idEntreprise, $idRubrique)
  {
    require 'connect.php';
    $stm = $pdo->prepare("DELETE FROM regle WHERE idEntreprise = $idEntreprise && idRubrique = $idRubrique");
    return $stm->execute();
  }

  function updateRegle ($values, $idEntreprise, $idRubrique)
  {
    require 'connect.php';
    $stm = $pdo->prepare("UPDATE regle SET formule = ? WHERE idEntreprise = $idEntreprise && idRubrique = $idRubrique");
    return $stm->execute($values);
  }

  function getAllRegles ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM regle NATURAL JOIN rubrique NATURAL JOIN entreprise");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function getReglePaie ($idEntreprise, $idRubrique)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM regle WHERE idEntreprise = ? AND idRubrique = ?");
    $stm->execute([$idEntreprise, $idRubrique]);
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getReglePaieWithRubrique ($idEntreprise, $rubrique)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM regle WHERE idEntreprise = ? AND shortName = ?");
    $stm->execute($idEntreprise, $rubrique);
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function view_bulletin ($filename)
  {
    header("content-type: application/pdf");
    readfile('../views/files/bulletins/'.$filename);
  }