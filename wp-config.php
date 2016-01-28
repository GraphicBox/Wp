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
define('DB_NAME', 'fleet');
define('WP_MEMORY_LIMIT', '512M');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'SudkabeKarkalyti');

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
define('AUTH_KEY',         '$.6YroL}5=.9=c8!eV{`8my]<[{)0!<|QZdY+-:IYimr3I{k{twum9:|ec)-%nRy');
define('SECURE_AUTH_KEY',  '3R!vd-Hx+r=g&+T4p?]A)TsiVz$#8)!zGt)XOx5 u4+lv|1Uq{A>ROY|O|kB)9>w');
define('LOGGED_IN_KEY',    'jQ24|fuGZVDW~Z>MVtqie}%K#:)L&?%GvS!vU#?ll9{RP`dD0+d*X:]+^tjSuO`~');
define('NONCE_KEY',        '^TWWTz2Y;k[CpnIGQ{SK>h%2ox>@I?%7,vUd+~tnD)S*W|-HFVX~a<>)s2cC-UWZ');
define('AUTH_SALT',        '|!#N$AzO@qcH1!BA 7xtI$~TFs)@1!Ub_$O,{q.+saxaO1fFt8JQkQ5~8?^:Y]*)');
define('SECURE_AUTH_SALT', '3`~@m!}Q]_=.dpJb-cY-P#Hhj|+IVD]KluF3<U>=I`EcCL>Jq8FcH2~,F~<*Et<W');
define('LOGGED_IN_SALT',   'M7&BNh~;dD<}-=(YxOVx<DO%M,}.-J=d]7j9kq-y6UNaS#I}-z<`f#eJK8uI}]1|');
define('NONCE_SALT',       '&ovu!Ig*MKF -p|W]/nkWCvqANE!+C;vI$Hk#Mj[-3 HG*R&n@Al*(~_M$4`vsGi');

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
 define( 'FTP_USER', 'box' );
define( 'FTP_PASS', '12gr32' );
define( 'FTP_HOST', '109.235.71.180' );
define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
