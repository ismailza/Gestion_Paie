<?php

  function save ($values)
  {
    
  }

  function update ($values, $id)
  {

  }

  function delete ($id)
  {
    require_once ('connect.php');
    $stm = $pdo->prepare("DELETE FROM entreprise WHERE idEntreprise = $id");
    return $stm->execute();
  }