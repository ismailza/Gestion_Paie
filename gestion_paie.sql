-- Active: 1679828874867@@127.0.0.1@3306@gestion_paie
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
  image         VARCHAR(120) NOT NULL,
  email         VARCHAR(100) UNIQUE NOT NULL,
  password      VARCHAR(60) NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `employe`s
--
DROP TABLE IF EXISTS employe;
CREATE TABLE IF NOT EXISTS employe (
  idEmploye     INT(11) PRIMARY KEY AUTO_INCREMENT,
  nom           VARCHAR(20) NOT NULL,
  prenom        VARCHAR(20) NOT NULL,
  cin           VARCHAR(10) UNIQUE NOT NULL,
  sexe          ENUM('Homme', 'Femme') NOT NULL,
  dateNaiss     DATE NOT NULL,
  adresse       VARCHAR(100) NOT NULL,
  ville         VARCHAR(20) NOT NULL,
  email         VARCHAR(100) UNIQUE NOT NULL,
  phone         VARCHAR(10) NOT NULL,
  image         VARCHAR(80) NOT NULL,
  situationF    ENUM('Célibataire', 'Marié') NOT NULL,
  nbEnfants     INT(2) NOT NULL,
  diplome       VARCHAR(40) NOT NULL,
  numCNSS       VARCHAR(24) NOT NULL,
  numAMO        VARCHAR(24) NOT NULL,
  numCIMR       VARCHAR(24),  
  numIGR        VARCHAR(24) NOT NULL,
  password      VARCHAR(60) NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP,
  createdBy     INT(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS contrat;
CREATE TABLE IF NOT EXISTS contrat (
  numContrat    INT(11) PRIMARY KEY AUTO_INCREMENT,
  idEmploye     INT(11) NOT NULL,
  idEntreprise  INT(11) NOT NULL,
  type          ENUM('CDD','CDI','CTT') NOT NULL,
  poste         VARCHAR(20) NOT NULL,
  salaireBase   DECIMAL(7,2) NOT NULL,
  dateEmbauche  DATETIME DEFAULT CURRENT_TIMESTAMP,
  dateFin       DATETIME,
  motif         TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS entreprise;
CREATE TABLE IF NOT EXISTS entreprise (
  idEntreprise  INT(11) PRIMARY KEY AUTO_INCREMENT,
  nomEntreprise VARCHAR(30) NOT NULL,
  adresse       VARCHAR(40) NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP,
  createdBy     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO employe VALUES ('','ZAHIR','Ismail','UA123848','Homme','2001-4-17','Sat','Tinejdad','ismailza407@gmail.com','0635791476','IMG_20210102_203408_124.jpg','Célibataire',0,'LST Génie Logiciel','765462475852744642','765462475852744642','765462475852744642','765462475852744642','1234','',NULL);
INSERT INTO contrat VALUES ('',1,1,'CDI','Responsable Ressources Humains',30000,'',NULL,NULL);
INSERT INTO entreprise VALUES ('','JIEA','Mohammedia','',1);