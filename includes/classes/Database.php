<?php
/**
 * Database.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 7.2 and up.
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
     * @param string  $username The username for the database
     * @param string  $password The password for the database
     * @param string  $host     The hostname for the database
     * @param integer $port     The port for the database
     * @param string  $db       The database name
     */
    public function __construct($username = '',
        $password = '',
        $host = '',
        $port = 3306,
        $db = ''
    ) {
        $dsn = 'mysql:dbname=' . $db . ';host=' . $host . ':' . $port;
        parent::__construct($dsn, $username, $password);
    }

    /**
     * Insert a new record into the database.
     *
     * @param int    $to_id      The user_id of who the message is targeted towards
     * @param int    $from_id    The sending user_id
     * @param string $message    The message being sent.
     * @param string $ip_address The originating IP Address.
     *
     * @return void
     */
    public function insert(
        $to_id = 0,
        $from_id = 0,
        $message = '',
        $ip_address = ''
    ): void {
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
