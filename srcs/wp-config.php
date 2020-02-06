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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '9:D^g%r!um=Hx?ZDeGZhlT<[.nS-j*@N)<UtB582;$zi0PJHy/#6*7=7N0KJrVl=' );
define( 'SECURE_AUTH_KEY',  's kM6?vP(n&7Bds,eb9A/.x;qvHg/w^D7!NQbK#}Dvsa}K9-PB7(f4s2Wp bR(SB' );
define( 'LOGGED_IN_KEY',    '(F@hi_duepuDj?8c8$h`Z<$pe;A>q$K?2@FbTBT$v/DTlM<uLFA!]fuW:>[,_lKe' );
define( 'NONCE_KEY',        'v~<782[/2WD{Qz?a#pBkE#YnrE.Y2*IWU<rw,QYT~%Llfe^Pyp}z6GFwK!kN5u`c' );
define( 'AUTH_SALT',        'FV.i,MahltUe^,!ri,/5^@/BfS>RAl|B$;yg*6m>e7[ZD[7 `+=s`ff@LDENLI3,' );
define( 'SECURE_AUTH_SALT', 'L-^%IJ&bkZa;xA:#~!2*imH#{^&7HIxy]0.6%a(Vr%`d[Uh?e`)=jLU&{iXOgazZ' );
define( 'LOGGED_IN_SALT',   'MkT+vQZpqo;1o] `F5J%T3ufha}r!Bb%S)m2!]E8eF^%B;x$i&6~:@XHh`+0Q-%~' );
define( 'NONCE_SALT',       ')50H:w+fElzG8PN9TK~Hvm8+&fHwIPaX.L- IU]>tRFz$N9OCufZySY+k1XjQx>q' );

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

