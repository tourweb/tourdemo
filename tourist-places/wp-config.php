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
define('DB_NAME', 'indiator_destinations');

/** MySQL database username */
define('DB_USER', 'indiator_user');

/** MySQL database password */
define('DB_PASSWORD', 'india@123');

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
define('AUTH_KEY',         'LomO3^Z^dv2}i5]XCGsrK_~b+A<Xq]Z3(@P%|,G+Ik9l}(;$Ka6NNRYqocyksjoH');
define('SECURE_AUTH_KEY',  '#$3G!@Z!hzpV&W/4uJAqu52~)h-td)!:B@f csw@%Q#8@.)Lh-*2>4Pqq-_c5@:]');
define('LOGGED_IN_KEY',    'e(5 =/8W6u)zGwr8VSc_Nho$Wh(q({&-L,}`G7RA72wP?.wwD/-ZhY]!<E1e>p[i');
define('NONCE_KEY',        '|%tnBA7NBG8Q**_&f5OZJtBFrk}Z/NrfKneFO^`Doc1gXq]3iuQ?dY0giV]w!=-Z');
define('AUTH_SALT',        'QFD*Wm3L{~O{m5Vcu$>b,NLes9GQ8dN/WRXp>:*w2_ $j$Mx&2c%imATPI@jd{|2');
define('SECURE_AUTH_SALT', '67?|BmHk6U;&H>6-1fouk;JUg/4-!6}T!5CS`7`tb7.ZLoVX/6pvg`3Xb5-.*xJl');
define('LOGGED_IN_SALT',   'P&jamo+ff]$Fxrk|]&k0P1a:o4d4F:`z=yS=cq3# qy!KHN^}j<7$Ocq:*RaQS7$');
define('NONCE_SALT',       'q%fy<zqmq%+]?l#QJnU8IfFP7Ker?4-b>%]ON/.[hd[`=dy,HVJO554uoRZRy^7V');

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
