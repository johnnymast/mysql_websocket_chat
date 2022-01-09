<?php
/*
 * This file is part of Mysql Websocket Chat.
 *
 * (c) Johnny Mast <mastjohnny@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JM\WebsocketChat\Cert;

use Ratchet\App;

/**
 * Class Application
 *
 * The main application logic for the ssl app for mysql_websocket_chat.
 *
 * PHP version 8.0 and up.
 *
 * @category OpenSSL
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.5
 */
class Application
{
    /**
     * The command line handler.
     *
     * @var Cli
     */
    protected $cli;
    
    /**
     * Settings storage container
     * for the Application.
     *
     * @var Settings
     */
    protected Settings $settings;
    
    /**
     * Directory for the .env configuration
     * file.
     *
     * @var string
     */
    protected string $configPath = '';
    
    /**
     * Application constructor.
     */
    public function __construct(string $path)
    {
        $this->cli = new Cli();
        $this->configPath = $path;
        
        $dotenv = \Dotenv\Dotenv::createImmutable($this->configPath);
        $dotenv->safeLoad();
    }
    
    protected function loadConfig(): Application
    {
        if (is_dir($this->configPath)) {
            $this->settings = new Settings([
              "domains" => $_ENV['DOMAINS'],
              "countryName" => $_ENV['COUNTRY_NAME'],
              "stateOrProvinceName" => $_ENV['STATE_OR_PROVINCE_NAME'],
              "localityName" => $_ENV['LOCALITY_NAME'],
              "organizationName" => $_ENV['ORGANIZATION_NAME'],
              "organizationalUnitName" => $_ENV['ORGANIZATIONAL_UNIT_NAME'],
              "emailAddress" => $_ENV['EMAIL_ADDRESS'],
            ]);
            
            if (strpos($this->settings->domains, ',') !== -1) {
                $this->settings->domains = explode(",", $this->settings->domains);
            }
        }
        return $this;
    }
    
    /**
     * Handle the usage for the SSL Cert application.
     *
     * @return $this
     */
    public function usage(): Application
    {
        try {
            $this->cli->handle();
            
            if ($this->cli->hasArgument("domain")) {
                $_ENV["DOMAINS"] = $this->cli->getArgument("domain");
            }
            
            $this->loadConfig();
            
        } catch (\Exception $e) {
            $this->cli->showUsage();
        }
        
        return $this;
    }
    
    /**
     * Run the Application
     *
     * @return void
     */
    public function run(): void
    {
        // Not implemented    }
//        var_dump($this->cli->getArgument('makecert'));
//        exit;
      
        if ($this->cli->hasArgument('makeca')) {
            echo " MAKE CA \n";
        } else  if ($this->cli->hasArgument('makecert')) {
            
            
            if (file_exists($this->configPath.'/CA.pem') == false) {
             //   $this->cli->getClimate()->error($this->configPath."/CA.pem does not exist. Please run --makeca first.\n");
           //     $this->cli->showUsage();
           //     return;
            }

            $openSSL = new OpenSSL(
              $this->settings->domains, $this->settings->toArray(), [
                'OPENSSL_CONFIG_TEMPLATE' => $this->configPath.'/openssl.tpl',
                'OPENSSL_CONFIG' => $this->configPath.'/openssl.conf',
                'CA_PASSPHRASE' => '1234',
                'PEM_FILE' => $this->configPath.'/server.pem',
                'CA_CERT' => 'file://'.$this->configPath.'/CA.pem',
                'CA_KEY' => 'file://'.$this->configPath.'/CA.key',
              ]
            );
    
            $openSSL
              ->createConfig()
              ->createBundle(false)
              ->cleanUp();
        } else {
            die(' has not');
        }
    }
}