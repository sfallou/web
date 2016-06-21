-- ----------------------
-- dump de la base asufor au 16-Apr-2016
-- ----------------------


-- -----------------------------
-- creation de la table abonne
-- -----------------------------
CREATE TABLE `abonne` (
  `id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cni` bigint(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_abonnement` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `frais_abonnement` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table attente
-- -----------------------------
CREATE TABLE `attente` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table compte
-- -----------------------------
CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `profil` varchar(25) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table compteur
-- -----------------------------
CREATE TABLE `compteur` (
  `id_compteur` int(11) NOT NULL AUTO_INCREMENT,
  `ancien_index` int(11) NOT NULL,
  `nouvel_index` int(11) NOT NULL,
  `date_index` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  PRIMARY KEY (`id_compteur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table depense
-- -----------------------------
CREATE TABLE `depense` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table dette
-- -----------------------------
CREATE TABLE `dette` (
  `id_dette` int(11) NOT NULL AUTO_INCREMENT,
  `montant_dette` bigint(11) NOT NULL,
  `num_facture` bigint(11) NOT NULL,
  `id_abonne` int(11) NOT NULL,
  `date_dette` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `spciale` int(11) NOT NULL,
  PRIMARY KEY (`id_dette`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table recette
-- -----------------------------
CREATE TABLE `recette` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table tarif
-- -----------------------------
CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `montant_tarif` int(11) NOT NULL,
  `date_tarif` date NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -----------------------------
-- creation de la table variables
-- -----------------------------
CREATE TABLE `variables` (
  `id_variable` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nom_asufor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nombre_villages` int(11) NOT NULL,
  `texte_accueil` text CHARACTER SET latin1 NOT NULL,
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`id_variable`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- -----------------------------
-- creation de la table villages
-- -----------------------------
CREATE TABLE `villages` (
  `id_village` int(11) NOT NULL AUTO_INCREMENT,
  `nom_village` varchar(255) NOT NULL,
  PRIMARY KEY (`id_village`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;



-- -----------------------------
-- insertions dans la table abonne
-- -----------------------------
INSERT INTO abonne VALUES(1, 'Wade', 'PAPA', 12547862255, 'seokhaye', 2147483647, 0000-00-00, 1420048800, 0, 1);
INSERT INTO abonne VALUES(2, 'Fall', 'Ahmet', 12345678910, 'village_special', 701254852, 0000-00-00, 1420048800, 15000, 1);
INSERT INTO abonne VALUES(3, 'Kandji', 'Serigne Matar', 12547862249, 'sine', 2147483647, 0000-00-00, 1420048800, 250, 1);

-- -----------------------------
-- insertions dans la table attente
-- -----------------------------

-- -----------------------------
-- insertions dans la table compte
-- -----------------------------
INSERT INTO compte VALUES(1, 'kandji', 'serigne', 'tresorier', 'forage', 'forage', 0000-00-00);
INSERT INTO compte VALUES(3, 'diop', 'mor', 'gerant', 'forage', 'asufor', 0000-00-00);
INSERT INTO compte VALUES(10, 'ndiaye', 'serigne', 'administrateur', 'admin', 'admin', 0000-00-00);

-- -----------------------------
-- insertions dans la table compteur
-- -----------------------------
INSERT INTO compteur VALUES(1, 3250, 3295, 0000-00-00, 1420048800, 1, 1, 0);
INSERT INTO compteur VALUES(2, 75, 84, 0000-00-00, 1420048800, 1, 2, 1);
INSERT INTO compteur VALUES(3, 1250, 1268, 0000-00-00, 1420048800, 1, 3, 0);
INSERT INTO compteur VALUES(4, 3295, 3302, 0000-00-00, 1424368800, 1, 1, 0);
INSERT INTO compteur VALUES(5, 84, 103, 0000-00-00, 1424368800, 0, 2, 1);
INSERT INTO compteur VALUES(6, 1268, 1289, 0000-00-00, 1424368800, 0, 3, 0);
INSERT INTO compteur VALUES(7, 3302, 3325, 0000-00-00, 1426788000, 0, 1, 0);

-- -----------------------------
-- insertions dans la table depense
-- -----------------------------
INSERT INTO depense VALUES(1, 5000, 5000, 5000, 2000, 2000, 2000, 5000, 0000-00-00, 1439920800, 'RAS');

-- -----------------------------
-- insertions dans la table dette
-- -----------------------------

-- -----------------------------
-- insertions dans la table recette
-- -----------------------------
INSERT INTO recette VALUES(1, 0, 150000, 15000, 0, 0, 0000-00-00, 1439920800, 'Normal');

-- -----------------------------
-- insertions dans la table tarif
-- -----------------------------
INSERT INTO tarif VALUES(1, 250, 0000-00-00);
INSERT INTO tarif VALUES(2, 400, 0000-00-00);

-- -----------------------------
-- insertions dans la table variables
-- -----------------------------
INSERT INTO variables VALUES(1, 'Seokhaye', 'ASUFOR DE SEOKHAYE', 8, 'Le forage de S?okhaye qui fait partie des forages de l\'ASUFOR assure la production et la distribution en eau dans les principaux villages de la communaut? Rurale de Ngoundiane. Il alimente ainsi des milliers d\'habitants avec 8 village desservis.
Reconnu comme l\'un des meilleurs r?f?rences dans la localit? dans le domaine de la gestion des services d\'eau  potable, l\'ASUFOR de S?okhaye s\'illustre par la qualit? de son management et le professionnalisme de ses dirigeants.', 2013);

-- -----------------------------
-- insertions dans la table villages
-- -----------------------------
INSERT INTO villages VALUES(1, 'seokhaye');
INSERT INTO villages VALUES(2, 'sine');
INSERT INTO villages VALUES(3, 'keur_ibra');
INSERT INTO villages VALUES(4, 'kanene');
INSERT INTO villages VALUES(5, 'daradja');
INSERT INTO villages VALUES(6, 'keur_mory');
INSERT INTO villages VALUES(7, 'keur_malamine');
INSERT INTO villages VALUES(8, 'khourwa');
INSERT INTO villages VALUES(9, 'village_special');

