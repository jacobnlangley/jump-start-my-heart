<?php
/**
 * The base configurations of the WordPress.
 *
 * This file is a custom version of the wp-config file to help
 * with setting it up for multiple environments. Inspired by
 * Leevi Grahams ExpressionEngine Config Bootstrap
 * (http://ee-garage.com/nsm-config-bootstrap)
 *
 * @package WordPress
 * @author Abban Dunne @abbandunne
 * @link http://abandon.ie/wordpress-configuration-for-multiple-environments
 */


// Define Environments
$environments = array(
	'local'       => 'jump-start-my-heart.dev',
	'staging'     => 'staging.jump-start-my-heart.com'
);

// Get Server name
$server_name = $_SERVER['SERVER_NAME'];

foreach($environments AS $key => $env){

	if(strstr($server_name, $env)){

		define('ENVIRONMENT', $key);

		break;

	}
}

// If no environment is set default to production
if(!defined('ENVIRONMENT')) define('ENVIRONMENT', 'production');

// Define different DB connection details depending on environment
switch(ENVIRONMENT){

	case 'local':

		define('DB_NAME', 'jump_start_my_heart');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', 'localhost');
		define('WP_DEBUG', true);

		define('WP_SITEURL', 'http://jump-start-my-heart.dev');
		define('WP_HOME', 'http://jump-start-my-heart.dev');

		break;

	case 'staging':

		define('DB_NAME', 'bamboo_wordpress');
		define('DB_USER', 'bamboo');
		define('DB_PASSWORD', 'GDRm6jj53Y4EF62b');
		define('DB_HOST', '54.164.59.13');
		define('WP_DEBUG', true);


		define('WP_SITEURL', 'http://bamboo.look-listen.com');
		define('WP_HOME', 'http://bamboo.look-listen.com');

		break;

}

// If batabase isn't defined then it will be defined here.
// Put the details for your production environment in here.
define('PRODUCTION_URL', 'http://www.bamboorealty.com');

if(!defined('DB_NAME'))
	define('DB_NAME', '');

if(!defined('DB_USER'))
	define('DB_USER', '');

if(!defined('DB_PASSWORD'))
	define('DB_PASSWORD', '');

if(!defined('DB_HOST'))
	define('DB_HOST', '');

if(!defined('DB_CHARSET'))
	define('DB_CHARSET', 'utf8');

if(!defined('DB_COLLATE'))
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

if(!defined('AUTH_KEY'))
	define('AUTH_KEY',         '');

if(!defined('SECURE_AUTH_KEY'))
	define('SECURE_AUTH_KEY',  '');

if(!defined('LOGGED_IN_KEY'))
	define('LOGGED_IN_KEY',    '');

if(!defined('NONCE_KEY'))
	define('NONCE_KEY',        '');

if(!defined('AUTH_SALT'))
	define('AUTH_SALT',        '');

if(!defined('SECURE_AUTH_SALT'))
	define('SECURE_AUTH_SALT', '');

if(!defined('LOGGED_IN_SALT'))
	define('LOGGED_IN_SALT',   '');

if(!defined('NONCE_SALT'))
	define('NONCE_SALT',       '');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if(!isset($table_prefix)) $table_prefix  = 'br_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if(!defined('WPLANG'))
	define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if(!defined('WP_DEBUG'))
	define('WP_DEBUG', false);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
