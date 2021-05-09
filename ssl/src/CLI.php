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

use Redbox\Cli\Cli as RedboxCli;

/**
 * Class CLI
 *
 * Handle commandline arguments for the ssl application.
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
class CLI
{
    /**
     * Command line parser.
     *
     * @var RedboxCli|null
     */
    protected ?RedboxCli $cli = null;

    /**
     * CLI constructor.
     *
     * @throws \Exception
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
                    'description' => "Domain(s) to create a certificate for." .
                        "If you wish to have multiple domains separate them by comma's",
                    'defaultValue' => 'localhost',
                    'required' => true,
                ],
                'help' => [
                    'longPrefix' => 'help',
                    'description' => 'Prints a usage statement',
                    'noValue' => true,
                ],
                'makeca' => [
                    'description' => "Create an authority root certificate.",
                    "defaultValue" => false,
                ],
                'makecert' => [
                    'description' => "Create a server certificate.",
                    "defaultValue" => false,
                ]
            ]
        );
    }

    /**
     * Show the usage to the user.
     *
     * @return $this
     */
    public function showUsage(): CLI
    {
        $this->cli->arguments->usage();
        return $this;
    }

    /**
     * Return the value of an argument.
     *
     * @param string $argument The name of the commandline argument.
     *
     * @return string|null
     */
    public function getArgument(string $argument): ?string
    {
        return $this->cli->arguments->get($argument);
    }

    /**
     * Handle the comment line arguments.
     *
     * @return void
     */
    public function handle(): void
    {
        try {

            /**
             * We need to tell the parser to start.
             */
            $this->cli->arguments->parse();


        } catch (\Exception $e) {
            $this->showUsage();
        }
    }
}
