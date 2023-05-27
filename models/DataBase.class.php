<?php

require_once("../CONFIG.php");

class DataBase 
{
    private $sgbd   = DB_SGBD;
    private $host   = DB_HOST;
    private $dbname = DB_NAME;
    private $user   = DB_USER;
    private $pass   = DB_PASS;

    private $pdo;
    private $stm;
    
    public function __construct()
    {
        try 
        {
            $this->pdo = new PDO("$this->sgbd:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
        } catch (PDOException $e)
        {
            echo "Connection error : ".$e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stm = $this->pdo->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type))
        {
            switch (true)
            {
                case is_int($value) : $type = PDO::PARAM_INT;   break;
                case is_bool($value): $type = PDO::PARAM_BOOL;  break;
                case is_null($value): $type = PDO::PARAM_NULL;  break;
                default:              $type = PDO::PARAM_STR;
            }
        }
        $this->stm->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stm->execute();
    }

    public function allResults()
    {
        $this->execute();
        return $this->stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function singleResult()
    {
        $this->execute();
        return $this->stm->fetch(PDO::FETCH_OBJ);
    }
}