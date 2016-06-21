-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 11 Juillet 2015 à 11:12
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `classe`
--

-- --------------------------------------------------------

--
-- Structure de la table `dic_citoyen`
--

CREATE TABLE `dic_citoyen` (
  `cty_id` int(11) NOT NULL,
  `cty_prenom` varchar(50) DEFAULT NULL,
  `cty_nom` varchar(50) DEFAULT NULL,
  `cty_datenaissance` datetime DEFAULT NULL,
  `cty_lieunaissance` varchar(50) DEFAULT NULL,
  `cty_nci` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dic_citoyen`
--

INSERT INTO `dic_citoyen` (`cty_id`, `cty_prenom`, `cty_nom`, `cty_datenaissance`, `cty_lieunaissance`, `cty_nci`) VALUES
(1, 'Oumar', 'DIOP', '2015-06-02 04:11:13', 'Dakar', 123456),
(2, 'Moussa', 'DIOP', '2015-06-17 03:17:16', 'PIKINE', 67898),
(3, 'Madiopa', 'SARR', '2015-06-02 04:11:13', 'Dakar', 123456),
(4, 'Doudou', 'DIOPI', '2015-06-17 03:17:16', 'PIKINE', 67898),
(5, 'Aminata', 'DIOPA', '2015-06-17 03:24:14', 'Keur Massar', 98567),
(6, 'Oumou ', 'BA', '2015-06-18 11:15:18', 'HLM5', 9873456),
(7, 'Fallou', 'NGOM', '2015-07-21 09:19:34', 'NGOUNDIANE', 232576432);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(20) NOT NULL,
  `prenomUser` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `prenomUser`, `email`, `password`) VALUES
(1, 'GUILAVOGUI', 'Philippe Kolama ', 'philippegui2@toto.com', '482f7629a2511d23ef4e958b13a5ba54bdba06f2'),
(2, 'GUILAVOGUI', 'Urbain Noel Kama', 'urbain@toto.com', '482f7629a2511d23ef4e958b13a5ba54bdba06f2'),
(3, 'NGOM', 'Fallou', 'louf@toto.com', '482f7629a2511d23ef4e958b13a5ba54bdba06f2'),
(4, 'GUILAVOGUI', 'Remy Francois', 'remy@toto.com', '482f7629a2511d23ef4e958b13a5ba54bdba06f2');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `dic_citoyen`
--
ALTER TABLE `dic_citoyen`
  ADD PRIMARY KEY (`cty_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dic_citoyen`
--
ALTER TABLE `dic_citoyen`
  MODIFY `cty_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;