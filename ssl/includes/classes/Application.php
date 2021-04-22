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

namespace JM\WebsocketChat\SSL;

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
    protected $cli;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->cli = new Cli();
    }

    public function run()
    {
        $settings = $this->cli->handle();

    }
}