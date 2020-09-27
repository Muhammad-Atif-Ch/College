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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'AYS5tI9VRXM0Kxsp2hggZAz4FcVIQn1au3jIYoj+h+tIZC9NYkEVIoDkqFdqS6IHVFam9q50iogdFlib7rdlVQ==');
define('SECURE_AUTH_KEY',  '76vqkjNH1HZGJxJYfMIjgjQVgrN88KEz31Wyqh4vc9e3dqI+44BzAzkLkv/JuSEVVvJ8CCPi32QuMK+ur7eOCg==');
define('LOGGED_IN_KEY',    '6ZEWy7jVQzBX7eD5pJOP3umItd2dxvzToi3h1Qje7/eYotsDFhKU6sTNEgmCyx0OhnN2I81GL8HKDEy5NL7Ysg==');
define('NONCE_KEY',        'wrpsYvg4/3EZbCu6/9Prd9WR6ztCRHqV8nEw43N/j/X7pe37BZPnKS657l75g19SYeySpDjwVrNKi4yJ3tGdMw==');
define('AUTH_SALT',        'rm8GprjLQvU7RBt+74dROJS/yapwrip5GubeExUPPuLULKvoKEz2aiIDd/PJIC9S1Q9aMHw/P8KvaHjR7eBhew==');
define('SECURE_AUTH_SALT', 'Zh5am4d0wuK8prKgQ6L0NonJz0w3OHy9IIkmiEhIYoAgox3vHrmJl5POvALT0ZVfGDrVBNyghzn/l0SR0j4oFg==');
define('LOGGED_IN_SALT',   'RdRVpRaiBWIhfvm0dB5UnpGvzkSV9AkhV1hsjO1ajZsScXEWfCy8/zSIYgkgoXOCuAInv4KFDV55UEasPxhXQw==');
define('NONCE_SALT',       '98EVfmSVo91ZYwZIOP+jIJd+nejATdK9BCK8o/6UFXB0tBFnUjkBT08iPCFVUA6QirawPdfAG5l9dsCXzUpvQg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
