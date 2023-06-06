<?php

  function upload_image ($img)
  {
    $valid_extension  = array("png", "jpeg", "jpg");
    $target_file      = "../views/images/profile/" . $img['name'];
    $file_extension   = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension   = strtolower($file_extension);
    if (in_array($file_extension, $valid_extension)) {
      if (move_uploaded_file($img['tmp_name'], $target_file)) return true;
    }
    return false;
  }

  function checkLogin ($login)
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe WHERE email = :em");
    $stm->bindValue("em", $login,   PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function checkCIN ($CIN)
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe WHERE cin = :cin");
    $stm->bindValue("cni", $CIN, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function setResetCode ($email, $code)
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("INSERT INTO resetCode VALUES (?, ?)");
    return $stm->execute(array($email, $code));
  }

  function saveEmploye ($values, $contrat)
  {
    require_once 'connect.php';
    $query = "INSERT INTO employe VALUES (:idEmploye,:nom,:prenom,:cin,:sexe,:dateNaiss,:adresse,:ville,:email,:phone,:image,
                                          :situationF,:nbEnfants,:diplome,:numCNSS,:numAMO,:numCIMR,:numIGR,:password,CURRENT_TIMESTAMP,:createdBy)";
    $stm = $pdo->prepare($query);
    if ($stm->execute($values)) {
      $id = $pdo->lastInsertId();
      $contrat['idEmploye'] = $id;
      $stm = $pdo->prepare("INSERT INTO contrat VALUES (:numContrat,:idEmploye,:idEntreprise,:type,:poste,:salaireBase,CURRENT_TIMESTAMP,:dateFin,:motif)");
      return $stm->execute($contrat);
    }
    return false;
  }

  function updateEmploye ($values, $id)
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("UPDATE employe SET nom = :nom, prenom = :prenom, cin = :cin, sexe = :sexe, dateNaiss = :dateNaiss, adresse = :adresse, ville = :ville, email = :email, phone = :phone, image = :image, 
            situationF = :situationF, nbEnfants = :nbEnfants, diplome = :diplome, numCNSS = :numCNSS, numAMO = :numAMO, numCIMR = :numCIMR, numIGR = :numIGR
            WHERE idEmploye = $id");
    return $stm->execute($values);
  }

  function deleteEmploye ($id)
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("DELETE FROM employe WHERE idEmploye = $id");
    return $stm->execute();
  }

  function resetPassword ($newPassword, $id)
  {
    require_once 'connect.php';
    $h_new_pswd = password_hash($newPassword, PASSWORD_DEFAULT);
    $stm = $pdo->prepare("UPDATE employe SET password = ? WHERE idEmploye = $id");
    return $stm->execute(array($h_new_pswd));
  }

  function getEmploye ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe NATURAL JOIN contrat WHERE idEmploye = $id");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getAllEmployes ()
  {
    require_once 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe NATURAL JOIN contrat");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  

  