<?php

return <<<TPL
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
define( 'DB_NAME', '$domain' );

/** Database username */
define( 'DB_USER', '$mysqlUser' );

/** Database password */
define( 'DB_PASSWORD', '$mysqlPwd' );

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
define( 'AUTH_KEY',         'uVX.bxqcEP=W0l:;9rRWp`XY4)T_!u#]z9cJ,GkrGYbabuxfrSc!\$r7`DZh 7t.$' );
define( 'SECURE_AUTH_KEY',  'O4CZd._,p!^tdJR{6:[3+::4uYtPB_nU5g@~Ek(^D8JQHY`mQSx6.Vjw}=9()e!d' );
define( 'LOGGED_IN_KEY',    'o)Kznj*^3>A^I~05n^F=Q&/MwD&_Vq4cjF@yGcRAIgT%m<rglSJL|6|C$?-HPB@f' );
define( 'NONCE_KEY',        '}i7tM>lsZ LfUR7p=aAmw#GOzvqYQ1{iwA:qVQw4~uy95*wg!7^NH&sK.?uU`Y((' );
define( 'AUTH_SALT',        '8J6>t#cTW/hrn7c]^UiB7L*O9Wa@{)&VlUB=|y[_`thSXb?s*1~Z!/8hfG{{ZzMD' );
define( 'SECURE_AUTH_SALT', '[!Key+}s,[z5r]i<p27qvvUHy H_La{Z*jb7%!,%C:!n<b<^hS@aA<% 6q^C2$^)' );
define( 'LOGGED_IN_SALT',   'rs~~sYQUoi(Mem:8cjVU5FZ^AkPxuJIx%8<}<:T~M>:J1U:z82#gmz0S;cfc}M$3' );
define( 'NONCE_SALT',       '6&Sm&1&]GJW%jF~7:A>Z>hZHp0<*u|x6|JX=(d\$y7FlQl<s/> @{}Byw!9Xu4C5P' );
define( 'FS_METHOD', 'direct' );
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
\$table_prefix = 'wp_';

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

define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

TPL;
