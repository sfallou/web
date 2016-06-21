-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 26 Décembre 2014 à 00:42
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `abonne`
--

INSERT INTO `abonne` (`id_abonne`, `nom`, `prenom`, `cni`, `adresse`, `telephone`, `date_abonnement`, `timestamp`, `frais_abonnement`, `etat`) VALUES
(1, 'Ndiaye', 'serigne fallou', 2147483647, 'seokhaye', 778757730, '2014-01-01', 1388534400, 25000, 1),
(3, 'Diallo', 'woury', 2147483647, 'seokhaye', 709781878, '2014-01-01', 1388534400, 25000, 0),
(5, 'Ngom', 'Bassirou', 2147483647, 'sine', 709781878, '2014-01-01', 1388534400, 25000, 2),
(6, 'Wade', 'THIABA', 1, 'seokhaye', 2147483647, '2015-12-01', 1448928000, 0, 0),
(7, 'Sarr', 'Alassane', 2147483647, 'keur_ibra', 2147483647, '2014-01-01', 1388534400, 25000, 0),
(8, 'Fall', 'Arame', 2147483647, 'seokhaye', 709781878, '2015-01-01', 1420070400, 25000, 0),
(9, 'Kandji', 'Issa', 2147483647, 'sine', 333215874, '2015-01-01', 1420070400, 25000, 0),
(10, 'Kandji', 'Amar', 2147483647, 'kanene', 339781877, '2015-01-01', 1420070400, 25000, 0),
(11, 'Bodian', 'Mar', 2147483647, 'khourwa', 773215887, '2015-01-01', 1420070400, 25000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `attente`
--

CREATE TABLE IF NOT EXISTS `attente` (
  `id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cni` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_abonnement` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `frais_abonnement` int(11) NOT NULL,
  `ancien_index` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `compteur`
--

INSERT INTO `compteur` (`id_compteur`, `ancien_index`, `nouvel_index`, `date_index`, `timestamp`, `etat`, `id`) VALUES
(1, 0, 0, '2014-01-01', 1388534400, 1, 1),
(2, 0, 5, '2014-02-22', 1393027200, 1, 1),
(3, 5, 8, '2014-03-22', 1395446400, 1, 1),
(4, 8, 15, '2014-04-22', 1398124800, 1, 1),
(5, 15, 19, '2014-05-22', 1400716800, 1, 1),
(6, 19, 24, '2014-06-22', 1403395200, 1, 1),
(7, 0, 0, '0000-00-00', 1388534400, 2, 2),
(8, 0, 0, '2014-01-01', 1388534400, 0, 3),
(9, 0, 0, '0000-00-00', 1388534400, 0, 4),
(10, 0, 0, '2014-01-01', 1388534400, 2, 5),
(11, 24, 30, '2014-07-25', 1406246400, 0, 1),
(12, 0, 0, '2015-12-01', 1448928000, 0, 6),
(13, 0, 50, '2014-01-01', 1388534400, 0, 7),
(14, 0, 1003, '2015-01-25', 1422144000, 0, 6),
(15, 50, 54, '2015-01-01', 1420070400, 0, 8),
(16, 0, 0, '2015-01-01', 1420070400, 0, 9),
(17, 105, 105, '2015-01-01', 1420070400, 0, 10),
(18, 250, 250, '2015-01-01', 1420070400, 0, 11);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `depense`
--

INSERT INTO `depense` (`id_depense`, `d_senelec`, `d_gazoil`, `d_entretien`, `salaire_conducteur`, `salaire_gerant`, `salaire_releveur`, `d_divers`, `date_depense`, `timestamp`, `detail`) VALUES
(1, 15000, 50000, 25000, 25000, 25000, 25000, 10000, '2014-12-24', 1419379200, 'achat de papier A4');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id_recette` int(11) NOT NULL AUTO_INCREMENT,
  `r_facture` int(11) NOT NULL,
  `r_abreuvoir` int(11) NOT NULL,
  `r_potence` int(11) NOT NULL,
  `divers` int(11) NOT NULL,
  `bon_coupure` int(11) NOT NULL,
  `date_recette` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_recette`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`id_recette`, `r_facture`, `r_abreuvoir`, `r_potence`, `divers`, `bon_coupure`, `date_recette`, `timestamp`, `detail`) VALUES
(1, 0, 50000, 80000, 55000, 0, '2014-12-24', 1419379200, 'remboursement ');

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
(1, 250, '2014-08-10');

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
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`id_variable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `variables`
--

INSERT INTO `variables` (`id_variable`, `title`, `nom_asufor`, `nombre_villages`, `texte_accueil`, `annee`) VALUES
(1, 'Seokhaye', 'ASUFOR DE SEOKHAYE', 8, 'Le forage de Séokhaye qui fait partie des forages de l''ASUFOR assure la production et la distribution en eau dans les principaux villages de la communauté Rurale de Ngoundiane. Il alimente ainsi des milliers d''habitants avec 8 village desservis.\r\nReconnu comme l''un des meilleurs références dans la localité dans le domaine de la gestion des services d''eau  potable, l''ASUFOR de Séokhaye s''illustre par la qualité de son management et le professionnalisme de ses dirigeants.', 2013);

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
