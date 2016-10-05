<?php
require 'vendor/autoload.php';
require 'includes/config.php';
require 'includes/classes/Database.php';
require 'includes/classes/Chat.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;


/**
 * Create a new connection to
 * the database that we can inject
 * to our chat class later on in
 * the code.
 */
if (ENABLE_DATABASE == true) {
    $db = new Database(
        DATABASE_USERNAME,
        DATABASE_PASSWORD,
        DATABASE_HOST,
        DATABASE_DB
    );
} else {
    $db = null;
}

/**
 * Instantiate the chat server
 * on the configured port in
 * includes/config.php.
 *
 * The includes/classes/Chat.php class will
 * handle all the events and database interactions.
 */
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat($db) /* This class will handle the chats. It is located in includes/classes/Chat.php */
        )
    ),
    CHAT_SERVER_PORT,
    CHAT_SERVER_HOST
);

echo "Server running at ".CHAT_SERVER_HOST.":".CHAT_SERVER_PORT."\n";

/**
 * Run the server
 */
$server->run();
