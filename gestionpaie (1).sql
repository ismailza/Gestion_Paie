-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mai 2023 à 11:38
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
  PRIMARY KEY (`idAbsence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Structure de la table `avance`
--

DROP TABLE IF EXISTS `avance`;
CREATE TABLE IF NOT EXISTS `avance` (
  `idAvance` int(11) NOT NULL AUTO_INCREMENT,
  `statut` tinyint(1) NOT NULL,
  `dateDemande` date NOT NULL,
  `avance` double(7,2) NOT NULL,
  PRIMARY KEY (`idAvance`)
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
  PRIMARY KEY (`idConge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `idContrat` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(6) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `poste` varchar(20) NOT NULL,
  `dateFin` date NOT NULL,
  `motif` varchar(4) NOT NULL,
  `salaireBase` double(7,2) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idContrat`),
  KEY `idEmploye` (`idEmploye`),
  KEY `idEntreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sexe` varchar(5) NOT NULL,
  `dateNaiss` date NOT NULL,
  `addresse` varchar(20) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `image` varchar(80) NOT NULL,
  `diplome` varchar(40) NOT NULL,
  `createdAt` date NOT NULL,
  `createdBy` int(3) NOT NULL,
  `NbEnfants` int(2) NOT NULL,
  `Password` varchar(40) NOT NULL,
  PRIMARY KEY (`idEmploye`)
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
  `createAt` date NOT NULL,
  `createdBy` varchar(40) NOT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`idHeuresSupp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

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
