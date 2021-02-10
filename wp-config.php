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
define( 'DB_NAME', 'blog' );

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
define( 'AUTH_KEY',         '%<&>X&qHGpEhu#km&W@^Cu2d{@ip2T]?4tjLh1b^s-6}:2q#-hg(nX>fV_|&J-O[' );
define( 'SECURE_AUTH_KEY',  'rgYJ/6+y+S|!vr1q^dWjluwZuB9jZ0`S+kS$?*Vmwe|@$jU0l6tm+i^:0e{B16@n' );
define( 'LOGGED_IN_KEY',    'r~#*i-NS,c,T8@+F?ZjXD|wV}}A[pN|!SYQ%9gS&W[tR=G+,a9C?kR2P_%Z^^[O#' );
define( 'NONCE_KEY',        'xtbCb5(]!zm@gym!YZx{Fm}ByrgH_HZxOB&L>Z1Mn>0]iVrggxb317X=jqV@6n#$' );
define( 'AUTH_SALT',        '+oSO.TwWaNOb2BomsgFoGz#B($6wrP(}`WY88Td,2*4}(TAsYM7:/z[;32O%HRxM' );
define( 'SECURE_AUTH_SALT', 'z+bs}0V0LS8G^e_bo8ZC/l,`}#G8u6n;9qBHXwrd8Q^6H>1<CfwuSU~hAhv|>2?C' );
define( 'LOGGED_IN_SALT',   ']ggu^@w&ytF/xpB{R}x*~/.@pg]^FBO.vURiO;B69tiITQKWViH!VJm~ESacH(Uh' );
define( 'NONCE_SALT',       ')ZaHZ=h!m0@=2$!ts 94#->kDBgbRK<;=8m~b1SrL$Vthhsh_Hyf+g>Sv$.@(#C0' );

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
