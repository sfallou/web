-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 28 Août 2014 à 17:31
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `planning`
--
CREATE DATABASE IF NOT EXISTS `planning` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `planning`;

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rv` datetime NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `id_proprietaire` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `agenda`
--

INSERT INTO `agenda` (`id`, `rv`, `timestamp`, `id_proprietaire`, `etat`) VALUES
(1, '2014-08-30 09:30:00', 1409391000, 1, 0),
(2, '2014-08-30 10:30:00', 1409394600, 1, 0),
(3, '2014-08-30 12:00:00', 1409400000, 1, 0),
(4, '2014-08-30 17:00:00', 1409418000, 1, 0),
(5, '2014-09-03 08:30:00', 1409733000, 1, 0),
(6, '2014-09-03 09:00:00', 1409734800, 1, 0),
(7, '2014-09-03 09:30:00', 1409736600, 1, 0),
(16, '2014-09-12 09:30:00', 1410514200, 2, 0),
(17, '2014-09-12 10:00:00', 1410516000, 2, 0),
(18, '2014-09-12 14:00:00', 1410530400, 2, 0),
(19, '2014-09-12 16:00:00', 1410537600, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
