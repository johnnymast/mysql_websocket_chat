<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
date_default_timezone_set('EUROPE/AMSTERDAM');

define ('DATABASE_HOST', 'localhost');
define ('DATABASE_USERNAME', 'root');
define ('DATABASE_PASSWORD', 'root');
define ('DATABASE_DB', 'socket_chat');
define ('ENABLE_DATABASE', false);

/**
 * The host can either be an IP or a hostname
 * on this machine. The port is just the port
 * plain and simple.
 */
define('CHAT_SERVER_HOST',   'localhost');
define('CHAT_SERVER_PORT', '8080');

