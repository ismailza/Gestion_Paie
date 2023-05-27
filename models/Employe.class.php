<?php

  require_once ('User.class.php');
  require_once ('Entreprise.class.php');

  class Employe extends User
  {
    protected int    $id;
    protected string $cin;
    protected string $sexe;
    protected string $dateNaiss;
    protected string $phone;
    protected string $adresse;
    protected string $ville;
    protected string $situation;
    protected int    $nbEnfants;
    protected float  $salaire;
    protected string $diplome;
    protected string $post;
    protected string $dateEmbauche;
    protected string $cimr;
    protected string $igr;
    protected string $amo;
    protected string $cnss;
    protected string $role;
    
    function __construct ($nom, $prenom, $email, $image, $password, $cin, $sexe, $dateNaiss, 
                          $phone, $adresse, $ville, $situation, $nbEnfants, $salaire, 
                          $diplome, $post, $dateEmbauche, $cnss, $cimr, $amo, $igr, $role, $createdBy)
    {
      parent::__construct($nom, $prenom, $email, $image, $password, $createdBy);
      $this->cin          = $cin;
      $this->sexe         = $sexe;
      $this->dateNaiss    = $dateNaiss;
      $this->phone        = $phone;
      $this->adresse      = $adresse;
      $this->ville        = $ville;
      $this->situation    = $situation;
      $this->nbEnfants    = $nbEnfants;
      $this->salaire      = $salaire;
      $this->diplome      = $diplome;
      $this->post         = $post;
      $this->dateEmbauche = $dateEmbauche;
      $this->cnss         = $cnss;
      $this->cimr         = $cimr;
      $this->igr          = $amo;
      $this->amo          = $igr;
      $this->role         = $role;
    }

    function ajouterEmploye()
    {
      $bindClass = "(\"\",?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,CURRENT_TIMESTAMP, ?)";
      
      $this->db->query("INSERT INTO employe VALUES $bindClass");
      
      $this->db->bind(1,  $this->nom,           PDO::PARAM_STR);
      $this->db->bind(2,  $this->prenom,        PDO::PARAM_STR);
      $this->db->bind(3,  $this->cin,           PDO::PARAM_STR);
      $this->db->bind(4,  $this->sexe,          PDO::PARAM_STR);
      $this->db->bind(5,  $this->dateNaiss,     PDO::PARAM_STR);
      $this->db->bind(6,  $this->email,         PDO::PARAM_STR);
      $this->db->bind(7,  $this->phone,         PDO::PARAM_STR);
      $this->db->bind(8,  $this->adresse,       PDO::PARAM_STR);
      $this->db->bind(9,  $this->ville,         PDO::PARAM_STR);
      $this->db->bind(10, $this->image,         PDO::PARAM_STR);
      $this->db->bind(11, $this->situation,     PDO::PARAM_STR);
      $this->db->bind(12, $this->nbEnfants,     PDO::PARAM_STR);
      $this->db->bind(13, $this->diplome,       PDO::PARAM_STR);
      $this->db->bind(14, $this->post,          PDO::PARAM_STR);
      $this->db->bind(15, $this->salaire,       PDO::PARAM_STR);
      $this->db->bind(16, $this->dateEmbauche,  PDO::PARAM_STR);
      $this->db->bind(17, $this->cnss,          PDO::PARAM_STR);
      $this->db->bind(18, $this->amo,           PDO::PARAM_STR);
      $this->db->bind(19, $this->igr,           PDO::PARAM_STR);
      $this->db->bind(20, $this->cimr,          PDO::PARAM_STR);
      $this->db->bind(21, $this->role,          PDO::PARAM_STR);
      $this->db->bind(22, $this->password,      PDO::PARAM_STR);
      $this->db->bind(23, $this->createdBy,     PDO::PARAM_STR);
      
      return $this->db->execute();
    }

    

  }
