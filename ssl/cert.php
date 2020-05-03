<?php
/**
 * Cert.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 7
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    GIT:1.0
 */
include('../vendor/autoload.php');

use JM\WebsocketChat\SSL\OpenSSL;

define('CA_CERT', 'file://CA.pem');
define('CA_KEY', 'file://CA.key');
define('CA_PASSPHRASE', '1234');
define('OPENSSL_CONFIG', __DIR__.'\openssl.conf');
define('OPENSSL_CONFIG_TEMPLATE', __DIR__.'/openssl.tpl');
define('PEM_FILE', __DIR__.'/server.pem');
define("DEBUG", false);

try {
    //
    //    # Creat pem
    //
    //    openssl genrsa -des3 -out CA.key 2048
    //
    //# Creat root cert
    //
    //openssl req -x509 -new -nodes -key CA.key -sha256 -days 1825 -out CA.pem

    $domains = ['johnny.io', 'websocket.johnny.io'];

    $certInfo = [
      "countryName" => "NL",
      "stateOrProvinceName" => "North Holland",
      "localityName" => "Amsterdam",
      "organizationName" => "Johnny Mast",
      "organizationalUnitName" => "Mysql Websocket Chat - Dev team",
      "emailAddress" => "mastjohnny@gmail.com",
    ];

    $openSSL = new OpenSSL($domains, $certInfo, [
      'OPENSSL_CONFIG_TEMPLATE' => OPENSSL_CONFIG_TEMPLATE,
      'OPENSSL_CONFIG' => OPENSSL_CONFIG,
      'CA_PASSPHRASE' => CA_PASSPHRASE,
      'PEM_FILE' => PEM_FILE,
      'CA_CERT' => CA_CERT,
      'CA_KEY' => CA_KEY,
    ]);

    $openSSL
      ->createConfig()
      ->createBundle(DEBUG)
      ->cleanUp();

    echo basename(PEM_FILE)." created.".PHP_EOL;
} catch (Exception $e) {
    print_r($e->getMessage());
}
