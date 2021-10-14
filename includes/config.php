<?php
/**
 * Config.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 7.2 and up.
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.0
 */

date_default_timezone_set('EUROPE/AMSTERDAM');

define("DATABASE_HOST", $_ENV['DOCKER_DB_HOST'] ?? 'localhost');

const DATABASE_PORT = 3306;
const DATABASE_USERNAME = "root";
const DATABASE_PASSWORD = "";
const DATABASE_DB = "socket_chat";

const ENABLE_DATABASE = false;
const SSL_CERT_FILE   = 'server.pem';

define("SSL_CERT_DIR", realpath(__DIR__ . '/../ssl/'));
define("SSL_CERT_BUNDLE", SSL_CERT_DIR.DIRECTORY_SEPARATOR.SSL_CERT_FILE);
const ENABLE_SSL = true;

/**
 * The host can either be an IP or a hostname
 * on this machine. The port is just the port
 * plain and simple.
 */
define('WEBSOCKET_SERVER_BIND_IP', $_ENV['DOCKER_WEBSOCKET_BIND_IP'] ?? '192.168.178.21');
//define("WEBSOCKET_SERVER_IP", '192.168.178.21');
define("WEBSOCKET_SERVER_IP", '192.168.178.21');
define("WEBSOCKET_SERVER_PORT", '8090');
