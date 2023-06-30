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
-- INSERT EMPLOYE DATA
INSERT INTO employe VALUES ('','ZAHIR','Ismail','UA123848','Homme','2001-4-17','Sat','Tinejdad','ismailza407@gmail.com','0635791476','IMG_20210102_203408_124.jpg',
                            'Célibataire',0,'LST Génie Logiciel','765462475852744642','765462475852744642','765462475852744642','765462475852744642','$2y$10$jeklm0LK/o4njHFqauWIQO4a4kDK5dTao3o78/NyqZpa4gp0zue8K',CURRENT_TIMESTAMP,NULL);
INSERT INTO employe VALUES ('','AFRIAD','Abdelaziz','AA65467','Homme','2002-5-27','Casablanca','Casablanca','afriadabdlaziz@gmail.com','0634526154','Abdelaziz.png',
                            'Célibataire',0,'DEUST','76546365852744642','765462762544642','7657537452744642','7654628527744642','$2y$10$jeklm0LK/o4njHFqauWIQO4a4kDK5dTao3o78/NyqZpa4gp0zue8K',CURRENT_TIMESTAMP,NULL);
INSERT INTO employe VALUES ('', 'ZADDI', 'Abdelmajid', 'JC604373', 'Homme', '2002-06-22', 'Taroudant', 'Afourar', 'lhssenzaddi@gmail.com', '0634707974', 'WhatsApp Image 2023-06-14 at 12.44.48.jpg', 'Célibataire', 0, 'DEUST', '123456783778764687', '737576789273858', 'R637682685735768', '8638685Y35683685', '$2y$10$ha/4OcIlXOQGzzhnqZi24ev67kaqfy3E0Jw2SA/2cRKIIsiANqU4e', CURRENT_TIMESTAMP, 1);
INSERT INTO employe (nom, prenom, cin, sexe, dateNaiss, adresse, ville, email, phone, image, situationF, nbEnfants, diplome, numCNSS, numAMO, numCIMR, numIGR, password, createdBy)
VALUES
  ('Smith', 'John', '1234567891', 'Homme', '1990-01-01', '123 Main St', 'City', 'john.smith@example.com', '1234567890', 'avatar1.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901231', '123456789012345678901231', NULL, '123456789012345678901231', 'mypassword1', 1),
  ('Johnson', 'Emma', '1234567892', 'Femme', '1992-03-15', '456 Elm St', 'City', 'emma.johnson@example.com', '1234567891', 'avatar2.jpg', 'Célibataire', 0, 'Master', '123456789012345678901232', '123456789012345678901232', NULL, '123456789012345678901232', 'mypassword2', 2),
  ('Anderson', 'Michael', '1234567893', 'Homme', '1985-07-12', '789 Oak St', 'City', 'michael.anderson@example.com', '1234567892', 'avatar3.jpg', 'Marié', 2, 'PhD', '123456789012345678901233', '123456789012345678901233', NULL, '123456789012345678901233', 'mypassword3', 3),
  ('Martinez', 'Sophia', '1234567894', 'Femme', '1994-05-20', '234 Maple St', 'City', 'sophia.martinez@example.com', '1234567893', 'avatar4.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901234', '123456789012345678901234', NULL, '123456789012345678901234', 'mypassword4', 4),
  ('Brown', 'Oliver', '1234567895', 'Homme', '1991-09-08', '567 Pine St', 'City', 'oliver.brown@example.com', '1234567894', 'avatar5.jpg', 'Marié', 1, 'Master', '123456789012345678901235', '123456789012345678901235', NULL, '123456789012345678901235', 'mypassword5', 5),
  ('Garcia', 'Ava', '1234567896', 'Femme', '1988-12-30', '890 Cedar St', 'City', 'ava.garcia@example.com', '1234567895', 'avatar6.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901236', '123456789012345678901236', NULL, '123456789012345678901236', 'mypassword6', 1),
  ('Lee', 'Noah', '1234567897', 'Homme', '1993-02-17', '123 Main St', 'City', 'noah.lee@example.com', '1234567896', 'avatar7.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901237', '123456789012345678901237', NULL, '123456789012345678901237', 'mypassword7', 2),
  ('Lopez', 'Mia', '1234567898', 'Femme', '1990-06-25', '456 Elm St', 'City', 'mia.lopez@example.com', '1234567897', 'avatar8.jpg', 'Marié', 2, 'Master', '123456789012345678901238', '123456789012345678901238', NULL, '123456789012345678901238', 'mypassword8', 3),
  ('Harris', 'Liam', '1234567899', 'Homme', '1995-11-11', '789 Oak St', 'City', 'liam.harris@example.com', '1234567898', 'avatar9.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901239', '123456789012345678901239', NULL, '123456789012345678901239', 'mypassword9', 4),
  ('Clark', 'Isabella', '1234567800', 'Femme', '1992-08-05', '234 Maple St', 'City', 'isabella.clark@example.com', '1234567899', 'avatar10.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901230', '123456789012345678901230', NULL, '123456789012345678901230', 'mypassword10', 5),
  ('Lewis', 'Ethan', '1234567801', 'Homme', '1987-04-04', '567 Pine St', 'City', 'ethan.lewis@example.com', '1234567800', 'avatar11.jpg', 'Marié', 1, 'Master', '123456789012345678901231', '123456789012345678901231', NULL, '123456789012345678901231', 'mypassword11', 1),
  ('Young', 'Sophie', '1234567802', 'Femme', '1993-10-10', '890 Cedar St', 'City', 'sophie.young@example.com', '1234567801', 'avatar12.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901232', '123456789012345678901232', NULL, '123456789012345678901232', 'mypassword12', 2),
  ('Walker', 'Jackson', '1234567803', 'Homme', '1989-07-07', '123 Main St', 'City', 'jackson.walker@example.com', '1234567802', 'avatar13.jpg', 'Marié', 2, 'PhD', '123456789012345678901233', '123456789012345678901233', NULL, '123456789012345678901233', 'mypassword13', 3),
  ('Hall', 'Amelia', '1234567804', 'Femme', '1996-12-20', '456 Elm St', 'City', 'amelia.hall@example.com', '1234567803', 'avatar14.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901234', '123456789012345678901234', NULL, '123456789012345678901234', 'mypassword14', 4),
  ('Allen', 'Lucas', '1234567805', 'Homme', '1991-02-28', '789 Oak St', 'City', 'lucas.allen@example.com', '1234567804', 'avatar15.jpg', 'Marié', 1, 'Master', '123456789012345678901235', '123456789012345678901235', NULL, '123456789012345678901235', 'mypassword15', 5),
  ('Gonzalez', 'Evelyn', '1234567806', 'Femme', '1988-09-09', '234 Maple St', 'City', 'evelyn.gonzalez@example.com', '1234567805', 'avatar16.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901236', '123456789012345678901236', NULL, '123456789012345678901236', 'mypassword16', 1),
  ('King', 'Aiden', '1234567807', 'Homme', '1994-03-04', '567 Pine St', 'City', 'aiden.king@example.com', '1234567806', 'avatar17.jpg', 'Marié', 2, 'Master', '123456789012345678901237', '123456789012345678901237', NULL, '123456789012345678901237', 'mypassword17', 2),
  ('Wright', 'Abigail', '1234567808', 'Femme', '1990-05-12', '890 Cedar St', 'City', 'abigail.wright@example.com', '1234567807', 'avatar18.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901238', '123456789012345678901238', NULL, '123456789012345678901238', 'mypassword18', 3),
  ('Scott', 'James', '1234567809', 'Homme', '1995-08-25', '123 Main St', 'City', 'james.scott@example.com', '1234567808', 'avatar19.jpg', 'Marié', 1, 'Bachelor', '123456789012345678901239', '123456789012345678901239', NULL, '123456789012345678901239', 'mypassword19', 4),
  ('Green', 'Emily', '1234567810', 'Femme', '1992-11-16', '456 Elm St', 'City', 'emily.green@example.com', '1234567809', 'avatar20.jpg', 'Célibataire', 0, 'Bachelor', '123456789012345678901230', '123456789012345678901230', NULL, '123456789012345678901230', 'mypassword20', 5);


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

-- INSERT CONTRAT DATA
INSERT INTO contrat VALUES ('',1,1,'CDI','Responsable Ressources Humaines',30000,'',NULL,NULL);
INSERT INTO contrat VALUES ('',2,1,'CDI','Responsable Paie',30000,'',NULL,NULL);
INSERT INTO contrat VALUES ('',23, 1, 'CDI', 'Chef de projet', 25000, '', NULL, NULL);
INSERT INTO contrat (idEmploye, idEntreprise, type, poste, salaireBase, dateEmbauche, dateFin, motif)
VALUES
  (3, 2, 'CDI', 'Financial Analyst', 5500.00, '2020-05-01', NULL, NULL),
  (4, 2, 'CDD', 'HR Coordinator', 4500.00, '2021-03-15', '2022-03-15', 'Maternity leave replacement'),
  (5, 3, 'CDI', 'Project Manager', 6000.00, '2022-09-01', NULL, NULL),
  (6, 3, 'CDD', 'Sales Representative', 3800.00, '2023-01-01', '2023-06-30', 'Seasonal position'),
  (7, 4, 'CDI', 'Graphic Designer', 4800.00, '2019-12-01', NULL, NULL),
  (8, 4, 'CDD', 'Customer Service Representative', 3500.00, '2020-10-01', '2021-10-01', 'Temporary contract'),
  (9, 5, 'CDI', 'IT Manager', 6500.00, '2022-04-01', NULL, NULL),
  (10, 5, 'CDD', 'Administrative Assistant', 3200.00, '2023-02-01', '2023-06-30', 'Seasonal position'),
  (11, 1, 'CDI', 'Software Engineer', 5000.00, '2021-01-01', NULL, NULL),
  (12, 1, 'CDD', 'Marketing Specialist', 4000.00, '2022-02-01', '2023-02-01', 'End of project'),
  (13, 2, 'CDI', 'Financial Analyst', 5500.00, '2020-05-01', NULL, NULL),
  (14, 2, 'CDD', 'HR Coordinator', 4500.00, '2021-03-15', '2022-03-15', 'Maternity leave replacement'),
  (15, 3, 'CDI', 'Project Manager', 6000.00, '2022-09-01', NULL, NULL),
  (16, 3, 'CDD', 'Sales Representative', 3800.00, '2023-01-01', '2023-06-30', 'Seasonal position'),
  (17, 4, 'CDI', 'Graphic Designer', 4800.00, '2019-12-01', NULL, NULL),
  (18, 4, 'CDD', 'Customer Service Representative', 3500.00, '2020-10-01', '2021-10-01', 'Temporary contract'),
  (19, 5, 'CDI', 'IT Manager', 6500.00, '2022-04-01', NULL, NULL),
  (20, 5, 'CDD', 'Administrative Assistant', 3200.00, '2023-02-01', '2023-06-30', 'Seasonal position'),
  (21, 1, 'CDI', 'Software Engineer', 5000.00, '2021-01-01', NULL, NULL),
  (22, 1, 'CDD', 'Marketing Specialist', 4000.00, '2022-02-01', '2023-02-01', 'End of project');


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
-- INSERT ENTREPRISE DATA
INSERT INTO entreprise VALUES ('','JIEA','222, Riad Salam','Mohammedia','JI2A Entreprise ....','',1);
INSERT INTO entreprise (nomEntreprise, adresse, ville, descriptif, createdBy)
VALUES
('Société ABC', 'Rue Mohamed V', 'Casablanca', 'Une entreprise spécialisée dans les services informatiques.', 1),
('Société XYZ', 'Avenue Hassan II', 'Rabat', 'Une entreprise de construction et de génie civil.', 1),
('Société DEF', 'Boulevard Mohammed VI', 'Marrakech', 'Un restaurant renommé proposant une cuisine marocaine traditionnelle.', 1),
('Société GHI', 'Rue Mohammed I', 'Fès', 'Un fabricant de produits électroniques grand public.', 1),
('Société JKL', 'Avenue Mohammed VI', 'Tanger', 'Un opérateur télécom offrant des services de téléphonie mobile et d\'internet.', 1),
('Société MNO', 'Rue Hassan II', 'Agadir', 'Un hôtel de luxe avec vue sur la mer.', 1),
('Société PQR', 'Boulevard Mohammed V', 'Meknès', 'Un supermarché proposant une large gamme de produits alimentaires et non alimentaires.', 1),
('Société STU', 'Avenue Mohammed V', 'Oujda', 'Une entreprise de transport proposant des services de logistique et de livraison.', 1),
('Société VWX', 'Rue Mohammed VI', 'Témara', 'Un fabricant de meubles haut de gamme.', 1),
('Société YZA', 'Boulevard Mohammed III', 'Essaouira', 'Une agence de voyages spécialisée dans les circuits touristiques.', 1);

DROP TABLE IF EXISTS absence;
CREATE TABLE IF NOT EXISTS absence (
  idAbsence     INT(11) PRIMARY KEY AUTO_INCREMENT,
  dateAbsence   DATETIME NOT NULL,
  nbJours       INT(3) NOT NULL,
  justification TEXT,
  status        ENUM('En cours', 'Acceptée','Refusée') NOT NULL,
  idEmploye     INT (11) NOT NULL,
  pieceJoint    VARCHAR(120)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- INSERT ABSENCE DATA
INSERT INTO absence (dateAbsence, nbJours, justification, status, idEmploye, pieceJoint)
VALUES
('2023-06-02 00:00:00', 2, 'Rendez-vous médical', 'Acceptée', 2, 'fichier2.pdf'),
('2023-06-03 00:00:00', 1, 'Maladie', 'Acceptée', 3, 'fichier3.pdf'),
('2023-06-04 00:00:00', 2, 'Raison personnelle', 'Acceptée', 4, 'fichier4.pdf'),
('2023-06-05 00:00:00', 1, 'Congé annuel', 'Acceptée', 5, 'fichier5.pdf'),
('2023-06-06 00:00:00', 3, 'Raison personnelle', 'Acceptée', 6, 'fichier6.pdf'),
('2023-06-07 00:00:00', 1, 'Congé maladie', 'En cours', 7, 'fichier7.pdf'),
('2023-06-08 00:00:00', 1, 'Raison personnelle', 'En cours', 8, 'fichier8.pdf'),
('2023-06-09 00:00:00', 1, 'Congé annuel', 'En cours', 9, 'fichier9.pdf'),
('2023-06-10 00:00:00', 3, 'Raison personnelle', 'En cours', 10, 'fichier10.pdf'),
('2023-06-11 00:00:00', 1, 'Congé maladie', 'En cours', 1, 'fichier11.pdf'),
('2023-06-12 00:00:00', 5, 'Formation professionnelle', 'En cours', 2, 'fichier12.pdf'),
('2023-06-13 00:00:00', 1, 'Congé annuel', 'En cours', 3, 'fichier13.pdf'),
('2023-06-14 00:00:00', 4, 'Raison personnelle', 'En cours', 4, 'fichier14.pdf'),
('2023-06-15 00:00:00', 1, 'Rendez-vous chez le dentiste', 'En cours', 5, 'fichier15.pdf'),
('2023-06-16 00:00:00', 2, 'Raison personnelle', 'En cours', 6, 'fichier16.pdf'),
('2023-06-17 00:00:00', 1, 'Congé annuel', 'En cours', 7, 'fichier17.pdf'),
('2023-06-18 00:00:00', 3, 'Raison personnelle', 'En cours', 8, 'fichier18.pdf'),
('2023-06-19 00:00:00', 2, 'Rendez-vous chez le médecin', 'En cours', 9, 'fichier19.pdf'),
('2023-06-20 00:00:00', 1, 'Raison personnelle', 'En cours', 10, 'fichier20.pdf');


DROP TABLE IF EXISTS avance;
CREATE TABLE IF NOT EXISTS avance (
  idAvance      INT(11) PRIMARY KEY AUTO_INCREMENT,
  status        ENUM('En cours','Refusé','Accepté') NOT NULL,
  dateDemande   DATETIME DEFAULT CURRENT_TIMESTAMP,
  avance        DECIMAL(7,2) NOT NULL,
  idEmploye     INT(11) NOT NULL
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
  status        ENUM('En cours', 'Acceptée','Refusée') NOT NULL,
  idEmploye     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- INSERT CONGE DATA
INSERT INTO conge (typeConge, dateDebut, dateFin, status, idEmploye)
VALUES
('Congé annuel', '2023-06-01', '2023-06-05', 'Acceptée', 1),
('Congé maladie', '2023-06-02', '2023-06-03', 'Acceptée', 2),
('Congé annuel', '2023-06-06', '2023-06-10', 'Acceptée', 3),
('Congé maladie', '2023-06-07', '2023-06-08', 'Acceptée', 4),
('Congé annuel', '2023-06-11', '2023-06-15', 'Acceptée', 5),
('Congé maladie', '2023-06-12', '2023-06-13', 'Acceptée', 6),
('Congé annuel', '2023-06-16', '2023-06-20', 'En cours', 7),
('Congé maladie', '2023-06-17', '2023-06-18', 'En cours', 8),
('Congé annuel', '2023-06-21', '2023-06-25', 'En cours', 9),
('Congé maladie', '2023-06-22', '2023-06-23', 'En cours', 10),
('Congé annuel', '2023-06-26', '2023-06-30', 'En cours', 1),
('Congé maladie', '2023-06-27', '2023-06-28', 'En cours', 2),
('Congé annuel', '2023-07-01', '2023-07-05', 'En cours', 3),
('Congé maladie', '2023-07-02', '2023-07-03', 'En cours', 4),
('Congé annuel', '2023-07-06', '2023-07-10', 'En cours', 5),
('Congé maladie', '2023-07-07', '2023-07-08', 'En cours', 6),
('Congé annuel', '2023-07-11', '2023-07-15', 'En cours', 7),
('Congé maladie', '2023-07-12', '2023-07-13', 'En cours', 8),
('Congé annuel', '2023-07-16', '2023-07-20', 'En cours', 9),
('Congé maladie', '2023-07-17', '2023-07-18', 'En cours', 10);


DROP TABLE IF EXISTS joursFerier;
CREATE TABLE IF NOT EXISTS joursFerier (
  date      DATE,
  motif     VARCHAR(60)
);

-- Jours fériés pour l'année 2023
INSERT INTO joursFerier VALUES
  ('2023-01-01', 'Nouvel An'),
  ('2023-05-01', 'Fête du Travail'),
  ('2023-05-14', 'Aid El Fitr'),
  ('2023-07-30', 'Fête du Trône'),
  ('2023-08-14', 'Oued Ed-Dahab Day'),
  ('2023-08-20', 'Révolution du Roi et du Peuple'),
  ('2023-11-06', 'Anniversaire de la Marche Verte'),
  ('2023-11-18', 'Fête de l\'Indépendance'),
  ('2023-11-29', 'Fête de la Jeunesse'),
  ('2023-12-01', 'Fête du Roi');

-- Jours fériés pour l'année 2024
INSERT INTO joursFerier  VALUES
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

DROP TABLE IF EXISTS heuressupp;
CREATE TABLE IF NOT EXISTS heuressupp (
  idHeuresSupp INT(11) PRIMARY KEY AUTO_INCREMENT,
  status        ENUM('En cours', 'Acceptée','Refusée') NOT NULL,
  dateTravail   DATETIME NOT NULL,
  nbHs          INT(4) NOT NULL,
  idEmploye     INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- INSERT HEURESSUPP DATA 
INSERT INTO heuressupp (status, dateTravail, nbHs, idEmploye)
VALUES
('En cours', '2023-06-01 09:00:00', 2, 1),
('Acceptée', '2023-06-02 14:30:00', 3, 2),
('En cours', '2023-06-03 10:15:00', 1, 3),
('Refusée', '2023-06-04 12:45:00', 4, 4),
('Acceptée', '2023-06-05 08:00:00', 2, 5),
('En cours', '2023-06-06 11:30:00', 3, 6),
('Acceptée', '2023-06-07 13:15:00', 2, 7),
('En cours', '2023-06-08 09:45:00', 1, 8),
('Acceptée', '2023-06-09 14:00:00', 5, 9),
('En cours', '2023-06-10 10:30:00', 2, 10),
('Acceptée', '2023-06-11 12:15:00', 3, 1),
('Refusée', '2023-06-12 11:30:00', 2, 2),
('Acceptée', '2023-06-13 09:45:00', 4, 3),
('En cours', '2023-06-14 08:30:00', 2, 4),
('Acceptée', '2023-06-15 13:00:00', 1, 5),
('En cours', '2023-06-16 10:45:00', 3, 6),
('Acceptée', '2023-06-17 14:30:00', 2, 7),
('En cours', '2023-06-18 09:00:00', 1, 8),
('Acceptée', '2023-06-19 13:15:00', 5, 9),
('En cours', '2023-06-20 10:30:00', 2, 10);



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
  status          ENUM('En cours','Acceptée','Refusée') NOT NULL,
  idEmploye       INT(11) NOT NULL,
  responsable     INT(11) NOT NULL,
  pieceJoint      VARCHAR(120)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT RECLAMATION DATA
INSERT INTO reclamation (sujet, contenu, dateReclamation, status, idEmploye, responsable, pieceJoint)
VALUES
('Problème de connexion', 'Je rencontre des difficultés pour me connecter à mon compte en ligne.', NOW(), 'En cours', 1, 1, 'fichier1.pdf'),
('Demande de remboursement', 'Je souhaite obtenir un remboursement pour une transaction erronée.', NOW(), 'En cours', 2, 2, 'fichier2.pdf'),
('Réclamation sur un produit', 'J\'ai reçu un produit endommagé et je demande un remplacement.', NOW(), 'En cours', 3, 1, 'fichier3.pdf'),
('Problème de facturation', 'Je constate une erreur dans ma facture mensuelle.', NOW(), 'En cours', 4, 2, 'fichier4.pdf'),
('Demande d\'information', 'J\'aimerais obtenir des informations supplémentaires sur les services proposés.', NOW(), 'En cours', 5, 1, 'fichier5.pdf'),
('Réclamation sur un paiement', 'J\'ai effectué un paiement mais celui-ci n\'a pas été pris en compte.', NOW(), 'En cours', 6, 2, 'fichier6.pdf'),
('Problème de livraison', 'Je n\'ai pas encore reçu ma commande malgré le délai indiqué.', NOW(), 'En cours', 7, 1, 'fichier7.pdf'),
('Demande de modification', 'Je souhaite apporter des modifications à mon compte utilisateur.', NOW(), 'En cours', 8, 2, 'fichier8.pdf'),
('Réclamation sur un service client', 'Je suis insatisfait du service client que j\'ai reçu.', NOW(), 'En cours', 9, 1, 'fichier9.pdf'),
('Demande de résiliation', 'Je souhaite résilier mon contrat avec la banque.', NOW(), 'En cours', 10, 2, 'fichier10.pdf'),
('Problème de sécurité', 'J\'ai remarqué une activité suspecte sur mon compte.', NOW(), 'En cours', 11, 1, 'fichier11.pdf'),
('Demande de prêt', 'J\'aimerais obtenir des informations sur les conditions d\'obtention d\'un prêt.', NOW(), 'En cours', 12, 2, 'fichier12.pdf'),
('Réclamation sur des frais', 'Je conteste certains frais qui ont été prélevés sur mon compte.', NOW(), 'En cours', 13, 1, 'fichier13.pdf'),
('Demande d\'assistance', 'J\'ai besoin d\'une assistance technique pour utiliser l\'application mobile.', NOW(), 'En cours', 14, 2, 'fichier14.pdf'),
('Problème de carte bancaire', 'Ma carte bancaire ne fonctionne plus.', NOW(), 'En cours', 15, 1, 'fichier15.pdf'),
('Demande de changement de limite', 'Je souhaite augmenter ma limite de retrait.', NOW(), 'En cours', 16, 2, 'fichier16.pdf'),
('Réclamation sur un virement', 'Un virement que j\'ai effectué n\'a pas été reçu par le bénéficiaire.', NOW(), 'En cours', 17, 1, 'fichier17.pdf'),
('Demande de relevé de compte', 'J\'ai besoin d\'un relevé de compte pour mes démarches administratives.', NOW(), 'En cours', 18, 2, 'fichier18.pdf'),
('Problème d\'authentification', 'Je n\'arrive pas à m\'authentifier avec mon identifiant et mon mot de passe.', NOW(), 'En cours', 19, 1, 'fichier19.pdf'),
('Demande de changement de mot de passe', 'Je souhaite changer mon mot de passe pour des raisons de sécurité.', NOW(), 'En cours', 20, 2, 'fichier20.pdf');

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
  nomRubrique     VARCHAR(60) NOT NULL,
  shortName       VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS bulletins;
CREATE TABLE IF NOT EXISTS bulletins (
  idBulletin  INT(11) PRIMARY KEY AUTO_INCREMENT,
  mois        INT(2) NOT NULL,
  bulletin    VARCHAR(120) NOT NULL,
  idEmploye   INT(11) NOT NULL,
  createdAt   DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- VIEWS
-- 
DROP VIEW IF EXISTS heuressuppView;
CREATE VIEW heuressuppView AS
SELECT idEmploye, SUM(nbHs) AS nbHs, MONTH(dateTravail) AS mois,
CASE 
  WHEN (CAST(dateTravail AS DATE) IN (SELECT date FROM joursFerier) OR WEEKDAY(dateTravail) IN (6, 7)) 
  AND (21 <= HOUR(dateTravail) AND HOUR(dateTravail) < 6) 
  THEN 2
  WHEN (CAST(dateTravail AS DATE) IN (SELECT date FROM joursFerier) OR WEEKDAY(dateTravail) IN (6, 7)) 
  OR (21 <= HOUR(dateTravail) AND HOUR(dateTravail) < 6) 
  THEN 1.5
  ELSE 1.25
END AS taux
FROM heuressupp
GROUP BY idEmploye, mois, taux;

-- FOREIN KEYS

ALTER TABLE employe     ADD CONSTRAINT fk_employe_employe           FOREIGN KEY (createdBy)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE entreprise  ADD CONSTRAINT fk_entreprise_employe        FOREIGN KEY (createdBy)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contrat     ADD CONSTRAINT fk_contrat_employe           FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE contrat     ADD CONSTRAINT fk_contrat_entreprise        FOREIGN KEY (idEntreprise)  REFERENCES entreprise (idEntreprise)  ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE reclamation ADD CONSTRAINT fk_reclamation_employe       FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE reclamation ADD CONSTRAINT fk_reclamation_responsable   FOREIGN KEY (responsable)   REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE heuressupp  ADD CONSTRAINT fk_heuressupp_employe        FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE absence     ADD CONSTRAINT fk_absence_employe           FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE conge       ADD CONSTRAINT fk_conge_employe             FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE bulletins   ADD CONSTRAINT fk_bulletins_employe         FOREIGN KEY (idEmploye)     REFERENCES employe (idEmploye)        ON DELETE CASCADE ON UPDATE CASCADE;