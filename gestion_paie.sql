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
  idAdmin INT(11) PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(20) NOT NULL,
  prenom VARCHAR(20) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(60) NOT NULL,
  image VARCHAR(120) NOT NULL,
  createdAt DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `employe`
--
DROP TABLE IF EXISTS employe;
CREATE TABLE IF NOT EXISTS employe (
  idEmploye INT(11) PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(20) NOT NULL,
  prenom VARCHAR(20) NOT NULL,
  cin VARCHAR(10) UNIQUE NOT NULL,
  sexe ENUM('Homme', 'Femme') NOT NULL,
  dateNaiss DATE NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  phone VARCHAR(10) NOT NULL,
  adresse VARCHAR(100) NOT NULL,
  ville VARCHAR(20) NOT NULL,
  image VARCHAR(80) NOT NULL,
  diplome VARCHAR(40) NOT NULL,
  post VARCHAR(30) NOT NULL,
  salaire FLOAT NOT NULL,
  situation ENUM('Célibataire', 'Marié', 'Veuf', 'Divorcé') NOT NULL,
  nbEnfants INT(2) NOT NULL,
  dateEmbauche DATE NOT NULL,
  numCNSS VARCHAR(24) NOT NULL,
  numAMO VARCHAR(24) NOT NULL,
  numIGR VARCHAR(24) NOT NULL,
  numCIMR VARCHAR(24) NOT NULL,
  role ENUM('Employe', 'Responsable RH', 'Responsable Paie') NOT NULL,
  password VARCHAR(60) NOT NULL,
  createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
  createdBy VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `amo`
--
DROP TABLE IF EXISTS amo;
CREATE TABLE IF NOT EXISTS amo (
  idAmo INT(11) PRIMARY KEY AUTO_INCREMENT,
  valeur DOUBLE(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `avance`
--
DROP TABLE IF EXISTS avance;
CREATE TABLE IF NOT EXISTS avance (
  idAvance INT(11) PRIMARY KEY AUTO_INCREMENT,
  idEmploye INT(11) NOT NULL,
  avance DOUBLE(7,2) NOT NULL,
  status ENUM(En cours, Acceptée, Refusée) NOT NULL,
  dateDemande DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `binificier`
--
DROP TABLE IF EXISTS binificier;
CREATE TABLE IF NOT EXISTS binificier (
  idEmploye INT(11) NOT NULL,
  idPrime INT(11) NOT NULL
  PRIMARY KEY (idEmploye, idPrime)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `cnss`
--
DROP TABLE IF EXISTS cnss;
CREATE TABLE IF NOT EXISTS cnss (
  idCnss INT(11) PRIMARY KEY AUTO_INCREMENT,
  valeur DOUBLE(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `igr`
--
DROP TABLE IF EXISTS igr;
CREATE TABLE IF NOT EXISTS igr (
  idIgr INT(11) PRIMARY KEY AUTO_INCREMENT,
  valeur DOUBLE(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `conge`
--
DROP TABLE IF EXISTS conge;
CREATE TABLE IF NOT EXISTS conge (
  idConge INT(11) PRIMARY KEY AUTO_INCREMENT,
  idEmploye INT(11) NOT NULL,
  typeConge VARCHAR(30) NOT NULL,
  dateDemande DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `entreprise`
--
DROP TABLE IF EXISTS entreprise;
CREATE TABLE IF NOT EXISTS entreprise (
  idEntreprise int(11) PRIMARY KEY AUTO_INCREMENT,
  nomEntreprise VARCHAR(30) NOT NULL,
  adresse VARCHAR(40) NOT NULL,
  descriptif TEXT NOT NULL,
  createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
  createdBy VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `hs`
--
DROP TABLE IF EXISTS heuresSupp;
CREATE TABLE IF NOT EXISTS heuresSupp (
  idHs INT(11) PRIMARY KEY AUTO_INCREMENT,
  dateTravail DATETIME NOT NULL,
  nbHs INT(2) NOT NULL,
  idEmploye int(11) NOT NULL,
  statut TINYINT(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `prime`
--
DROP TABLE IF EXISTS prime;
CREATE TABLE IF NOT EXISTS prime (
  idPrime int(11) PRIMARY KEY AUTO_INCREMENT,
  typePrime VARCHAR(30) NOT NULL,
  prime DOUBLE(7,2) NOT NULL,
  datePrime date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `regle`
--
DROP TABLE IF EXISTS regle;
CREATE TABLE IF NOT EXISTS regle (
  idRegle INT(11) PRIMARY KEY AUTO_INCREMENT,
  formule VARCHAR(70) NOT NULL,
  idEntreprise INT(11) NOT NULL,
  idIgr INT(11) NOT NULL,
  idCnss INT(11) NOT NULL,
  idAvance INT(11) NOT NULL,
  idConge INT(11) NOT NULL,
  idAmo INT(11) NOT NULL,
  idPrime INT(11) NOT NULL,
  idHs INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Structure de la table `reclamation`
--
DROP TABLE IF EXISTS reclamation;
CREATE TABLE IF NOT EXISTS reclamation (
  idReclamation INT(11) PRIMARY KEY AUTO_INCREMENT,
  idEmploye INT(11) NOT NULL,
  sujet VARCHAR(100) NOT NULL,
  reclamation TEXT NOT NULL,
  destinataire ENUM(Responable RH, Responsable Paie) NOT NULL,
  dateReclamation DATETIME DEFAULT CURRENT_TIMESTAMP,
  status BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `message`
--
DROP TABLE IF EXISTS message;
CREATE TABLE IF NOT EXISTS message (
  idmessage INT(11) PRIMARY KEY AUTO_INCREMENT,
  sujet VARCHAR(100) NOT NULL,
  message TEXT NOT NULL,
  idEmploye INT(11) NOT NULL,
  dateMessage DATETIME DEFAULT CURRENT_TIMESTAMP,
  status BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `avance_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `binificier`
--
ALTER TABLE `binificier`
  ADD CONSTRAINT `binificier_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binificier_ibfk_2` FOREIGN KEY (`idPrime`) REFERENCES `prime` (`idPrime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `conge_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`idAmo`) REFERENCES `amo` (`idAmo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`idIgr`) REFERENCES `igr` (`idIgr`),
  ADD CONSTRAINT `employe_ibfk_3` FOREIGN KEY (`idCnss`) REFERENCES `cnss` (`idCnss`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `hs`
--
ALTER TABLE `hs`
  ADD CONSTRAINT `hs_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `regle`
--
ALTER TABLE `regle`
  ADD CONSTRAINT `regle_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regle_ibfk_2` FOREIGN KEY (`idIgr`) REFERENCES `igr` (`idIgr`),
  ADD CONSTRAINT `regle_ibfk_3` FOREIGN KEY (`idAmo`) REFERENCES `amo` (`idAmo`),
  ADD CONSTRAINT `regle_ibfk_4` FOREIGN KEY (`idAvance`) REFERENCES `avance` (`idAvance`),
  ADD CONSTRAINT `regle_ibfk_5` FOREIGN KEY (`idCnss`) REFERENCES `cnss` (`idCnss`),
  ADD CONSTRAINT `regle_ibfk_6` FOREIGN KEY (`idAvance`) REFERENCES `avance` (`idAvance`),
  ADD CONSTRAINT `regle_ibfk_7` FOREIGN KEY (`idHs`) REFERENCES `hs` (`idHs`),
  ADD CONSTRAINT `regle_ibfk_8` FOREIGN KEY (`idPrime`) REFERENCES `prime` (`idPrime`),
  ADD CONSTRAINT `regle_ibfk_9` FOREIGN KEY (`idConge`) REFERENCES `conge` (`idConge`);
COMMIT;
