--
-- Base de données: `TESTLAMB`
--
Create database IF NOT EXISTS TESTLAMB;
use TESTLAMB;

-- --------------------------------------------------------

--
-- Structure de la table `lutteur`
--

CREATE TABLE `lutteur` (
  `idlutteur` int(5) NOT NULL auto_increment,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `surnom` varchar(20) NOT NULL,
  `ecurie` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `taille` int(3) NOT NULL,
  `poids` int(3) NOT NULL,
  PRIMARY KEY  (`idlutteur`),
  UNIQUE KEY `surnom` (`surnom`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10000 ;

--
-- Contenu de la table `lutteur`
--

INSERT INTO `lutteur` (`idlutteur`, `nom`, `prenom`, `surnom`, `ecurie`, `age`, `taille`, `poids`) VALUES
(1, 'Diop', 'Yahya', 'YEKINI', 'Ndakarou', 37, 170, 120);

