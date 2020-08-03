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

//https://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
// in some setups HTTP_X_FORWARDED_PROTO might contain
// a comma-separated list e.g. http,https
// so check for https existence
if (
	isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
	strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false
) {
	define('FORCE_SSL_ADMIN', true);
	$_SERVER['HTTPS'] = 'on';
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DB_NAME')  );

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST') );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SX(S|?exfPgM@;_|misQje-e}Qy]@@U-Y+-n*WC_`$3(s{%PCRE^C_@D+P$IWq|Z');
define('SECURE_AUTH_KEY',  '`qTpS9XD+xI^mbwj0LWsLYw}Jyz,@nC~;.yLT5;}-9D^N|@91P6->,wVM^tickx=');
define('LOGGED_IN_KEY',    'FKaX4D~Lc@)(RM5IUP#@-8R@B;f_lp0$XnQc?kn+ZE+m9[I1vzdbHQP]!}ejEu:1');
define('NONCE_KEY',        'q{^:J/{b>6%_)M,AwC6._eVPHupUwx6:,rGqfJ+jo9#P{Yh[XD`r|&^<C sh9+t ');
define('AUTH_SALT',        '/nI&3f#IgAm$<{r11S2V|kaV Ux;8=REGEnz=rXiK(]~Ikpt}]]:s( tv2vb,)Ee');
define('SECURE_AUTH_SALT', '_S-51Ol|HEM>+YW7`o H:PkV^>Q./u=F4!k|APU7InpGHQH`!>>toSs8n5^X@& 3');
define('LOGGED_IN_SALT',   ' 7IT>,8wQjoNw&r>GH3vTT02B&C6 |%&t/kq1+.)FR@,RPT%ORQ]T%7oTA#_.H`d');
define('NONCE_SALT',       '+-%xlpHU$ <{z5v_KXgDi2%*zVlAn@7Tb4-`fjy4-bP3r<(f}TztYdU64;fdN=g-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
