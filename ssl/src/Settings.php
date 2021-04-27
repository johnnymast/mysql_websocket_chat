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
     * Storage container for the (settings)
     * fields.
     *
     * @var array
     */
    protected $fields = [];

    /**
     * CertInfo constructor.
     *
     * @param array $fields (optional) initialize the settings class with fields.
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
     * Makes field keys be functions. This will
     * return the value of a field if () is added like domains().
     *
     * @param $name The name of the field
     *
     * @return mixed
     */
    function __call($name)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * Return the value of a field.
     *
     * @param $name The name of the field.
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
     * Return the fields when trying to var_dump
     * the Settings class.
     *
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