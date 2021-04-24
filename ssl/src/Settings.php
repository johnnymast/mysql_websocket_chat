<?php
/**
 * Settings.php
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
 * Class Settings
 *
 * Default settings for the Certificate builder for mysql_websocket_chat.
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
class Settings
{
    /**
     * @var array
     */
    private $fields = [];

    /**
     * CertInfo constructor.
     *
     * @param array $fields
     */
    public function __construct($fields = [])
    {

        $this->fields = [
            "domains" => ["localhost"],
            "countryName" => "NL",
            "stateOrProvinceName" => "North Holland",
            "localityName" => "Amsterdam",
            "organizationName" => "Johnny Mast",
            "organizationalUnitName" => "Mysql Websocket Chat - Dev team",
            "emailAddress" => "mastjohnny@gmail.com",
        ];
        if (is_array($fields) == true) {
            $this->fields = array_merge($this->fields, $fields);
        }
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    function __call($name, $arguments)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return $this->fields;
    }

    /**
     * Return the certificate as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->fields;
    }
}