<?php

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{

    /**
     * @var SplObjectStorage
     */
    protected $clients = null;

    /**
     * @var array
     */
    protected $users = [];

    /**
     * @var Database
     */
    protected $db = null;


    public function __construct($db)
    {
        $this->clients = new \SplObjectStorage;
        $this->db = $db;
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
    }

    /**
     * @param ConnectionInterface $from
     * @param string $msg
     */
    public function onMessage(ConnectionInterface $from, $msg)
    {
        foreach ($this->clients as $client) {
            $package = json_decode($msg);

            if (is_object($package) == true) {


                /**
                 * We need to switch the message type because in the future
                 * this could be a message or maybe a request for all chatters
                 * in the chat. For now we only use the message type but we can
                 * build on that later.
                 */
                switch ($package->type) {
                    case 'message':

                        if ($from != $client) {

                            if (empty($package->to_user) == false) {


                                /**
                                 * Find the client to send the message to
                                 */
                                foreach ($this->users as $resourceId => $user) {
                                    if ($resourceId == $from->resourceId)
                                        continue;


                                    /**
                                     * Non target users will not see this message
                                     * on their screens.
                                     */
                                    if ($user['user']->id == $package->to_user) {


                                        /**
                                         * Defined in includes/config.php
                                         */
                                        if (ENABLE_DATABASE == true) {
                                            if (isset($package->user) and is_object($package->user) == true) {
                                                $this->db->insert(
                                                    $package->to_user,
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
                            }


                            /**
                             * Defined in includes/config.php
                             */
                            if (ENABLE_DATABASE == true) {
                                if (isset($package->user) and is_object($package->user) == true) {
                                    $this->db->insert(
                                        $package->to_user,
                                        $package->user->id,
                                        $package->message,
                                        $client->remoteAddress
                                    );
                                }
                            }
                            $client->send($msg);
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
                            $list[$resourceId] = $value['user'];
                        }
                        $new_package = [
                            'users' => $list,
                            'type' => 'userlist'
                        ];
                        $new_package = json_encode($new_package);
                        $client->send($new_package);
                        break;
                }
            }
        }
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onClose(ConnectionInterface $conn)
    {
        unset($this->users[$conn->resourceId]);
        $this->clients->detach($conn);
    }

    /**
     * @param ConnectionInterface $conn
     * @param Exception $e
     */
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        unset($this->users[$conn->resourceId]);
        $conn->close();
    }
}