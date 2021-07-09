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
define( 'DB_NAME', 'plugin_develop' );

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
define( 'AUTH_KEY',         'FD%1q=54OOJ#EPeAGhj!5,<BAzM<EJ:^qMJA|h1mObbyaulf30=yq|M_z{D6zs o' );
define( 'SECURE_AUTH_KEY',  'jNVdqe@1|)8jqBKsHwClyqL2/;oolSwb[gVi~WaQiA!*mb0~^!o2(<|GuGOG7v6H' );
define( 'LOGGED_IN_KEY',    '`#Wm7$.~IAN_VXcKl?g`*S9OT_w]l1DRp+]#9jOSO.5mR{iJ#g4ZwEm({U+7DfAB' );
define( 'NONCE_KEY',        'N,0I8I5UATYIW_[6pKd{y05t!s^5S!4pR0wY(km)O{]zNbqX*sTz{-D:[0ZvYfIa' );
define( 'AUTH_SALT',        '( /K+=Tc5(*DY_ 6gi#LHk;jMIU@~_qOw4>/=;.GA0/|?9ZI07p0>T@#{$!+x2z.' );
define( 'SECURE_AUTH_SALT', 'B.h9dGbzF,UlnsBszz/V$}GB/t6-K>fo2c*z9OP~RWJ!*grH|:o0F[5b.Mb^C$lP' );
define( 'LOGGED_IN_SALT',   'Yf~*ZS?#k<y+qocJ_/L p+g;S::H:8#zPok,RFpA51DbIH :4g $.,hL-59si(!H' );
define( 'NONCE_SALT',       '*yFe#tf ?XaAKK%wY_TV<PZExZnONAb?&U[,PCxo(=rpR[s6@`VMA;eIM~aDv/Te' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
