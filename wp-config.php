<?php
define( 'DB_NAME', 'wp_vktr' );
define( 'DB_USER', '' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );
define( 'DB_DIR', __DIR__ . '/wp-content/database/' );
define( 'DB_FILE', 'vktr.db' );

define( 'AUTH_KEY',         'vktr-auth-key-8f3k2j4h5g6d' );
define( 'SECURE_AUTH_KEY',  'vktr-secure-auth-7h2j3k4l5m6n' );
define( 'LOGGED_IN_KEY',    'vktr-logged-in-9p8o7i6u5y4t' );
define( 'NONCE_KEY',        'vktr-nonce-3r4e5t6y7u8i9o' );
define( 'AUTH_SALT',        'vktr-auth-salt-2q3w4e5r6t7y' );
define( 'SECURE_AUTH_SALT', 'vktr-secure-salt-1a2s3d4f5g6h' );
define( 'LOGGED_IN_SALT',   'vktr-logged-salt-0z9x8c7v6b5n' );
define( 'NONCE_SALT',       'vktr-nonce-salt-4m5n6b7v8c9x' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );
define( 'WP_HOME', 'http://localhost:8090' );
define( 'WP_SITEURL', 'http://localhost:8090' );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
