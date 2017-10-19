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
define('DB_NAME', 'realhome');

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
define('AUTH_KEY',         '8=PMqwvok0l$ta?4EJ0fgbfEn;yt{1_Fuo|g}4{c8J+J?c<.#|x~d2+Kz|r:BE[]');
define('SECURE_AUTH_KEY',  '/wAxdX=D!8QfU%$}= ]JOc<u,!rwb/?+?/Nx}R|v>ztv:I`XD6v#d?:CIl%~CEaA');
define('LOGGED_IN_KEY',    '(C0!iuMWF@G4;+72_/v9n]SD8kfC$A$siPJ7wn(u|b[E:_`4mLF~7vsOrbIGu]sI');
define('NONCE_KEY',        'X{v>l0s!>Hb-@({,1g_&R=CNh%*g>jN{WutQ3#?k[C4>x!v9%b-Ne-}R$O8)%na|');
define('AUTH_SALT',        '@>YQoxdU;;w+p:Z{2Jfvk4^9e&rDpA+X`XD qVrBO/]}0E>2`nbXZ{BOL_ERc[(E');
define('SECURE_AUTH_SALT', '!5v(x_MZ5>n4+&P1@M-!yEnZqhrN#^M8e$}~;WEkbLB^a=v.n+&oJBgV*$[idR?4');
define('LOGGED_IN_SALT',   '<;WfWGrwaD$f1DTjA6_h*3- gd ,;TPdjQY672PZ8:/kMo0 y}fCXy|J+RA`_6%8');
define('NONCE_SALT',       'BwBxfcsg9aEI*Ta3No)StwNh*AHkp<&KT7_ePZ YUK04[E7-4#ZPu`+]%QKv3mqc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'realhome_';

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
