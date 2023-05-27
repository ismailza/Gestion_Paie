<?php

class Entreprise 
{
  private int    $idEntreprise;
  private string $nomEntreprise;
  private string $adresse;
  private string $ville;
  private string $descriptif;
  private string $createdAt;
  private string $createdBy;

  function __construct ($nomEntreprise, $adresse, $ville, $descriptif)
  {
    $this->nomEntreprise = $nomEntreprise;
    $this->adresse = $adresse;
    $this->ville = $ville;
    $this->descriptif = $descriptif;
  }
  
  public function getVille ()
  {
    return $this->ville;
  }
  


}