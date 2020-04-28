<?php
require 'vendor/autoload.php';
require 'includes/classes/Chat.php';
require 'includes/classes/Database.php';

$loop = React\EventLoop\Factory::create();
$webSock = new React\Socket\Server('0.0.0.0:8080', $loop);
$webSock = new React\Socket\SecureServer($webSock, $loop, [
  'local_cert' => __DIR__.'\ssl\server.pem',
  'allow_self_signed' => FALSE,
  'verify_peer' => FALSE
]);

$webServer = new Ratchet\Server\IoServer(
  new Ratchet\Http\HttpServer(
    new Ratchet\WebSocket\WsServer(
      new Chat(null)
    )
  ),
  $webSock, $loop
);

$loop->run();