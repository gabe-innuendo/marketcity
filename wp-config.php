<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_marketcity');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

 define('WP_HOME','http://localhost:8888/MarketCity/site');
 define('WP_SITEURL','http://localhost:8888/MarketCity/site');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y~A 8B$: -/US7_OLb+GwZgJFUKD_HbpN33%ru> t78p<MAxOhp.Icv|^2^sA%`t');
define('SECURE_AUTH_KEY',  '&cq#*$%vCrT/hEW[l3eu9{:F~<1EnZ2BGz@s@Rn~25bqOXv*9os}`no6i!3?UGJu');
define('LOGGED_IN_KEY',    'f;!1qap=$1lvAkj;KZ@`IAbp,73/>QMN9&06>O02PzWg?WJB#:Ocq5n_7$AK#!G ');
define('NONCE_KEY',        'R!{?p=:R8]%u9tw$FH:7tVU;%E*g W0z>VubY@Y1*if@;E(V_=UpTcYVs/o6f6M?');
define('AUTH_SALT',        'NNXqP?u&A:Hm{tjf0`DE:I(q[I;USyTd=iORi a4$g~6FCU&Y3{V7(6>G%%R@bwv');
define('SECURE_AUTH_SALT', 'M+v}3Hr$ra7x@VNTrmI,h7lVwzbyWMUl}sz%PX},<*<@008%zL<GrhmgG6RvKsrD');
define('LOGGED_IN_SALT',   'AqO26zwX1DBNHgYhay+yHsCA;X`9#BEz>>TdIQX.O[%8Tc.p7Zw N}Zwz+Il :>!');
define('NONCE_SALT',       '6A9R/8k:jNUT.oJ!X4S)jkH&DIEv<9BlX$R(AQtb[:P$[cPaCm/5sm7Rf}E49&5g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
