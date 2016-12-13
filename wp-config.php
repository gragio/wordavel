<?php
/*--------------------------{WORDAVEL}------------------------------*/

require_once('bootstrap/autoload.php');

$dotenv = new Dotenv\Dotenv(__DIR__);
if (file_exists(__DIR__ . '/.env'))
    $dotenv->load();


define('WP_CONTENT_DIR',  __DIR__.'/admin/app');
define('WP_CONTENT_URL', env('WP_APP'));

/*------------------------------------------------------------------*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define('DB_NAME', env('WPDB_DATABASE'));

/** MySQL database username */
define('DB_USER', env('WPDB_USERNAME'));

/** MySQL database password */
define('DB_PASSWORD', env('WPDB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', env('WPDB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));
define('COOKIE_DOMAIN', env('APP_DOMAIN'));
define('WP_HOME', env('APP_URL'));
define('WP_SITEURL', env('WP_SITEURL'));

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = env('WPDB_PREFIX');

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
define('WP_DEBUG', env('WP_DEBUG'));
define('DISALLOW_FILE_MODS', true);
define('DISALLOW_FILE_EDIT', true);

define('DBI_AWS_ACCESS_KEY_ID', env('S3_KEY'));
define('DBI_AWS_SECRET_ACCESS_KEY', env('S3_SECRET'));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__DIR__) . '/admin/wordpress/');
