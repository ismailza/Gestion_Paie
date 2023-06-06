-- Active: 1685567183231@@127.0.0.1@3306@gestion_paie
--
-- Base de données : `gestion_paie`
--
CREATE DATABASE IF NOT EXISTS gestion_paie DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE gestion_paie;

-- --------------------------------------------------------

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
  poste         VARCHAR(40) NOT NULL,
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
  ville         VARCHAR(20) NOT NULL,
  descriptif    TEXT NOT NULL,
  createdAt     DATETIME DEFAULT CURRENT_TIMESTAMP,
  createdBy     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS absence;
CREATE TABLE IF NOT EXISTS absence (
  idAbsence     INT(11) PRIMARY KEY AUTO_INCREMENT,
  dateAbsence   DATETIME NOT NULL,
  nbJours       INT(3) NOT NULL,
  justification TEXT,
  idEmploye     INT (11) NOT NULL,
  pieceJoint    VARCHAR(120)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS avance;
CREATE TABLE IF NOT EXISTS avance (
  idAvance      INT(11) PRIMARY KEY AUTO_INCREMENT,
  statut        ENUM('En cours','Refusé','Accepté') NOT NULL,
  dateDemande   DATETIME DEFAULT CURRENT_TIMESTAMP,
  avance        DECIMAL(7,2) NOT NULL,
  idEmploye     INT(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS binificier;
CREATE TABLE IF NOT EXISTS binificier (
  idEmploye     INT(11) NOT NULL,
  idPrime       INT(11) NOT NULL,
  PRIMARY KEY (idEmploye, idPrime)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS conge;
CREATE TABLE IF NOT EXISTS conge (
  idConge       INT(11) PRIMARY KEY AUTO_INCREMENT,
  typeConge     VARCHAR(40) NOT NULL,
  dateDebut     DATE NOT NULL,
  dateFin       DATE NOT NULL,
  idEmploye     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS heuresSupp;
CREATE TABLE IF NOT EXISTS heuresSupp (
  idHeuresSupp INT(11) PRIMARY KEY AUTO_INCREMENT,
  status        ENUM('En cours', 'Acceptéss','Refuséss') NOT NULL,
  dateTravail   DATETIME NOT NULL,
  nbHs          INT(4) NOT NULL,
  idEmploye     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS prime;
CREATE TABLE IF NOT EXISTS prime (
  idPrime       INT(11) PRIMARY KEY AUTO_INCREMENT,
  typePrime     VARCHAR(30) NOT NULL,
  prime         DOUBLE(7,2) NOT NULL,
  datePrime     DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS primePersonalise;
CREATE TABLE IF NOT EXISTS primePersonalise (
  idPrimeP      INT(11) PRIMARY KEY AUTO_INCREMENT,
  typePrime     VARCHAR(30) NOT NULL,
  prime         DECIMAL(7,2) NOT NULL,
  datePrime     DATETIME DEFAULT CURRENT_TIMESTAMP,
  idEmploye     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS reclamation;
CREATE TABLE IF NOT EXISTS reclamation (
  idReclamation   INT(11) PRIMARY KEY AUTO_INCREMENT,
  sujet           VARCHAR(100) NOT NULL,
  contenu         TEXT NOT NULL,
  dateReclamation DATETIME DEFAULT CURRENT_TIMESTAMP,
  status          ENUM('En cours','Lue','Non lue') NOT NULL,
  idEmlploye      INT(11) NOT NULL,
  pieceJoint      VARCHAR(120) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS regle;
CREATE TABLE IF NOT EXISTS regle (
  idEntreprise    INT(11) NOT NULL,
  idRubrique      INT(11) NOT NULL,
  formule         VARCHAR(200) NOT NULL,
  PRIMARY KEY (idEntreprise, idRubrique)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS rubrique;
CREATE TABLE IF NOT EXISTS rubrique (
  idRubrique      INT(11) PRIMARY KEY AUTO_INCREMENT,
  nomRubrique     VARCHAR(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- DATA
INSERT INTO employe VALUES ('','ZAHIR','Ismail','UA123848','Homme','2001-4-17','Sat','Tinejdad','ismailza407@gmail.com','0635791476','IMG_20210102_203408_124.jpg',
                            'Célibataire',0,'LST Génie Logiciel','765462475852744642','765462475852744642','765462475852744642','765462475852744642','$2y$10$jeklm0LK/o4njHFqauWIQO4a4kDK5dTao3o78/NyqZpa4gp0zue8K',CURRENT_TIMESTAMP,NULL);
INSERT INTO contrat VALUES ('',1,1,'CDI','Responsable Ressources Humains',30000,'',NULL,NULL);
INSERT INTO entreprise VALUES ('','JIEA','222, Riad Salam','Mohammedia','JI2A Entreprise ....','',1);


-- FOREIN KEYS

ALTER TABLE employe     ADD CONSTRAINT fk_employe_employe     FOREIGN KEY (createdBy)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE entreprise  ADD CONSTRAINT fk_entreprise_employe  FOREIGN KEY (createdBy)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contrat     ADD CONSTRAINT fk_contrat_employe     FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contrat     ADD CONSTRAINT fk_contrat_entreprise  FOREIGN KEY (idEntreprise)  REFERENCES entreprise (idEntreprise)  ON DELETE CASCADE ON UPDATE CASCADE;
