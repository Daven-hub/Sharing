-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 fév. 2021 à 19:13
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données : `booksharing`
--
DROP DATABASE IF EXISTS booksharing ;
CREATE DATABASE IF NOT EXISTS `booksharing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booksharing`;

-- --------------------------------------------------------

--
-- Structure de la table `ajout_livre`
--

CREATE TABLE `ajout_livre` (
  `ISBN` varchar(100) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `DATEAJOUT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CAT` int(11) NOT NULL,
  `NOM_CAT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_CAT`, `NOM_CAT`) VALUES
(1, 'Business'),
(2, 'Histoire'),
(3, 'Religion'),
(4, 'Sport'),
(5, 'Informatique'),
(6, 'Science'),
(7, 'Santé'),
(8, 'Crime'),
(9, 'Adulte'),
(10, 'Romance'),
(11, 'Développement Personnel'),
(12, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_CMD` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `DATE_CMD` date DEFAULT NULL,
  `ADRESS_LIV` varchar(100) DEFAULT NULL,
  `OPTION_CMD` enum('Achat','Location') DEFAULT NULL,
  `DATE_LIV` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ID_CMD`, `ID_USER`, `DATE_CMD`, `ADRESS_LIV`, `OPTION_CMD`, `DATE_LIV`) VALUES
(3, 2, '0000-00-00', 'Bonaberie', 'Achat', '0000-00-00'),
(4, 2, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(5, 2, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04');

-- --------------------------------------------------------

--
-- Structure de la table `commande_livre`
--

CREATE TABLE `commande_livre` (
  `ID_CMD` int(11) DEFAULT NULL,
  `ISBN` varchar(100) DEFAULT NULL,
  `QTE_CMD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_livre`
--



-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `ISBN` varchar(100) NOT NULL,
  `ID_CAT` int(11) DEFAULT NULL,
  `TITRE` varchar(100) NOT NULL,
  `NOM_AUTEUR` varchar(100) DEFAULT NULL,
  `NOM_EDITION` varchar(100) DEFAULT NULL,
  `DATE_PARITION` date DEFAULT NULL,
  `PRIX` int(11) DEFAULT NULL,
  `LANGUE` varchar(100) DEFAULT NULL,
  `IMAGE1` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 DEFAULT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`ISBN`, `ID_CAT`, `TITRE`, `NOM_AUTEUR`, `NOM_EDITION`, `DATE_PARITION`, `PRIX`, `LANGUE`, `IMAGE1`, `DESCRIPTION`, `ID_USER`) VALUES
('1231234567568', 11, 'La chèvre de ma mère', 'Ricardo Kaniama', 'Tsafack', '2015-01-01', 4555, 'Français', 'la-chèvre-de-ma-mère.jpeg', 'La chevre de la lere dh hdfkjhdkjfh qsdfjdhfldjqkh fldhjhf EIFkjdhfjbd lDJFHKD', 3),
('3545677655676', 11, 'Sandra ', 'Maxime Tsafack', 'Maxime Tsafack', '2021-03-28', 5432, 'Français', 'diagramme.jpg', 'YRE7R765787B866 6R86TI', 3),
('3545677655678', 11, 'Sandra la Folle', 'Maxime Tsafack', 'Maxime Tsafack', '2021-03-28', 5432, 'Français', 'innovation.jpg', 'YRE7R765787B866 6R86TI', 3);

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `ID_USER` int(11) DEFAULT NULL,
  `UTI_ID_USER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_USER` int(11) NOT NULL,
  `NOM_PRENOM` varchar(100) DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `REGION` varchar(100) DEFAULT NULL,
  `VILLE` varchar(100) DEFAULT NULL,
  `WHATSAPP` int(11) DEFAULT NULL,
  `FACEBOOK` varchar(100) DEFAULT NULL,
  `PROFESSION` varchar(50) NOT NULL,
  `MDP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_USER`, `NOM_PRENOM`, `TEL`, `EMAIL`, `REGION`, `VILLE`, `WHATSAPP`, `FACEBOOK`, `PROFESSION`, `MDP`) VALUES
(2, 'Maxime Tsafack', 695432799, 'maxime.tsafack@gmail.com', 'Cameroun', 'Douala', 695432799, 'Maxime Tsafack', 'maxime.tsafack@gmail.com', '4e23c5e2b899b4fb7f7a834319dd9c5aaa5a2589ccaced704ac6852948943d0b'),
(3, 'Maxime Tsafack', 695432799, 'max@gmail.com', 'Cameroun', 'Douala', 123456, 'Maxime Tsafack', 'maxime.tsafack@gmail.com', '4e23c5e2b899b4fb7f7a834319dd9c5aaa5a2589ccaced704ac6852948943d0b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajout_livre`
--
ALTER TABLE `ajout_livre`
  ADD KEY `FK_EFFECTUE` (`ID_USER`),
  ADD KEY `FK_EFFECTUE2` (`ISBN`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_CAT`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_CMD`),
  ADD KEY `FK_PASSER` (`ID_USER`);

--
-- Index pour la table `commande_livre`
--
ALTER TABLE `commande_livre`
  ADD KEY `FK_EST_CONTENUE` (`ISBN`),
  ADD KEY `FK_EST_CONTENUE2` (`ID_CMD`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `FK_EST_INCLU` (`ID_CAT`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD KEY `FK_APPARTIEN` (`UTI_ID_USER`),
  ADD KEY `FK_APPARTIEN2` (`ID_USER`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_CMD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajout_livre`
--
ALTER TABLE `ajout_livre`
  ADD CONSTRAINT `FK_EFFECTUE` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateurs` (`ID_USER`),
  ADD CONSTRAINT `FK_EFFECTUE2` FOREIGN KEY (`ISBN`) REFERENCES `livre` (`ISBN`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_PASSER` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateurs` (`ID_USER`);

--
-- Contraintes pour la table `commande_livre`
--
ALTER TABLE `commande_livre`
  ADD CONSTRAINT `FK_EST_CONTENUE` FOREIGN KEY (`ISBN`) REFERENCES `livre` (`ISBN`),
  ADD CONSTRAINT `FK_EST_CONTENUE2` FOREIGN KEY (`ID_CMD`) REFERENCES `commande` (`ID_CMD`),
  ADD CONSTRAINT PK_LIVRE_COMMANDE PRIMARY KEY(ISBN,ID_CMD);
--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_EST_INCLU` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`);

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `FK_APPARTIEN` FOREIGN KEY (`UTI_ID_USER`) REFERENCES `utilisateurs` (`ID_USER`),
  ADD CONSTRAINT `FK_APPARTIEN2` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateurs` (`ID_USER`);
COMMIT;
