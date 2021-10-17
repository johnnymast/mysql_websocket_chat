<?php
/**
 * Config.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 8.0 and up.
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.0
 */

$x = [
    /**
     * --------------------------------------------------------------------------
     * Default time zone
     * --------------------------------------------------------------------------
     *
     * Here you may configure as many filesystem "disks" as you wish, and you
     * may even configure multiple disks of the same driver. Defaults have
     * been set up for each driver as an example of the required options.
     */
    'default_timezone' => 'EUROPE/AMSTERDAM',

    /**
     * --------------------------------------------------------------------------
     * Database settings
     * --------------------------------------------------------------------------
     *
     * Here you may configure as many filesystem "disks" as you wish, and you
     * may even configure multiple disks of the same driver. Defaults have
     * been set up for each driver as an example of the required options.
     */
    'database' => [
        'host' => $_ENV['DOCKER_DB_HOST'] ?? 'localhost',
        'port' => 3306,
        'database' => 'socket_chat',
        'username' => 'root',
        'password' => '',
        'enabled' => false,
    ],

    /**
     * --------------------------------------------------------------------------
     * Websockets settings
     * --------------------------------------------------------------------------
     *
     * Here you may configure as many filesystem "disks" as you wish, and you
     * may even configure multiple disks of the same driver. Defaults have
     * been set up for each driver as an example of the required options.
     */
    'websockets' => [
        'bind_ip' => $_ENV['DOCKER_WEBSOCKET_BIND_IP'] ?? '192.168.178.21',
        'bind_port' => 8090,
        'ssl' => [
            'certificate' => __DIR__.'/../ssl/mysql_websocket_chat.crt',
            'private_key' => __DIR__.'/../ssl/mysql_websocket_chat.key',
            'enabled' => true,
        ]
    ],

];


date_default_timezone_set('EUROPE/AMSTERDAM');

define("DATABASE_HOST", $_ENV['DOCKER_DB_HOST'] ?? 'localhost');

const DATABASE_PORT = 3306;
const DATABASE_USERNAME = "root";
const DATABASE_PASSWORD = "";
const DATABASE_DB = "socket_chat";

const ENABLE_DATABASE = false;
const SSL_CERT_FILE = 'server.pem';

const SSL_CERT_DIR = __DIR__ . '/../ssl/';
const SSL_CERT_BUNDLE = SSL_CERT_DIR . DIRECTORY_SEPARATOR . SSL_CERT_FILE;
const ENABLE_SSL = true;

/**
 * The host can either be an IP or a hostname
 * on this machine. The port is just the port
 * plain and simple.
 */
define(
    'WEBSOCKET_SERVER_BIND_IP',
    $_ENV['DOCKER_WEBSOCKET_BIND_IP'] ?? '192.168.178.21'
);
const WEBSOCKET_SERVER_IP = '192.168.178.21';
const WEBSOCKET_SERVER_PORT = '8090';
