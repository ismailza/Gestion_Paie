<?php

  function upload_file ($file, $type)
  {
    $valid_extension  = array("pdf");
    $target_file      = "../views/files/$type/".$file['name'];
    $file_extension   = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension   = strtolower($file_extension);
    if (in_array($file_extension, $valid_extension)) {
      if (move_uploaded_file($file['tmp_name'], $target_file)) return true;
    }
    return false;
  }

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
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe WHERE email = :em");
    $stm->bindValue("em", $login,   PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function checkCIN ($CIN)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe WHERE cin = :cin");
    $stm->bindValue("cin", $CIN, PDO::PARAM_STR);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function setResetCode ($email, $code)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO resetCode VALUES (?, ?)");
    return $stm->execute(array($email, $code));
  }

  function saveEmploye ($values, $contrat)
  {
    require 'connect.php';
    $query = "INSERT INTO employe VALUES ('',:nom,:prenom,:cin,:sexe,:dateNaiss,:adresse,:ville,:email,:phone,:image,
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
    require 'connect.php';
    $stm = $pdo->prepare("UPDATE employe SET nom = :nom, prenom = :prenom, cin = :cin, sexe = :sexe, dateNaiss = :dateNaiss, adresse = :adresse, ville = :ville, email = :email, phone = :phone, image = :image, 
            situationF = :situationF, nbEnfants = :nbEnfants, diplome = :diplome, numCNSS = :numCNSS, numAMO = :numAMO, numCIMR = :numCIMR, numIGR = :numIGR
            WHERE idEmploye = $id");
    return $stm->execute($values);
  }

  function deleteEmploye ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("DELETE FROM employe WHERE idEmploye = $id");
    return $stm->execute();
  }

  function resetPassword ($newPassword, $id)
  {
    require 'connect.php';
    $h_new_pswd = password_hash($newPassword, PASSWORD_DEFAULT);
    $stm = $pdo->prepare("UPDATE employe SET password = ? 
                          WHERE idEmploye = $id");
    return $stm->execute(array($h_new_pswd));
  }

  function getEmploye ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe NATURAL JOIN contrat 
                          WHERE idEmploye = $id");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getAllEmployes ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM employe NATURAL JOIN contrat");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function getNotifications ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM reclamation NATURAL JOIN employe 
                          WHERE status = 'En cours' AND responsable = ? 
                          ORDER BY dateReclamation DESC");
    $stm->execute([$id]);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  } 

  function getAllReclamations ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM reclamation NATURAL JOIN employe 
                          WHERE status = 'En cours' 
                          ORDER BY dateReclamation DESC");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function getAbsenceEmployeThisMonth ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT SUM(nbJours) AS nbJours FROM absence 
                          WHERE idEmploye = $id 
                          AND MONTH(dateAbsence) = MONTH(CURRENT_DATE)");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  } 

  function getNbJoursAbsenceThisMonth ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT SUM(nbJours) AS nbJours FROM absence 
                          WHERE MONTH(dateAbsence) = MONTH(NOW())-1");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getNbEmployes ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT COUNT(*) AS nbEmployes FROM employe");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getNbReclamation ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT COUNT(*) AS nbReclamation FROM reclamation WHERE MONTH(dateReclamation) = MONTH(CURRENT_DATE)-1");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function addJustification ($values, $id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("UPDATE absence SET justification = :justification, pieceJoint = :pieceJoint WHERE idEmploye = $id");
    return $stm->execute($values);
  }

  function getNbHeuresSuppEmployeThisMonth ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT SUM(nbHs) AS nbHS FROM heuressupp 
                          WHERE idEmploye = $id
                          AND MONTH(dateTravail) = MONTH(CURRENT_DATE)-1");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getNbHeuresSupp ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT SUM(nbHs) AS nbHS FROM heuressupp WHERE MONTH(dateTravail) = MONTH(CURRENT_DATE)-1");
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function saveReclamation ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO reclamation VALUES ('',:sujet,:contenu,CURRENT_TIMESTAMP,:status,:idEmploye,:responsable,:pieceJoint)");
    return $stm->execute($values);
  }

  function saveHeuresSupp ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO heuressupp VALUES ('',:status,:dateTravail, :nbHs,:idEmploye)");
    return $stm->execute($values);
  }

  function saveConge ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO conge VALUES ('',:typeConge,:dateDebut,:dateFin,:status,:idEmploye)");
    return $stm->execute($values);
  }

  function saveAvance ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO avance VALUES ('',:status,CURRENT_TIMESTAMP, :avance,:idEmploye)");
    return $stm->execute($values);
  }

  function saveAbsence ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO absence VALUES ('',:dateAbsence, :nbJours,NULL,'En cours',:idEmploye, NULL)");
    return $stm->execute($values);
  }

  function getNbHeuresSuppMonth ($idEmploye, $month)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT SUM(nbHs*taux) AS montantHs
                          FROM (SELECT idEmploye, SUM(nbHs) AS nbHs, MONTH(dateTravail) AS mois,
                          CASE 
                            WHEN (CAST(dateTravail AS DATE) IN (SELECT date FROM joursFerier) OR WEEKDAY(dateTravail) IN (6, 7)) 
                                  AND (21 <= HOUR(dateTravail) AND HOUR(dateTravail) < 6) 
                            THEN 2
                            WHEN (CAST(dateTravail AS DATE) IN (SELECT date FROM joursFerier) OR WEEKDAY(dateTravail) IN (6, 7)) 
                                  OR (21 <= HOUR(dateTravail) AND HOUR(dateTravail) < 6) 
                            THEN 1.5
                            ELSE 1.25
                          END AS taux
                          FROM heuressupp
                          GROUP BY idEmploye, mois, taux) V
                        WHERE idEmploye = ?
                        AND mois = ?");
    $stm->execute([$idEmploye, $month]);
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function getPrimesEmploye ($idEmploye, $month)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT typePrime, prime FROM prime NATURAL JOIN binificier WHERE idEmploye = ? AND MONTH(datePrime) = ?
                          UNION 
                          SELECT typePrime, prime FROM primePersonalise WHERE idEmploye = ? AND MONTH(datePrime) = ?");
    $stm->execute([$idEmploye, $month, $idEmploye, $month]);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function getSalaireBase ($idEmploye)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT salaireBase FROM contrat WHERE idEmploye = ?");
    $stm->execute([$idEmploye]);
  }

  function getAvanceSalaire ($idEmploye, $month)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT SUM(avance) AS totalAvance FROM avance WHERE idEmploye = ? AND MONTH(dateDemande) = ?");
    $stm->execute([$idEmploye, $month]);
    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  function saveBulletin ($values)
  {
    require 'connect.php';
    $stm = $pdo->prepare("INSERT INTO bulletins VALUES ('',:mois, :bulletin, :idEmploye, CURRENT_TIMESTAMP)");
    return $stm->execute($values);
  }

  function getAllBulletins ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM bulletins B INNER JOIN employe E ON B.idEmploye = E.idEmploye
                          ORDER BY B.createdAt, B.mois DESC");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function getBulletinsEmploye ($idEmploye)
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM bulletins WHERE idEmploye = ?
                          ORDER BY createdAt, mois DESC");
    $stm->execute([$idEmploye]);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  function valider_paie_employe ($id, $month)
  {
    $employe = getEmploye($id);
    $SB = $employe['salaireBase'];
    $bulletin = ['Salaire de base' => $SB];
    // * Les heures supplementaire HS = 
    $hst = getNbHeuresSuppMonth($id, $month);
    $HS = ($SB / 26) * $hst['montantHs'];
    $bulletin += ['Les heures supplémentaire' => $HS];
    // * les allocations familialle
    $nbEnfs = $employe['nbEnfants'];
    if ($nbEnfs > 3)
    {
      $allocationF = 900;
      if ($nbEnfs <= 6) $allocationF += ($nbEnfs - 3)*36;
      else $allocationF += 108;
    }
    else $allocationF = $nbEnfs * 300;
    $bulletin += ['Allocation familiale' => $allocationF];
    // * Prime d'anciennte
    $now = new DateTime();
    $anciennte = $now->diff(new DateTime($employe['dateEmbauche']))->y;
    if ($anciennte < 2) $PA = 0;
    elseif ($anciennte < 5) $PA = ($SB + $HS)*0.05;
    elseif ($anciennte < 12) $PA = ($SB + $HS)*0.15;
    elseif ($anciennte < 20) $PA = ($SB + $HS)*0.30;
    elseif ($anciennte < 25) $PA = ($SB + $HS)*0.50;
    else $PA = ($SB + $HS)*0.75;
    $bulletin += ['Prime d\'anciennté' => $PA];
    // * Les primes 
    $PRIMES = 0;
    $primes = getPrimesEmploye($id, $month);
    foreach ($primes as $prime) 
    {
      $bulletin += [$prime['typePrime'] => $prime['prime']];
      $PRIMES += $prime['prime'];
    }
    $bulletin += ['Total des primes' => $PRIMES+$PA];
    // * Salaire de base global
    $SBG = $SB + $HS + $PA + $PRIMES;
    $bulletin += ['Salaire de Base Global' => $SBG];
    // * Salaire de Base Imposable 
    $SBI = $SBG - $allocationF;
    $bulletin += ['Salaire de Base Imposable ' => $SBI];
    // * Les elements deductibles
    if ($SBI <= 6000) $CNSS = $SBI * 0.0448;
    else $CNSS = 268.8;
    $bulletin += ['CNSS' => $CNSS];
    $AMO = $SBI * 0.0226;
    $bulletin += ['AMO' => $AMO];
    if ($employe['numCIMR']) $CIMR = $SBI * 0.06;
    else $CIMR = 0;
    $bulletin += ['CIMR' => $CIMR];
    $IGR = 0;  
    // * Salaire Net Imposable
    $SNI = $SBI - $CNSS - $AMO - $CIMR;
    $bulletin += ['Salaire Net Imposable ' => $SNI];
    // * l’Impôt sur le Revenu Brut
    if ($SNI <= 2500) $IRB = 0;
    elseif ($SNI <= 4166.66) $IRB = ($SNI * 0.1) - 250;
    elseif ($SNI <= 5000) $IRB = ($SNI * 0.2) - 666.67;
    elseif ($SNI <= 6666.66) $IRB = ($SNI * 0.3) - 1166.67;
    elseif ($SNI <= 15000) $IRB = ($SNI * 0.34) - 1433.33;
    else $IRB = ($SNI * 0.38) - 2033.33;
    $bulletin += ['Impot sur le revenu brut ' => $IRB];
    // * l’Impôt sur le Revenu Net
    // * Impôt sur le Revenu Net (IR Net) = IR brut– Charges de famille
    if ($employe['situationF'] == 'Marié') $chargeF = 30;
    else $chargeF = 0;
    $chargeF += 30 * $employe['nbEnfants'];
    if ($chargeF > 180) $chargeF = 180;
    $bulletin += ['Charges de famille ' => $chargeF];
    $IRN = $IRB - $chargeF;
    $bulletin += ['Impôt sur le Revenu Net ' => $IRN];
    // * Salaire Net 
    $avance = getAvanceSalaire($id, $month);
    $bulletin += ['Avance de salaire ' => $avance['totalAvance']];
    $SNet = $SBG - $CNSS - $AMO - $CIMR - $IGR - $IRN - $avance['totalAvance'];
    $bulletin += ['Le salaire net ' => $SNet];
    return $bulletin;
  }
  
  