<?php

/*
 *  Example of HOWTO: PHP TCP Server/Client with SSL Encryption using Streams
 *  Server side Script
 *
 *  Website : http://blog.leenix.co.uk/2011/05/howto-php-tcp-serverclient-with-ssl.html
 */

$ip = "127.0.0.1";               //Set the TCP IP Address to listen on
$port = "8080";                  //Set the TCP Port to listen on
$pem_passphrase = "1234";   //Set a password here
$pem_file = "server.pem";    //Set a path/filename for the PEM SSL Certificate which will be created.

//The following array of data is needed to generate the SSL Cert
$pem_dn = array(
  "countryName" => "NL",                 //Set your country name
  "stateOrProvinceName" => "Herts",      //Set your state or province name
  "localityName" => "St. Albans",        //Ser your city name
  "organizationName" => "Your Company",  //Set your company name
  "organizationalUnitName" => "Your Department", //Set your department name
  "commonName" => "127.0.0.1",  //Set your full hostname.
  "emailAddress" => "email@example.com"  //Set your email address
);

function createSSLCert($pem_file, $pem_passphrase, $pem_dn) {
//create ssl cert for this scripts life.

    //Create private key
    $privkey = openssl_pkey_new();

    //Create and sign CSR
    $cert    = openssl_csr_new($pem_dn, $privkey);
    $cert    = openssl_csr_sign($cert, null, $privkey, 365);

    //Generate PEM file
    $pem = array();
    openssl_x509_export($cert, $pem[0]);
    openssl_pkey_export($privkey, $pem[1], $pem_passphrase);
    $pem = implode($pem);

    //Save PEM file
    file_put_contents($pem_file, $pem);
    chmod($pem_file, 0600);
}

//create ssl cert for this scripts life.
echo "Creating SSL Cert\n";
createSSLCert($pem_file, $pem_passphrase, $pem_dn);