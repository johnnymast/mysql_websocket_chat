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
                 * We need to switch the message type because in the futhure
                 * this could be a message or maybe a request for all chatters
                 * in the chat. For now we only use the message type but we can
                 * build on that later.
                 */
                switch ($package->type) {
                    case 'message':
                        if ($from != $client) {

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
                }
            }
        }
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }

    /**
     * @param ConnectionInterface $conn
     * @param Exception $e
     */
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }
}