<?php
require 'vendor/autoload.php';
require 'includes/config.php';

define('SSL_CERT', __DIR__.'/ssl/server.pem');

/**
 * Create a new connection to
 * the database that we can inject
 * to our chat class later on in
 * the code.
 */
if (ENABLE_DATABASE == true) {
    $db = new JM\WebsocketChat\Database(
        DATABASE_USERNAME,
        DATABASE_PASSWORD,
        DATABASE_HOST,
        DATABASE_DB
    );
} else {
    $db = null;
}


$loop = React\EventLoop\Factory::create();

$server = new React\Socket\Server(
    WEBSOCKET_SERVER_IP.':'.WEBSOCKET_SERVER_PORT,
    $loop
);

if (ENABLE_SSL) {
    if (file_exists(__DIR__.'/'.SSL_CERT_BUNDLE) === false) {
        echo "SSL is enabled but ".SSL_CERT_BUNDLE.
          " has not been found. please run ssl/cert.php from the command line.\n";
        exit;
    } else {
        $server = new React\Socket\SecureServer(
            $server,
            $loop,
            [
            'local_cert' => __DIR__.'/ssl/server.pem',
            'allow_self_signed' => true,
            'verify_peer' => false
            ]
        );
    }
}

/**
 * Instantiate the chat server
 * on the configured port in
 * includes/config.php.
 *
 * The includes/classes/Chat.php class will
 * handle all the events and database interactions.
 */
$webServer = new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
            new  JM\WebsocketChat\Chat($db)
        )
    ),
    $server,
    $loop
);

echo "Server running at ".WEBSOCKET_SERVER_IP.":".WEBSOCKET_SERVER_PORT."\n";

/**
 * Run the server
 */
$webServer->run();
