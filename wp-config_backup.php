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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'XB5u*Lx&--V]]E(db~+28i1SRmE/Xh+,%qbl{S|r*G1Ccax-MS&CgIFajhV]Qi48');
define('SECURE_AUTH_KEY',  'V!liS5t{(*NyT*bS9rfw7FQe~-U#8Tzuh(6jX/i$f{poL[/kN;P(v%2<eGE/O@!H');
define('LOGGED_IN_KEY',    'q@{ UFeOx_pIHY>-w~yni;4OFtgNdD&nmngAOA[^9!-7;*D<hl:MrN$IMgLrH{$^');
define('NONCE_KEY',        'r&wav;(5[wuK,yg&<cd1K91Yaf^8M<I.;_^rJ]B:slQ./T8904VogCeos>FC45Kb');
define('AUTH_SALT',        '$Q{*~$N4_t6}9ES[p`y3*(F%>5%U(pv?r;nu>yhdFm b!S9E8#L8R>i.(oO=}?1k');
define('SECURE_AUTH_SALT', 'n+9tb}WZ?k:&KVG3w+dBUb`zAQ%/hb-mI3coPLe|(dm@K)&w-jU0.{^wH8VA-VvX');
define('LOGGED_IN_SALT',   '~$1(14c_^UBtiL1`Vy.J(?((W$H`I)[;8j5N}F60s~+drvb&WbD36Bk%c1JT{%PE');
define('NONCE_SALT',       'an.a%3oS678CvV~RRQ4CFaH}8:`JYA59JBOAQ^u7WBpKzOBe7HKul;|.0!0JLaw[');

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
