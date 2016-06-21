-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 10 Octobre 2014 à 10:12
-- Version du serveur: 5.5.38
-- Version de PHP: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `planning`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnes`
--

CREATE TABLE IF NOT EXISTS `abonnes` (
  `id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(75) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `entreprise` varchar(25) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `abonnes`
--

INSERT INTO `abonnes` (`id_abonne`, `nom`, `prenom`, `mdp`, `telephone`, `email`, `entreprise`, `etat`) VALUES
(1, 'Kane', 'Elimane', 'passer', 778757730, 'elimane@emc2-group.com', 'emc2', 0),
(2, 'Ndiaye', 'Serigne Fallou', 'passer', 778757730, 'sfallou2010@hotmail.fr', 'esp', 0),
(3, 'Fall', 'Abdou', 'passer', 778757730, 'sfallou2010@hotmail.fr', 'fann', 0);

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rv` datetime DEFAULT NULL,
  `timestamp` bigint(20) DEFAULT NULL,
  `telephone` bigint(20) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `agenda`
--

INSERT INTO `agenda` (`id`, `rv`, `timestamp`, `telephone`, `code`, `id_proprietaire`, `etat`) VALUES
(1, '2014-09-11 08:00:00', 1410422400, 0, '0', 1, 0),
(2, '2014-09-11 08:30:00', 1410424200, 0, '0', 1, 0),
(3, '2014-09-11 09:00:00', 1410426000, 0, '0', 1, 0),
(4, '2014-09-11 09:30:00', 1410427800, 0, '0', 1, 0),
(5, '2014-09-11 10:00:00', 1410429600, 0, '0', 1, 0),
(6, '2014-09-11 10:30:00', 1410431400, 0, '0', 1, 0),
(7, '2014-09-11 11:00:00', 1410433200, 0, '0', 1, 0),
(8, '2014-09-11 11:30:00', 1410435000, 0, '0', 1, 0),
(9, '2014-09-11 12:00:00', 1410436800, 0, '0', 1, 0),
(10, '2014-09-11 12:30:00', 1410438600, 0, '0', 1, 0),
(11, '2014-09-11 13:00:00', 1410440400, 0, '0', 1, 0),
(12, '2014-09-11 13:30:00', 1410442200, 0, '0', 1, 0),
(13, '2014-09-11 14:00:00', 1410444000, 0, '0', 1, 0),
(14, '2014-09-11 14:30:00', 1410445800, 0, '0', 1, 0),
(15, '2014-09-11 15:00:00', 1410447600, 0, '0', 1, 0),
(16, '2014-09-11 15:30:00', 1410449400, 0, '0', 1, 0),
(17, '2014-09-11 16:00:00', 1410451200, 0, 'EM439005', 1, 1),
(18, '2014-09-11 16:30:00', 1410453000, 1000, 'EM375343', 1, 1),
(19, '2014-09-11 17:00:00', 1410454800, 1000, 'EM567300', 1, 1),
(20, '2014-09-11 17:30:00', 1410456600, 1000, 'EM164525', 1, 1),
(21, '2014-09-27 08:00:00', 1411804800, 0, '0', 2, 0),
(22, '2014-09-27 08:30:00', 1411806600, 0, '0', 2, 0),
(23, '2014-09-27 09:00:00', 1411808400, 0, '0', 2, 0),
(24, '2014-09-27 09:30:00', 1411810200, 0, '0', 2, 0),
(25, '2014-09-27 10:00:00', 1411812000, 0, '0', 2, 0),
(26, '2014-09-27 10:30:00', 1411813800, 0, '0', 2, 0),
(27, '2014-09-27 11:00:00', 1411815600, 0, 'EM609205', 2, 1),
(28, '2014-09-27 11:30:00', 1411817400, 221338671967, 'EM863319', 2, 1),
(29, '2014-09-27 12:00:00', 1411819200, 0, '0', 2, 1),
(30, '2014-09-27 12:30:00', 1411821000, 0, '0', 2, 1),
(31, '2014-09-27 13:00:00', 1411822800, 0, '0', 2, 1),
(32, '2014-09-27 13:30:00', 1411824600, 0, '0', 2, 1),
(33, '2014-09-27 14:00:00', 1411826400, 0, '0', 2, 1),
(34, '2014-09-27 14:30:00', 1411828200, 0, '0', 2, 1),
(35, '2014-09-27 15:00:00', 1411830000, 0, '0', 2, 1),
(36, '2014-09-27 15:30:00', 1411831800, 0, '0', 2, 1),
(37, '2014-09-27 16:00:00', 1411833600, 0, '0', 2, 1),
(38, '2014-09-27 16:30:00', 1411835400, 0, '0', 2, 1),
(39, '2014-09-27 17:00:00', 1411837200, 1000, 'EM496462', 2, 1),
(40, '2014-09-27 17:30:00', 1411839000, 1000, 'EM286962', 2, 1),
(41, '2014-09-26 08:00:00', 1411718400, 0, '0', 3, 0),
(42, '2014-09-26 08:30:00', 1411720200, 0, '0', 3, 0),
(43, '2014-09-26 09:00:00', 1411722000, 0, '0', 3, 0),
(44, '2014-09-26 09:30:00', 1411723800, 0, '0', 3, 0),
(45, '2014-09-26 10:00:00', 1411725600, 0, '0', 3, 0),
(46, '2014-09-26 10:30:00', 1411727400, 0, '0', 3, 0),
(47, '2014-09-26 11:00:00', 1411729200, 0, '0', 3, 0),
(48, '2014-09-26 11:30:00', 1411731000, 0, '0', 3, 0),
(49, '2014-09-26 12:00:00', 1411732800, 0, '0', 3, 0),
(50, '2014-09-26 12:30:00', 1411734600, 0, '0', 3, 0),
(51, '2014-09-26 13:00:00', 1411736400, 0, '0', 3, 0),
(52, '2014-09-26 13:30:00', 1411738200, 0, '0', 3, 0),
(53, '2014-09-26 14:00:00', 1411740000, 0, '0', 3, 0),
(54, '2014-09-26 14:30:00', 1411741800, 0, '0', 3, 0),
(55, '2014-09-26 15:00:00', 1411743600, 0, '0', 3, 0),
(56, '2014-09-26 15:30:00', 1411745400, 0, '0', 3, 0),
(57, '2014-09-26 16:00:00', 1411747200, 0, '0', 3, 0),
(58, '2014-09-26 16:30:00', 1411749000, 0, '0', 3, 0),
(59, '2014-09-26 17:00:00', 1411750800, 0, '0', 3, 0),
(60, '2014-09-26 17:30:00', 1411752600, 0, '0', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `agenda2`
--

CREATE TABLE IF NOT EXISTS `agenda2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rv` varchar(255) DEFAULT NULL,
  `heures` varchar(50) DEFAULT NULL,
  `telephone` bigint(20) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Contenu de la table `agenda2`
--

INSERT INTO `agenda2` (`id`, `rv`, `heures`, `telephone`, `code`, `id_proprietaire`, `etat`) VALUES
(1, 'Mercredi 1 Janvier  2014', '08:00', 0, '0', 1, 0),
(2, 'Mercredi 1 Janvier  2014', '08:30', 0, '0', 1, 0),
(3, 'Mercredi 1 Janvier  2014', '09:00', 0, '0', 1, 0),
(4, 'Mercredi 1 Janvier  2014', '09:30', 0, '0', 1, 0),
(5, 'Mercredi 1 Janvier  2014', '10:00', 0, '0', 1, 0),
(6, 'Mercredi 1 Janvier  2014', '10:30', 0, '0', 1, 0),
(7, 'Mercredi 1 Janvier  2014', '11:00', 0, '0', 1, 0),
(8, 'Mercredi 1 Janvier  2014', '11:30', 0, '0', 1, 0),
(9, 'Mercredi 1 Janvier  2014', '12:00', 0, '0', 1, 0),
(10, 'Mercredi 1 Janvier  2014', '12:30', 0, '0', 1, 0),
(11, 'Mercredi 1 Janvier  2014', '13:00', 0, '0', 1, 0),
(12, 'Mercredi 1 Janvier  2014', '13:30', 0, '0', 1, 0),
(13, 'Mercredi 1 Janvier  2014', '14:00', 0, '0', 1, 0),
(14, 'Mercredi 1 Janvier  2014', '14:30', 0, '0', 1, 0),
(15, 'Mercredi 1 Janvier  2014', '15:00', 0, '0', 1, 0),
(16, 'Mercredi 1 Janvier  2014', '15:30', 0, '0', 1, 0),
(17, 'Mercredi 1 Janvier  2014', '16:00', 0, '0', 1, 0),
(18, 'Mercredi 1 Janvier  2014', '16:30', 0, '0', 1, 0),
(19, 'Mercredi 1 Janvier  2014', '17:00', 0, '0', 1, 0),
(20, 'Mercredi 1 Janvier  2014', '17:30', 0, '0', 1, 0),
(21, 'Mercredi 15 Janvier  2014', '14:30', 0, '0', 1, 0),
(22, 'Mercredi 15 Janvier  2014', '15:00', 0, '0', 1, 0),
(23, 'Mercredi 15 Janvier  2014', '15:30', 0, '0', 1, 1),
(24, 'Mercredi 15 Janvier  2014', '16:00', 0, '0', 1, 1),
(25, 'Mercredi 15 Janvier  2014', '16:30', 0, '0', 1, 1),
(26, 'Mercredi 15 Janvier  2014', '17:00', 0, '0', 1, 1),
(27, 'Mercredi 15 Janvier  2014', '17:30', 0, '0', 1, 1),
(28, 'Vendredi 9 Mai  2014', '08:00', 0, '0', 1, 0),
(29, 'Vendredi 9 Mai  2014', '08:30', 0, '0', 1, 0),
(30, 'Vendredi 9 Mai  2014', '09:00', 0, '0', 1, 0),
(31, 'Vendredi 9 Mai  2014', '09:30', 0, '0', 1, 0),
(32, 'Vendredi 9 Mai  2014', '10:00', 0, '0', 1, 0),
(33, 'Vendredi 9 Mai  2014', '10:30', 0, '0', 1, 0),
(34, 'Vendredi 9 Mai  2014', '11:00', 0, '0', 1, 0),
(35, 'Vendredi 9 Mai  2014', '11:30', 0, '0', 1, 0),
(36, 'Vendredi 9 Mai  2014', '12:00', 0, '0', 1, 0),
(37, 'Vendredi 9 Mai  2014', '12:30', 0, '0', 1, 0),
(38, 'Vendredi 9 Mai  2014', '13:00', 0, '0', 1, 0),
(39, 'Vendredi 9 Mai  2014', '13:30', 0, '0', 1, 0),
(40, 'Vendredi 9 Mai  2014', '14:00', 0, '0', 1, 0),
(41, 'Vendredi 9 Mai  2014', '14:30', 0, '0', 1, 0),
(42, 'Vendredi 9 Mai  2014', '15:00', 0, '0', 1, 0),
(43, 'Vendredi 9 Mai  2014', '15:30', 0, '0', 1, 0),
(44, 'Vendredi 9 Mai  2014', '16:00', 0, '0', 1, 0),
(45, 'Vendredi 9 Mai  2014', '16:30', 0, '0', 1, 1),
(46, 'Vendredi 9 Mai  2014', '17:00', 0, '0', 1, 1),
(47, 'Vendredi 9 Mai  2014', '17:30', 0, '0', 1, 1),
(48, 'Samedi 7 Juin  2014', '08:00', 0, '0', 1, 1),
(49, 'Samedi 7 Juin  2014', '08:30', 0, '0', 1, 1),
(50, 'Samedi 7 Juin  2014', '09:00', 0, '0', 1, 1),
(51, 'Samedi 7 Juin  2014', '09:30', 0, '0', 1, 1),
(52, 'Samedi 7 Juin  2014', '10:00', 0, '0', 1, 1),
(53, 'Samedi 7 Juin  2014', '10:30', 0, '0', 1, 1),
(54, 'Samedi 7 Juin  2014', '11:00', 0, '0', 1, 1),
(55, 'Samedi 7 Juin  2014', '11:30', 0, '0', 1, 1),
(56, 'Samedi 7 Juin  2014', '12:00', 0, '0', 1, 1),
(57, 'Samedi 7 Juin  2014', '12:30', 0, '0', 1, 1),
(58, 'Samedi 7 Juin  2014', '13:00', 0, '0', 1, 1),
(59, 'Samedi 7 Juin  2014', '13:30', 0, '0', 1, 1),
(60, 'Samedi 7 Juin  2014', '14:00', 0, '0', 1, 1),
(61, 'Samedi 7 Juin  2014', '14:30', 0, '0', 1, 1),
(62, 'Samedi 7 Juin  2014', '15:00', 0, '0', 1, 1),
(63, 'Samedi 7 Juin  2014', '15:30', 0, '0', 1, 1),
(64, 'Samedi 7 Juin  2014', '16:00', 0, '0', 1, 1),
(65, 'Samedi 7 Juin  2014', '16:30', 0, '0', 1, 1),
(66, 'Samedi 7 Juin  2014', '17:00', 0, '0', 1, 1),
(67, 'Samedi 7 Juin  2014', '17:30', 0, '0', 1, 1),
(68, 'Mercredi 8 Janvier  2014', '08:00', 0, '0', 1, 1),
(69, 'Mercredi 8 Janvier  2014', '08:30', 0, '0', 1, 1),
(70, 'Mercredi 8 Janvier  2014', '09:00', 0, '0', 1, 1),
(71, 'Mercredi 8 Janvier  2014', '09:30', 0, '0', 1, 1),
(72, 'Mercredi 8 Janvier  2014', '10:00', 0, '0', 1, 1),
(73, 'Mercredi 8 Janvier  2014', '10:30', 0, '0', 1, 1),
(74, 'Mercredi 8 Janvier  2014', '11:00', 0, '0', 1, 1),
(75, 'Mercredi 8 Janvier  2014', '11:30', 0, '0', 1, 1),
(76, 'Mercredi 8 Janvier  2014', '12:00', 0, '0', 1, 1),
(77, 'Mercredi 8 Janvier  2014', '12:30', 0, '0', 1, 1),
(78, 'Mercredi 8 Janvier  2014', '13:00', 0, '0', 1, 1),
(79, 'Mercredi 8 Janvier  2014', '13:30', 0, '0', 1, 1),
(80, 'Mercredi 8 Janvier  2014', '14:00', 0, '0', 1, 1),
(81, 'Mercredi 8 Janvier  2014', '14:30', 0, '0', 1, 1),
(82, 'Mercredi 8 Janvier  2014', '15:00', 0, '0', 1, 1),
(83, 'Mercredi 8 Janvier  2014', '15:30', 0, '0', 1, 1),
(84, 'Mercredi 8 Janvier  2014', '16:00', 0, '0', 1, 1),
(85, 'Mercredi 8 Janvier  2014', '16:30', 0, '0', 1, 1),
(86, 'Mercredi 8 Janvier  2014', '17:00', 0, '0', 1, 1),
(87, 'Mercredi 8 Janvier  2014', '17:30', 0, '0', 1, 1),
(88, 'Dimanche 15 Juin  2014', '08:00', 0, '0', 1, 1),
(89, 'Dimanche 15 Juin  2014', '08:30', 0, '0', 1, 1),
(90, 'Dimanche 15 Juin  2014', '09:00', 0, '0', 1, 1),
(91, 'Dimanche 15 Juin  2014', '09:30', 0, '0', 1, 1),
(92, 'Dimanche 15 Juin  2014', '10:00', 0, '0', 1, 1),
(93, 'Dimanche 15 Juin  2014', '10:30', 0, '0', 1, 1),
(94, 'Dimanche 15 Juin  2014', '11:00', 0, '0', 1, 1),
(95, 'Dimanche 15 Juin  2014', '11:30', 0, '0', 1, 1),
(96, 'Dimanche 15 Juin  2014', '12:00', 0, '0', 1, 1),
(97, 'Dimanche 15 Juin  2014', '12:30', 0, '0', 1, 1),
(98, 'Dimanche 15 Juin  2014', '13:00', 0, '0', 1, 1),
(99, 'Dimanche 15 Juin  2014', '13:30', 0, '0', 1, 1),
(100, 'Dimanche 15 Juin  2014', '14:00', 0, '0', 1, 1),
(101, 'Dimanche 15 Juin  2014', '14:30', 0, '0', 1, 1),
(103, 'Dimanche 15 Juin  2014', '15:30', 0, '0', 1, 1),
(108, 'Dimanche 5 Octobre  2014', '08:00', 0, '0', 1, 0),
(109, 'Dimanche 5 Octobre  2014', '08:30', 0, '0', 1, 0),
(110, 'Dimanche 5 Octobre  2014', '09:00', 0, '0', 1, 0),
(111, 'Dimanche 5 Octobre  2014', '09:30', 0, '0', 1, 0),
(112, 'Dimanche 5 Octobre  2014', '10:00', 0, '0', 1, 0),
(113, 'Dimanche 5 Octobre  2014', '10:30', 0, '0', 1, 0),
(114, 'Dimanche 5 Octobre  2014', '11:00', 0, '0', 1, 0),
(115, 'Dimanche 5 Octobre  2014', '11:30', 0, '0', 1, 0),
(116, 'Dimanche 5 Octobre  2014', '12:00', 0, '0', 1, 0),
(117, 'Dimanche 5 Octobre  2014', '12:30', 0, '0', 1, 0),
(118, 'Dimanche 5 Octobre  2014', '13:00', 0, '0', 1, 0),
(119, 'Dimanche 5 Octobre  2014', '13:30', 0, '0', 1, 0),
(120, 'Dimanche 5 Octobre  2014', '14:00', 0, '0', 1, 0),
(121, 'Dimanche 5 Octobre  2014', '14:30', 0, '0', 1, 0),
(122, 'Dimanche 5 Octobre  2014', '15:30', 0, '0', 1, 0),
(123, 'Samedi 4 Octobre  2014', '08:00', 0, '0', 1, 0),
(124, 'Samedi 4 Octobre  2014', '08:30', 0, '0', 1, 0),
(125, 'Samedi 4 Octobre  2014', '09:00', 0, '0', 1, 0),
(126, 'Samedi 4 Octobre  2014', '09:30', 0, '0', 1, 0),
(127, 'Samedi 4 Octobre  2014', '10:00', 0, '0', 1, 0),
(128, 'Samedi 4 Octobre  2014', '10:30', 0, '0', 1, 0),
(129, 'Samedi 4 Octobre  2014', '11:00', 0, '0', 1, 0),
(130, 'Samedi 4 Octobre  2014', '11:30', 0, '0', 1, 0),
(131, 'Samedi 4 Octobre  2014', '12:00', 0, '0', 1, 0),
(132, 'Samedi 4 Octobre  2014', '12:30', 0, '0', 1, 0),
(133, 'Samedi 4 Octobre  2014', '13:00', 0, '0', 1, 0),
(134, 'Samedi 4 Octobre  2014', '13:30', 0, '0', 1, 0),
(135, 'Samedi 4 Octobre  2014', '14:00', 0, '0', 1, 0),
(136, 'Samedi 4 Octobre  2014', '14:30', 0, '0', 1, 0),
(137, 'Samedi 4 Octobre  2014', '15:00', 0, '0', 1, 0),
(138, 'Samedi 4 Octobre  2014', '15:30', 0, '0', 1, 0),
(139, 'Samedi 4 Octobre  2014', '16:00', 0, '0', 1, 0),
(140, 'Samedi 4 Octobre  2014', '16:30', 0, '0', 1, 0),
(141, 'Samedi 4 Octobre  2014', '17:00', 0, '0', 1, 0),
(142, 'Samedi 4 Octobre  2014', '17:30', 0, '0', 1, 0),
(143, 'Dimanche 19 Octobre  2014', '08:00', 0, '0', 1, 0),
(144, 'Dimanche 19 Octobre  2014', '08:30', 0, '0', 1, 0),
(145, 'Dimanche 19 Octobre  2014', '09:00', 0, '0', 1, 0),
(146, 'Dimanche 19 Octobre  2014', '09:30', 0, '0', 1, 0),
(147, 'Dimanche 19 Octobre  2014', '10:00', 0, '0', 1, 0),
(148, 'Dimanche 19 Octobre  2014', '10:30', 0, '0', 1, 0),
(149, 'Dimanche 19 Octobre  2014', '11:00', 0, '0', 1, 0),
(150, 'Dimanche 19 Octobre  2014', '11:30', 0, '0', 1, 0),
(151, 'Dimanche 19 Octobre  2014', '12:00', 0, '0', 1, 0),
(152, 'Dimanche 19 Octobre  2014', '12:30', 0, 'EMC2242045', 1, 1),
(153, 'Dimanche 19 Octobre  2014', '13:00', 0, 'EMC2523295', 1, 1),
(154, 'Dimanche 19 Octobre  2014', '13:30', 0, 'EMC2905931', 1, 1),
(155, 'Dimanche 19 Octobre  2014', '14:00', 0, 'EMC2955917', 1, 1),
(157, 'Dimanche 19 Octobre  2014', '15:00', 338671967, 'EMC2671799', 1, 1),
(158, 'Dimanche 19 Octobre  2014', '15:30', 778757730, 'EMC2317036', 1, 1),
(163, 'Dimanche 2 Novembre  2014', '08:00', 0, '0', 2, 0),
(164, 'Dimanche 2 Novembre  2014', '08:30', 0, '0', 2, 0),
(165, 'Dimanche 2 Novembre  2014', '09:00', 0, '0', 2, 0),
(166, 'Dimanche 2 Novembre  2014', '09:30', 0, '0', 2, 0),
(167, 'Dimanche 2 Novembre  2014', '10:00', 0, '0', 2, 0),
(168, 'Dimanche 2 Novembre  2014', '10:30', 0, '0', 2, 0),
(169, 'Dimanche 2 Novembre  2014', '11:00', 0, '0', 2, 0),
(170, 'Dimanche 2 Novembre  2014', '11:30', 0, '0', 2, 0),
(171, 'Dimanche 2 Novembre  2014', '12:00', 0, '0', 2, 0),
(172, 'Dimanche 2 Novembre  2014', '12:30', 0, '0', 2, 0),
(173, 'Dimanche 2 Novembre  2014', '13:00', 0, '0', 2, 0),
(174, 'Dimanche 2 Novembre  2014', '13:30', 0, '0', 2, 0),
(175, 'Dimanche 2 Novembre  2014', '14:00', 0, '0', 2, 0),
(176, 'Dimanche 2 Novembre  2014', '14:30', 0, '0', 2, 0),
(177, 'Dimanche 2 Novembre  2014', '15:00', 0, '0', 2, 0),
(178, 'Dimanche 2 Novembre  2014', '15:30', 0, '0', 2, 0),
(179, 'Dimanche 2 Novembre  2014', '16:00', 0, '0', 2, 0),
(180, 'Dimanche 2 Novembre  2014', '16:30', 0, '0', 2, 0),
(181, 'Dimanche 2 Novembre  2014', '17:00', 0, '0', 2, 0),
(182, 'Dimanche 2 Novembre  2014', '17:30', 0, '0', 2, 0),
(183, 'Dimanche 10 Aout  2014', '08:00', 0, '0', 2, 0),
(184, 'Dimanche 10 Aout  2014', '08:30', 0, '0', 2, 0),
(185, 'Dimanche 10 Aout  2014', '09:00', 0, '0', 2, 0),
(186, 'Dimanche 10 Aout  2014', '09:30', 0, '0', 2, 0),
(187, 'Dimanche 10 Aout  2014', '10:00', 0, '0', 2, 0),
(188, 'Dimanche 10 Aout  2014', '10:30', 0, '0', 2, 0),
(189, 'Dimanche 10 Aout  2014', '11:00', 0, '0', 2, 0),
(190, 'Dimanche 10 Aout  2014', '11:30', 0, '0', 2, 0),
(191, 'Dimanche 10 Aout  2014', '12:00', 0, '0', 2, 0),
(192, 'Dimanche 10 Aout  2014', '12:30', 0, '0', 2, 0),
(193, 'Dimanche 10 Aout  2014', '13:00', 0, '0', 2, 0),
(194, 'Dimanche 10 Aout  2014', '13:30', 0, '0', 2, 0),
(196, 'Samedi 1 Mars2014', '08:00', 0, '0', 2, 0),
(197, 'Samedi 1 Mars2014', '09:00', 0, '0', 2, 0),
(199, 'Jeudi 2 Janvier2014', '08:00', 0, '0', 3, 0),
(200, 'Jeudi 2 Janvier2014', '08:30', 0, '0', 3, 0),
(201, 'Jeudi 2 Janvier2014', '09:00', 0, '0', 3, 0),
(202, 'Jeudi 2 Janvier2014', '09:30', 0, '0', 3, 0),
(203, 'Jeudi 2 Janvier2014', '10:00', 0, '0', 3, 0),
(204, 'Jeudi 2 Janvier2014', '10:30', 0, '0', 3, 0),
(205, 'Jeudi 2 Janvier2014', '11:00', 0, '0', 3, 0),
(206, 'Jeudi 2 Janvier2014', '11:30', 0, '0', 3, 0),
(207, 'Jeudi 2 Janvier2014', '12:00', 0, '0', 3, 0),
(208, 'Jeudi 2 Janvier2014', '12:30', 0, '0', 3, 0),
(209, 'Jeudi 2 Janvier2014', '13:00', 0, '0', 3, 0),
(210, 'Jeudi 2 Janvier2014', '13:30', 0, '0', 3, 0),
(211, 'Jeudi 2 Janvier2014', '14:00', 0, '0', 3, 0),
(212, 'Jeudi 2 Janvier2014', '14:30', 0, '0', 3, 0),
(213, 'Jeudi 2 Janvier2014', '15:00', 0, '0', 3, 0),
(214, 'Jeudi 2 Janvier2014', '15:30', 0, '0', 3, 0),
(215, 'Jeudi 2 Janvier2014', '16:00', 0, '0', 3, 0),
(216, 'Jeudi 2 Janvier2014', '16:30', 0, 'EMC2043165', 3, 1),
(217, 'Jeudi 2 Janvier2014', '17:00', 0, '0', 3, 1),
(218, 'Jeudi 2 Janvier2014', '17:30', 0, '0', 3, 1),
(219, 'Mercredi 8 Janvier2014', '08:00', 0, '0', 0, 0),
(220, 'Mercredi 8 Janvier2014', '09:00', 0, '0', 0, 0),
(221, 'Mercredi 8 Janvier2014', '10:00', 0, '0', 0, 0),
(222, 'Mercredi 8 Janvier2014', '11:00', 0, '0', 0, 0),
(223, 'Mercredi 8 Janvier2014', '12:00', 0, '0', 0, 0),
(224, 'Samedi 12 Avril2014', '08:00', 0, '0', 0, 0),
(225, 'Samedi 12 Avril2014', '09:30', 0, '0', 0, 0),
(226, 'Samedi 12 Avril2014', '10:30', 0, '0', 0, 0),
(227, 'Dimanche 5 Janvier 2014', '08:00', 0, '0', 2, 0),
(228, 'Dimanche 5 Janvier 2014', '09:00', 0, '0', 2, 0),
(229, 'Dimanche 5 Janvier 2014', '10:30', 0, '0', 2, 0),
(230, 'Dimanche 9 Novembre 2014', '08:00', 0, '0', 2, 1),
(231, 'Dimanche 9 Novembre 2014', '08:30', 0, 'EMC2376749', 2, 1),
(232, 'Dimanche 9 Novembre 2014', '09:00', 0, 'EMC2147671', 2, 1),
(233, 'Dimanche 9 Novembre 2014', '09:30', 338671967, 'EMC2538344', 2, 1),
(234, 'Dimanche 9 Novembre 2014', '10:00', 338671967, 'EMC2848862', 2, 1),
(235, 'Dimanche 19 Octobre  2014', '16:00', 774867730, 'EMC2317075', 1, 1),
(236, 'Dimanche 19 Octobre  2014', '16:30', 785867730, 'EMC2311008', 1, 1),
(237, 'Lundi 20 Octobre  2014', '08:00', 772549004, 'EMC2311548', 1, 1),
(238, 'Lundi 20 Octobre  2014', '11:00', 779164904, 'EMC2311530', 1, 1),
(239, 'Mardi 21 Octobre  2014', '0930', 778757730, 'EMC2317033', 1, 1),
(240, 'Mardi 21 Octobre  2014', '11:00', 775757760, 'EMC2317073', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `attente`
--

CREATE TABLE IF NOT EXISTS `attente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` bigint(20) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `attente`
--

INSERT INTO `attente` (`id`, `telephone`, `code`, `id_entreprise`) VALUES
(15, 338757730, 'EMC2783992', 1),
(16, 778757730, 'EMC2077067', 1);

-- --------------------------------------------------------

--
-- Structure de la table `heures`
--

CREATE TABLE IF NOT EXISTS `heures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure` int(11) DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `heures`
--

INSERT INTO `heures` (`id`, `heure`, `minute`) VALUES
(1, 8, 0),
(2, 8, 30),
(3, 9, 0),
(4, 9, 30),
(5, 10, 0),
(6, 10, 30),
(7, 11, 0),
(8, 11, 30),
(9, 12, 0),
(10, 12, 30),
(11, 13, 0),
(12, 13, 30),
(13, 14, 0),
(14, 14, 30),
(15, 15, 0),
(16, 15, 30),
(17, 16, 0),
(18, 16, 30),
(19, 17, 0),
(20, 17, 30);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `objet`, `message`, `email`, `date`) VALUES
(1, 'sfallou', 'test', 'hello emc2.Good job!', 'sfallou2010@hotmail.fr', '2014-09-28 18:28:00'),
(2, 'Bassirou', 'merci', 'Bonsoir emc2.Good job!', 'bng@hotmail.fr', '2014-09-28 18:32:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(75) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `context` varchar(25) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nom`, `prenom`, `numero`, `mdp`, `email`, `context`, `etat`) VALUES
(1, 'sfallou', 'Ndiaye', 'serigne fallou', 5000, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(2, 'bng', 'Ngom', 'Bassirou', 5004, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(3, 'directeur', 'Kane', 'Elimane', 5001, 'passer', 'elimane@emc2-group.com', 'emc2', NULL),
(4, 'adjoint', 'Kane', 'Thierno', 5002, 'passer', 'tkane@emc2-group.com', 'emc2', NULL),
(5, 'secretaire', 'Secretaire', 'Secretaire', 5003, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(6, 'diary', 'Diarry', 'Diarry', 5005, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(7, 'mef', 'Fall', 'Mouhamed', 5020, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(8, 'ablay', 'Ba', 'Ablay', 5019, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(9, 'alou', 'Fall', 'Alassane', 5017, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL),
(10, 'lamine', 'Dia', 'Lamine', 5013, 'passer', 'serignefalloundiaye@gmail.com', 'emc2', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
