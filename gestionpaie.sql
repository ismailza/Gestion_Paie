-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mai 2023 à 13:35
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
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `idAbsence` int(11) NOT NULL AUTO_INCREMENT,
  `dateAbsence` date NOT NULL,
  `nbJours` int(11) NOT NULL,
  `justification` text NOT NULL,
  `idEmploye` int(11) NOT NULL,
  `pieceJoint` varchar(120) NOT NULL,
  PRIMARY KEY (`idAbsence`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `image` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAdmin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avance`
--

DROP TABLE IF EXISTS `avance`;
CREATE TABLE IF NOT EXISTS `avance` (
  `idAvance` int(11) NOT NULL AUTO_INCREMENT,
  `statut` tinyint(1) NOT NULL,
  `dateDemande` date NOT NULL,
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
-- Structure de la table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE IF NOT EXISTS `conge` (
  `idConge` int(11) NOT NULL AUTO_INCREMENT,
  `typeConge` varchar(40) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idConge`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `numContrat` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `type` enum('CDD','CDI','CTT') NOT NULL,
  `poste` varchar(20) NOT NULL,
  `salaireBase` decimal(7,2) NOT NULL,
  `dateEmbauche` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateFin` datetime DEFAULT NULL,
  `motif` text,
  PRIMARY KEY (`numContrat`),
  KEY `idEmploye` (`idEmploye`),
  KEY `idEntreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `sexe` enum('Homme','Femme') NOT NULL,
  `dateNaiss` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(80) NOT NULL,
  `situationF` enum('Célibataire','Marié') NOT NULL,
  `nbEnfants` int(2) NOT NULL,
  `diplome` varchar(40) NOT NULL,
  `numCNSS` varchar(24) NOT NULL,
  `numAMO` varchar(24) NOT NULL,
  `numCIMR` varchar(24) DEFAULT NULL,
  `numIGR` varchar(24) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEmploye`),
  UNIQUE KEY `cin` (`cin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(30) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `heuressupp`
--

DROP TABLE IF EXISTS `heuressupp`;
CREATE TABLE IF NOT EXISTS `heuressupp` (
  `idHeuresSupp` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  `dateTravail` date NOT NULL,
  `nbHs` int(11) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idHeuresSupp`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `primeprsenalisé`
--

DROP TABLE IF EXISTS `primeprsenalisé`;
CREATE TABLE IF NOT EXISTS `primeprsenalisé` (
  `idPrimeP` int(11) NOT NULL AUTO_INCREMENT,
  `typePrime` varchar(8) NOT NULL,
  `prime` double(7,2) NOT NULL,
  `datePrime` date NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idPrimeP`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `idReclamation` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` int(11) NOT NULL,
  `contenu` int(11) NOT NULL,
  `dateReclamation` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `idEmlploye` int(11) NOT NULL,
  `pieceJoint` varchar(100) NOT NULL,
  PRIMARY KEY (`idReclamation`),
  KEY `idEmlploye` (`idEmlploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `regle`
--

DROP TABLE IF EXISTS `regle`;
CREATE TABLE IF NOT EXISTS `regle` (
  `idEntreprise` int(11) NOT NULL,
  `idRubrique` int(11) NOT NULL,
  `formule` varchar(120) NOT NULL,
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idRubrique` (`idRubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE IF NOT EXISTS `rubrique` (
  `idRubrique` int(11) NOT NULL AUTO_INCREMENT,
  `nomRubrique` varchar(100) NOT NULL,
  PRIMARY KEY (`idRubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `avance_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `conge_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `heuressupp`
--
ALTER TABLE `heuressupp`
  ADD CONSTRAINT `heuressupp_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `primeprsenalisé`
--
ALTER TABLE `primeprsenalisé`
  ADD CONSTRAINT `primeprsenalisé_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`idEmlploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `regle`
--
ALTER TABLE `regle`
  ADD CONSTRAINT `regle_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regle_ibfk_2` FOREIGN KEY (`idRubrique`) REFERENCES `rubrique` (`idRubrique`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
