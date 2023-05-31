<?php

  function save ($values)
  {
    
  }

  function update ($values, $id)
  {

  }

  function delete ($id)
  {
    require 'connect.php';
    $stm = $pdo->prepare("DELETE FROM entreprise WHERE idEntreprise = $id");
    return $stm->execute();
  }

  function getAllEntreprise ()
  {
    require 'connect.php';
    $stm = $pdo->prepare("SELECT * FROM entreprise");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }