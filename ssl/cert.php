<?php

/*
 *  Example of HOWTO: PHP TCP Server/Client with SSL Encryption using Streams
 *  Server side Script
 *
 *  Website : http://blog.leenix.co.uk/2011/05/howto-php-tcp-serverclient-with-ssl.html
 */

$ip = "149.210.160.51";               //Set the TCP IP Address to listen on
$port = "8080";                  //Set the TCP Port to listen on
$pem_passphrase = "abracadabra";   //Set a password here
$pem_file = "server.pem";    //Set a path/filename for the PEM SSL Certificate which will be created.
$domain = "johnnymast.io";

$certificateData = array(
  "countryName" => "US",
  "stateOrProvinceName" => "Texas",
  "localityName" => "Houston",
  "organizationName" => "DevDungeon.com",
  "organizationalUnitName" => "Development",
  "commonName" => $ip,
  "emailAddress" => "nanodano@devdungeon.com"
);

// Generate certificate
$privateKey = openssl_pkey_new();
$certificate = openssl_csr_new($certificateData, $privateKey);
$certificate = openssl_csr_sign($certificate, null, $privateKey, 365);

$pem = array();
openssl_x509_export($certificate, $pem[0]);
openssl_pkey_export($privateKey, $pem[1], $pem_passphrase);
$pem = implode($pem);

// Save PEM file
$pemfile = './server.pem';
file_put_contents($pemfile, $pem);
