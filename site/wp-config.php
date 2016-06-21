<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'passer');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bD9G/*u>ra.6yMq=-bv9wk?/zL[duP|T7xPbc[7L8/Qg!2MZ9RTJL2?5f.<rCr6u');
define('SECURE_AUTH_KEY',  '<fRCZSxC[cR.eSs#RImc)yf~D|M}_YR1Huhwkm>523A=?xH](. c]g_+--/8eHCJ');
define('LOGGED_IN_KEY',    'E$CjK_P8*/:B~vPr0[6pEgg_TxR;n+Tunq=hC1>df-+%&w+$~ s9/-d9m7+nj%-z');
define('NONCE_KEY',        '*](%z|M0|@}H@*-1AcZ1BTF@9D!1{YI y]1Tlqr% iC&)U=c-kAy8)iQ]I%!@Z;/');
define('AUTH_SALT',        '+j&xlMQS6ZmW-(@%-Ay=b/vwP-vHF?(|aV!9.&4X1!gV!+Y5#+!4<qc[ Y%maahu');
define('SECURE_AUTH_SALT', 'rG(xA9uI?A/LvK,*0 ?{`+scCC2p q.sZr&LE fhscUUXRmZ|8l:tx}+*xz5;FCS');
define('LOGGED_IN_SALT',   'Gt-1bq)-_O*W#!W|D%XO:y(wm[>jlz>;fQ:}/S/]<+BW#e=D-tG9p8EckLr@$+bN');
define('NONCE_SALT',       '3_IH[,YCu}&$|v7@H4F7+v(QEl|RA}CoM%=ZMgZ^KGn^88S:Z/Me6|cDz?mH _S~');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
