-- 
-- Base de données: `regions`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `region`
-- 

CREATE TABLE `region` (
  `id_region`   tinyint(4)   NOT NULL   auto_increment,
  `region`      varchar(50)   NOT NULL   default '',
  PRIMARY KEY  (`id_region`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `departement`
-- 

CREATE TABLE `departement` (
  `id_departement`   char(2)   NOT NULL   default '',
  `departement`      varchar(50)   NOT NULL   default '',
  `id_region`      tinyint(4)   NOT NULL   default '0',
  PRIMARY KEY  (`id_departement`),
  KEY `id_region` (`id_region`)
);

-- --------------------------------------------------------

-- 
-- Contenu de la table `region`
-- 

INSERT INTO `region` VALUES (1, 'Alsace');
INSERT INTO `region` VALUES (2, 'Aquitaine');
INSERT INTO `region` VALUES (3, 'Auvergne');
INSERT INTO `region` VALUES (4, 'Basse-Normandie');
INSERT INTO `region` VALUES (5, 'Bourgogne');
INSERT INTO `region` VALUES (6, 'Bretagne');
INSERT INTO `region` VALUES (7, 'Centre');
INSERT INTO `region` VALUES (8, 'Champagne');
INSERT INTO `region` VALUES (9, 'Corse');
INSERT INTO `region` VALUES (10, 'Franche-Comté');
INSERT INTO `region` VALUES (11, 'Haute-Normandie');
INSERT INTO `region` VALUES (12, 'Île-de-France');
INSERT INTO `region` VALUES (13, 'Languedoc-Roussillon');
INSERT INTO `region` VALUES (14, 'Limousin');
INSERT INTO `region` VALUES (15, 'Lorraine');
INSERT INTO `region` VALUES (16, 'Midi-Pyrénées');
INSERT INTO `region` VALUES (17, 'Nord-pas-de-Calais');
INSERT INTO `region` VALUES (18, 'Pays de la Loire');
INSERT INTO `region` VALUES (19, 'Picardie');
INSERT INTO `region` VALUES (20, 'Poitou-Charentes');
INSERT INTO `region` VALUES (21, 'Provence-Alpes-Côte-Azur');
INSERT INTO `region` VALUES (22, 'Rhône-Alpes');

-- 
-- Contenu de la table `departement`
-- 

INSERT INTO `departement` VALUES ('01', 'Ain', 22);
INSERT INTO `departement` VALUES ('02', 'Aisne', 19);
INSERT INTO `departement` VALUES ('03', 'Allier', 3);
INSERT INTO `departement` VALUES ('04', 'Alpes-de-Haute-Provence', 21);
INSERT INTO `departement` VALUES ('05', 'Hautes-Alpes', 21);
INSERT INTO `departement` VALUES ('06', 'Alpes-Maritimes', 21);
INSERT INTO `departement` VALUES ('07', 'Ardèche', 22);
INSERT INTO `departement` VALUES ('08', 'Ardennes', 8);
INSERT INTO `departement` VALUES ('09', 'Ariège', 16);
INSERT INTO `departement` VALUES ('10', 'Aube', 8);
INSERT INTO `departement` VALUES ('11', 'Aude', 13);
INSERT INTO `departement` VALUES ('12', 'Aveyron', 16);
INSERT INTO `departement` VALUES ('13', 'Bouches-du-Rhône', 21);
INSERT INTO `departement` VALUES ('14', 'Calvados', 4);
INSERT INTO `departement` VALUES ('15', 'Cantal', 3);
INSERT INTO `departement` VALUES ('16', 'Charente', 20);
INSERT INTO `departement` VALUES ('17', 'Charente-Maritime', 20);
INSERT INTO `departement` VALUES ('18', 'Cher', 7);
INSERT INTO `departement` VALUES ('19', 'Corrèze', 14);
INSERT INTO `departement` VALUES ('2A', 'Corse-du-Sud', 9);
INSERT INTO `departement` VALUES ('2B', 'Haute-Corse', 9);
INSERT INTO `departement` VALUES ('21', 'Côte-dOr', 5);
INSERT INTO `departement` VALUES ('22', 'Côtes-dArmor', 6);
INSERT INTO `departement` VALUES ('23', 'Creuse', 14);
INSERT INTO `departement` VALUES ('24', 'Dordogne', 2);
INSERT INTO `departement` VALUES ('25', 'Doubs', 10);
INSERT INTO `departement` VALUES ('26', 'Drôme', 22);
INSERT INTO `departement` VALUES ('27', 'Eure', 11);
INSERT INTO `departement` VALUES ('28', 'Eure-et-Loir', 7);
INSERT INTO `departement` VALUES ('29', 'Finistère', 6);
INSERT INTO `departement` VALUES ('30', 'Gard', 13);
INSERT INTO `departement` VALUES ('31', 'Haute-Garonne', 16);
INSERT INTO `departement` VALUES ('32', 'Gers', 16);
INSERT INTO `departement` VALUES ('33', 'Gironde', 2);
INSERT INTO `departement` VALUES ('34', 'Hérault', 13);
INSERT INTO `departement` VALUES ('35', 'Ille-et-Vilaine', 6);
INSERT INTO `departement` VALUES ('36', 'Indre', 7);
INSERT INTO `departement` VALUES ('37', 'Indre-et-Loire', 7);
INSERT INTO `departement` VALUES ('38', 'Isère', 22);
INSERT INTO `departement` VALUES ('39', 'Jura', 10);
INSERT INTO `departement` VALUES ('40', 'Landes', 2);
INSERT INTO `departement` VALUES ('41', 'Loir-et-Cher', 7);
INSERT INTO `departement` VALUES ('42', 'Loire', 22);
INSERT INTO `departement` VALUES ('43', 'Haute-Loire', 3);
INSERT INTO `departement` VALUES ('44', 'Loire-Atlantique', 18);
INSERT INTO `departement` VALUES ('45', 'Loiret', 7);
INSERT INTO `departement` VALUES ('46', 'Lot', 16);
INSERT INTO `departement` VALUES ('47', 'Lot-et-Garonne', 2);
INSERT INTO `departement` VALUES ('48', 'Lozère', 13);
INSERT INTO `departement` VALUES ('49', 'Maine-et-Loire', 18);
INSERT INTO `departement` VALUES ('50', 'Manche', 4);
INSERT INTO `departement` VALUES ('51', 'Marne', 8);
INSERT INTO `departement` VALUES ('52', 'Haute-Marne', 8);
INSERT INTO `departement` VALUES ('53', 'Mayenne', 18);
INSERT INTO `departement` VALUES ('54', 'Meurthe-et-Moselle', 15);
INSERT INTO `departement` VALUES ('55', 'Meuse', 15);
INSERT INTO `departement` VALUES ('56', 'Morbihan', 6);
INSERT INTO `departement` VALUES ('57', 'Moselle', 15);
INSERT INTO `departement` VALUES ('58', 'Nièvre', 5);
INSERT INTO `departement` VALUES ('59', 'Nord', 17);
INSERT INTO `departement` VALUES ('60', 'Oise', 19);
INSERT INTO `departement` VALUES ('61', 'Orne', 4);
INSERT INTO `departement` VALUES ('62', 'Pas-de-Calais', 17);
INSERT INTO `departement` VALUES ('63', 'Puy-de-Dôme', 3);
INSERT INTO `departement` VALUES ('64', 'Pyrénées-Atlantiques', 2);
INSERT INTO `departement` VALUES ('65', 'Hautes-Pyrénées', 16);
INSERT INTO `departement` VALUES ('66', 'Pyrénées-Orientales', 13);
INSERT INTO `departement` VALUES ('67', 'Bas-Rhin', 1);
INSERT INTO `departement` VALUES ('68', 'Haut-Rhin', 1);
INSERT INTO `departement` VALUES ('69', 'Rhône', 22);
INSERT INTO `departement` VALUES ('70', 'Haute-Saône', 10);
INSERT INTO `departement` VALUES ('71', 'Saône-et-Loire', 5);
INSERT INTO `departement` VALUES ('72', 'Sarthe', 18);
INSERT INTO `departement` VALUES ('73', 'Savoie', 22);
INSERT INTO `departement` VALUES ('74', 'Haute-Savoie', 22);
INSERT INTO `departement` VALUES ('75', 'Paris', 12);
INSERT INTO `departement` VALUES ('76', 'Seine-Maritime', 11);
INSERT INTO `departement` VALUES ('77', 'Seine-et-Marne', 12);
INSERT INTO `departement` VALUES ('78', 'Yvelines', 12);
INSERT INTO `departement` VALUES ('79', 'Deux-Sèvres', 20);
INSERT INTO `departement` VALUES ('80', 'Somme', 19);
INSERT INTO `departement` VALUES ('81', 'Tarn', 16);
INSERT INTO `departement` VALUES ('82', 'Tarn-et-Garonne', 16);
INSERT INTO `departement` VALUES ('83', 'Var', 21);
INSERT INTO `departement` VALUES ('84', 'Vaucluse', 21);
INSERT INTO `departement` VALUES ('85', 'Vendée', 18);
INSERT INTO `departement` VALUES ('86', 'Vienne', 20);
INSERT INTO `departement` VALUES ('87', 'Haute-Vienne', 14);
INSERT INTO `departement` VALUES ('88', 'Vosges', 15);
INSERT INTO `departement` VALUES ('89', 'Yonne', 5);
INSERT INTO `departement` VALUES ('90', 'Territoire de Belfort', 10);
INSERT INTO `departement` VALUES ('91', 'Essonne', 12);
INSERT INTO `departement` VALUES ('92', 'Hauts-de-Seine', 12);
INSERT INTO `departement` VALUES ('93', 'Seine-Saint-Denis', 12);
INSERT INTO `departement` VALUES ('94', 'Val-de-Marne', 12);
INSERT INTO `departement` VALUES ('95', 'Val-dOise', 12);