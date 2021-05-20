<?php
/**
 * Chat.php
 *
 * The main Chat controller for mysql_websocket_chat
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

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use SplObjectStorage;

/**
 * Class Chat
 *
 * The main Chat controller for mysql_websocket_chat
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
class Chat implements MessageComponentInterface
{
    /**
     * This member keeps track of all
     * connected clients.
     *
     * @var \SplObjectStorage
     */
    protected $clients = null;

    /**
     * This member keeps track of all
     * connected users.
     *
     * @var array
     */
    protected $users = [];

    /**
     * Instance of the database class.
     *
     * @var Database
     */
    protected $db = null;

    /**
     * Chat constructor.
     *
     * @param Database $db Instance of Database
     */
    public function __construct($db)
    {
        $this->clients = new SplObjectStorage;
        $this->db = $db;
    }

    /**
     * If a new connection has been opened this function will be called.
     *
     * @param ConnectionInterface $conn The unique connection identifier.
     *
     * @return void
     */
    public function onOpen(ConnectionInterface $conn): void
    {
        $this->clients->attach($conn);
    }

    /**
     * If any clients sends a message it will be passed trough here.
     *
     * @param ConnectionInterface $from Reference to the unique client
     * @param string              $msg  The message being sent
     *
     * @return void
     * @throws \Exception
     */
    public function onMessage(ConnectionInterface $from, $msg): void
    {
        foreach ($this->clients as $client) {
            $package = json_decode($msg);

            if (is_object($package) === true) {

                /**
                 * We need to switch the message type because in the future
                 * this could be a message or maybe a request for all chatters
                 * in the chat. For now we only use the message type but we can
                 * build on that later.
                 */
                switch ($package->type) {
                case 'message':
                    if ($from !== $client) {
                        if (empty($package->to_user) == false
                            && isset($package->to_user->id) == true
                        ) {

                            /**
                             * Find the client to send the message to
                             */
                            foreach ($this->users as $resourceId => $user) {

                                /**
                                 * Non target users will not see this message
                                 * on their screens.
                                 */
                                if ($user['user']->id === $package->to_user->id) {

                                    /**
                                     * Defined in includes/config.php
                                     */
                                    if (ENABLE_DATABASE == true) {
                                        if (isset($package->user)
                                            && is_object($package->user) == true
                                        ) {
                                            /**
                                             * Insert private chat
                                             */
                                            $this->db->insert(
                                                $package->to_user->id,
                                                $package->user->id,
                                                $package->message,
                                                $client->remoteAddress
                                            );
                                        }
                                    }

                                    $targetClient = $user['client'];
                                    $targetClient->send($msg);
                                    return;
                                }
                            }
                        } else {


                            /**
                             * Defined in includes/config.php
                             */
                            if (ENABLE_DATABASE == true) {
                                if (isset($package->user)
                                    and is_object($package->user) == true
                                ) {
                                    /**
                                     * Insert channel chat
                                     */
                                    $this->db->insert(
                                        null,
                                        $package->user->id,
                                        $package->message,
                                        $client->remoteAddress
                                    );
                                }
                            }
                            $client->send($msg);
                        }
                    }
                    break;
                case 'registration':
                    $this->users[$from->resourceId] = [
                        'user' => $package->user,
                        'client' => $from
                    ];
                    break;
                case 'userlist':
                    $list = [];
                    foreach ($this->users as $resourceId => $value) {
                        $list[] = $value['user'];
                    }
                    $new_package = [
                        'users' => $list,
                        'type' => 'userlist'
                    ];
                    $new_package = json_encode($new_package);
                    $client->send($new_package);
                    break;

                case 'typing':
                    if ($from != $client) {
                        if (empty($package->user) == false) {
                            /**
                             * Find the client to send the message to
                             */
                            foreach ($this->users as $resourceId => $user) {
                                if ($resourceId == $from->resourceId) {
                                    continue;
                                }

                                $new_package = [
                                    'user' => $package->user,
                                    'type' => 'typing',
                                    'value' => $package->value,
                                ];

                                $targetClient = $user['client'];
                                $targetClient->send($msg);
                            }
                        }
                    }
                    break;
                default:
                    throw new \Exception('Unexpected value');
                        break;
                }
            }
        }
    }

    /**
     * The onclose callback.
     *
     * @param ConnectionInterface $conn The unique connection identifier.
     *
     * @return void
     */
    public function onClose(ConnectionInterface $conn): void
    {
        unset($this->users[$conn->resourceId]);
        $this->clients->detach($conn);
    }

    /**
     * The onError callback. Will be called on you guessed it, an error :)
     *
     * @param ConnectionInterface $conn The unique connection identifier.
     * @param \Exception          $e    The raised exception
     *
     * @return void
     */
    public function onError(ConnectionInterface $conn, \Exception $e): void
    {
        unset($this->users[$conn->resourceId]);
        $conn->close();
    }
}
