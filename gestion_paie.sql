-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2023 at 02:11 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_paie`
--
CREATE DATABASE IF NOT EXISTS `gestion_paie` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `gestion_paie`;

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE `absence` (
  `idAbsence` int NOT NULL,
  `dateAbsence` datetime NOT NULL,
  `nbJours` int NOT NULL,
  `justification` text,
  `status` enum('En cours','Acceptée','Refusée') NOT NULL,
  `idEmploye` int NOT NULL,
  `pieceJoint` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`idAbsence`, `dateAbsence`, `nbJours`, `justification`, `status`, `idEmploye`, `pieceJoint`) VALUES
(1, '2023-06-02 00:00:00', 2, 'Rendez-vous médical', 'Acceptée', 2, 'certificat.pdf'),
(2, '2023-06-03 00:00:00', 1, 'Maladie', 'Acceptée', 3, 'certificat.pdf'),
(3, '2023-06-04 00:00:00', 2, 'Raison personnelle', 'Acceptée', 4, 'certificat.pdf'),
(4, '2023-06-05 00:00:00', 1, 'Congé annuel', 'Acceptée', 5, 'certificat.pdf'),
(5, '2023-06-06 00:00:00', 3, 'Raison personnelle', 'Acceptée', 6, 'certificat.pdf'),
(6, '2023-06-07 00:00:00', 1, 'Congé maladie', 'Refusée', 7, 'certificat.pdf'),
(7, '2023-06-08 00:00:00', 1, 'Raison personnelle', 'En cours', 8, 'certificat.pdf'),
(8, '2023-06-09 00:00:00', 1, 'Congé annuel', 'En cours', 9, 'certificat.pdf'),
(9, '2023-06-10 00:00:00', 3, 'Raison personnelle', 'En cours', 10, 'certificat.pdf'),
(10, '2023-06-11 00:00:00', 1, 'Congé maladie', 'En cours', 1, 'certificat.pdf'),
(11, '2023-06-12 00:00:00', 5, 'Formation professionnelle', 'En cours', 2, 'certificat.pdf'),
(12, '2023-06-13 00:00:00', 1, 'Congé annuel', 'En cours', 3, 'certificat.pdf'),
(13, '2023-06-14 00:00:00', 4, 'Raison personnelle', 'En cours', 4, 'certificat.pdf'),
(14, '2023-06-15 00:00:00', 1, 'Rendez-vous chez le dentiste', 'En cours', 5, 'certificat.pdf'),
(15, '2023-06-16 00:00:00', 2, 'Raison personnelle', 'En cours', 6, 'certificat.pdf'),
(16, '2023-06-17 00:00:00', 1, 'Congé annuel', 'En cours', 7, 'certificat.pdf'),
(17, '2023-06-18 00:00:00', 3, 'Raison personnelle', 'En cours', 8, 'certificat.pdf'),
(18, '2023-06-19 00:00:00', 2, 'Rendez-vous chez le médecin', 'En cours', 9, 'certificat.pdf'),
(19, '2023-06-20 00:00:00', 1, 'Raison personnelle', 'En cours', 10, 'certificat.pdf'),
(20, '2023-06-21 00:00:00', 2, NULL, 'En cours', 2, 'certificat.pdf'),
(21, '2023-06-21 00:00:00', 1, NULL, 'En cours', 1, 'certificat.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `idAdmin` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `image` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(12) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `ville` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `image`, `email`, `password`, `createdAt`, `phone`, `dateNaissance`, `ville`) VALUES
(1, 'OUTGOUGA', 'Jalal Eddine', 'user1.jpg', 'admin@gmail.com', 'admin', '2023-05-31 17:10:38', '065678094523', '1999-11-06', 'Agadir');

-- --------------------------------------------------------

--
-- Table structure for table `avance`
--

DROP TABLE IF EXISTS `avance`;
CREATE TABLE `avance` (
  `idAvance` int NOT NULL,
  `status` enum('En cours','Refusé','Accepté') NOT NULL,
  `dateDemande` datetime DEFAULT CURRENT_TIMESTAMP,
  `avance` decimal(7,2) NOT NULL,
  `idEmploye` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `avance`
--

INSERT INTO `avance` (`idAvance`, `status`, `dateDemande`, `avance`, `idEmploye`) VALUES
(1, 'Accepté', '2023-06-18 23:25:21', 5000.00, 2),
(2, 'Refusé', '2023-06-20 20:11:44', 2000.00, 23),
(3, 'En cours', '2023-06-21 14:34:49', 431.00, 2),
(4, 'En cours', '2023-06-21 14:48:11', 1299.00, 23);

-- --------------------------------------------------------

--
-- Table structure for table `binificier`
--

DROP TABLE IF EXISTS `binificier`;
CREATE TABLE `binificier` (
  `idEmploye` int NOT NULL,
  `idPrime` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `bulletins`
--

DROP TABLE IF EXISTS `bulletins`;
CREATE TABLE `bulletins` (
  `idBulletin` int NOT NULL,
  `mois` int NOT NULL,
  `bulletin` varchar(120) NOT NULL,
  `idEmploye` int NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bulletins`
--

INSERT INTO `bulletins` (`idBulletin`, `mois`, `bulletin`, `idEmploye`, `createdAt`) VALUES
(1, 6, 'bulletin_06_1', 1, '2023-06-26 22:22:06'),
(2, 6, 'bulletin_06_2', 2, '2023-06-26 22:22:06'),
(3, 6, 'bulletin_06_3', 3, '2023-06-26 22:22:06'),
(4, 6, 'bulletin_06_4', 4, '2023-06-26 22:22:06'),
(5, 6, 'bulletin_06_5', 5, '2023-06-26 22:22:06'),
(6, 6, 'bulletin_06_6', 6, '2023-06-26 22:22:07'),
(7, 6, 'bulletin_06_7', 7, '2023-06-26 22:22:07'),
(8, 6, 'bulletin_06_8', 8, '2023-06-26 22:22:07'),
(9, 6, 'bulletin_06_9', 9, '2023-06-26 22:22:07'),
(10, 6, 'bulletin_06_10', 10, '2023-06-26 22:22:08'),
(11, 6, 'bulletin_06_11', 11, '2023-06-26 22:22:08'),
(12, 6, 'bulletin_06_12', 12, '2023-06-26 22:22:08'),
(13, 6, 'bulletin_06_13', 13, '2023-06-26 22:22:08'),
(14, 6, 'bulletin_06_14', 14, '2023-06-26 22:22:08'),
(15, 6, 'bulletin_06_15', 15, '2023-06-26 22:22:09'),
(16, 6, 'bulletin_06_16', 16, '2023-06-26 22:22:09'),
(17, 6, 'bulletin_06_17', 17, '2023-06-26 22:22:09'),
(18, 6, 'bulletin_06_18', 18, '2023-06-26 22:22:09'),
(19, 6, 'bulletin_06_20', 20, '2023-06-26 22:22:09'),
(20, 6, 'bulletin_06_21', 21, '2023-06-26 22:22:10'),
(21, 6, 'bulletin_06_22', 22, '2023-06-26 22:22:10'),
(22, 6, 'bulletin_06_23', 23, '2023-06-26 22:22:10'),
(23, 6, 'bulletin_06_24', 24, '2023-06-26 22:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE `conge` (
  `idConge` int NOT NULL,
  `typeConge` varchar(40) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `status` enum('En cours','Acceptée','Refusée') NOT NULL,
  `idEmploye` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `conge`
--

INSERT INTO `conge` (`idConge`, `typeConge`, `dateDebut`, `dateFin`, `status`, `idEmploye`) VALUES
(1, 'Congé annuel', '2023-06-01', '2023-06-05', 'Acceptée', 1),
(2, 'Congé maladie', '2023-06-02', '2023-06-03', 'Acceptée', 2),
(3, 'Congé annuel', '2023-06-06', '2023-06-10', 'Acceptée', 3),
(4, 'Congé maladie', '2023-06-07', '2023-06-08', 'Acceptée', 4),
(5, 'Congé annuel', '2023-06-11', '2023-06-15', 'Acceptée', 5),
(6, 'Congé maladie', '2023-06-12', '2023-06-13', 'Acceptée', 6),
(7, 'Congé annuel', '2023-06-16', '2023-06-20', 'En cours', 7),
(8, 'Congé maladie', '2023-06-17', '2023-06-18', 'En cours', 8),
(9, 'Congé annuel', '2023-06-21', '2023-06-25', 'En cours', 9),
(10, 'Congé maladie', '2023-06-22', '2023-06-23', 'En cours', 10),
(11, 'Congé annuel', '2023-06-26', '2023-06-30', 'En cours', 1),
(12, 'Congé maladie', '2023-06-27', '2023-06-28', 'En cours', 2),
(13, 'Congé annuel', '2023-07-01', '2023-07-05', 'En cours', 3),
(14, 'Congé maladie', '2023-07-02', '2023-07-03', 'En cours', 4),
(15, 'Congé annuel', '2023-07-06', '2023-07-10', 'En cours', 5),
(16, 'Congé maladie', '2023-07-07', '2023-07-08', 'En cours', 6),
(17, 'Congé annuel', '2023-07-11', '2023-07-15', 'En cours', 7),
(18, 'Congé maladie', '2023-07-12', '2023-07-13', 'En cours', 8),
(19, 'Congé annuel', '2023-07-16', '2023-07-20', 'En cours', 9),
(20, 'Congé maladie', '2023-07-17', '2023-07-18', 'En cours', 10),
(21, 'Congé speciale', '2023-06-22', '2023-06-23', 'Acceptée', 23);

-- --------------------------------------------------------

--
-- Table structure for table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE `contrat` (
  `numContrat` int NOT NULL,
  `idEmploye` int NOT NULL,
  `idEntreprise` int NOT NULL,
  `type` enum('CDD','CDI','CTT') NOT NULL,
  `poste` varchar(40) NOT NULL,
  `salaireBase` decimal(7,2) NOT NULL,
  `dateEmbauche` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateFin` datetime DEFAULT NULL,
  `motif` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contrat`
--

INSERT INTO `contrat` (`numContrat`, `idEmploye`, `idEntreprise`, `type`, `poste`, `salaireBase`, `dateEmbauche`, `dateFin`, `motif`) VALUES
(2, 1, 1, 'CDI', 'Responsable Ressources Humaines', 30000.00, '2022-02-16 00:00:00', NULL, NULL),
(3, 2, 1, 'CDI', 'Responsable Paie', 30000.00, '0000-00-00 00:00:00', NULL, NULL),
(4, 3, 2, 'CDI', 'Financial Analyst', 5500.00, '2020-05-01 00:00:00', NULL, NULL),
(5, 4, 2, 'CDD', 'HR Coordinator', 4500.00, '2021-03-15 00:00:00', '2022-03-15 00:00:00', 'Maternity leave replacement'),
(6, 5, 3, 'CDI', 'Project Manager', 6000.00, '2022-09-01 00:00:00', NULL, NULL),
(7, 6, 3, 'CDD', 'Sales Representative', 3800.00, '2023-01-01 00:00:00', '2023-06-30 00:00:00', 'Seasonal position'),
(8, 7, 4, 'CDI', 'Graphic Designer', 4800.00, '2019-12-01 00:00:00', NULL, NULL),
(9, 8, 4, 'CDD', 'Customer Service Representative', 3500.00, '2020-10-01 00:00:00', '2021-10-01 00:00:00', 'Temporary contract'),
(10, 9, 5, 'CDI', 'IT Manager', 6500.00, '2022-04-01 00:00:00', NULL, NULL),
(11, 10, 5, 'CDD', 'Administrative Assistant', 3200.00, '2023-02-01 00:00:00', '2023-06-30 00:00:00', 'Seasonal position'),
(12, 11, 1, 'CDI', 'Software Engineer', 5000.00, '2021-01-01 00:00:00', NULL, NULL),
(13, 12, 1, 'CDD', 'Marketing Specialist', 4000.00, '2022-02-01 00:00:00', '2023-02-01 00:00:00', 'End of project'),
(14, 13, 2, 'CDI', 'Financial Analyst', 5500.00, '2020-05-01 00:00:00', NULL, NULL),
(15, 14, 2, 'CDD', 'HR Coordinator', 4500.00, '2021-03-15 00:00:00', '2022-03-15 00:00:00', 'Maternity leave replacement'),
(16, 15, 3, 'CDI', 'Project Manager', 6000.00, '2022-09-01 00:00:00', NULL, NULL),
(17, 16, 3, 'CDD', 'Sales Representative', 3800.00, '2023-01-01 00:00:00', '2023-06-30 00:00:00', 'Seasonal position'),
(18, 17, 4, 'CDI', 'Graphic Designer', 4800.00, '2019-12-01 00:00:00', NULL, NULL),
(19, 18, 4, 'CDD', 'Customer Service Representative', 3500.00, '2020-10-01 00:00:00', '2021-10-01 00:00:00', 'Temporary contract'),
(21, 20, 5, 'CDD', 'Administrative Assistant', 3200.00, '2023-02-01 00:00:00', '2023-06-30 00:00:00', 'Seasonal position'),
(22, 21, 1, 'CDI', 'Software Engineer', 5000.00, '2021-01-01 00:00:00', NULL, NULL),
(23, 22, 1, 'CDD', 'Marketing Specialist', 4000.00, '2022-02-01 00:00:00', '2023-02-01 00:00:00', 'End of project'),
(25, 23, 1, 'CDI', 'Chef de projet', 25000.00, '0000-00-00 00:00:00', NULL, NULL),
(26, 24, 1, 'CDI', 'Chef de projet', 10000.00, '2023-06-21 16:03:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE `employe` (
  `idEmploye` int NOT NULL,
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
  `nbEnfants` int NOT NULL,
  `diplome` varchar(40) NOT NULL,
  `numCNSS` varchar(24) NOT NULL,
  `numAMO` varchar(24) NOT NULL,
  `numCIMR` varchar(24) DEFAULT NULL,
  `numIGR` varchar(24) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`idEmploye`, `nom`, `prenom`, `cin`, `sexe`, `dateNaiss`, `adresse`, `ville`, `email`, `phone`, `image`, `situationF`, `nbEnfants`, `diplome`, `numCNSS`, `numAMO`, `numCIMR`, `numIGR`, `password`, `createdAt`, `createdBy`) VALUES
(1, 'ZAHIR', 'Ismail', 'UA123848', 'Homme', '2001-04-17', 'Sat', 'Tinejdad', 'ismailza407@gmail.com', '0635791476', 'IMG_20210102_203408_124.jpg', 'Célibataire', 0, 'LST Génie Logiciel', '765462475852744642', '765462475852744642', '765462475852744642', '765462475852744642', '$2y$10$jeklm0LK/o4njHFqauWIQO4a4kDK5dTao3o78/NyqZpa4gp0zue8K', '2023-06-18 21:44:48', NULL),
(2, 'AFRIAD', 'Abdelaziz', 'AA65467', 'Homme', '2002-05-27', 'Casablanca', 'Casablanca', 'afriadabdlaziz@gmail.com', '0634526154', 'Abdelaziz.png', 'Célibataire', 0, 'DEUST', '76546365852744642', '765462762544642', '7657537452744642', '7654628527744642', '$2y$10$jeklm0LK/o4njHFqauWIQO4a4kDK5dTao3o78/NyqZpa4gp0zue8K', '2023-06-18 21:44:53', NULL),
(3, 'Smith', 'John', '1234567891', 'Homme', '1990-01-01', '123 Main St', 'City', 'john.smith@example.com', '1234567890', 'avatar1.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901231', '123456789012345678901231', NULL, '123456789012345678901231', 'mypassword1', '2023-06-18 21:44:58', 1),
(4, 'Johnson', 'Emma', '1234567892', 'Femme', '1992-03-15', '456 Elm St', 'City', 'emma.johnson@example.com', '1234567891', 'avatar2.jpg', 'Célibataire', 0, 'Master', '123456789012345678901232', '123456789012345678901232', NULL, '123456789012345678901232', 'mypassword2', '2023-06-18 21:44:58', 2),
(5, 'Anderson', 'Michael', '1234567893', 'Homme', '1985-07-12', '789 Oak St', 'City', 'michael.anderson@example.com', '1234567892', 'avatar3.jpg', 'Marié', 2, 'PhD', '123456789012345678901233', '123456789012345678901233', NULL, '123456789012345678901233', 'mypassword3', '2023-06-18 21:44:58', 3),
(6, 'Martinez', 'Sophia', '1234567894', 'Femme', '1994-05-20', '234 Maple St', 'City', 'sophia.martinez@example.com', '1234567893', 'avatar4.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901234', '123456789012345678901234', NULL, '123456789012345678901234', 'mypassword4', '2023-06-18 21:44:58', 4),
(7, 'Brown', 'Oliver', '1234567895', 'Homme', '1991-09-08', '567 Pine St', 'City', 'oliver.brown@example.com', '1234567894', 'avatar5.jpg', 'Marié', 1, 'Master', '123456789012345678901235', '123456789012345678901235', NULL, '123456789012345678901235', 'mypassword5', '2023-06-18 21:44:58', 5),
(8, 'Garcia', 'Ava', '1234567896', 'Femme', '1988-12-30', '890 Cedar St', 'City', 'ava.garcia@example.com', '1234567895', 'avatar6.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901236', '123456789012345678901236', NULL, '123456789012345678901236', 'mypassword6', '2023-06-18 21:44:58', 1),
(9, 'Lee', 'Noah', '1234567897', 'Homme', '1993-02-17', '123 Main St', 'City', 'noah.lee@example.com', '1234567896', 'avatar7.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901237', '123456789012345678901237', NULL, '123456789012345678901237', 'mypassword7', '2023-06-18 21:44:58', 2),
(10, 'Lopez', 'Mia', '1234567898', 'Femme', '1990-06-25', '456 Elm St', 'City', 'mia.lopez@example.com', '1234567897', 'avatar8.jpg', 'Marié', 2, 'Master', '123456789012345678901238', '123456789012345678901238', NULL, '123456789012345678901238', 'mypassword8', '2023-06-18 21:44:58', 3),
(11, 'Harris', 'Liam', '1234567899', 'Homme', '1995-11-11', '789 Oak St', 'City', 'liam.harris@example.com', '1234567898', 'avatar9.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901239', '123456789012345678901239', NULL, '123456789012345678901239', 'mypassword9', '2023-06-18 21:44:58', 4),
(12, 'Clark', 'Isabella', '1234567800', 'Femme', '1992-08-05', '234 Maple St', 'City', 'isabella.clark@example.com', '1234567899', 'avatar10.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901230', '123456789012345678901230', NULL, '123456789012345678901230', 'mypassword10', '2023-06-18 21:44:58', 5),
(13, 'Lewis', 'Ethan', '1234567801', 'Homme', '1987-04-04', '567 Pine St', 'City', 'ethan.lewis@example.com', '1234567800', 'avatar11.jpg', 'Marié', 1, 'Master', '123456789012345678901231', '123456789012345678901231', NULL, '123456789012345678901231', 'mypassword11', '2023-06-18 21:44:58', 1),
(14, 'Young', 'Sophie', '1234567802', 'Femme', '1993-10-10', '890 Cedar St', 'City', 'sophie.young@example.com', '1234567801', 'avatar12.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901232', '123456789012345678901232', NULL, '123456789012345678901232', 'mypassword12', '2023-06-18 21:44:58', 2),
(15, 'Walker', 'Jackson', '1234567803', 'Homme', '1989-07-07', '123 Main St', 'City', 'jackson.walker@example.com', '1234567802', 'avatar13.jpg', 'Marié', 2, 'PhD', '123456789012345678901233', '123456789012345678901233', NULL, '123456789012345678901233', 'mypassword13', '2023-06-18 21:44:58', 3),
(16, 'Hall', 'Amelia', '1234567804', 'Femme', '1996-12-20', '456 Elm St', 'City', 'amelia.hall@example.com', '1234567803', 'avatar14.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901234', '123456789012345678901234', NULL, '123456789012345678901234', 'mypassword14', '2023-06-18 21:44:58', 4),
(17, 'Allen', 'Lucas', '1234567805', 'Homme', '1991-02-28', '789 Oak St', 'City', 'lucas.allen@example.com', '1234567804', 'avatar15.jpg', 'Marié', 1, 'Master', '123456789012345678901235', '123456789012345678901235', NULL, '123456789012345678901235', 'mypassword15', '2023-06-18 21:44:58', 5),
(18, 'Gonzalez', 'Evelyn', '1234567806', 'Femme', '1988-09-09', '234 Maple St', 'City', 'evelyn.gonzalez@example.com', '1234567805', 'avatar16.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901236', '123456789012345678901236', NULL, '123456789012345678901236', 'mypassword16', '2023-06-18 21:44:58', 1),
(20, 'Wright', 'Abigail', '1234567808', 'Femme', '1990-05-12', '890 Cedar St', 'City', 'abigail.wright@example.com', '1234567807', 'avatar18.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901238', '123456789012345678901238', NULL, '123456789012345678901238', 'mypassword18', '2023-06-18 21:44:58', 3),
(21, 'Scott', 'James', '1234567809', 'Homme', '1995-08-25', '123 Main St', 'City', 'james.scott@example.com', '1234567808', 'avatar19.jpg', 'Marié', 1, 'Bachelor', '123456789012345678901239', '123456789012345678901239', NULL, '123456789012345678901239', 'mypassword19', '2023-06-18 21:44:58', 4),
(22, 'Green', 'Emily', '1234567810', 'Femme', '1992-11-16', '456 Elm St', 'City', 'emily.green@example.com', '1234567809', 'avatar20.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901230', '123456789012345678901230', NULL, '123456789012345678901230', 'mypassword20', '2023-06-18 21:44:58', 5),
(23, 'ZADDI', 'Abdelmajid', 'JC604373', 'Homme', '2002-06-22', 'Taroudant', 'Afourar', 'lhssenzaddi@gmail.com', '0634707974', 'WhatsApp Image 2023-06-14 at 12.44.48.jpg', 'Célibataire', 0, 'DEUST', '123456783778764687', '737576789273858', 'R637682685735768', '8638685Y35683685', '$2y$10$ha/4OcIlXOQGzzhnqZi24ev67kaqfy3E0Jw2SA/2cRKIIsiANqU4e', '2023-06-18 21:48:28', 1),
(24, 'Test', 'Tet', 'UY65644', 'Homme', '2023-06-20', 'yiyiyiyiy', 'Ain El Aouda', 'iskj@gmail.com', '7546466464', 'favicon.png', 'Célibataire', 0, 'Ingénieur', '123456783778764687', '737576789273858', 'R637682685735768', '8638685Y35683685', '$2y$10$jdq/Ue0qCRsBuTJ.Its.ie/HrnNdquOTjOuKsnNFPJMV/FOPjDSDe', '2023-06-21 16:03:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE `entreprise` (
  `idEntreprise` int NOT NULL,
  `nomEntreprise` varchar(30) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `descriptif` text NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `nomEntreprise`, `adresse`, `ville`, `descriptif`, `createdAt`, `createdBy`) VALUES
(1, 'JIEA', '222, Riad Salam', 'Mohammedia', 'JI2A Entreprise ....', '0000-00-00 00:00:00', 1),
(2, 'Société ABC', 'Rue Mohamed V', 'Casablanca', 'Une entreprise spécialisée dans les services informatiques.', '2023-06-18 21:45:28', 1),
(3, 'Société XYZ', 'Avenue Hassan II', 'Rabat', 'Une entreprise de construction et de génie civil.', '2023-06-18 21:45:28', 1),
(4, 'Société DEF', 'Boulevard Mohammed VI', 'Marrakech', 'Un restaurant renommé proposant une cuisine marocaine traditionnelle.', '2023-06-18 21:45:28', 1),
(5, 'Société GHI', 'Rue Mohammed I', 'Fès', 'Un fabricant de produits électroniques grand public.', '2023-06-18 21:45:28', 1),
(6, 'Société JKL', 'Avenue Mohammed VI', 'Tanger', 'Un opérateur télécom offrant des services de téléphonie mobile et d\'internet.', '2023-06-18 21:45:28', 1),
(7, 'Société MNO', 'Rue Hassan II', 'Agadir', 'Un hôtel de luxe avec vue sur la mer.', '2023-06-18 21:45:28', 1),
(8, 'Société PQR', 'Boulevard Mohammed V', 'Meknès', 'Un supermarché proposant une large gamme de produits alimentaires et non alimentaires.', '2023-06-18 21:45:28', 1),
(9, 'Société STU', 'Avenue Mohammed V', 'Oujda', 'Une entreprise de transport proposant des services de logistique et de livraison.', '2023-06-18 21:45:28', 1),
(10, 'Société VWX', 'Rue Mohammed VI', 'Témara', 'Un fabricant de meubles haut de gamme.', '2023-06-18 21:45:28', 1),
(11, 'Société YZA', 'Boulevard Mohammed III', 'Essaouira', 'Une agence de voyages spécialisée dans les circuits touristiques.', '2023-06-18 21:45:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `heuressupp`
--

DROP TABLE IF EXISTS `heuressupp`;
CREATE TABLE `heuressupp` (
  `idHeuresSupp` int NOT NULL,
  `status` enum('En cours','Acceptée','Refusée') NOT NULL,
  `dateTravail` datetime NOT NULL,
  `nbHs` int NOT NULL,
  `idEmploye` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `heuressupp`
--

INSERT INTO `heuressupp` (`idHeuresSupp`, `status`, `dateTravail`, `nbHs`, `idEmploye`) VALUES
(1, 'En cours', '2023-01-01 22:00:00', 2, 1),
(2, 'Acceptée', '2023-06-02 22:30:00', 3, 1),
(3, 'En cours', '2023-06-03 10:15:00', 1, 3),
(4, 'Refusée', '2023-06-04 12:45:00', 4, 4),
(5, 'Acceptée', '2023-06-05 08:00:00', 2, 5),
(6, 'En cours', '2023-06-06 11:30:00', 3, 6),
(7, 'Acceptée', '2023-06-07 13:15:00', 2, 7),
(8, 'En cours', '2023-06-08 09:45:00', 1, 8),
(9, 'Acceptée', '2023-06-09 14:00:00', 5, 1),
(10, 'En cours', '2023-06-10 10:30:00', 2, 10),
(11, 'Acceptée', '2023-06-11 12:15:00', 3, 1),
(12, 'Refusée', '2023-04-12 11:30:00', 2, 2),
(13, 'Acceptée', '2023-06-13 09:45:00', 4, 3),
(14, 'En cours', '2023-06-14 08:30:00', 2, 4),
(15, 'Acceptée', '2023-06-15 13:00:00', 1, 5),
(16, 'En cours', '2023-06-16 10:45:00', 3, 6),
(17, 'Acceptée', '2023-06-17 14:30:00', 2, 7),
(18, 'En cours', '2023-06-18 09:00:00', 1, 8),
(19, 'Acceptée', '2023-06-19 13:15:00', 5, 9),
(20, 'En cours', '2023-06-20 10:30:00', 2, 10),
(21, 'Refusée', '2023-06-22 00:00:00', 12, 23);

-- --------------------------------------------------------

--
-- Stand-in structure for view `heuressuppview`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `heuressuppview`;
CREATE TABLE `heuressuppview` (
`idEmploye` int
,`nbHs` decimal(32,0)
,`mois` int
,`taux` decimal(3,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `joursferier`
--

DROP TABLE IF EXISTS `joursferier`;
CREATE TABLE `joursferier` (
  `date` date DEFAULT NULL,
  `motif` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `joursferier`
--

INSERT INTO `joursferier` (`date`, `motif`) VALUES
('2023-01-01', 'Nouvel An'),
('2023-05-01', 'Fête du Travail'),
('2023-05-14', 'Aid El Fitr'),
('2023-07-30', 'Fête du Trône'),
('2023-08-14', 'Oued Ed-Dahab Day'),
('2023-08-20', 'Révolution du Roi et du Peuple'),
('2023-11-06', 'Anniversaire de la Marche Verte'),
('2023-11-18', 'Fête de l\'Indépendance'),
('2023-11-29', 'Fête de la Jeunesse'),
('2023-12-01', 'Fête du Roi'),
('2024-01-01', 'Nouvel An'),
('2024-05-01', 'Fête du Travail'),
('2024-04-03', 'Aid El Fitr'),
('2024-06-09', 'Fête de l\'Indépendance'),
('2024-07-30', 'Fête du Trône'),
('2024-08-14', 'Oued Ed-Dahab Day'),
('2024-08-20', 'Révolution du Roi et du Peuple'),
('2024-11-06', 'Anniversaire de la Marche Verte'),
('2024-11-18', 'Fête de l\'Indépendance'),
('2024-11-29', 'Fête de la Jeunesse'),
('2024-12-01', 'Fête du Roi');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

DROP TABLE IF EXISTS `password_reset`;
CREATE TABLE `password_reset` (
  `email` varchar(100) NOT NULL,
  `code` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `prime`
--

DROP TABLE IF EXISTS `prime`;
CREATE TABLE `prime` (
  `idPrime` int NOT NULL,
  `typePrime` varchar(30) NOT NULL,
  `prime` double(7,2) NOT NULL,
  `datePrime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `primepersonalise`
--

DROP TABLE IF EXISTS `primepersonalise`;
CREATE TABLE `primepersonalise` (
  `idPrimeP` int NOT NULL,
  `typePrime` varchar(30) NOT NULL,
  `prime` decimal(7,2) NOT NULL,
  `datePrime` datetime DEFAULT CURRENT_TIMESTAMP,
  `idEmploye` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE `reclamation` (
  `idReclamation` int NOT NULL,
  `sujet` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `dateReclamation` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('En cours','Acceptée','Refusée') NOT NULL,
  `idEmploye` int NOT NULL,
  `responsable` int NOT NULL,
  `pieceJoint` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`idReclamation`, `sujet`, `contenu`, `dateReclamation`, `status`, `idEmploye`, `responsable`, `pieceJoint`) VALUES
(1, 'Problème de connexion', 'Je rencontre des difficultés pour me connecter à mon compte en ligne.', '2023-06-18 21:46:09', 'En cours', 1, 1, 'fichier1.pdf'),
(2, 'Demande de remboursement', 'Je souhaite obtenir un remboursement pour une transaction erronée.', '2023-06-18 21:46:09', 'Refusée', 2, 1, 'fichier2.pdf'),
(3, 'Réclamation sur un produit', 'J\'ai reçu un produit endommagé et je demande un remplacement.', '2023-06-18 21:46:09', 'En cours', 3, 1, 'fichier3.pdf'),
(4, 'Problème de facturation', 'Je constate une erreur dans ma facture mensuelle.', '2023-06-18 21:46:09', 'Acceptée', 4, 2, 'fichier4.pdf'),
(5, 'Demande d\'information', 'J\'aimerais obtenir des informations supplémentaires sur les services proposés.', '2023-06-18 21:46:09', 'En cours', 5, 1, 'fichier5.pdf'),
(6, 'Réclamation sur un paiement', 'J\'ai effectué un paiement mais celui-ci n\'a pas été pris en compte.', '2023-06-18 21:46:09', 'Acceptée', 6, 2, 'fichier6.pdf'),
(7, 'Problème de livraison', 'Je n\'ai pas encore reçu ma commande malgré le délai indiqué.', '2023-06-18 21:46:09', 'En cours', 7, 1, 'fichier7.pdf'),
(8, 'Demande de modification', 'Je souhaite apporter des modifications à mon compte utilisateur.', '2023-06-18 21:46:09', 'Refusée', 8, 2, 'fichier8.pdf'),
(9, 'Réclamation sur un service client', 'Je suis insatisfait du service client que j\'ai reçu.', '2023-06-18 21:46:09', 'En cours', 9, 1, 'fichier9.pdf'),
(10, 'Demande de résiliation', 'Je souhaite résilier mon contrat avec la banque.', '2023-06-18 21:46:09', 'Refusée', 10, 2, 'fichier10.pdf'),
(11, 'Problème de sécurité', 'J\'ai remarqué une activité suspecte sur mon compte.', '2023-06-18 21:46:09', 'En cours', 11, 1, 'fichier11.pdf'),
(12, 'Demande de prêt', 'J\'aimerais obtenir des informations sur les conditions d\'obtention d\'un prêt.', '2023-06-18 21:46:09', 'Acceptée', 12, 2, 'fichier12.pdf'),
(13, 'Réclamation sur des frais', 'Je conteste certains frais qui ont été prélevés sur mon compte.', '2023-06-18 21:46:09', 'En cours', 13, 1, 'fichier13.pdf'),
(14, 'Demande d\'assistance', 'J\'ai besoin d\'une assistance technique pour utiliser l\'application mobile.', '2023-06-18 21:46:09', 'En cours', 14, 2, 'fichier14.pdf'),
(15, 'Problème de carte bancaire', 'Ma carte bancaire ne fonctionne plus.', '2023-06-18 21:46:09', 'En cours', 15, 1, 'fichier15.pdf'),
(16, 'Demande de changement de limite', 'Je souhaite augmenter ma limite de retrait.', '2023-06-18 21:46:09', 'En cours', 16, 2, 'fichier16.pdf'),
(17, 'Réclamation sur un virement', 'Un virement que j\'ai effectué n\'a pas été reçu par le bénéficiaire.', '2023-06-18 21:46:09', 'En cours', 17, 1, 'fichier17.pdf'),
(18, 'Demande de relevé de compte', 'J\'ai besoin d\'un relevé de compte pour mes démarches administratives.', '2023-06-18 21:46:09', 'En cours', 18, 2, 'fichier18.pdf'),
(20, 'Demande de changement de mot de passe', 'Je souhaite changer mon mot de passe pour des raisons de sécurité.', '2023-06-18 21:46:09', 'Refusée', 20, 2, 'fichier20.pdf'),
(21, 'Réclamation sur un virement', '<p><span style=\"color: #1f1f1f; font-family: Manrope, sans-serif; font-size: 16px; background-color: #ffffff;\">Un virement que j\'ai effectu&eacute; n\'a pas &eacute;t&eacute; re&ccedil;u par le b&eacute;n&eacute;ficiaire.</span></p>', '2023-07-05 00:34:05', 'En cours', 23, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `regle`
--

DROP TABLE IF EXISTS `regle`;
CREATE TABLE `regle` (
  `idEntreprise` int NOT NULL,
  `idRubrique` int NOT NULL,
  `formule` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `regle`
--

INSERT INTO `regle` (`idEntreprise`, `idRubrique`, `formule`) VALUES
(1, 2, '(SB/26)*NbHS*(taux+1)'),
(1, 3, '(SB+HS)*taux'),
(1, 5, 'SBI*0.0448'),
(1, 6, 'SBI*0.0226'),
(1, 7, 'SBI*0.06'),
(1, 9, 'SB+HS+PA+PRIMES'),
(1, 11, 'SBI-CNSS-AMO-CIMR-IGR'),
(1, 15, 'SBG-CNSS-AMO-CIMR-IGR-IRN-Avance'),
(1, 16, 'SBG-AllocationF');

-- --------------------------------------------------------

--
-- Table structure for table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE `rubrique` (
  `idRubrique` int NOT NULL,
  `nomRubrique` varchar(60) NOT NULL,
  `shortName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rubrique`
--

INSERT INTO `rubrique` (`idRubrique`, `nomRubrique`, `shortName`) VALUES
(1, 'Salaire de base', 'SB'),
(2, 'Heures supplémentaire', 'HS'),
(3, 'Prime d\'anciennte', 'PA'),
(4, 'Primes', 'PRIMES'),
(5, 'CNSS', 'CNSS'),
(6, 'AMO', 'AMO'),
(7, 'CIMR', 'CIMR'),
(8, 'IGR', 'IGR'),
(9, 'Salaire de Base Global', 'SBG'),
(10, 'Allocations familiale', 'Allocation'),
(11, 'Salaire Net Imposable', 'SNI'),
(12, 'Impot sur le Revenu Brut', 'IRB'),
(13, 'Impot sur le Revenu Net', 'IRN'),
(14, 'Charges familiale', 'ChargesF'),
(15, 'Salaire Net', 'SNet'),
(16, 'Salaire de Base Imposable', 'SBI');

-- --------------------------------------------------------

--
-- Structure for view `heuressuppview`
--
DROP TABLE IF EXISTS `heuressuppview`;

DROP VIEW IF EXISTS `heuressuppview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `heuressuppview`  AS SELECT `heuressupp`.`idEmploye` AS `idEmploye`, sum(`heuressupp`.`nbHs`) AS `nbHs`, month(`heuressupp`.`dateTravail`) AS `mois`, (case when ((cast(`heuressupp`.`dateTravail` as date) in (select `joursferier`.`date` from `joursferier`) or (weekday(`heuressupp`.`dateTravail`) in (6,7))) and (21 <= hour(`heuressupp`.`dateTravail`)) and (hour(`heuressupp`.`dateTravail`) < 6)) then 2 when (cast(`heuressupp`.`dateTravail` as date) in (select `joursferier`.`date` from `joursferier`) or (weekday(`heuressupp`.`dateTravail`) in (6,7)) or ((21 <= hour(`heuressupp`.`dateTravail`)) and (hour(`heuressupp`.`dateTravail`) < 6))) then 1.5 else 1.25 end) AS `taux` FROM `heuressupp` GROUP BY `heuressupp`.`idEmploye`, `mois`, `taux` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`idAbsence`),
  ADD KEY `fk_absence_employe` (`idEmploye`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `avance`
--
ALTER TABLE `avance`
  ADD PRIMARY KEY (`idAvance`);

--
-- Indexes for table `binificier`
--
ALTER TABLE `binificier`
  ADD PRIMARY KEY (`idEmploye`,`idPrime`);

--
-- Indexes for table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`idBulletin`),
  ADD KEY `fk_bulletins_employe` (`idEmploye`);

--
-- Indexes for table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`idConge`),
  ADD KEY `fk_conge_employe` (`idEmploye`);

--
-- Indexes for table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`numContrat`),
  ADD KEY `fk_contrat_employe` (`idEmploye`),
  ADD KEY `fk_contrat_entreprise` (`idEntreprise`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_employe_employe` (`createdBy`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`),
  ADD KEY `fk_entreprise_employe` (`createdBy`);

--
-- Indexes for table `heuressupp`
--
ALTER TABLE `heuressupp`
  ADD PRIMARY KEY (`idHeuresSupp`),
  ADD KEY `fk_heuressupp_employe` (`idEmploye`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `prime`
--
ALTER TABLE `prime`
  ADD PRIMARY KEY (`idPrime`);

--
-- Indexes for table `primepersonalise`
--
ALTER TABLE `primepersonalise`
  ADD PRIMARY KEY (`idPrimeP`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`idReclamation`),
  ADD KEY `fk_reclamation_employe` (`idEmploye`),
  ADD KEY `fk_reclamation_responsable` (`responsable`);

--
-- Indexes for table `regle`
--
ALTER TABLE `regle`
  ADD PRIMARY KEY (`idEntreprise`,`idRubrique`);

--
-- Indexes for table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`idRubrique`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `idAbsence` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avance`
--
ALTER TABLE `avance`
  MODIFY `idAvance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `idBulletin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `conge`
--
ALTER TABLE `conge`
  MODIFY `idConge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `numContrat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `idEmploye` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `heuressupp`
--
ALTER TABLE `heuressupp`
  MODIFY `idHeuresSupp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prime`
--
ALTER TABLE `prime`
  MODIFY `idPrime` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `primepersonalise`
--
ALTER TABLE `primepersonalise`
  MODIFY `idPrimeP` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `idReclamation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rubrique`
--
ALTER TABLE `rubrique`
  MODIFY `idRubrique` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `fk_absence_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bulletins`
--
ALTER TABLE `bulletins`
  ADD CONSTRAINT `fk_bulletins_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `fk_conge_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `fk_contrat_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contrat_entreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `fk_employe_employe` FOREIGN KEY (`createdBy`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `fk_entreprise_employe` FOREIGN KEY (`createdBy`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `heuressupp`
--
ALTER TABLE `heuressupp`
  ADD CONSTRAINT `fk_heuressupp_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_reclamation_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reclamation_responsable` FOREIGN KEY (`responsable`) REFERENCES `employe` (`idEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
