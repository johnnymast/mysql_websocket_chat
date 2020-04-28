<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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


try {

    //$loop = Factory::create();
    $loop = React\EventLoop\Factory::create();
//
//$secure_websockets = new Server(WEBSOCKET_SERVER_IP.':'.WEBSOCKET_SERVER_PORT, $loop);
////$secure_websockets->listen(WEBSOCKET_SERVER_PORT, WEBSOCKET_SERVER_IP);
//$webSock = new SecureServer(
//    $secure_websockets, $loop, [
//    'local_cert' => dirname(__FILE__).'/ssl/server.crt',
//    'local_pk' => dirname(__FILE__).'/ssl/localhost.key',
//    'verify_peer' => false,
//    'allow_self_signed' => true
//    ]
//);

    // !! https://deliciousbrains.com/https-locally-without-browser-privacy-errors/
    // https://smallbusiness.chron.com/make-computer-trust-certificate-authority-57649.html
//    openssl genrsa 2048 > host.key
//chmod 400 host.key
//openssl req -new -x509 -nodes -sha256 -days 365 -key host.key -out host.cert
    $server = new React\Socket\Server(WEBSOCKET_SERVER_IP.':'.WEBSOCKET_SERVER_PORT,
      $loop);
    $server = new React\Socket\SecureServer(
      new Server(WEBSOCKET_SERVER_IP.':'.WEBSOCKET_SERVER_PORT, $loop), $loop,
      array(
        'local_cert'        => dirname(__FILE__).'/ssl/private.pem', // path to your cert
        'local_pk'          => dirname(__FILE__).'/ssl/public.pem', // path to your server private key
        'allow_self_signed' => TRUE, // Allow self signed certs (should be false in production)
        'verify_peer' => FALSE
    ));


    /**
     * Instantiate the chat server
     * on the configured port in
     * includes/config.php.
     *
     * The includes/classes/Chat.php class will
     * handle all the events and database interactions.
     */
//$server = IoServer::factory(
//    new HttpServer(
//        new WsServer(
//            new Chat($db) /* This class will handle the chats. It is located in includes/classes/Chat.php */
//        )
//    ),
//    $webSock
//);

    $webServer = new IoServer(
      new HttpServer(
        new WsServer(
          new Chat($db)
        )
      ),
      $server, $loop
    );

//    $webServer->enableKeepAlive($loop,30);

    echo "Server running at ".WEBSOCKET_SERVER_IP.":".WEBSOCKET_SERVER_PORT."\n";

    /**
     * Run the server
     */
    $loop->run();


} catch (\Exception $e) {
    print_r($e);
}


/**
 * Run the server
 */
//$server->run();
