<?php
require 'vendor/autoload.php';
require 'includes/config.php';

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
    $db = new JM\WebsocketChat\Database(
        DATABASE_USERNAME,
        DATABASE_PASSWORD,
        DATABASE_HOST,
        DATABASE_PORT,
        DATABASE_DB
    );
} else {
    $db = null;
}

if (ENABLE_SSL)
    if (file_exists(SSL_CERT_BUNDLE) === false) {
        echo "SSL is enabled but " . SSL_CERT_BUNDLE .
            " has not been found. please run cert.php from the command line.\n";
        exit;
    } else {

//        $loop = React\EventLoop\Factory::create();
//        $server = new React\Socket\Server(WEBSOCKET_SERVER_BIND_IP.':'.WEBSOCKET_SERVER_PORT, $loop);
//        $server = new React\Socket\SecureServer(
//            $server,
//            $loop,
//            [
////                'local_cert' => SSL_CERT_BUNDLE,
//                'local_cert'        => './ssl/server.crt', // path to your cert
//                'local_pk'          => './ssl/server.key', // path to your server private key
//                'allow_self_signed' => true,
//                'verify_peer' => false
//            ]
//        );
//
//        // Ratchet magic
//        $webServer = new Ratchet\Server\IoServer(
//            new Ratchet\Http\HttpServer(
//                new Ratchet\WebSocket\WsServer(
//                    new JM\WebsocketChat\Chat($db) /* This class will handle the chats. It is located in src/classes/Chat.php */
//                )
//            ),
//            $server
//        );
//
//        $loop->run();
//

        $loop = React\EventLoop\Factory::create();
        $app = new \Ratchet\Http\HttpServer(
            new \Ratchet\WebSocket\WsServer(
                new JM\WebsocketChat\Chat($db)
            )
        );

        $secure_websockets = new \React\Socket\Server('192.168.178.119:8090', $loop);
        $secure_websockets = new \React\Socket\SecureServer($secure_websockets, $loop, [
            'local_cert' => './ssl/server.crt',
            'local_pk' => './ssl/server.key',
            'verify_peer' => false
        ]);


        $secure_websockets_server = new \Ratchet\Server\IoServer($app, $secure_websockets, $loop);
        $secure_websockets_server->run();

    } else {
    /**
     * Instantiate the chat server
     * on the configured port in
     * src/config.php.
     *
     * The src/classes/Chat.php class will
     * handle all the events and database interactions.
     */

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new JM\WebsocketChat\Chat($db) /* This class will handle the chats. It is located in src/classes/Chat.php */
            )
        ),
        WEBSOCKET_SERVER_PORT,
        WEBSOCKET_SERVER_BIND_IP
    );

    /**
     * Run the server
     */
    $server->run();
}


echo "Server running at " . WEBSOCKET_SERVER_BIND_IP . ":" . WEBSOCKET_SERVER_PORT . "\n";


