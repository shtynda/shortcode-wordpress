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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vb486483_re' );

/** Database username */
define( 'DB_USER', 'vb486483_re' );

/** Database password */
define( 'DB_PASSWORD', '5*!p2xZ7fU' );

/** Database hostname */
define( 'DB_HOST', 'vb486483.mysql.tools' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Y }>2`wVWqIEUT[h VBDOI^HNT8Tg8PTNc!#g:(9xglk+lUL~=IU*C4Yb~r)c[gK' );
define( 'SECURE_AUTH_KEY',  '}8,$y>(h}+8*LVz~a]@nMR-)?*DEQ>a*QE9~*3f9r;K3~D~sIA}W) K^Uxn;2CHZ' );
define( 'LOGGED_IN_KEY',    's=B?hY(!f-9?;a*#FX%O6<!3i$Pe{}<wP^U-?2EH7NY^1qZF?;5U`E6y.rcbvIh+' );
define( 'NONCE_KEY',        'vA2opH~4:fc:jczW#2LrKL6Ri `6NMh%nEsOu!v4ZCQ-xd{dc.];hgRq9%pMK3!q' );
define( 'AUTH_SALT',        '!Mw1;..-/4q)[JF-lf5r/^8e?X>a4C?*nPu/{y*SEd3v]Okk=3S*Ls20KGUt+%zc' );
define( 'SECURE_AUTH_SALT', '1k/}=f/;zL%LB#)>)!Dn[a[fUA5V44g#<4G_jrG:|pEar%[f2-2m#i1,ia!Ia7|m' );
define( 'LOGGED_IN_SALT',   '&U3H2d(VMiiakScKYWK[Cs_99i#=,U+eYo/B$-!39^g3S!&U@0z~MHb/74#YT$v#' );
define( 'NONCE_SALT',       '9c`sjN>7^tEV$&t;_yR] t2(BS#NJ1qw*Lg+>=??G}GK=MwcB79VaKzbfhkRZLeg' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
