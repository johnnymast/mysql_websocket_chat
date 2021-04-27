<?php
/**
 * CLI.php
 *
 * PHP version 7.2 and up.
 *
 * @category Security
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.5
 */

namespace JM\WebsocketChat\Cert;

/**
 * Class Application
 *
 * The main application logic for the ssl app for mysql_websocket_chat.
 *
 * PHP version 7.2 and up.
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
     * Application constructor.
     */
    public function __construct()
    {
        $this->cli = new Cli();
    }

    /**
     * Handle the usage for the SSL Cert application.
     *
     * @return $this
     */
    public function usage(): Application
    {
        $this->cli->handle();
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