<?php
require 'vendor/autoload.php';
require 'includes/config.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;
use React\EventLoop\Loop;
use React\Socket\SecureServer;
use React\Socket\Server;

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
        ini_set('display_errors', E_ALL);

//        $loop = React\EventLoop\Factory::create();
//        $webSock = new React\Socket\Server(WEBSOCKET_SERVER_BIND_IP . ':' . WEBSOCKET_SERVER_PORT, $loop);
//        $server = new React\Socket\SecureServer(
//            $webSock,
//            $loop
//            ,
//            [
//                'local_cert'  => __DIR__  . '/../ssl/mysql_websocket_chat.crt',
//                'local_pk' => __DIR__  . '/../ssl/mysql_websocket_chat.key',
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
        try {
            $loop = Loop::get();

            $stream_context = [
//            [
                'local_cert'  => __DIR__  . '/ssl/server.pem',
//                'local_cert'  => __DIR__  . '/ssl/mysql_websocket_chat.crt',
//                'local_pk' => __DIR__  . '/ssl/mysql_websocket_chat.key',
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
                'verify_depth' => 0
            ];


            // Set up our WebSocket server for clients wanting real-time updates
            $webSock = new React\Socket\SocketServer(WEBSOCKET_SERVER_BIND_IP . ':' . WEBSOCKET_SERVER_PORT);
            $webSock = new React\Socket\SecureServer($webSock, $loop, $stream_context);

            $webServer = new Ratchet\Server\IoServer(
                new Ratchet\Http\HttpServer(
                    new Ratchet\WebSocket\WsServer(
                    //  new Ratchet\Wamp\WampServer(
                        new JM\WebsocketChat\Chat($db)
                    //   )
                    )
                ),
                $webSock,
                $loop
            );


//        $loop->run();
            $webServer->run();

        } catch (\Exception $e) {
            print_r($e);
        }
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


