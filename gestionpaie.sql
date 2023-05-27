-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 mai 2023 à 15:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionpaie`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DateCreation` date NOT NULL,
  `MotDePasse` varchar(30) NOT NULL,
  `image` varchar(120) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `amo`
--

DROP TABLE IF EXISTS `amo`;
CREATE TABLE IF NOT EXISTS `amo` (
  `idAmo` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` double(7,2) NOT NULL,
  PRIMARY KEY (`idAmo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avance`
--

DROP TABLE IF EXISTS `avance`;
CREATE TABLE IF NOT EXISTS `avance` (
  `idAvance` int(11) NOT NULL AUTO_INCREMENT,
  `statut` tinyint(1) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `avance` double(7,2) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idAvance`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `binificier`
--

DROP TABLE IF EXISTS `binificier`;
CREATE TABLE IF NOT EXISTS `binificier` (
  `idEmploye` int(11) NOT NULL,
  `idPrime` int(11) NOT NULL,
  KEY `idEmploye` (`idEmploye`),
  KEY `idPrime` (`idPrime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cnss`
--

DROP TABLE IF EXISTS `cnss`;
CREATE TABLE IF NOT EXISTS `cnss` (
  `idCnss` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` double(7,2) NOT NULL,
  PRIMARY KEY (`idCnss`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE IF NOT EXISTS `conge` (
  `idConge` int(11) NOT NULL AUTO_INCREMENT,
  `typeConge` varchar(40) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idConge`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Image` varchar(80) NOT NULL,
  `Diplome` varchar(40) NOT NULL,
  `DateNaissance` date NOT NULL,
  `DateCreation` date NOT NULL,
  `Createur` int(3) NOT NULL,
  `SalairedeBase` float NOT NULL,
  `NbEnfants` int(2) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `DateEmbauche` date NOT NULL,
  `idAmo` int(11) NOT NULL,
  `idCnss` int(11) NOT NULL,
  `idIgr` int(11) NOT NULL,
  PRIMARY KEY (`idEmploye`),
  KEY `idAmo` (`idAmo`),
  KEY `idIgr` (`idIgr`),
  KEY `idCnss` (`idCnss`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(30) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `createDate` date NOT NULL,
  `createdBy` varchar(40) NOT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hs`
--

DROP TABLE IF EXISTS `hs`;
CREATE TABLE IF NOT EXISTS `hs` (
  `idHs` int(11) NOT NULL AUTO_INCREMENT,
  `statut` tinyint(1) NOT NULL,
  `dateTravail` date NOT NULL,
  `nbHs` int(2) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idHs`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `igr`
--

DROP TABLE IF EXISTS `igr`;
CREATE TABLE IF NOT EXISTS `igr` (
  `idIgr` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idIgr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prime`
--

DROP TABLE IF EXISTS `prime`;
CREATE TABLE IF NOT EXISTS `prime` (
  `idPrime` int(11) NOT NULL AUTO_INCREMENT,
  `typePrime` varchar(30) NOT NULL,
  `prime` double(7,2) NOT NULL,
  `datePrime` date NOT NULL,
  PRIMARY KEY (`idPrime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `regle`
--

DROP TABLE IF EXISTS `regle`;
CREATE TABLE IF NOT EXISTS `regle` (
  `idRegle` int(11) NOT NULL AUTO_INCREMENT,
  `formule` varchar(70) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `idIgr` int(11) NOT NULL,
  `idCnss` int(11) NOT NULL,
  `idAvance` int(11) NOT NULL,
  `idConge` int(11) NOT NULL,
  `idAmo` int(11) NOT NULL,
  `idPrime` int(11) NOT NULL,
  `idHs` int(11) NOT NULL,
  PRIMARY KEY (`idRegle`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idIgr` (`idIgr`),
  KEY `regle_ibfk_3` (`idAmo`),
  KEY `regle_ibfk_5` (`idCnss`),
  KEY `regle_ibfk_6` (`idAvance`),
  KEY `regle_ibfk_7` (`idHs`),
  KEY `regle_ibfk_8` (`idPrime`),
  KEY `regle_ibfk_9` (`idConge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
<<<<<<< HEAD
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> bf8b7f8232af1d9486bb57191ae17025b87a3605
