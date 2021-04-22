<?php
/**
 * Config.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 7
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    GIT:1.0
 */

date_default_timezone_set('EUROPE/AMSTERDAM');

define('DATABASE_HOST', 'localhost');
define('DATABASE_USERNAME', 'root');
define('DATABASE_PASSWORD', 'root');
define('DATABASE_DB', 'socket_chat');
define('ENABLE_DATABASE', false);
define('SSL_CERT_BUNDLE', 'ssl/server.pem');
define('ENABLE_SSL', false);

/**
 * The host can either be an IP or a hostname
 * on this machine. The port is just the port
 * plain and simple.
 */
define('WEBSOCKET_SERVER_IP', '0.0.0.0');
define('WEBSOCKET_SERVER_PORT', '8090');
