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
define('DB_NAME', 'dev_dion');

/** MySQL database username */
define('DB_USER', 'dev_main');

/** MySQL database password */
define('DB_PASSWORD', 'Rixthz.');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ro~u~a?*q>,M))?=vm%9Y+tvlX)urFT|^qio<g?l2g[!j<?uTG!E3-L4ZQI}3im ');
define('SECURE_AUTH_KEY',  '4Qf?CU|t*Qw-khdHO[6*;]@naOJw*FuzybcW4YVnS Z8T7&)hT>@9M[ajTYeb#`;');
define('LOGGED_IN_KEY',    ':,Titav;6>C&Lhpv5>zJSlNB%H]~dY^Lt<~D`:]6AHVSLap=:&/>a-<T*Mv9;mb~');
define('NONCE_KEY',        'o_y%}o[]aP/7M2lfXid;9(y:i6t-Rt%DmWbvYQ+P_=%I%Ds(WE3A)!zu5j)g /yJ');
define('AUTH_SALT',        '81;_Q*s(Ffp4>&T}kxI4:|Y45B;;-s=U``HX_<mJ+A^%oPK5A$2^Sj|ci8{<]RqB');
define('SECURE_AUTH_SALT', '3T6=Mzqz~GsBvk]e1F,%Qz%b3Bz@n^>oyJSJ%^3~bbu=ruc}UvPQ0>t|) 5lBNLJ');
define('LOGGED_IN_SALT',   'eGejvZOoZfaG`tN?A.3Rp*zI6OKeJM4NHlfj&?`98=0H{7psWqs|kR2rw[:F4mxQ');
define('NONCE_SALT',       'H$5!*}P9Z=i{0HAd`{J_|T R1_#;e*evYp^8l4{5LLP#O4(J+hDL0dh.ZYuOo)hY');

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
