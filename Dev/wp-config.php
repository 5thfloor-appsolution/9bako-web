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
define('DB_NAME', '9bako');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'P9h3HLzr1vpKe}Fw*&E3CX<x^fvQnyX&=&TtrnFfu:xQIs2o{Ak=Z37S0=,!7<<H');
define('SECURE_AUTH_KEY',  'NTNpB8S!4_/m$/ a>8QWT rB?eF6;-cV=5UY~US1!$rNu9bBM+I+^ZW<Bf$Z.]3!');
define('LOGGED_IN_KEY',    'E4|$*S?!Pcdnw?Vav>h/0[r;+wr^[x3)l% 72KR:N1y(z<_NDL:23| ,2|`>hQ3K');
define('NONCE_KEY',        'E>CF*Qy)n|.>kor(gFbi9E){<yz{B~FfCO2ef0Kfb4U4d10Yv4}<b^B6T^:vbfpY');
define('AUTH_SALT',        '1TSFb),>5cA**8az0qnXCg17?$SUqCK|}m$OFvWwUOx*)T1-)lrco:`Gq+P6IHBQ');
define('SECURE_AUTH_SALT', 'aEJEt,15Vo:/Mqu_Nb==9-=gbt %b}1gj,}k.kdvefFDDjjO]C;m1So6jnBua.Jc');
define('LOGGED_IN_SALT',   '3trF+%WNTYqq|<5Xw_y:%TG[~%Q*R*1-XT6%u0U6$.kHA~W{FN,z;48I2(M?RpC9');
define('NONCE_SALT',       '^gpLN)m=0lC+LkUak/A]vTFmE^g%.`5gx=g9-}UQ/5 U^]$CHeFmws2h@=umCRXW');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'appsolution_';

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
