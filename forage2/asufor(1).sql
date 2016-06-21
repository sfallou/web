-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 01 Novembre 2014 à 14:10
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `asufor`
--
CREATE DATABASE IF NOT EXISTS `asufor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asufor`;

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE IF NOT EXISTS `abonne` (
  `id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cni` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_abonnement` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `frais_abonnement` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `abonne`
--

INSERT INTO `abonne` (`id_abonne`, `nom`, `prenom`, `cni`, `adresse`, `telephone`, `date_abonnement`, `timestamp`, `frais_abonnement`, `etat`) VALUES
(1, 'diop', 'serigne fallou', 2147483647, 'seokhaye', 788599955, '2014-08-10', 1407628800, 25000, 2),
(2, 'Ngom', 'Bassirou', 2147483647, 'seokhaye', 788599910, '2014-08-10', 1407628800, 25000, 1),
(3, 'Ngom', 'Oury', 2147483647, 'seokhaye', 788596910, '2014-08-10', 1407628800, 25000, 0),
(4, 'Barry', 'Talibe', 2147483647, 'sine', 788596910, '2014-08-10', 1407628800, 25000, 0),
(5, 'Seye', 'Falilou', 2147483647, 'sine', 788596910, '2014-08-10', 1407628800, 25000, 0),
(6, 'Sane', 'ousmane', 2147483647, 'keur_ibra', 788596910, '2014-08-10', 1407628800, 25000, 0),
(7, 'diop', 'aboubakrine', 2147483647, 'keur_ibra', 788596910, '2014-08-10', 1407628800, 25000, 0),
(8, 'Kama', 'Ablaye', 2147483647, 'keur_ibra', 788596910, '2014-08-10', 1407628800, 25000, 0),
(9, 'Thiam', 'Aida', 2147483647, 'keur_ibra', 788596910, '2014-08-10', 1407628800, 25000, 0),
(10, 'cisse', 'Moussa', 2147483647, 'kanene', 788596910, '2014-08-10', 1407628800, 25000, 0),
(11, 'Sarr', 'ibou', 2147483647, 'kanene', 788596910, '2014-08-10', 1407628800, 25000, 0),
(12, 'kandji', 'Khadim', 2147483647, 'daraja', 788596910, '2014-08-10', 1407628800, 25000, 0),
(13, 'kandji', 'Serigne', 2147483647, 'daraja', 788596910, '2014-08-10', 1407628800, 25000, 0),
(14, 'ndiaye', 'Serigne', 2147483647, 'khourwa', 788596910, '2014-08-10', 1407628800, 25000, 0),
(15, 'fall', 'Issa', 2147483647, 'khourwa', 788596910, '2014-08-10', 1407628800, 25000, 0),
(16, 'lo', 'Aliou', 2147483647, 'keur_malamine', 788596910, '2014-08-10', 1407628800, 25000, 0),
(17, 'lo', 'Mor', 2147483647, 'keur_malamine', 788596910, '2014-08-10', 1407628800, 25000, 0),
(18, 'sene', 'Amet', 2147483647, 'keur_mory', 788596910, '2014-08-10', 1407628800, 25000, 0),
(19, 'sene', 'sokhna', 2147483647, 'keur_mory', 788596910, '2014-08-10', 1407628800, 25000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `profil` varchar(25) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `nom`, `prenom`, `profil`, `login`, `mdp`, `date_creation`) VALUES
(1, 'ndiaye', 'serigne', 'administrateur', 'admin', 'admin', '2014-08-10'),
(2, 'kandji', 'serigne', 'tresorier', 'forage', 'forage', '2014-08-10'),
(3, 'diop', 'mor', 'gerant', 'forage', 'forage', '2014-08-10');

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE IF NOT EXISTS `compteur` (
  `id_compteur` int(11) NOT NULL AUTO_INCREMENT,
  `ancien_index` int(11) NOT NULL,
  `nouvel_index` int(11) NOT NULL,
  `date_index` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_compteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `compteur`
--

INSERT INTO `compteur` (`id_compteur`, `ancien_index`, `nouvel_index`, `date_index`, `timestamp`, `etat`, `id`) VALUES
(1, 0, 0, '2014-08-10', 1407628800, 2, 1),
(2, 0, 0, '2014-08-10', 1407628800, 1, 2),
(3, 0, 0, '2014-08-10', 1407628800, 0, 3),
(4, 0, 0, '2014-08-10', 1407628800, 0, 4),
(5, 0, 0, '2014-08-10', 1407628800, 0, 5),
(6, 0, 0, '2014-08-10', 1407628800, 0, 6),
(7, 0, 0, '2014-08-10', 1407628800, 0, 7),
(8, 0, 0, '2014-08-10', 1407628800, 0, 8),
(9, 0, 0, '2014-08-10', 1407628800, 0, 9),
(10, 0, 0, '2014-08-10', 1407628800, 0, 10),
(11, 0, 0, '2014-08-10', 1407628800, 0, 11),
(12, 0, 0, '2014-08-10', 1407628800, 0, 12),
(13, 0, 0, '2014-08-10', 1407628800, 0, 13),
(14, 0, 0, '2014-08-10', 1407628800, 0, 14),
(15, 0, 0, '2014-08-10', 1407628800, 0, 15),
(16, 0, 0, '2014-08-10', 1407628800, 0, 16),
(17, 0, 0, '2014-08-10', 1407628800, 0, 17),
(18, 0, 0, '2014-08-10', 1407628800, 0, 18),
(19, 0, 0, '2014-08-10', 1407628800, 0, 19),
(23, 0, 10, '2014-08-25', 1408924800, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE IF NOT EXISTS `depense` (
  `id_depense` int(11) NOT NULL AUTO_INCREMENT,
  `d_senelec` int(11) NOT NULL,
  `d_gazoil` int(11) NOT NULL,
  `d_entretien` int(11) NOT NULL,
  `salaire_conducteur` int(11) NOT NULL,
  `salaire_gerant` int(11) NOT NULL,
  `salaire_releveur` int(11) NOT NULL,
  `d_divers` int(11) NOT NULL,
  `date_depense` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_depense`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `depense`
--

INSERT INTO `depense` (`id_depense`, `d_senelec`, `d_gazoil`, `d_entretien`, `salaire_conducteur`, `salaire_gerant`, `salaire_releveur`, `d_divers`, `date_depense`, `timestamp`, `detail`) VALUES
(3, 3000, 0, 10000, 17000, 12000, 15000, 0, '2014-08-15', 1408060800, 'RAS');

-- --------------------------------------------------------

--
-- Structure de la table `dette`
--

CREATE TABLE IF NOT EXISTS `dette` (
  `id_dette` int(11) NOT NULL AUTO_INCREMENT,
  `montant_dette` bigint(11) NOT NULL,
  `num_facture` bigint(11) NOT NULL,
  `id_abonne` int(11) NOT NULL,
  `date_dette` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id_dette`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `dette`
--

INSERT INTO `dette` (`id_dette`, `montant_dette`, `num_facture`, `id_abonne`, `date_dette`, `timestamp`, `etat`) VALUES
(5, 0, 0, 1, '2014-08-11', 1407715200, 0),
(6, 0, 0, 1, '2014-08-25', 1408924800, 0),
(7, 0, 0, 1, '2014-08-25', 1408924800, 0),
(8, 0, 0, 1, '0000-00-00', 0, 0),
(9, 0, 0, 1, '2014-08-25', 1408924800, 0);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id_recette` int(11) NOT NULL AUTO_INCREMENT,
  `r_facture` int(11) NOT NULL,
  `r_abreuvoir` int(11) NOT NULL,
  `r_potence` int(11) NOT NULL,
  `bon_coupure` int(11) NOT NULL,
  `date_recette` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_recette`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`id_recette`, `r_facture`, `r_abreuvoir`, `r_potence`, `bon_coupure`, `date_recette`, `timestamp`, `detail`) VALUES
(3, 0, 50000, 250000, 0, '2014-08-15', 1408060800, 'RAS'),
(4, 0, 0, 0, 0, '2014-08-15', 1408060800, 'RAS'),
(5, 0, 0, 0, 0, '0000-00-00', 0, ''),
(6, 0, 254, 200, 0, '2014-08-15', 1408060800, 'RAS');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `id_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `montant_tarif` int(11) NOT NULL,
  `date_tarif` date NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `montant_tarif`, `date_tarif`) VALUES
(1, 350, '2014-08-10');

-- --------------------------------------------------------

--
-- Structure de la table `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `id_variable` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `nom_asufor` varchar(255) NOT NULL,
  `nombre_villages` int(11) NOT NULL,
  `texte_accueil` text NOT NULL,
  PRIMARY KEY (`id_variable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `variables`
--

INSERT INTO `variables` (`id_variable`, `title`, `nom_asufor`, `nombre_villages`, `texte_accueil`) VALUES
(1, 'Seokhaye', 'ASUFOR DE SEOKHAYE', 8, 'Depuis le 23 avril 2004, le forage de Séokhaye qui fait partie des forages de l''ASUFOR \r\n							assure la production et la distribution d''eau dans les principaux villages \r\n							de la communauté Rurale de Ngoundiane. Il alimente ainsi près de 8000 habitants avec 8 villages desservis.\r\n							Reconnu comme l''un des meilleurs références dans la localité dans le domaine de la gestion des services d''eau potable,\r\n							l''ASUFOR de Séokhaye s''illustre par la qualité de son management et le professionnalisme de ses dirigeants.');

-- --------------------------------------------------------

--
-- Structure de la table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
  `id_village` int(11) NOT NULL AUTO_INCREMENT,
  `nom_village` varchar(255) NOT NULL,
  PRIMARY KEY (`id_village`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `villages`
--

INSERT INTO `villages` (`id_village`, `nom_village`) VALUES
(1, 'seokhaye'),
(2, 'sine'),
(3, 'keur_ibra'),
(4, 'kanene'),
(5, 'daradja'),
(6, 'keur_mory'),
(7, 'keur_malamine'),
(8, 'khourwa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
