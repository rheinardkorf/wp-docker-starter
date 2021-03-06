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
 * @package WordPress
 *
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 */

// ** MySQL settings - You can get this info from your web host ** //
/**
 * The name of the database for WordPress
 */
define( 'DB_NAME', getenv( 'WP_MYSQL_DATABASE' ) );

/**
 * MySQL database username
 */
define( 'DB_USER', getenv( 'WP_MYSQL_USER' ) );

/**
 * MySQL database password
 */
define( 'DB_PASSWORD', getenv( 'WP_MYSQL_PASSWORD' ) );

/**
 * MySQL hostname
 */
define( 'DB_HOST', 'wordpress-mysql' );

/**
 * Database Charset to use in creating database tables.
 */
define( 'DB_CHARSET', 'utf8' );

/**
 * The Database Collate type. Don't change this if in doubt.
 */
define( 'DB_COLLATE', '' );

/**
 * #@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '${WP_AUTH_KEY}' );
define( 'SECURE_AUTH_KEY', '${WP_SECURE_AUTH_KEY}' );
define( 'LOGGED_IN_KEY', '${WP_LOGGED_IN_KEY}' );
define( 'NONCE_KEY', '${WP_NONCE_KEY}' );
define( 'AUTH_SALT', '${WP_AUTH_SALT}' );
define( 'SECURE_AUTH_SALT', '${WP_SECURE_AUTH_SALT}' );
define( 'LOGGED_IN_SALT', '${WP_LOGGED_IN_SALT}' );
define( 'NONCE_SALT', '${WP_NONCE_SALT}' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * WordPress Cache.
 *
 * Page and Object caching are both backed by Redis.
 */
define( 'WP_CACHE',          true );
define( 'WP_CACHE_KEY_SALT', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855' );

// Redis settings.
if ( true === WP_CACHE ) {
	global $redis_server, $redis_page_cache_config;

	$redis_server = array(
		'host'     => 'wordpress-redis',
		'port'     => 6379,
		'auth'     => 'password',
		'database' => 0,
	);

	$redis_page_cache_config = array(
		'redis_host'          => 'wordpress-redis',
		'redis_port'          => 6379,
		'redis_auth'          => 'password',
		'redis_db'            => 0,
		'ttl'                 => 86400,
		'debug'               => false,
		'gzip'                => true,
	);
}

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
define( 'WP_DEBUG', '${WP_DEBUG}' );

define( 'DISABLE_WP_CRON', true );

/* That's all, stop editing! Happy blogging. */

/**
 * Absolute path to the WordPress directory.
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/**
 * Sets up WordPress vars and included files.
 */
require_once ABSPATH . 'wp-settings.php';
