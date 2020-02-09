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
define( 'DB_NAME', 'hdcommunity_db' );

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
define( 'AUTH_KEY',         '@T!0IDK3j$-2qE9BO;`@x=P*Zl&vua>yl|MA4ZgvEs$~JHHv6cv3h:.-<OBZ+}o0' );
define( 'SECURE_AUTH_KEY',  '2t5r),O:VEAq5*:D5s3eekCBRy!]jUaqxs2xkX#q@sKsv#F#0,}mo-_zQxPS#T_y' );
define( 'LOGGED_IN_KEY',    '7vbeWhQ_Es_9woo[0TT+@Z^66lqMiRD-W~~(2w6kZH`-o]<+K%S[X//g@k#3:CN6' );
define( 'NONCE_KEY',        '!Qioe+j7rM C(a3{vE4&7V;j)+GrAa=|bunVg.w)A0q ATYTrg-~9yxoMN[={0KX' );
define( 'AUTH_SALT',        '&-fFMR=Zvv+NtR2cDd*:M?*y_)wFDp3G Jq7IKEPTU UK?fmW!`ZD5upB#f /rX_' );
define( 'SECURE_AUTH_SALT', '9^WF#&F*&[v)1L-6[6Laf:~1`]*1gBiN:3$J/LEJdjlmijq7mrq1j>|e:ofR.Bvf' );
define( 'LOGGED_IN_SALT',   'gr<q/+#G,}Ma>L<2z}!Ka0%P_:EY{xOx<tR2+T_A!rb7IJ$BZwm)6Qzq[J=eJ46.' );
define( 'NONCE_SALT',       '4WW23|UXd$s_2,Zoe!_/l+4a4lT-:l*g@k_pvufEqWl WkK|yNn=<z.2VU9UXwXt' );

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
