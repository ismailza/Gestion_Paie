<?php

function upload_image($img)
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

function checkLogin($login)
{
  require_once 'connect.php';
  $stm = $pdo->prepare("SELECT * FROM employe WHERE email = :em");
  $stm->bindValue("em", $login,   PDO::PARAM_STR);
  $stm->execute();
  return $stm->fetch(PDO::FETCH_ASSOC);
}

function setResetCode($email, $code)
{
  require_once 'connect.php';
  $stm = $pdo->prepare("INSERT INTO resetCode VALUES (?, ?)");
  return $stm->execute(array($email, $code));
}

function save($values, $contrat)
{
  require_once 'connect.php';
  $stm = $pdo->prepare("INSERT INTO employe ('nom','prenom','cin','sexe','dateNaiss','adresse','ville','email','phone','image',
    'situationF','nbEnfants','diplome','numCNSS','numAMO','numCIMR','numIGR','password','createdAt','createdBy') 
    VALUES
    (" .
    $values['nom'] . "," . $values['prenom'] . "," . $values['cin'] . "," . $values['sexe'] . "," . $values['dateNaiss'] . "," . $values['adresse'] . "," . $values['ville'] . "," .
    $values['email'] . "," . $values['phone'] . "," . $values['situationF'] . "," . $values['nbEnfants'] . "," . $values['diplome'] . "," . $values['numCNSS'] . "," . $values['numAMO'] . "," . $values['numCIMR'] . "," . $values['numIGR'] . "," . $values['password'] . ",CURRENT_TIMESTAMP," . $values['createdBy']
    . ")
    ");
  // foreach ($values as $key => $value) $stm->bindValue($key, $value);
  if ($stm->execute()) {
    $id = $pdo->lastInsertId();
    $contrat['idEmploye'] = $id;
    $stm = $pdo->prepare("INSERT INTO contrat ('idEmploye','idEntreprise','type','poste','salaireBase','dateEmbauche') 
      VALUES 
      (" .
      $contrat['idEmploye'] . "," . $contrat['idEntreprise'] . "," . $contrat['type'] . "," . $contrat['poste'] . "," . $contrat['salaireBase'] . ",CURRENT_TIMESTAMP
      )
      ");
    // foreach ($contrat as $key => $c) $stm->bindValue($key, $c);
    return $stm->execute();
  }
}

function update($values, $id)
{
  require_once 'connect.php';
  $stm = $pdo->prepare("UPDATE employe SET 
          nom = ?, prenom = ?, cin = ?, sexe = ?, dateNaiss = ?, email = ?, phone = ?, adresse = ?, ville = ?, image = ?, 
          situation = ?, nbEnfants = ?, diplome = ?, post = ?, salaire = ?, numCnss = ?, numAmo = ?, numIgr = ?, numCIMR = ?
          WHERE idEmploye = $id");
  /*
    $stm = $pdo->prepare("UPDATE employe SET 
        nom = :ln, prenom = :fn, cin = :cin, sexe = :s, dateNaiss = :bd, email = :em, phone = :ph, adresse = :ad, ville = :vl, 
        image = :img, situation = :stf, nbEnfants = :nbf, diplome = :dpl, post = :pst, salaire = :slr, 
        numCnss = :cnss, numAmo = :amo, numIgr = :igr, numCIMR = :cimr");
    */
  return $stm->execute($values);
}

function delete($id)
{
  require_once 'connect.php';
  $stm = $pdo->prepare("DELETE FROM employe WHERE idEmploye = $id");
  return $stm->execute();
}

function resetPassword($newPassword, $id)
{
  require_once 'connect.php';
  $h_new_pswd = password_hash($newPassword, PASSWORD_DEFAULT);
  $stm = $pdo->prepare("UPDATE employe SET password = ? WHERE idEmploye = $id");
  return $stm->execute(array($h_new_pswd));
}

function getEmploye($id)
{
  require_once 'connect.php';
  $stm = $pdo->prepare("SELECT * FROM employe WHERE idEmploye = $id");
  $stm->execute();
  return $stm->fetch(PDO::FETCH_ASSOC);
}

function getAllEmployes()
{
  require_once 'connect.php';
  $stm = $pdo->prepare("SELECT * FROM employe");
  $stm->execute();
  return $stm->fetchAll(PDO::FETCH_ASSOC);
}
