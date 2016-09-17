<?php

class Database extends PDO
{

    /**
     * Database constructor.
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $database
     */
    public function __construct($username = '', $password = '', $host = '', $database = '')
    {
        $dsn = 'mysql:dbname='.$database.';host='.$host;
        parent::__construct($dsn,$username,$password);
    }

    /**
     * @param int $to_id
     * @param int $from_id
     * @param string $message
     * @param string $ip_address
     */
    public function insert($to_id = 0, $from_id = 0, $message = '', $ip_address = '') {
        $statement = $this->prepare("INSERT INTO chat_interactions 
                          SET 
                          to_id = :to_id,
                          from_id = :from_id,
                          message = :message,
                          ip_address = :ip_address");


        $statement->execute([
            'to_id' => $to_id,
            'from_id' => $from_id,
            'message' => $message,
            'ip_address' => $ip_address
        ]);
    }
}