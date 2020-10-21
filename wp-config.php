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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'w3' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'b^:560bo3!X?4XF<m;I0vEky6g~*K*4<g-.M|rd?r1P 25~kGfG$YOz6M`z8X;1Z' );
define( 'SECURE_AUTH_KEY',  '+I}SyfIveKEy:u0^#inh~xPJOn:|w0QAVMF|M;lUI/`,TXh`<AZA|6b-mP}&WBDG' );
define( 'LOGGED_IN_KEY',    '~OiwvQ3*O9T.]=r8>{;Q=9U=R@A?WYhw^m8o=H)voDA1,{Q.N~Ch{lH85%|<<c[G' );
define( 'NONCE_KEY',        '~u8Go%&TC4ozFHRnIg[e  @ODf/Jb#%N)ITa^1,^>9Lzx/H9<k{=S~r9p+|o?%$8' );
define( 'AUTH_SALT',        '4Q8T]D}RyI4EU]B3r1D@B!+rlDQP--5V)+,Ey6<f-N]-4xS!t/ AkHl$;{:b42T?' );
define( 'SECURE_AUTH_SALT', '%Wy,_-kr{JI 3Not4KMgPV7Ro^jm=,7btN50z73>cb1b0}&?x/A^y-%>pfl)2|OO' );
define( 'LOGGED_IN_SALT',   '*x*5iyi!wq+S*MogP?ZUhhyV=QG9Fdt}Z_qbz=T~<xty]TY~<GcD`DB?$*yGbV3-' );
define( 'NONCE_SALT',       '#u)r@ v|T#R(3z/J]*r{xAZI(WQ!7!yJWnlZ-W$P@Ao>vX#30_(RQN#,[e_@,{c[' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
