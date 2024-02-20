<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

define('WP_HOME', 'http://localhost:10012');

define('WP_SITEURL', 'http://localhost:10012');


/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ',-S@@XFeKKiuBz0L._;>$X>e~is4sfOPa{lrbrZdUe%IqZJ[xuL;N])N$T07;re#' );
define( 'SECURE_AUTH_KEY',   '}FUu2&CVK99S_6<k3B8nt*3q,TEcn!P#?$dbd4m_fWjOcT46%LPSG}f>S099wnmK' );
define( 'LOGGED_IN_KEY',     'wA0L,sS}zW& &V-8lxs3~L5KZ60.ROvb?65mxP6OD@Vn6!A9IPcUn1knONapLY|5' );
define( 'NONCE_KEY',         's/]1},qH$G|Qs7|T%xND3c#-CTM4M592;BZf+pQiV9o1ap;W^ZAnnrQ5bF j)DA1' );
define( 'AUTH_SALT',         'G{h%o$W_16fe/&6W.,$? <ME?K!, -k#%4+<fsi&D,K4|W~v&jSi^weDn&KBh+?v' );
define( 'SECURE_AUTH_SALT',  '#g|9b7u!!+~%5HUC8(z(72zlkJ;wJhTs+:G/?|Ww5EB<T}fHl~mkCv3#x!QFn-BP' );
define( 'LOGGED_IN_SALT',    '<C33B2~vG[rnzM6_+I%!Oud]3QPMb`>=zur~)`a1g1w0?fi;Q1mSZ6lh<S,=T7rZ' );
define( 'NONCE_SALT',        'VsmeRN&48bV7F{qq$zSG{wzXm {ugV&sO/Ux,r46$ajf][R{Da+#asQ*jy|P27!D' );
define( 'WP_CACHE_KEY_SALT', 'H@(S!>$P/[slQtmq8sE[&4T;y#[@MLhI&P%+:z8:G;EVYq]{bqAFrj>Ny}B9imAV' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
