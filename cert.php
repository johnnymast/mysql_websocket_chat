<?php
/*
 * This file is part of Mysql Websocket Chat.
 *
 * (c) Johnny Mast <mastjohnny@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__ . '/vendor/autoload.php';

use JM\WebsocketChat\Cert\OpenSSL;
use JM\WebsocketChat\Cert\Application;

//const CA_CERT = 'file://CA.pem';
//const CA_KEY = 'file://CA.key';
//const CA_PASSPHRASE = '1234';
//const OPENSSL_CONFIG = __DIR__ . '\openssl.conf';
//const OPENSSL_CONFIG_TEMPLATE = __DIR__ . '/openssl.tpl';
//const PEM_FILE = __DIR__ . '/server.pem';
//const DEBUG = false;

try {
    //
    //    # Creat pem
    //
    //    openssl genrsa -des3 -out CA.key 2048
    //
    //# Creat root ssl
    //
    //openssl req -x509 -new -nodes -key CA.key -sha256 -days 1825 -out CA.pem


    // Whole process
    // http://web.archive.org/web/20200731233936/https://deliciousbrains.com/ssl-certificate-authority-for-local-https-development/

    // Validate cert
    // openssl s_client -connect 127.0.0.1:8090 < /dev/null 2>/dev/null | openssl x509 -fingerprint -noout -in /dev/stdin


    $app = new Application(__DIR__ . "/ssl")
    $app->usage()
        ->run();

    exit;

    $domains = ['johnny.io', 'websocket.johnny.io'];

    $certInfo = [
        "countryName" => "NL",
        "stateOrProvinceName" => "North Holland",
        "localityName" => "Amsterdam",
        "organizationName" => "Johnny Mast",
        "organizationalUnitName" => "Mysql Websocket Chat - Dev team",
        "emailAddress" => "mastjohnny@gmail.com",
    ];

    $openSSL = new OpenSSL(
        $domains, $certInfo, [
            'OPENSSL_CONFIG_TEMPLATE' => OPENSSL_CONFIG_TEMPLATE,
            'OPENSSL_CONFIG' => OPENSSL_CONFIG,
            'CA_PASSPHRASE' => CA_PASSPHRASE,
            'PEM_FILE' => PEM_FILE,
            'CA_CERT' => CA_CERT,
            'CA_KEY' => CA_KEY,
        ]
    );

    $openSSL
        ->createConfig()
        ->createBundle(DEBUG)
        ->cleanUp();

    echo basename(PEM_FILE) . " created." . PHP_EOL;
} catch (Exception $e) {
    print_r($e->getMessage());
}
