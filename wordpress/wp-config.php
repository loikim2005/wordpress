<?php
define('WP_HOME','http://localhost/23103100/wordpress');
define('WP_SITEURL','http://localhost/23103100/wordpress');

// ... các dòng code cũ phía dưới giữ nguyên ...
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
define( 'DB_NAME', 'mnm' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'k:$ih|ev }{l^Md#3bNCoJV`48m=uwr0!H1qwI<Ed+`mN}Cg#vixotXZ7/?v0IPG' );
define( 'SECURE_AUTH_KEY',  'Wc7}Rns|_K]2~{j,T$Q:x7&$sH~!QUN;4>-.oil#zq/MD`Mg`n?b5[5EF,Ed0vlA' );
define( 'LOGGED_IN_KEY',    'aLI:6UfZmP,Qa(wuqn:sc2MX:VE]dTF&+k-H2y[0T}>[f-:?sw{$7y,q<}D1X4zM' );
define( 'NONCE_KEY',        't2MVwe!aXj(<~[H!:}^%HJP=ZT7a>O4skr+p{KZ&@F<OHT*h!3=mg[zqfC[maF^1' );
define( 'AUTH_SALT',        '3T!oZz=X$%YWNlmxVIwmvGizcb|X-f9+qGvL weP&W._#2_w;gMpxsf~snz)y-iv' );
define( 'SECURE_AUTH_SALT', 'GQ/Fjk0ZtS9QS %I!FsW7s,SWA/HBdY@OY$ki8YO$e#u3IGF7:H`9ZUJ Ka}qkI1' );
define( 'LOGGED_IN_SALT',   'hM`uJIkl;erT6dN*{oLRaLbwI5hOpjhSp(*bHs2Cd(lT3s^MooE,*xf(CWy@H=A0' );
define( 'NONCE_SALT',       'qsQ!G1s5#.z:&7rV.*lvq*St9X7jd#41T80(I_5DH:hl*Qe`w-pCVM8N59Um@obR' );

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

define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
