--
-- Base de données : `gestion_paie`
--
CREATE DATABASE IF NOT EXISTS gestion_paie DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE gestion_paie;

-- --------------------------------------------------------
--
-- Structure de la table `admin`
--
DROP TABLE IF EXISTS admin;
CREATE TABLE IF NOT EXISTS admin (
  idAdmin       INT(11) PRIMARY KEY AUTO_INCREMENT,
  nom           VARCHAR(20) NOT NULL,
  prenom        VARCHAR(20) NOT NULL,
  email         VARCHAR(100) UNIQUE NOT NULL,
  password      VARCHAR(60) NOT NULL,
  image         VARCHAR(120) NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `employe`
--
DROP TABLE IF EXISTS employe;
CREATE TABLE IF NOT EXISTS employe (
  idEmploye     INT(11) PRIMARY KEY AUTO_INCREMENT,
  nom           VARCHAR(20) NOT NULL,
  prenom        VARCHAR(20) NOT NULL,
  cin           VARCHAR(10) UNIQUE NOT NULL,
  sexe          ENUM('Homme', 'Femme') NOT NULL,
  dateNaiss     DATE NOT NULL,
  email         VARCHAR(100) UNIQUE NOT NULL,
  phone         VARCHAR(10) NOT NULL,
  adresse       VARCHAR(100) NOT NULL,
  ville         VARCHAR(20) NOT NULL,
  image         VARCHAR(80) NOT NULL,
  diplome       VARCHAR(40) NOT NULL,
  post          VARCHAR(30) NOT NULL,
  salaire       FLOAT NOT NULL,
  situation     ENUM('Célibataire', 'Marié', 'Veuf', 'Divorcé') NOT NULL,
  nbEnfants     INT(2) NOT NULL,
  dateEmbauche  DATE NOT NULL,
  numCNSS       VARCHAR(24) NOT NULL,
  numAMO        VARCHAR(24) NOT NULL,
  numIGR        VARCHAR(24) NOT NULL,
  numCIMR       VARCHAR(24) NOT NULL,
  role          ENUM('Employe', 'Responsable RH', 'Responsable Paie') NOT NULL,
  password      VARCHAR(60) NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP,
  createdBy     VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
