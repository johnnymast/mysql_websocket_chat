<?php declare(strict_types=1);
/**
 * Database.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 8.0 and up.
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.0
 */

namespace JM\WebsocketChat;

use PDO;

/**
 * Class Database
 *
 * This class contains an insert function for mysql using pdo.
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.0
 */
class Database extends PDO
{

    /**
     * Database constructor.
     *
     * @param string $username The username for the database
     * @param string $password The password for the database
     * @param string $host     The hostname for the database
     * @param int    $port     The port for the database
     * @param string $db       The database name
     */
    public function __construct(string $username = '',
                                string $password = '',
                                string $host = '',
                                int    $port = 3306,
                                string $db = ''
    )
    {
        $dsn = 'mysql:dbname=' . $db . ';host=' . $host . ':' . $port;
        parent::__construct($dsn, $username, $password);
    }

    /**
     * Insert a new record into the database.
     *
     * @param mixed  $to_id      The user_id of who the message is targeted towards
     * @param int    $from_id    The sending user_id
     * @param string $message    The message being sent.
     * @param string $ip_address The originating IP Address.
     *
     * @return void
     */
    public function insert(
        mixed  $to_id = 0,
        int    $from_id = 0,
        string $message = '',
        string $ip_address = ''
    ): void
    {
        $statement = $this->prepare(
            "INSERT INTO chat_interactions 
                          SET 
                          to_id = :to_id,
                          from_id = :from_id,
                          message = :message,
                          ip_address = :ip_address"
        );

        $statement->execute(
            [
                'to_id' => $to_id,
                'from_id' => $from_id,
                'message' => $message,
                'ip_address' => $ip_address
            ]
        );
    }
}
