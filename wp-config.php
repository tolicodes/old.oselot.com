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
define('DB_NAME', 'saabjee_wip_oselot');

/** MySQL database username */
define('DB_USER', 'saabjee_ateam');

/** MySQL database password */
define('DB_PASSWORD', 'LEMON..');

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
define('AUTH_KEY',         'ny?<ylkrgits[%2AkY3S]p1~71pDu{TQ48@NcDl.v<X^Y(Y$uCzk:Jjpq+0Cp.h<');
define('SECURE_AUTH_KEY',  'i>Q47{,UMo{.<nlwDjTkDK%k}v;lwCmYi$AZ*uSj:]}wZTGE~;CT^X+[TdFA1=6^');
define('LOGGED_IN_KEY',    '?fw2-|d8~,TH# LlpLSmvpn|:Nt~M+zB*T;TAz$Tw.tDaQsLH-j<nSs6f3z7$lO~');
define('NONCE_KEY',        '6! <.FlG|=M?NT@]e,7;(~CE ;jX,GkUCY}F>}u(_@rFu6oDjNipkZ/[)v^=5cgm');
define('AUTH_SALT',        'iR,/+cih ?B k5?_$ie/8H~Ek$|2w^j.$q.LW?@U9tUsdy#ka#`ZR&zmpv1mOL:e');
define('SECURE_AUTH_SALT', 'nlw|}K1>RY|tdez<y+~BZL;;X-9{2F0AD;#80#Sy@?8nyF^M.KTiqZX#_&G?[uC*');
define('LOGGED_IN_SALT',   '.<k/F!HG,0I+=RlkcCB~>9Hpnyqy($KMV+}dr3y:?4L32@RthA}f`$@k=5}C*SZG');
define('NONCE_SALT',       'NvFvz+r0,Zn$NhL5},$SFsWJ.pvx$t~^DHP<6zYpsudZ(pSg3Cd#z*SN/]vKDk#c');

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