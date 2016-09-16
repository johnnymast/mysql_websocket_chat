<?php
require 'vendor/autoload.php';
require 'includes/config.php';
require 'includes/classes/Chat.php';

use Ratchet\Server\IoServer;

/**
 * Instanciate the chat server
 */
$server = IoServer::factory(
    new Chat(), /* This class will handle the chats. It is located in includes/classes/Chat.php */
    8080
);

/**
 * Run the server
 */
$server->run();