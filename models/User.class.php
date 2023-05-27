<?php

include ('DataBase.class.php');

abstract class User
{
    protected DataBase $db;

    protected $nom;
    protected $prenom;
    protected $email;
    protected $image;
    protected $password;
    protected $createdBy;

    function __construct($nom, $prenom, $email, $image, $password, $createdBy)
    {
        $this->nom       = $nom;
        $this->prenom    = $prenom;
        $this->email     = $email;
        $this->image     = $image;
        $this->password  = $password;
        $this->createdBy = $createdBy;
    
        $this->db        = new DataBase();
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
