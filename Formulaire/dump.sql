-- ----------------------
-- dump de la base challenge2016 au 19-Apr-2016
-- ----------------------


-- -----------------------------
-- creation de la table Calendrier
-- -----------------------------
CREATE TABLE `Calendrier` (
  `id_calendrier` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_calendrier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Ecoles
-- -----------------------------
CREATE TABLE `Ecoles` (
  `id_ecole` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ecole` varchar(255) NOT NULL,
  `abreviation` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `etat_ecole` int(1) NOT NULL,
  `logo_ecole` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ecole`),
  UNIQUE KEY `nom` (`nom_ecole`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Equipes
-- -----------------------------
CREATE TABLE `Equipes` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(255) NOT NULL,
  `type_equipe` varchar(50) NOT NULL,
  `type_sport` varchar(50) NOT NULL,
  `id_ecole` int(11) NOT NULL,
  `etat_equipe` int(1) NOT NULL,
  PRIMARY KEY (`id_equipe`),
  UNIQUE KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Faq
-- -----------------------------
CREATE TABLE `Faq` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `reponse` mediumtext NOT NULL,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Infos
-- -----------------------------
CREATE TABLE `Infos` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_info` varchar(255) NOT NULL,
  `image_info` varchar(255) NOT NULL,
  `heure_info` varchar(50) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Matchs
-- -----------------------------
CREATE TABLE `Matchs` (
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table MatchsSpecial
-- -----------------------------
CREATE TABLE `MatchsSpecial` (
  `id_match_special` int(11) NOT NULL AUTO_INCREMENT,
  `sport` varchar(255) NOT NULL,
  `equipe` varchar(255) NOT NULL,
  `classement_equipe` int(11) NOT NULL,
  PRIMARY KEY (`id_match_special`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Photos
-- -----------------------------
CREATE TABLE `Photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_photo` varchar(255) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `date_photo` datetime NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Plans
-- -----------------------------
CREATE TABLE `Plans` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Urgences
-- -----------------------------
CREATE TABLE `Urgences` (
  `id_urgence` int(11) NOT NULL AUTO_INCREMENT,
  `urgence` varchar(255) NOT NULL,
  `numeros_tel` varchar(255) NOT NULL,
  `detail_urgence` mediumtext NOT NULL,
  PRIMARY KEY (`id_urgence`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- -----------------------------
-- creation de la table Users
-- -----------------------------
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `etat` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;



-- -----------------------------
-- insertions dans la table Calendrier
-- -----------------------------
INSERT INTO Calendrier VALUES(2, './Calendrier/18_19_26.png');

-- -----------------------------
-- insertions dans la table Ecoles
-- -----------------------------
INSERT INTO Ecoles VALUES(1, 'Ecole Centrale de Lyon', 'ECL', 200, 1, './Logos/ECL.png');
INSERT INTO Ecoles VALUES(2, 'Ecole Centrale de Nantes', 'ECN', 150, 1, './Logos/ECN.jpg');
INSERT INTO Ecoles VALUES(3, 'Ecole Centrale de Lille', 'ECLille', 100, 1, './Logos/ECLille.jpg');
INSERT INTO Ecoles VALUES(4, 'Ecole Centrale de Marseille', 'ECM', 80, 1, './Logos/ECM.jpg');
INSERT INTO Ecoles VALUES(5, 'Ecole Centrale de Paris', 'ECP', 50, 1, './Logos/ECP.png');
INSERT INTO Ecoles VALUES(6, 'EM Lyon', 'EML', 0, 1, './Logos/EML.jpg');

-- -----------------------------
-- insertions dans la table Equipes
-- -----------------------------
INSERT INTO Equipes VALUES(1, 'ECL Foot H', 'Homme', 'Football', 1, 1);
INSERT INTO Equipes VALUES(2, 'ECLille Foot H', 'Homme', 'Football', 3, 1);
INSERT INTO Equipes VALUES(3, 'ECN Foot H', 'Homme', 'Football', 2, 1);
INSERT INTO Equipes VALUES(4, 'ECM Foot H', 'Homme', 'Football', 4, 1);
INSERT INTO Equipes VALUES(5, 'ECP Foot H', 'Homme', 'Football', 5, 1);
INSERT INTO Equipes VALUES(6, 'EML Foot H', 'Homme', 'Football', 6, 1);
INSERT INTO Equipes VALUES(7, 'ECL Basket F', 'Femme', 'Basketball', 1, 1);
INSERT INTO Equipes VALUES(8, 'ECN Basket F', 'Femme', 'Basketball', 2, 1);
INSERT INTO Equipes VALUES(9, 'ECLille Basket F', 'Femme', 'Basketball', 3, 1);
INSERT INTO Equipes VALUES(10, 'ECM Basket F', 'Femme', 'Basketball', 4, 1);
INSERT INTO Equipes VALUES(11, 'ECP Basket F', 'Femme', 'Basketball', 5, 1);
INSERT INTO Equipes VALUES(12, 'EML Basket F', 'Femme', 'Basketball', 6, 1);
INSERT INTO Equipes VALUES(13, 'ECL Volley H', 'Homme', 'Volley', 1, 1);
INSERT INTO Equipes VALUES(14, 'ECN Volley H', 'Homme', 'Volley', 2, 1);
INSERT INTO Equipes VALUES(15, 'ECLille Volley H', 'Homme', 'Volley', 3, 1);
INSERT INTO Equipes VALUES(16, 'ECM Volley H', 'Homme', 'Volley', 4, 1);
INSERT INTO Equipes VALUES(17, 'ECP Volley H', 'Homme', 'Volley', 5, 1);
INSERT INTO Equipes VALUES(18, 'EML Volley H', 'Homme', 'Volley', 6, 1);
INSERT INTO Equipes VALUES(19, 'ECL Atle1 H', 'Homme', 'Athletisme', 1, 1);
INSERT INTO Equipes VALUES(20, 'ECL Athle2 H', 'Homme', 'Athletisme', 1, 1);
INSERT INTO Equipes VALUES(21, 'EML Athle1 H', 'Homme', 'Athletisme', 6, 1);
INSERT INTO Equipes VALUES(22, 'EML Athle 2 H', 'Homme', 'Athletisme', 6, 1);
INSERT INTO Equipes VALUES(23, 'ECP Bad1 F', 'Femme', 'Badminton', 5, 1);
INSERT INTO Equipes VALUES(24, 'ECM Bad1 F', 'Femme', 'Badminton', 4, 1);
INSERT INTO Equipes VALUES(25, 'ECLile Esc1 H', 'Homme', 'Escalade', 3, 1);
INSERT INTO Equipes VALUES(26, 'ECP Esc1 H', 'Homme', 'Escalade', 5, 1);
INSERT INTO Equipes VALUES(27, 'ECM Escr1 F', 'Femme', 'Escrime', 4, 1);
INSERT INTO Equipes VALUES(28, 'EML Escr1 F', 'Femme', 'Escrime', 6, 1);
INSERT INTO Equipes VALUES(29, 'ECL Golf1 H', 'Homme', 'Golf', 1, 1);
INSERT INTO Equipes VALUES(30, 'ECP Judo1 F', 'Femme', 'Judo', 5, 1);
INSERT INTO Equipes VALUES(31, 'ECN Judo 1 F', 'Femme', 'Judo', 2, 1);
INSERT INTO Equipes VALUES(32, 'ECL Nat1 H', 'Homme', 'Natation', 1, 1);
INSERT INTO Equipes VALUES(33, 'ECN Nat1 H', 'Homme', 'Natation', 2, 1);
INSERT INTO Equipes VALUES(34, 'ECL Eq1', 'Mixte', 'Raid', 1, 1);
INSERT INTO Equipes VALUES(35, 'ECL Eq2', 'Mixte', 'Raid', 1, 1);
INSERT INTO Equipes VALUES(36, 'ECM Eq1', 'Mixte', 'Raid', 4, 1);

-- -----------------------------
-- insertions dans la table Faq
-- -----------------------------
INSERT INTO Faq VALUES(2, 'qsedrbftngy,hblabla', 'okokokoi$puooynoggfvg', 'Sport');
INSERT INTO Faq VALUES(3, 'Comment connaître les horaires des matchs ?', 'Les horaires des matchs sont disponibles dans l\'onglet Matchs, mais tu peux aussi demander à  ton VP tournoi.', 'Sport');
INSERT INTO Faq VALUES(4, 'Quand se déroule la remise des prix ?', 'Les remises des prix des sports individuels ont lieu à  la fin des finales de chaque sport. La remise des prix des sports collectifs se déroule le Dimanche à  partir de 13h en face du foyer.', 'Sport');
INSERT INTO Faq VALUES(5, 'Comment savoir oû se déroule un match si je veux le voir ?', 'Si tu souhaites assister à  des matchs, les différents lieux se trouvent dans l\'onglet Matchs.', 'Sport');
INSERT INTO Faq VALUES(7, 'Que puis-je faire sur le Campus la journée avant la soirée ?', 'Si tu es sur le Campus, tu peux aller faire un tour au Village Challenge oÃ¹ des activités te seront proposées. Amuse-toi aussi à  défier tes amis au combat de suros ou à  parier sur les matchs. Si tu veux te détendre, des ostéopathes sont là  pour te masser ! Regarde le programme ou ton livret participant pour avoir les horaires et les lieux !', 'Communication');
INSERT INTO Faq VALUES(8, 'Quelles sont les horaires d\'ouverture du point infos ?', 'Le point infos ouvre le Samedi à  partir de 9h, et le Dimanche de 8h à  13h30.', 'Communication');
INSERT INTO Faq VALUES(9, 'J\'ai des questions sur l\'organisation, à  qui puis-je les poser ?', 'Si tu as des questions, passe au point infos.', 'Communication');
INSERT INTO Faq VALUES(10, 'Comment joindre la Croix-Rouge ?', 'Si tu souhaites contacter la Croix-Rouge, les coordonnées sont disponibles dans l\'onglet Urgences.', 'Securite');
INSERT INTO Faq VALUES(11, 'Comment me rendre à  la Croix-Rouge ?', 'Pour trouver la Croix-Rouge, regarde le plan du Campus dans l\'onglet Plans.', 'Securite');
INSERT INTO Faq VALUES(13, 'A quelle heure puis-je manger au RU ?', 'Les horaires du RU sont disponible dans l\'onglet Calendrier. Mais si tu rentres tôt de ta compétition, n\'hésite pas à  y aller, il y aura moins de monde.', 'Logistique');
INSERT INTO Faq VALUES(14, 'A qui \'adresser?', 'A moi', 'Communication');

-- -----------------------------
-- insertions dans la table Infos
-- -----------------------------
INSERT INTO Infos VALUES(10, 'RU  ouvre!', 'Venez au Restaurant ', 'Vendredi 18 Mars', './Infos/19_56_22.png', '12:30');
INSERT INTO Infos VALUES(11, 'on teste encore', ' blwxngggbuygbb', 'Mercredi 16 Mars', './Infos/15_39_17.png', '15:39');

-- -----------------------------
-- insertions dans la table Matchs
-- -----------------------------
INSERT INTO Matchs VALUES(2, 'Basketball', 'ECL Basket F', 'ECLille Basket F', 'Samedi 19 Mars', '11:15', 'Ecully', 7, 1, 'Poule', 1, 1);
INSERT INTO Matchs VALUES(3, 'Basketball', 'ECN Basket F', 'ECLille Basket F', 'Samedi 19 Mars', '11:30', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(4, 'Basketball', 'ECM Basket F', 'ECP Basket F', 'Samedi 19 Mars', '11:00', 'Doua', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(5, 'Basketball', 'ECM Basket F', 'EML Basket F', 'Samedi 19 Mars', '11:15', 'Doua', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(6, 'Basketball', 'ECP Basket F', 'EML Basket F', 'Samedi 19 Mars', '11:30', 'Doua', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(7, 'Football', 'ECL Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '9:00', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(8, 'Football', 'ECL Foot H', 'ECN Foot H', 'Samedi 19 Mars', '9:15', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(9, 'Football', 'ECLille Foot H', 'ECN Foot H', 'Samedi 19 Mars', '9:30', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(10, 'Football', 'ECM Foot H', 'ECP Foot H', 'Samedi 19 Mars', '9:00', 'Centrale Lyon', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(11, 'Football', 'ECM Foot H', 'EML Foot H', 'Samedi 19 Mars', '9:15', 'Centrale Lyon', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(12, 'Football', 'ECP Foot H', 'EML Foot H', 'Samedi 19 Mars', '9:30', 'Centrale Lyon', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(13, 'Volley', 'ECL Volley H', 'ECN Volley H', 'Samedi 19 Mars', '14:00', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(14, 'Volley', 'ECL Volley H', 'ECLille Volley H', 'Samedi 19 Mars', '14:15', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(15, 'Volley', 'ECN Volley H', 'ECLille Volley H', 'Samedi 19 Mars', '14:30', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(16, 'Volley', 'ECM Volley H', 'ECP Volley H', 'Dimanche 20 Mars', '13:00', 'Ecully', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(17, 'Volley', 'ECM Volley H', 'EML Volley H', 'Dimanche 20 Mars', '13:15', 'Ecully', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(18, 'Volley', 'ECP Volley H', 'EML Volley H', 'Dimanche 20 Mars', '13:30', 'Ecully', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(19, 'Football', 'ECM Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '00', 'Ecully', 0, 0, 'Quart_finale', 0, 0);
INSERT INTO Matchs VALUES(20, 'Football', 'ECN Foot H', 'ECL Foot H', 'Samedi 19 Mars', '00', 'Ecully', 0, 0, 'Finale', 0, 0);
INSERT INTO Matchs VALUES(21, 'Basketball', 'ECL Basket F', 'ECN Basket F', 'Samedi 19 Mars', '10:00', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(22, 'Basketball', 'ECLille Basket F', 'ECM Basket F', 'Samedi 19 Mars', '11:00', 'Doua', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(24, 'Football', 'ECL Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '08:00', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(25, 'Football', 'ECN Foot H', 'ECM Foot H', 'Samedi 19 Mars', '12:00', 'Ecully', 0, 0, 'Poule', 0, 1);
INSERT INTO Matchs VALUES(26, 'Football', 'ECP Foot H', 'EML Foot H', 'Dimanche 20 Mars', '11:00', 'Ecully', 0, 0, 'Demie_finale', 0, 0);
INSERT INTO Matchs VALUES(27, 'Volley', 'ECL Volley H', 'ECM Volley H', 'Samedi 19 Mars', '11:00', 'Ecully', 0, 0, 'Poule', 0, 2);
INSERT INTO Matchs VALUES(28, 'Volley', 'EML Volley H', 'ECP Basket F', 'Dimanche 20 Mars', '11:00', 'Ecully', 0, 0, 'Poule', 0, 6);
INSERT INTO Matchs VALUES(29, 'Football', 'EML Foot H', 'ECLille Foot H', 'Samedi 19 Mars', '18:30', 'Centrale Lyon', 0, 0, 'Huitieme_finale', 0, 0);
INSERT INTO Matchs VALUES(30, 'Basketball', 'ECL Basket F', 'ECN Basket F', 'Mardi 18 Mars', '10:30', 'Ecully', 0, 5, 'Petite_finale', 0, 16);
INSERT INTO Matchs VALUES(31, 'Football', 'ECL Foot H', 'ECLille Foot H', 'Lundi 15 Avril', '18:00', 'Ecully', 0, 0, 'Barrage', 0, 3);

-- -----------------------------
-- insertions dans la table MatchsSpecial
-- -----------------------------
INSERT INTO MatchsSpecial VALUES(1, 'Athletisme', 'EML Athle1 H', 0);
INSERT INTO MatchsSpecial VALUES(2, 'Athletisme', 'ECL Atle1 H', 0);
INSERT INTO MatchsSpecial VALUES(3, 'Athletisme', 'ECL Athle2 H', 0);
INSERT INTO MatchsSpecial VALUES(4, 'Badminton', 'ECP Bad1 F', 0);
INSERT INTO MatchsSpecial VALUES(5, 'Badminton', 'ECM Bad1 F', 0);
INSERT INTO MatchsSpecial VALUES(6, 'Escalade', 'ECLile Esc1 H', 0);
INSERT INTO MatchsSpecial VALUES(7, 'Escalade', 'ECLile Esc1 H', 0);
INSERT INTO MatchsSpecial VALUES(8, 'Escrime', 'ECM Escr1 F', 0);
INSERT INTO MatchsSpecial VALUES(9, 'Escrime', 'EML Escr1 F', 0);
INSERT INTO MatchsSpecial VALUES(11, 'Natation', 'ECL Nat1 H', 0);
INSERT INTO MatchsSpecial VALUES(12, 'Natation', 'ECN Nat1 H', 0);
INSERT INTO MatchsSpecial VALUES(13, 'Golf', 'ECL Golf1 H', 0);

-- -----------------------------
-- insertions dans la table Photos
-- -----------------------------
INSERT INTO Photos VALUES(1, '01_20_19Photo.jpg', './Photos/01_20_19Photo.jpg', 2016-02-12 01:20:19);
INSERT INTO Photos VALUES(2, '01_20_36Photo.jpg', './Photos/01_20_36Photo.jpg', 2016-02-12 01:20:36);
INSERT INTO Photos VALUES(3, '01_20_43Photo.jpg', './Photos/01_20_43Photo.jpg', 2016-02-12 01:20:43);
INSERT INTO Photos VALUES(4, '01_20_50Photo.png', './Photos/01_20_50Photo.png', 2016-02-12 01:20:50);

-- -----------------------------
-- insertions dans la table Plans
-- -----------------------------
INSERT INTO Plans VALUES(1, './Plans/Centrale_plan.jpg');
INSERT INTO Plans VALUES(2, './Plans/Doua_plan.jpg');
INSERT INTO Plans VALUES(5, './Plans/17_55_10.png');

-- -----------------------------
-- insertions dans la table Urgences
-- -----------------------------
INSERT INTO Urgences VALUES(1, 'Croix-Rouge', '03 82 53 91 15 - 06 52 47 53 57 ', 'Ce sont les numéros pour contacter la Croix-Rouge. Le premier est à utiliser en priorité.');
INSERT INTO Urgences VALUES(2, 'Sport', '0618765442', 'zedrbtngy,àhj;cbvgnubhnin55555555555');

-- -----------------------------
-- insertions dans la table Users
-- -----------------------------
INSERT INTO Users VALUES(1, 'blum', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'Damien', 'Administrateur', 2);
INSERT INTO Users VALUES(3, 'Daas', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'Mathieu', 'Administrateur', 2);
INSERT INTO Users VALUES(5, 'Cedric', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'Drymm', 'Challenge', 1);
INSERT INTO Users VALUES(8, 'Club1', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'Club', 'Photographe', 1);
INSERT INTO Users VALUES(9, 'sfallou', '4a700ec84b5396a79b26539c2433c6a0fb998dab', 'sfallou', 'Administrateur', 1);
INSERT INTO Users VALUES(11, 'ok', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'ok', 'Challenge', 1);

