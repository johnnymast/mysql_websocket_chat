<?php
/**
 * CLI.php
 *
 * PHP version 7.4 and up.
 *
 * @category Security
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.5
 */

namespace JM\WebsocketChat\Cert;

use Ratchet\App;

/**
 * Class Application
 *
 * The main application logic for the ssl app for mysql_websocket_chat.
 *
 * PHP version 7.4 and up.
 *
 * @category Security
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

            print_r($this->settings);

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

            if ($this->cli->getArgument("makeca") == false && $this->cli->getArgument("makecert") == false) {
                throw new \Exception("Missing required argument.");
            }


            if ($this->cli->getArgument("domain")) {
                $_ENV["DOMAINS"] = $this->cli->getArgument("domain");
            }

            print_r($this->settings);
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
        // Not implemented
    }
}