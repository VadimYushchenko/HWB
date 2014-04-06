<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('WP_HOME','http://hwb.uk.com/blog');
define('WP_SITEURL','http://hwb.uk.com/blog');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hwb_db');

/** MySQL database username */
define('DB_USER', 'hwb_db');

/** MySQL database password */
define('DB_PASSWORD', 'd4BXmtuM');

/** MySQL hostname */
define('DB_HOST', 'hwb.mysql.ukraine.com.ua:');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'X8bR%z6C%b#oHZp4jR&sZD$XQTSkv(v^p95UmY4b2!MKKUC0R93aAu^O7Huo4Yuw');
define('SECURE_AUTH_KEY',  'OXh9^HbL$ZJ$2KvdeF(t)MWO3@AFZOuP1r0eOfBL&QtBJQVS^!0&xDUhWDxfj8cL');
define('LOGGED_IN_KEY',    'hHaB6IzO9iwYUs4tOXHm0C*6DSkgBZlbOSc64WKC8Z!8EsIoiS&Lb7km!1Y!K1LU');
define('NONCE_KEY',        'mbyW(0pXnMjqKy(itc#mrlrJ($3bVkX0c2@QLG%wXQrfm38tX^aA85*4AD$eHRr$');
define('AUTH_SALT',        ')ToK09tAfaky7I1tx0sZRscx4AD8EaX^BR%tFlr$e@irpyKNtbMa1*8&*OCCVl4*');
define('SECURE_AUTH_SALT', '&oYRJ!(FTwzA%8I0Yrsj9ac9eK%WsjNZu*7v&GogiEVNAp1oFGyvwM9js9O8um#p');
define('LOGGED_IN_SALT',   'tIw8KLN9S@4yzhxPtsY95WQID#2jVxlSCIu7n5Vsw^rpI#mwY9IOCI4Ur%TvZtAN');
define('NONCE_SALT',       'hm)$cp%itaZFJv#nEL2L1byFtgHV#DNqE^J5Vw6i!palO3DbXc@^^Zi@tcczONor');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_GB');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );



?>