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

use Redbox\Cli\Cli as RedboxCli;

/**
 * Class CLI
 *
 * Handle commandline arguments for the ssl application.
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
class CLI
{
    /**
     * Command line parser.
     *
     * @var RedboxCli|null
     */
    protected $cli = null;

    /**
     * CLI constructor.
     */
    public function __construct()
    {
        $this->cli = new RedboxCli();
        $this->setup();
    }

    /**
     * Configure the command line arguments.
     *
     * @return void
     * @throws \Exception
     */
    protected function setup(): void
    {
        $this->cli->arguments->add(
            [
                'domain' => [
                    'prefix' => 'd',
                    'longPrefix' => 'domain',
                    'description' => "Domain(s) to create a certificate for.".
                    "If you wish to have multiple domains separate them by comma's",
                    'defaultValue' => 'localhost',
                    'required' => true,
                ],
                'interactive' => [
                    'prefix' => 'i',
                    'longPrefix' => 'interactive',
                    'description' => 'Run interactive mode.',
                    'noValue' => true,
                    'required' => true,
                ],
                'help' => [
                    'longPrefix' => 'help',
                    'description' => 'Prints a usage statement',
                    'noValue' => true,
                ],
                'path' => [/* NOT YET SUPPORTED */
                    'description' => 'The path to push',
                ],
            ]
        );
    }

    /**
     * Handle the comment line arguments.
     *
     * @return Settings
     */
    public function handle()
    {
        try {

            /**
             * We need to tell the parser to start.
             */
            $this->cli->arguments->parse();


        } catch (\Exception $e) {
            $this->cli->arguments->usage();
        }
        return new Settings();
    }
}
