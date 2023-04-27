-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 13 Avril 2023 à 09:46
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `sombamutukadb`
--
CREATE DATABASE IF NOT EXISTS `sombamutukadb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sombamutukadb`;

-- --------------------------------------------------------

--
-- Structure de la table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `friends_relationships`
--

CREATE TABLE IF NOT EXISTS `friends_relationships` (
  `user_id1` int(11) NOT NULL DEFAULT '0',
  `user_id2` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1','2') DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id1`,`user_id2`),
  KEY `user_id2` (`user_id2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `friends_relationships`
--

INSERT INTO `friends_relationships` (`user_id1`, `user_id2`, `status`, `created_at`) VALUES
(273, 275, '1', '2023-02-25 08:54:29'),
(273, 285, '1', '2023-02-27 17:31:07'),
(276, 273, '1', '2023-02-27 15:56:21');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(255) NOT NULL AUTO_INCREMENT,
  `imagePost` varchar(255) DEFAULT NULL,
  `micropost_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`image_id`, `imagePost`, `micropost_id`, `user_id`) VALUES
(40, '001.jpg', '74', '273'),
(41, '1280px-Toyota_Ist_1st_generation_Rear.jpg', '74', '273'),
(42, '001.jpg', '74', NULL),
(44, '001.jpg', '74', NULL),
(45, '1280px-Toyota_Ist_1st_generation_Rear.jpg', '74', NULL),
(46, 'hjhjh.jpg', '74', NULL),
(47, 'toyota rav4.jpg', '74', NULL),
(48, 'Toyota-IST-DZT-6.jpg', '74', NULL),
(60, '001.jpg', '74', NULL),
(61, 'toyota rav4.jpg', '74', NULL),
(62, 'Toyota-IST-DZT-6.jpg', '74', NULL),
(75, '001.jpg', '97', NULL),
(76, 'ErxF3oGW4AAnkp5.jpg', '97', NULL),
(77, 'hilux bord du lac.jpg', '97', NULL),
(78, 'hilux.jpg', '97', NULL),
(79, 'hjhjh.jpg', '97', NULL),
(80, 'toyota rav4.jpg', '97', NULL),
(81, 'Toyota-IST-DZT-6.jpg', '97', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marquevehicule`
--

CREATE TABLE IF NOT EXISTS `marquevehicule` (
  `idv` int(11) NOT NULL AUTO_INCREMENT,
  `nomv` varchar(255) NOT NULL,
  PRIMARY KEY (`idv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `marquevehicule`
--

INSERT INTO `marquevehicule` (`idv`, `nomv`) VALUES
(1, 'TOYOTA'),
(2, 'HONDA'),
(3, 'HYUNDAI'),
(4, 'CITROEN'),
(5, 'FORD');

-- --------------------------------------------------------

--
-- Structure de la table `microposts`
--

CREATE TABLE IF NOT EXISTS `microposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) DEFAULT NULL,
  `modele` varchar(11) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `km` varchar(255) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `prix` int(255) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `imagePost` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `like_count` int(11) DEFAULT '0',
  `categorie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Contenu de la table `microposts`
--

INSERT INTO `microposts` (`id`, `marque`, `modele`, `couleur`, `km`, `transmission`, `prix`, `annee`, `localisation`, `imagePost`, `user_id`, `created_at`, `like_count`, `categorie`) VALUES
(74, 'LAMBORGHIN', NULL, 'NOIRE', '85.000KM', 'MANUEL', 25000, 0, NULL, 'lambornew.jpg', 273, '2023-03-04 10:39:52', 0, 'VEHICULE'),
(76, 'COROLA', NULL, 'BLANCHE', '23.000km', 'Manuel', 10000, 0, NULL, 'jeep.webp', 280, '2023-03-04 11:26:50', 0, 'VEHICULE'),
(77, 'TOYOTA', NULL, 'JAUNE', '90.000km', 'Automatique', 12000, 0, NULL, 'jeep1.jpg', 276, '2023-03-04 11:30:01', 0, 'VEHICULE'),
(78, 'PRADO TXL', NULL, 'BLANCHE', '120.000km', 'Manuel', 50000, 0, NULL, 'prado1.jpg', 273, '2023-03-04 11:31:29', 0, 'VEHICULE'),
(80, 'IST', NULL, 'NOIRE', '55.000km', 'Automatique', 3500, 0, NULL, 'ist.jpg', 280, '2023-03-13 11:23:39', 0, 'VEHICULE'),
(81, 'TOYOTA', NULL, 'NOIRE', '5000km', 'Automatique', 5600, 0, NULL, 'parcies2.jpg', 285, '2023-03-13 17:01:13', 0, 'VEHICULE'),
(83, 'IST', NULL, 'GRISE', '6000km', 'Automatique', 2500, 0, NULL, '1280px-Toyota_Ist_1st_generation_Rear.jpg', 273, '2023-03-23 18:40:51', 0, 'VEHICULE'),
(84, 'IST', NULL, 'BLEU', '5800', 'Automatique', 6500, 0, NULL, '44121904372_f9cd3deeb8_b.jpg', 273, '2023-03-23 18:46:28', 0, 'VEHICULE'),
(85, 'IST', NULL, 'BLANCHE', '6300', 'Automatique', 2200, 0, NULL, 'BG131035_14da09.jpg', 273, '2023-03-23 18:47:32', 0, 'VEHICULE'),
(86, 'IST', NULL, 'BLANCHE', '9200km', 'Manuel', 18500, 0, NULL, 'big_with_watermark_toyota-ist-dar-es-salaam-dar-es-salaam-15411.jpg', 273, '2023-03-23 18:48:39', 0, 'VEHICULE'),
(87, 'IST', NULL, 'BLANCHE', '5.500km', 'Automatique', 6300, 0, NULL, 'ErxF3oGW4AAnkp5.jpg', 273, '2023-03-23 18:49:22', 0, 'VEHICULE'),
(88, 'IST', NULL, 'NOIRE', '5000km', 'Automatique', 2000, 0, NULL, 'hjhjh.jpg', 273, '2023-03-23 18:55:23', 0, 'VEHICULE'),
(89, 'IST', NULL, 'BLEU', '6300', 'Automatique', 6500, 0, NULL, 'Toyota-IST-DZT-6.jpg', 273, '2023-03-23 18:57:41', 0, 'VEHICULE'),
(90, 'SWIFT', NULL, 'ROUGE', '55200', 'Manuel', 6500, 0, NULL, 'bed2d3fa14.jpg', 276, '2023-03-23 21:04:47', 0, 'VEHICULE'),
(92, 'SUZUKI', NULL, 'JAUNE', '5000', 'Manuel', 2500, 0, NULL, 'moto03.png', 273, '2023-03-29 15:44:13', 0, 'Moto'),
(93, 'BOXER', NULL, 'ROUGE', '5000km', 'Manuel', 6500, 0, NULL, 'bajaj3.png', 273, '2023-03-29 16:00:03', 0, 'Moto'),
(94, 'TOYOTA', NULL, 'NOIRE', '55.000km', 'Manuel', 6500, 0, NULL, '1280px-Toyota_Ist_1st_generation_Rear.jpg', 273, '2023-04-05 09:03:54', 0, 'VÃ©hicule'),
(95, 'TOYOTA', 'HILUX', 'GRIS', '25000', 'Automatique', 32000, 2009, 'LEMBA, ENTREE TERMINUS', '001.jpg', 273, '2023-04-07 16:45:16', 0, 'vehicule'),
(96, 'TOYOTA', 'RAV4', 'BLANC', '5600', 'Manuel', 25000, 2019, 'NGALIEMA, PALAIS DU MARBRE', 'toyota rav4.jpg', 273, '2023-04-07 18:38:48', 0, 'vehicule'),
(97, 'YAMAHA', 'BOXER', 'ROUGE', '66000', NULL, 1200, 2009, 'COMMUNE NGABA, ENTREE RIGHINI, 67, AV BAMBILA', 'boxer-100-azul-1.png', 273, '2023-04-08 09:42:01', 0, 'MOTO'),
(98, 'YAMAHA', 'TVS', 'ROUGE', '56000', NULL, 6000, 2020, 'KINSHASA, LEMBA, SOUS REGION', '350-RR-FULL-SPEED-MOTO-scaled.jpg', 273, '2023-04-11 12:32:27', 1, 'MOTO');

-- --------------------------------------------------------

--
-- Structure de la table `micropost_like`
--

CREATE TABLE IF NOT EXISTS `micropost_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `micropost_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `micropost_id` (`micropost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `micropost_like`
--

INSERT INTO `micropost_like` (`id`, `user_id`, `micropost_id`, `created_at`) VALUES
(1, 273, 98, '2023-04-11 14:00:44');

-- --------------------------------------------------------

--
-- Structure de la table `modelevehicule`
--

CREATE TABLE IF NOT EXISTS `modelevehicule` (
  `idmod` int(10) NOT NULL AUTO_INCREMENT,
  `cond_nom` varchar(10) NOT NULL,
  `nommod` varchar(255) NOT NULL,
  PRIMARY KEY (`idmod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `modelevehicule`
--

INSERT INTO `modelevehicule` (`idmod`, `cond_nom`, `nommod`) VALUES
(1, 'TOYOTA', 'RAV4'),
(2, 'TOYOTA', 'LAND CRUISER'),
(3, 'TOYOTA', 'COROLLA'),
(4, 'TOYOTA', 'HILUX'),
(5, 'TOYOTA', 'IQ'),
(6, 'TOYOTA', 'MIRAI'),
(7, 'TOYOTA', 'RUNNER'),
(8, 'TOYOTA', 'STARLET'),
(9, 'TOYOTA', 'SUPRA'),
(10, 'TOYOTA', 'YARIS'),
(11, 'HONDA', 'ACCORD'),
(12, 'HONDA', 'CIVIC'),
(13, 'HONDA', 'YAZZ'),
(14, 'HONDA', 'AZERA'),
(15, 'HONDA', 'GENESIS'),
(16, 'HONDA', 'I30 N'),
(17, 'HYUNDAI', 'NEXO'),
(18, 'HYUNDAI', 'VELOSTER'),
(19, 'CITROEN', 'AX'),
(20, 'CITROEN', 'BERLINGO'),
(21, 'CITROEN', 'C-CROSSER'),
(22, 'CITROEN', 'C3 GENERATION'),
(23, 'CITROEN', 'C3 PICASSO'),
(24, 'CITROEN', 'C3 PLURIEL');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `seen` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `notifications`
--

INSERT INTO `notifications` (`id`, `subject_id`, `nom`, `user_id`, `created_at`, `seen`) VALUES
(34, 275, 'friend_request_sent', 273, '2023-02-25 08:54:29', '1'),
(35, 273, 'friend_request_accepted', 275, '2023-02-25 08:56:32', '1'),
(36, 273, 'friend_request_sent', 276, '2023-02-27 15:56:21', '1'),
(37, 276, 'friend_request_accepted', 273, '2023-02-27 16:22:06', '1'),
(38, 285, 'friend_request_sent', 273, '2023-02-27 17:31:08', '1'),
(39, 273, 'friend_request_accepted', 285, '2023-02-27 17:31:42', '1'),
(40, 276, 'friend_request_accepted', 273, '2023-02-27 17:55:25', '1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '0',
  `bio` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  `dispo_pour_emploi` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`prenom`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=294 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `telephone`, `sexe`, `mdp`, `active`, `bio`, `adresse`, `ville`, `dispo_pour_emploi`, `created_at`, `avatar`) VALUES
(273, 'MUAMBA', 'FRANCIANA', 'francielmuamba@gmail.com', '827979852', 'FEMME', 'franckh', '1', 'DEVELOPPEUR WEB FULL-STACK', 'CAMPUS DE L''UNKIN', 'Kinshasa', '0', '2018-12-02 15:59:13', '273.jpg'),
(275, 'KUKUMBE', 'DAVID', 'dav@gmail.com', NULL, NULL, 'franckh', '1', '', NULL, '', '0', '2023-02-25 08:53:49', ''),
(276, 'Elie', 'Elias', 'elie@gmail.com', '', 'H', '123456', '1', 'Infographe', NULL, '', '0', '2023-02-27 15:10:09', '276.jpg'),
(277, 'Pierre', 'Pierrot', 'pierre@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:12:40', ''),
(278, 'Pat', 'Pat', 'pat@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:15:41', ''),
(279, 'sara', 'sara', 'sara@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:25:10', ''),
(280, 'Brayen', 'Brayen', 'brayen@gmail.com', '000000', 'H', '123456', '1', 'REN', NULL, '', '0', '2023-02-27 15:37:56', '280.jpg'),
(281, 'Dan', 'Dan', 'dan@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:41:31', ''),
(282, 'Brayene', 'Brayene', 'branyene@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:45:26', ''),
(283, 'Eddy', 'Eddy', 'eddy@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:47:31', ''),
(284, 'Placide', 'Placide', 'placide@gmail.com', NULL, NULL, '123456', '1', '', NULL, '', '0', '2023-02-27 15:49:11', ''),
(285, 'Clara', 'Clara', 'clara@gmail.com', '0000002222', 'H', '123456', '1', 'bbb', NULL, '', '0', '2023-02-27 15:50:12', '285.jpg'),
(286, 'MUAMBA', 'FRANCK', 'fm@gmail.com', '0827979852', NULL, '123456', '0', '', NULL, '', '0', '2023-03-02 17:36:11', ''),
(287, 'ELIE', 'PATRICK', 'patrick@gmail.com', '02586363', NULL, '123456', '1', '', NULL, '', '0', '2023-03-04 20:18:28', ''),
(289, 'jdkdkd', 'freddy', 'franck@gmail.com', '+243827979852', 'on', '123456', '0', '', NULL, '', '0', '2023-03-10 17:19:44', ''),
(290, 'BIN', 'BIN', 'bin@gmail.com', '+243827979852', 'Masculin', '123456', '0', '', NULL, '', '0', '2023-03-10 17:31:39', ''),
(293, 'LEE', 'BRANDON', 'businesseureka235@gmail.com', '0002222', 'Masculin', '123456', '0', '', NULL, '', '0', '2023-04-03 12:25:47', '');

-- --------------------------------------------------------

--
-- Structure de la table `userssss`
--

CREATE TABLE IF NOT EXISTS `userssss` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `userssss`
--

INSERT INTO `userssss` (`id`, `nom`, `prenom`, `email`, `telephone`, `sexe`, `mdp`, `active`, `bio`, `adresse`, `ville`, `created_at`, `avatar`) VALUES
(1, 'MUAMBA', 'FRANCK', 'franciel@gmail.com', '0827979852', 'MASCULIN', '123456', '1', 'DEVELOPPEUR', 'CAMPUS UNIJIN', 'KINSHASA', NULL, '273.jpg'),
(2, 'KUKUMBE', 'DAVID', 'david@gmail.com', '0840040202', 'Masculin', '123456', '1', NULL, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `friends_relationships`
--
ALTER TABLE `friends_relationships`
  ADD CONSTRAINT `friends_relationships_ibfk_1` FOREIGN KEY (`user_id1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_relationships_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `microposts`
--
ALTER TABLE `microposts`
  ADD CONSTRAINT `microposts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `micropost_like`
--
ALTER TABLE `micropost_like`
  ADD CONSTRAINT `micropost_like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `micropost_like_ibfk_2` FOREIGN KEY (`micropost_id`) REFERENCES `microposts` (`id`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
