<?php

  require_once ('../models/DataBase.class.php');

  class UserController
  {

    private $db;

    function __construct()
    {
      $this->db = new DataBase();
    }

    public function checkLogin($login)
    {
      $this->db->query("SELECT * FROM employe WHERE email = :e");
      $this->db->bind("e", $login, PDO::PARAM_STR);
      return $this->db->singleResult();
    }
  }