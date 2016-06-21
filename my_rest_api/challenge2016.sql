-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 13 Février 2016 à 20:23
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `challenge2016`
--

-- --------------------------------------------------------

--
-- Structure de la table `Calendrier`
--

CREATE TABLE IF NOT EXISTS `Calendrier` (
  `id_calendrier` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_calendrier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Calendrier`
--

INSERT INTO `Calendrier` (`id_calendrier`, `chemin`) VALUES
(1, './Calendrier/calendrier2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Ecoles`
--

CREATE TABLE IF NOT EXISTS `Ecoles` (
  `id_ecole` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ecole` varchar(255) NOT NULL,
  `abreviation` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `etat_ecole` int(1) NOT NULL,
  `logo_ecole` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ecole`),
  UNIQUE KEY `nom` (`nom_ecole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Ecoles`
--

INSERT INTO `Ecoles` (`id_ecole`, `nom_ecole`, `abreviation`, `points`, `etat_ecole`, `logo_ecole`) VALUES
(1, 'Ecole Centrale de Lyon', 'ECL', 200, 1, './Logos/ECL.png'),
(2, 'Ecole Centrale de Nantes', 'ECN', 150, 1, './Logos/ECN.jpg'),
(3, 'Ecole Centrale de Lille', 'ECLille', 100, 1, './Logos/ECLille.jpg'),
(4, 'Ecole Centrale de Marseille', 'ECM', 80, 1, './Logos/ECM.jpg'),
(5, 'Ecole Centrale de Paris', 'ECP', 50, 1, './Logos/ECP.png'),
(6, 'EM Lyon', 'EML', 0, 1, './Logos/EML.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Equipes`
--

CREATE TABLE IF NOT EXISTS `Equipes` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(255) NOT NULL,
  `type_equipe` varchar(50) NOT NULL,
  `type_sport` varchar(50) NOT NULL,
  `id_ecole` int(11) NOT NULL,
  `etat_equipe` int(1) NOT NULL,
  PRIMARY KEY (`id_equipe`),
  UNIQUE KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `Equipes`
--

INSERT INTO `Equipes` (`id_equipe`, `nom_equipe`, `type_equipe`, `type_sport`, `id_ecole`, `etat_equipe`) VALUES
(1, 'ECL Foot H', 'Homme', 'Football', 1, 1),
(2, 'ECLille Foot H', 'Homme', 'Football', 3, 1),
(3, 'ECN Foot H', 'Homme', 'Football', 2, 1),
(4, 'ECM Foot H', 'Homme', 'Football', 4, 1),
(5, 'ECP Foot H', 'Homme', 'Football', 5, 1),
(6, 'EML Foot H', 'Homme', 'Football', 6, 1),
(7, 'ECL Basket F', 'Femme', 'Basketball', 1, 1),
(8, 'ECN Basket F', 'Femme', 'Basketball', 2, 1),
(9, 'ECLille Basket F', 'Femme', 'Basketball', 3, 1),
(10, 'ECM Basket F', 'Femme', 'Basketball', 4, 1),
(11, 'ECP Basket F', 'Femme', 'Basketball', 5, 1),
(12, 'EML Basket F', 'Femme', 'Basketball', 6, 1),
(13, 'ECL Volley H', 'Homme', 'Volley', 1, 1),
(14, 'ECN Volley H', 'Homme', 'Volley', 2, 1),
(15, 'ECLille Volley H', 'Homme', 'Volley', 3, 1),
(16, 'ECM Volley H', 'Homme', 'Volley', 4, 1),
(17, 'ECP Volley H', 'Homme', 'Volley', 5, 1),
(18, 'EML Volley H', 'Homme', 'Volley', 6, 1),
(19, 'ECL Atle1 H', 'Homme', 'Athletisme', 1, 1),
(20, 'ECL Athle2 H', 'Homme', 'Athletisme', 1, 1),
(21, 'EML Athle1 H', 'Homme', 'Athletisme', 6, 1),
(22, 'EML Athle 2 H', 'Homme', 'Athletisme', 6, 1),
(23, 'ECP Bad1 F', 'Femme', 'Badminton', 5, 1),
(24, 'ECM Bad1 F', 'Femme', 'Badminton', 4, 1),
(25, 'ECLile Esc1 H', 'Homme', 'Escalade', 3, 1),
(26, 'ECP Esc1 H', 'Homme', 'Escalade', 5, 1),
(27, 'ECM Escr1 F', 'Femme', 'Escrime', 4, 1),
(28, 'EML Escr1 F', 'Femme', 'Escrime', 6, 1),
(29, 'ECL Golf1 H', 'Homme', 'Golf', 1, 1),
(30, 'ECP Judo1 F', 'Femme', 'Judo', 5, 1),
(31, 'ECN Judo 1 F', 'Femme', 'Judo', 2, 1),
(32, 'ECL Nat1 H', 'Homme', 'Natation', 1, 1),
(33, 'ECN Nat1 H', 'Homme', 'Natation', 2, 1),
(34, 'ECL Eq1', 'Mixte', 'Raid', 1, 1),
(35, 'ECL Eq2', 'Mixte', 'Raid', 1, 1),
(36, 'ECM Eq1', 'Mixte', 'Raid', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Faq`
--

CREATE TABLE IF NOT EXISTS `Faq` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `reponse` mediumtext NOT NULL,
  `titre` mediumtext NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `Faq`
--

INSERT INTO `Faq` (`id_question`, `question`, `reponse`, `titre`) VALUES
(1, 'OÛ puis-je voir le classement ?', 'Les résultats sont disponibles dans l''onglet écoles.', 'Sport'),
(2, 'Comment me rendre sur un site sportif ?', 'Si tu participes au Challenge en tant que sportif, des navettes se chargent de t''emmener sur le lieu de ton tournoi.', 'Sport'),
(3, 'Comment connaître les horaires des matchs ?', 'Les horaires des matchs sont disponibles dans l''onglet Matchs, mais tu peux aussi demander à  ton VP tournoi.', 'Sport'),
(4, 'Quand se déroule la remise des prix ?', 'Les remises des prix des sports individuels ont lieu à  la fin des finales de chaque sport. La remise des prix des sports collectifs se déroule le Dimanche à  partir de 13h en face du foyer.', 'Sport'),
(5, 'Comment savoir oû se déroule un match si je veux le voir ?', 'Si tu souhaites assister à  des matchs, les différents lieux se trouvent dans l''onglet Matchs.', 'Sport'),
(7, 'Que puis-je faire sur le Campus la journée avant la soirée ?', 'Si tu es sur le Campus, tu peux aller faire un tour au Village Challenge oÃ¹ des activités te seront proposées. Amuse-toi aussi à  défier tes amis au combat de suros ou à  parier sur les matchs. Si tu veux te détendre, des ostéopathes sont là  pour te masser ! Regarde le programme ou ton livret participant pour avoir les horaires et les lieux !', 'Communication'),
(8, 'Quelles sont les horaires d''ouverture du point infos ?', 'Le point infos ouvre le Samedi à  partir de 9h, et le Dimanche de 8h à  13h30.', 'Communication'),
(9, 'J''ai des questions sur l''organisation, à  qui puis-je les poser ?', 'Si tu as des questions, passe au point infos.', 'Communication'),
(10, 'Comment joindre la Croix-Rouge ?', 'Si tu souhaites contacter la Croix-Rouge, les coordonnées sont disponibles dans l''onglet Urgences.', 'Securite'),
(11, 'Comment me rendre à  la Croix-Rouge ?', 'Pour trouver la Croix-Rouge, regarde le plan du Campus dans l''onglet Plans.', 'Securite'),
(13, 'A quelle heure puis-je manger au RU ?', 'Les horaires du RU sont disponible dans l''onglet Calendrier. Mais si tu rentres tôt de ta compétition, n''hésite pas à  y aller, il y aura moins de monde.', 'Logistique');

-- --------------------------------------------------------

--
-- Structure de la table `Infos`
--

CREATE TABLE IF NOT EXISTS `Infos` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_info` varchar(255) NOT NULL,
  `image_info` varchar(255) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Infos`
--

INSERT INTO `Infos` (`id_info`, `titre`, `contenu`, `date_info`, `image_info`) VALUES
(8, 'Les navettes sont là', 'Venez embarquer les navettes sont à l''entrée de l''école', 'Vendredi 18 Mars', './Infos/19_41_24.jpg'),
(9, 'Soirée ce soir', 'La soirée annonce déjà ses couleurs!! Don''t miss it', 'Vendredi 18 Mars', './Infos/19_43_59.jpg'),
(10, 'RU ouvert', 'Venez au Restaurant ', 'Vendredi 18 Mars', './Infos/19_56_22.png');

-- --------------------------------------------------------

--
-- Structure de la table `Matchs`
--

CREATE TABLE IF NOT EXISTS `Matchs` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `sport` varchar(50) NOT NULL,
  `equipe1` varchar(255) NOT NULL,
  `equipe2` varchar(255) NOT NULL,
  `date_match` varchar(255) NOT NULL,
  `heure_match` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `phase` varchar(50) NOT NULL,
  `etat` int(1) NOT NULL,
  `poule` int(11) NOT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `Matchs`
--

INSERT INTO `Matchs` (`id_match`, `sport`, `equipe1`, `equipe2`, `date_match`, `heure_match`, `lieu`, `score1`, `score2`, `phase`, `etat`, `poule`) VALUES
(2, 'Basketball', 'ECL Basket F', 'ECLille Basket F', 'Samedi 19 Mars', '11:15', 'Ecully', 7, 1, 'Poule', 1, 1),
(3, 'Basketball', 'ECN Basket F', 'ECLille Basket F', 'Samedi 19 Mars', '11:30', 'Ecully', 0, 0, 'Poule', 0, 1),
(4, 'Basketball', 'ECM Basket F', 'ECP Basket F', 'Samedi 19 Mars', '11:00', 'Doua', 0, 0, 'Poule', 0, 2),
(5, 'Basketball', 'ECM Basket F', 'EML Basket F', 'Samedi 19 Mars', '11:15', 'Doua', 0, 0, 'Poule', 0, 2),
(6, 'Basketball', 'ECP Basket F', 'EML Basket F', 'Samedi 19 Mars', '11:30', 'Doua', 0, 0, 'Poule', 0, 2),
(7, 'Football', 'ECL Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '9:00', 'Ecully', 0, 0, 'Poule', 0, 1),
(8, 'Football', 'ECL Foot H', 'ECN Foot H', 'Samedi 19 Mars', '9:15', 'Ecully', 0, 0, 'Poule', 0, 1),
(9, 'Football', 'ECLille Foot H', 'ECN Foot H', 'Samedi 19 Mars', '9:30', 'Ecully', 0, 0, 'Poule', 0, 1),
(10, 'Football', 'ECM Foot H', 'ECP Foot H', 'Samedi 19 Mars', '9:00', 'Centrale Lyon', 0, 0, 'Poule', 0, 2),
(11, 'Football', 'ECM Foot H', 'EML Foot H', 'Samedi 19 Mars', '9:15', 'Centrale Lyon', 0, 0, 'Poule', 0, 2),
(12, 'Football', 'ECP Foot H', 'EML Foot H', 'Samedi 19 Mars', '9:30', 'Centrale Lyon', 0, 0, 'Poule', 0, 2),
(13, 'Volley', 'ECL Volley H', 'ECN Volley H', 'Samedi 19 Mars', '14:00', 'Ecully', 0, 0, 'Poule', 0, 1),
(14, 'Volley', 'ECL Volley H', 'ECLille Volley H', 'Samedi 19 Mars', '14:15', 'Ecully', 0, 0, 'Poule', 0, 1),
(15, 'Volley', 'ECN Volley H', 'ECLille Volley H', 'Samedi 19 Mars', '14:30', 'Ecully', 0, 0, 'Poule', 0, 1),
(16, 'Volley', 'ECM Volley H', 'ECP Volley H', 'Dimanche 20 Mars', '13:00', 'Ecully', 0, 0, 'Poule', 0, 2),
(17, 'Volley', 'ECM Volley H', 'EML Volley H', 'Dimanche 20 Mars', '13:15', 'Ecully', 0, 0, 'Poule', 0, 2),
(18, 'Volley', 'ECP Volley H', 'EML Volley H', 'Dimanche 20 Mars', '13:30', 'Ecully', 0, 0, 'Poule', 0, 2),
(19, 'Football', 'ECM Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '00', 'Ecully', 0, 0, 'Quart_finale', 0, 0),
(20, 'Football', 'ECN Foot H', 'ECL Foot H', 'Samedi 19 Mars', '00', 'Ecully', 0, 0, 'Finale', 0, 0),
(21, 'Basketball', 'ECL Basket F', 'ECN Basket F', 'Samedi 19 Mars', '10:00', 'Ecully', 0, 0, 'Poule', 0, 1),
(22, 'Basketball', 'ECLille Basket F', 'ECM Basket F', 'Samedi 19 Mars', '11:00', 'Doua', 0, 0, 'Poule', 0, 2),
(24, 'Football', 'ECL Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '08:00', 'Ecully', 0, 0, 'Poule', 0, 1),
(25, 'Football', 'ECN Foot H', 'ECM Foot H', 'Samedi 19 Mars', '12:00', 'Ecully', 0, 0, 'Poule', 0, 1),
(26, 'Football', 'ECP Foot H', 'EML Foot H', 'Dimanche 20 Mars', '11:00', 'Ecully', 0, 0, 'Demie_finale', 0, 0),
(27, 'Volley', 'ECL Volley H', 'ECM Volley H', 'Samedi 19 Mars', '11:00', 'Ecully', 0, 0, 'Poule', 0, 2),
(28, 'Volley', 'EML Volley H', 'ECP Basket F', 'Dimanche 20 Mars', '11:00', 'Ecully', 0, 0, 'Poule', 0, 6),
(29, 'Football', 'EML Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '18:30', 'Centrale Lyon', 0, 0, 'Huitieme_finale', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `MatchsSpecial`
--

CREATE TABLE IF NOT EXISTS `MatchsSpecial` (
  `id_match_special` int(11) NOT NULL AUTO_INCREMENT,
  `sport` varchar(255) NOT NULL,
  `equipe` varchar(255) NOT NULL,
  `classement_equipe` int(11) NOT NULL,
  PRIMARY KEY (`id_match_special`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `MatchsSpecial`
--

INSERT INTO `MatchsSpecial` (`id_match_special`, `sport`, `equipe`, `classement_equipe`) VALUES
(1, 'Athletisme', 'EML Athle1 H', 0),
(2, 'Athletisme', 'ECL Atle1 H', 0),
(3, 'Athletisme', 'ECL Athle2 H', 0),
(4, 'Badminton', 'ECP Bad1 F', 0),
(5, 'Badminton', 'ECM Bad1 F', 0),
(6, 'Escalade', 'ECLile Esc1 H', 0),
(7, 'Escalade', 'ECLile Esc1 H', 0),
(8, 'Escrime', 'ECM Escr1 F', 0),
(9, 'Escrime', 'EML Escr1 F', 0),
(10, 'Golf', 'ECL Golf1 H', 0),
(11, 'Natation', 'ECL Nat1 H', 0),
(12, 'Natation', 'ECN Nat1 H', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Photos`
--

CREATE TABLE IF NOT EXISTS `Photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_photo` varchar(255) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `date_photo` datetime NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Photos`
--

INSERT INTO `Photos` (`id_photo`, `nom_photo`, `chemin`, `date_photo`) VALUES
(1, '01_20_19Photo.jpg', './Photos/01_20_19Photo.jpg', '2016-02-12 01:20:19'),
(2, '01_20_36Photo.jpg', './Photos/01_20_36Photo.jpg', '2016-02-12 01:20:36'),
(3, '01_20_43Photo.jpg', './Photos/01_20_43Photo.jpg', '2016-02-12 01:20:43'),
(4, '01_20_50Photo.png', './Photos/01_20_50Photo.png', '2016-02-12 01:20:50');

-- --------------------------------------------------------

--
-- Structure de la table `Plans`
--

CREATE TABLE IF NOT EXISTS `Plans` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Plans`
--

INSERT INTO `Plans` (`id_plan`, `chemin`) VALUES
(1, './Plans/Centrale_plan.jpg'),
(2, './Plans/Doua_plan.jpg'),
(4, './Plans/Ecully_plan.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Urgences`
--

CREATE TABLE IF NOT EXISTS `Urgences` (
  `id_urgence` int(11) NOT NULL AUTO_INCREMENT,
  `urgence` varchar(255) NOT NULL,
  `numeros_tel` varchar(255) NOT NULL,
  `detail_urgence` mediumtext NOT NULL,
  PRIMARY KEY (`id_urgence`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Urgences`
--

INSERT INTO `Urgences` (`id_urgence`, `urgence`, `numeros_tel`, `detail_urgence`) VALUES
(1, 'Croix-Rouge', '04 82 53 91 15 - 06 52 47 53 57 ', 'Ce sont les numéros pour contacter la Croix-Rouge. Le premier est à utiliser en priorité.'),
(2, 'Sport', '---', 'Si c''est possible, contacte ton VP Sport par téléphone.');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `etat` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id`, `login`, `mdp`, `nom`, `profil`, `etat`) VALUES
(1, 'Blum', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'Damien', 'Super administrateur', 1),
(2, 'Fallou', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'SFallou', 'Super administrateur', 1),
(3, 'Daas', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'Mathieu', 'Super administrateur', 1),
(4, 'Akelo', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'Thomas', 'Super administrateur', 1),
(5, 'Cedric', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'Drymm', 'Super administrateur', 1),
(6, 'Challenge1', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'Challenger', 'Administrateur', 1),
(7, 'Sport1', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'VP Sport', 'VP Sport', 1),
(8, 'Club1', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'Club', 'Club Photo', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
