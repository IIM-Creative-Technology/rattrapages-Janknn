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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rattrapage-wordpress' );

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
define( 'AUTH_KEY',         '=[Uufi=?IdlE>4?tHd8+$ni<%?WTN0/7=4[mdj}>*|iYZ$F,Y}+%Kez;64Q1x,Yj' );
define( 'SECURE_AUTH_KEY',  ';9Fy`is%{dLT9G_6xC=HT: 8$AHR?GTD^rRYm`QdtQ464lbp+J5^f}>1%PB~t8yo' );
define( 'LOGGED_IN_KEY',    '+Cr{fxx3k>j?jMNjx[FjkD{J693u9pYmH^0Wen^z@omNA%mn:f)?CKhk&5Ndhd$n' );
define( 'NONCE_KEY',        '{[So2Qk3!Eggb`)NI49-_[D{y;#T|wJW4^xvNwAdEQ@nyI1**BXJR!:g%#AqK zk' );
define( 'AUTH_SALT',        'S%PQC*J1Os}#/S]qGaFs2J$K[L`E 4fyZOo-QRX%BD&v.vc4P<}m_hIy[#Xhd#,O' );
define( 'SECURE_AUTH_SALT', 'v[QmJ<x7>ne<8Dd.)q>n6hjtD=f9@wA$_o~oEPuJo&r4ePn;r;P#qXGb*H{^81O8' );
define( 'LOGGED_IN_SALT',   '{#EOXH]}TOAc|o<k~>Wk1&=Dw N:dGG5$]pe<E^Qjo-X)ef F_qP+#I~c:$kQ6$k' );
define( 'NONCE_SALT',       '&_(da}1^9v:z-t9<>iY#7ZH_mPe8>NQ`}f F>496G6WvPcps|aZ/VDGDL?E/PjGN' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'w9pGoJ_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
