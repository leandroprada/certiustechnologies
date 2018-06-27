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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\inetpub\temp\DWASFiles\Sites\certiustech\VirtualDirectory0\site\wwwroot\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'dbwpcertiustech');

/** MySQL database username */
define('DB_USER', 'certius');

/** MySQL database password */
define('DB_PASSWORD', 'Ohiggins1621');

/** MySQL hostname */
define('DB_HOST', 'dbaasmysql.fibercorp.com.ar:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * If you had already installed any WordPress sites locally prior to changing the port, 
 * you will need to update the WP_HOME and WP_SITEURL definitions in wp-config.php manually 
 * to reflect the new domain prefix.
 * define('WP_HOME', 'http://127.0.0.1:90/wordpress');
 * define('WP_SITEURL', 'http://127.0.0.1:90/wordpress');
 */

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fqpz-rhE_ nV!uX8AQ<pBBoL,v0:BedlKE?SU *82i@9(lE:X)N#XXs 8cNozY7.');
define('SECURE_AUTH_KEY',  'qN3).pb~%R4a(/6A0])$RRMtBqqXI4?SBu;yVt(}@ub>^TdDaft)>~5!^hTb?amc');
define('LOGGED_IN_KEY',    '^n`85^^4}rAhE u;]p|--&/SW#UuwY=[kuS.^?UF3N}y(7gDx@9#6sK`trVR{VB&');
define('NONCE_KEY',        '%8Ekk|<lrOS;b14pz7uI9byiw=x<+E+=|j7&g4iB7Up}w>#=S-]oA9VlxX{TeJn1');
define('AUTH_SALT',        'HDNN($Hx0(O%_0SeNU%SvmPwcraQM(]Nzd2GW4rO-*fY;^nLD,(:AV,jzfz`iP;4');
define('SECURE_AUTH_SALT', 'Rj+&(]T5XE5*tFP;ojAKyf-:XnXMNAS=bSSK*;cjla9Yx94D(i202YaLJDa=9Qc<');
define('LOGGED_IN_SALT',   'qwLDF?lE@{S!^FrQzVc{4TQv.Ck&,i&qs8_Yd_.y9PQ=hzy~<Ne,]-G4(dL% 12)');
define('NONCE_SALT',       'JHKF&+D~6&KtM=*LCkF,LJmt>-t0I`FH::j%Ov{OP1o^s;10yE97Ou2olS@P1M{I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_MEMORY_LIMIT', '256M');
