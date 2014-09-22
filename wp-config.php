<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':4;1F9?/WH0y<lA+E0X!d)$gB,o!mp6aCm~5$|+tl5^h]dgg#yZs]#aNy#wkUpNh');
define('SECURE_AUTH_KEY',  'w uI/wNEd7g=zBy0pZTvk;Ry4Mv2Hx[wEi%1.Gob9[5nI8fwjx:f02q6]O1QD)X#');
define('LOGGED_IN_KEY',    'J/nq-RlC#{SZM_b8MaWa{PJ1Swu#xYonXX&@BE#*=b^HSe_=|/pQV=e<c(:aKJ.`');
define('NONCE_KEY',        '{WVJs#cZK=rOyqMk:aedoO;_L6:uPh(KuK<AgXCt<#;BjWq7x:57^g{<7B)Gq`/N');
define('AUTH_SALT',        'baEIe[kq1@I1On!,0CDn_NEXoz}@Vj6p;*|$v$cFqf^va9B}iW_kX_8-E[zZ.xn-');
define('SECURE_AUTH_SALT', 't^^:8a^Ra,l$$2;0Y#(YW6p]xQ<MC^-*{+@qGXIo Uh-t;*pgIxT!a>[/;4ttR@*');
define('LOGGED_IN_SALT',   '??,1d&S[8gK~kFTz!;fsuqThJ:eAKYWU_GB<oF!I?[tyvn`Ap`obPD~yASyz`]uv');
define('NONCE_SALT',       '7TRfQM8P[B>_Bj@:]69:!G2xi$xF<JCJ-q|I0Tt!}}50=qH_ppkW<~5BQWYx9:oY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
