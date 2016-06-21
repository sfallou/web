-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 26 Juillet 2015 à 13:06
-- Version du serveur: 5.5.43-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gondwana`
--

-- --------------------------------------------------------

--
-- Structure de la table `citoyen`
--

CREATE TABLE IF NOT EXISTS `citoyen` (
  `cty_id` int(11) NOT NULL AUTO_INCREMENT,
  `cty_prenom` varchar(50) DEFAULT NULL,
  `cty_nom` varchar(50) DEFAULT NULL,
  `cty_datenaissance` datetime DEFAULT NULL,
  `cty_lieunaissance` varchar(50) DEFAULT NULL,
  `cty_nci` bigint(15) DEFAULT NULL,
  `cty_sexe` varchar(10) NOT NULL,
  `cty_datecnidelivre` datetime NOT NULL,
  `cty_datecniexpire` datetime NOT NULL,
  `cty_profession` varchar(50) NOT NULL,
  `cty_specialite` varchar(50) NOT NULL,
  `cty_matrimoniale` varchar(50) NOT NULL,
  `cty_dateentree` date NOT NULL,
  `cty_photo` varchar(20) NOT NULL,
  `cty_teint` varchar(10) NOT NULL,
  `cty_taille` decimal(10,0) NOT NULL,
  `cty_immaticulation` varchar(50) NOT NULL,
  `cty_dateimmatriculation` date NOT NULL,
  PRIMARY KEY (`cty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `cty_contact` int(11) NOT NULL AUTO_INCREMENT,
  `cty_telephone` bigint(20) NOT NULL,
  `cty_email` varchar(50) NOT NULL,
  `cty_telGondwana` bigint(20) NOT NULL,
  `cty_adresseGondwana` varchar(50) NOT NULL,
  `cty_telSenegal` bigint(20) NOT NULL,
  `cty_adresse` varchar(50) NOT NULL,
  `cty_adresseTravail` varchar(50) NOT NULL,
  `cty_adresseDomicile` varchar(50) NOT NULL,
  `cty_contact_cni` bigint(20) NOT NULL,
  PRIMARY KEY (`cty_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `cty_parent` int(11) NOT NULL AUTO_INCREMENT,
  `cty_prenomPere` varchar(50) NOT NULL,
  `cty_prenomMere` varchar(50) NOT NULL,
  `cty_nomMere` varchar(50) NOT NULL,
  `cty_prenomConjoint` varchar(50) NOT NULL,
  `cty_nomConjoint` varchar(50) NOT NULL,
  `cty_scanphoto` varchar(25) NOT NULL,
  `cty_cniparent` bigint(20) NOT NULL,
  PRIMARY KEY (`cty_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(20) NOT NULL,
  `prenomUser` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profil` varchar(20) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `prenomUser`, `email`, `password`, `profil`) VALUES
(1, 'NDIAYE', 'Sfallou', 'sfallou', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'administrateur'),
(2, 'Sine', 'Ousmane', 'sine', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'gerant');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
