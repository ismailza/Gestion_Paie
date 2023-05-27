<?php

  require_once ('models/DataBase.class.php');
  require_once ('models/Employe.class.php');

  class EmployeController 
  {
    private DataBase $db;

    function __construct()
    {
      $this->db = new DataBase();
    }

    public function getAllEmployes ()
    {
      $this->db->query("SELECT * FROM employe");
      return $this->db->allResults();
    }

    public function getEmployeWithId ($id)
    {
      $this->db->query("SELECT * FROM emplye WHERE idEmploye = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->singleResult();
    }



  }
