<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'test3' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '[C+?{5ZTtsM7w)$5l TA:=jN`*&&k]$Qg8W>VGYZKLHfdV2,MG2 itQ]Ub2GPOha' );
define( 'SECURE_AUTH_KEY',  'fH&T] |I&h.Wty!Y3@8)8}K:DBcCoJ:p,H1q,!KWa:ii0jlT-$J%1j3vn1ofR#`d' );
define( 'LOGGED_IN_KEY',    '^`a50JC`i<GI-.=-QLJ3zy@FBFdV]+x;|3 !1E~m;KN=]Rs#$1%F18t0D,r@hV=y' );
define( 'NONCE_KEY',        '&Y)lx+>#!TCt`|wvCE5w(FfAVAad3FZGx:<WWI5XsE>?x8%HdH`sVXv1ALg)*@8B' );
define( 'AUTH_SALT',        '5pA1 gy6..V%($8w8Ea,x&CIM`Ub)ZDNJ-lhU,U(sCWn&M xg@aKIN+Kj) Ty6aO' );
define( 'SECURE_AUTH_SALT', 'RXW/d(.OZwP/+{N#0v/X]K@pvPg 7mQx^ vF+vf>|<}Nx;NcS$D,Lt>jIS?^~Ov+' );
define( 'LOGGED_IN_SALT',   'YB&0}$|qI;wC`Djo{c~7$]9||$hzd?N%vPwQwwBmjWGP,BD1zvc{P4D9,63-DK*G' );
define( 'NONCE_SALT',       ',*Kd?72TWok_H]dAdd(Yu6M-dziQ{M_x09&m<;Txxf3`SEbO;lk)j.:_J@VMFf]R' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
