<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */
 /* Configure proxy Server */
define('WP_PROXY_HOST', 'proxy');
define('WP_PROXY_PORT', '8080');
define('WP_PROXY_BYPASS_HOSTS', 'localhost');
// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'malcolmfrance');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'h@xn#V#Xv^:A>KMY)Cms6f$3%@05K~[?VMXq@[yrbrfHR_(zlB Hx8pHTy{$ERrZ');
define('SECURE_AUTH_KEY',  'a!5jLo@n]v={sr~t_~+Ug;4nCPT_3S]+CZ!~gVMUun:0YS(DzR&N$1VI}>PC|ea1');
define('LOGGED_IN_KEY',    'QuG_PwtdcUS^$1U?tTt%.>P4of~(oUl~z5)eacrEvCFkav6b7:3b{%/OQ_j9x^aQ');
define('NONCE_KEY',        ':O H%T5S3>k.O)Bm].;^UrP-10b+Y#LdDRN~G#2Rl/*$NK (~hB-%o`h%+IcI5|I');
define('AUTH_SALT',        's6%^X&hNY+4Ey6sG_(B}{<Ugyn<<:p*u@+1b;@[L+**2GZa$?~KOEk%9_ {Hjq-R');
define('SECURE_AUTH_SALT', '`?xT/+OC#YG9&J2uo?m:Cl6Cn1sPZ7:?>6I=%R)9!x4,(~G?U7|Q+;3z.%S_9:2)');
define('LOGGED_IN_SALT',   'ynWBLIB(8LZb~P:P%TEE[Z/5>At]Cnu<g6A@[GgOmfdP#>c_K^@;rNIelLnP}a((');
define('NONCE_SALT',       'gv?#[uE1|cD@qKc|$A7O-fxJR^l?g*+0T|4W7KT@P01Uo-b?^|^FFXA_w4T]!vg-');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
