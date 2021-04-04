-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 29 mars 2021 à 20:03
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `booksharing`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--
DROP DATABASE IF EXISTS booksharing;

CREATE DATABASE booksharing;

USE booksharing;

CREATE TABLE `administrateurs` (
  `ID_ADMIN` int(11) NOT NULL,
  `ADMIN_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TEL` int(11) NOT NULL,
  `VILLE` varchar(100) NOT NULL,
  `PROFIL` varchar(100) NOT NULL,
  `MDP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`ID_ADMIN`, `ADMIN_NAME`, `EMAIL`, `TEL`, `VILLE`, `PROFIL`, `MDP`) VALUES
(1, 'Maxime Tsafack', 'maxime.tsafack@gmail.com', 695432799, 'Douala', 'photo.jpg', 'Booksharing');

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
(6, 'Roman'),
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
(5, 2, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(6, 2, '0000-00-00', 'DOUALA', 'Achat', '2021-03-28'),
(7, 2, '0000-00-00', 'Yabassi', 'Achat', '2021-03-27'),
(8, 2, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(9, 5, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(10, 5, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(11, 5, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(12, 5, '0000-00-00', 'DOUALA', 'Achat', '2021-03-18'),
(13, 10, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04'),
(14, 5, '2021-04-04', 'Bonaberie', 'Achat', '2021-04-04');

-- --------------------------------------------------------

--
-- Structure de la table `commande_livre`
--

CREATE TABLE `commande_livre` (
  `ID_CMD` int(11) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `QTE_CMD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_livre`
--

INSERT INTO `commande_livre` (`ID_CMD`, `ISBN`, `QTE_CMD`) VALUES
(8, '1236547899874', 1),
(9, '1236547899874', 1),
(14, '1729635891012', 1),
(7, '3545677655676', 1),
(11, '3545677655676', 1),
(13, '5896452587963', 1),
(14, '5896452587963', 1);

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
  `DESCRIPTION` text DEFAULT NULL,
  `ID_USER` int(11) NOT NULL,
  `DATE_AJOUT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`ISBN`, `ID_CAT`, `TITRE`, `NOM_AUTEUR`, `NOM_EDITION`, `DATE_PARITION`, `PRIX`, `LANGUE`, `IMAGE1`, `DESCRIPTION`, `ID_USER`, `DATE_AJOUT`) VALUES
('1118791258746', 12, 'Petit Jo', 'Evelyne Ngolé', 'Edicef', '2009-06-23', 3000, 'Français', 'petitjo.jpg', 'Petit Jo est un livre qui retrace le vecu d\'un enfant de rue miserable', 2, '2021-03-02 14:12:12'),
('1231234567568', 11, 'La chèvre d.m.m', 'Ricardo Kaniama', 'Tsafack', '2015-01-01', 4555, 'Français', 'la-chèvre-de-ma-mère.jpeg', 'La chevre de la lere dh hdfkjhdkjfh qsdfjdhfldjqkh fldhjhf EIFkjdhfjbd lDJFHKD', 3, '0000-00-00 00:00:00'),
('1236547899874', 2, 'Bimane', 'Sévérin Abéga', 'NewHome', '2015-03-05', 1500, 'Français', 'bimane.jpg', 'Les bimanes est un livre écrit par le célebre auteur Céverin Cécile Abéga', 2, '0000-00-00 00:00:00'),
('1729635891012', 2, 'Balafon', 'angelbert Mveng', 'Django', '2021-03-02', 3000, 'Français', 'balafon.jpg', 'balafon est un recis de poeme ecrit par engelbert mveng', 10, '2021-03-27 19:00:21'),
('3545677655676', 11, 'UML', 'Maxime Tsafack', 'Maxime Tsafack', '2021-03-28', 5432, 'Français', 'diagramme.jpg', 'YRE7R765787B866 6R86TI', 3, '2021-02-09 15:20:09'),
('3545677655678', 11, 'Une Pensée Illusoire', 'Maxime Tsafack', 'Maxime Tsafack', '2021-03-28', 5432, 'Français', 'innovation.jpg', 'YRE7R765787B866 6R86TI', 3, '0000-00-00 00:00:00'),
('5896452587963', 6, 'abega', 'Django', 'Django', '2021-03-11', 15400, 'Français', '136929888_3601076463346230_8679640097944383560_o.jpg', 'fthf ufuykf uytilgyuyfvyuigyfkuf yfuifjhv uyyygygklhb ', 2, '0000-00-00 00:00:00'),
('7894563514785', 7, 'USBS', 'André Brink', 'Ngako', '1885-05-04', 2597, 'Français', 'USBS.jpg', 'André Brink dans Une Saison Blanche te Sèche se fait porte parole d\'une masse noire opprimé sous les jougs de l\'appartheid et de la traite negrière en Afrique du Sud', 2, '0000-00-00 00:00:00'),
('9782070129584', 6, 'Chaka', 'Thomas Mofolo', 'Gallimard', '1925-06-29', 7875, 'Français', 'chaka.jpg', 'Chef des Ifénilénjas, petite tribu du pays Cafre, Senza\'ngakona désespère de voir naître un héritier jusqu\'à ce que sa concubine Nandi le lui donne : Chaka est né. D\'autres garçons lui naissent de ses femmes et, sous la pression de celles-ci, Senza\'ngakona chasse Nandi et Chaka du territoire, mais il omet de prévenir son suzerain, Ding\'iswayo, de ce changement. Chaka grandit au milieu des brimades mais les médecines de la femme-féticheur y remédient en révélant son courage. Chaka se révèle pour son courage, tuant un lion, puis sauvant une jeune fille de la gueule d\'une hyène. Surtout, il reçoit dans la rivière, pendant ses ablutions, la visite du seigneur des eaux profondes, le serpent monstrueux qui lui prédit la gloire. Mais ses exploits attirent la jalousie des fils de Senza\'ngakona : Chaka s\'enfuit et rencontre Issanoussi, le féticheur et devin qui achève ses médecines et sa formation. Il promet à Chaka la gloire et le pouvoir, mais sa sagaie ne devra jamais cesser d\'être trempée de sang frais.\r\n\r\nAccompagné des deux envoyés d\'Issanoussi, Ndèlèbè l\'espion rusé et le fort et courageux Malounga, Chaka devient le lieutenant de Ding\'iswayo, le suzerain de la région. À la mort de Senza\'ngakona son père, Chaka lui succède ; puis lorsque Ding\'iswayo est tué par l\'ennemi Zwidé, Chaka le venge et devient roi d\'un peuple qu\'il nomme Zoulou (céleste). Ses armées partent à la conquête d\'un empire qui ne cesse de s\'étendre.\r\n\r\nMais le pacte passé avec Issanoussi ne cesse pas et Chaka accepte d\'aller toujours plus loin dans la violence pour étendre son pouvoir. Régnant par la terreur, massacrant ses opposants et ceux qui lui désobéissent, il tue également sa promise Noliwè dont Issanoussi réclame le sang pour ses médecines. Ses plus vaillants guerriers, Oum\'sélékatsi et Manoukoudza, l\'abandonnent, tandis que Chaka ne combat plus et laisse sa sagaie sécher. Le sang qu\'il verse n\'est plus d\'un autre peuple que le sien, Chaka tue ses propres enfants, et jusqu\'à sa mère Nandi. Sombrant dans la folie, gagné par des visions, il est assassiné par ses deux frères cadets, Di\'ngana et Mahla\'ngana, prédisant avant de rendre l\'âme leur défaite face à Oum\'loungou,de may ku l\'homme blanc..de may ku', 10, '2021-03-29 06:26:59'),
('9782266169288', 6, 'Une vie de boy', 'Ferdinand Oyono', 'Julliard', '1956-05-29', 3250, 'Français', 'une_vie_de_boy.jpg', 'Un jeune Noir élevé par un Père Blanc a pris, à l\'instar de son maître, l\'habitude de tenir un journal. Dès lors, il enregistre tout ce qui se passe dans le milieu des colons où, à la mort du Père Blanc, il est devenu le &quot; boy &quot; de l\'administrateur des colonies, le &quot; commandant &quot; de l\'endroit. Rien ne lui échappe. Il découvre deux mondes nouveaux, foncièrement différents, aveuglés par leurs préjugés, et amenés à coexister : le Quartier Noir, un village pauvre dans la ville, la Résidence, une ville opulente où vivent les Blancs.', 10, '2021-03-29 06:06:30'),
('9782266178945', 6, 'Enfant Noir', 'Camara Laye', 'Plon', '1953-02-28', 2100, 'Français', 'lenfantnoir.jpg', 'L\'enfant noir grandit dans un village de Haute-Guinée où le merveilleux côtoie quotidiennement la réalité. Son père, forgeron, travaille l\'or au rythme de la harpe des griots et des incantations aux génies du feu et du vent. Respectée de tous, sa mère jouit de mystérieux pouvoirs sur les êtres et les choses. Elle sait détourner les sortilèges et tenir à l\'écart les crocodiles du fleuve Niger. Aîné de la famille, le petit garçon est destiné à prendre la relève de son père à l\'atelier et, surtout, à perpétuer l\'esprit de sa caste au sein du village. Mais son puissant désir d\'apprendre l\'entraînera inéluctablement vers d\'autres horizons, loin des traditions et des coutumes de son peuple.', 10, '2021-03-29 06:12:48');

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
(2, 'Maxime Tsafack', 695432799, 'maxime.@gmail.com', 'Camoun', 'Douala', 695432799, 'Maxime Tsafack', 'maxime.tsafack@gmail.com', 'cfc8451e2d9c357c14398fdc0c412ca62ac0cdff639fa763db85b218b1171619'),
(3, 'Maxime Tsafack', 695432799, 'max@gmail.com', 'Cameroun', 'Douala', 123456, 'Maxime Tsafack', 'maxime.tsafack@gmail.com', '4e23c5e2b899b4fb7f7a834319dd9c5aaa5a2589ccaced704ac6852948943d0b'),
(4, 'Erika', 697299758, 'erika.tchoundjeu@gmail.com', 'Afrique du Sud', 'Johanesbourg', 697299758, 'Erika', 'Software Engineer', '5570b8fffb53088e058bb8676e9ff407906055343b2aeb12877b68e971f2bedd'),
(5, 'David', 651075148, 'david.pouani@gmail.com', 'Afrique du Sud', 'Douala', 123456, 'Django', 'Software Engineer', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(6, 'admin', 0, 'admin.admin@gmail.com', 'admin', 'admin', 0, 'admin', 'admin', 'admin'),
(7, 'admin', 0, 'admin.admin@support.com', 'admin', 'admin', 0, 'admin', 'admin', 'admin'),
(8, 'admin', 0, 'admin@adminsupport.com', 'admin', 'admin', 0, 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(9, 'Franklin', 695432799, 'franklin.franklin@gmail.com', 'Cameroun', 'Douala', 0, 'Django', 'Software Engineer', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(10, 'Cedric Tiako', 698756145, 'tiako1998@gmail.com', 'ouest', 'douala', 698756145, 'cedric tiako', 'analyste programmeur', 'd2342146c3016935e213b32098022b5fac1f1e88649e50d2e558c436590c1549');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`ID_ADMIN`);

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
  ADD PRIMARY KEY (`ISBN`,`ID_CMD`),
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
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_CMD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajout_livre`
--
ALTER TABLE `ajout_livre`
  ADD CONSTRAINT `FK_EFFECTUE` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateurs` (`ID_USER`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EFFECTUE2` FOREIGN KEY (`ISBN`) REFERENCES `livre` (`ISBN`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_PASSER` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateurs` (`ID_USER`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commande_livre`
--
ALTER TABLE `commande_livre`
  ADD CONSTRAINT `FK_EST_CONTENUE` FOREIGN KEY (`ISBN`) REFERENCES `livre` (`ISBN`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EST_CONTENUE2` FOREIGN KEY (`ID_CMD`) REFERENCES `commande` (`ID_CMD`) ON DELETE CASCADE;

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_EST_INCLU` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`) ON DELETE CASCADE;

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `FK_APPARTIEN` FOREIGN KEY (`UTI_ID_USER`) REFERENCES `utilisateurs` (`ID_USER`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_APPARTIEN2` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateurs` (`ID_USER`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
