<?php
/**
 * Settings.php
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

/**
 * Class Settings
 *
 * Default settings for the Certificate builder for mysql_websocket_chat.
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
            "domains" => [],
            "countryName" => "",
            "stateOrProvinceName" => "",
            "localityName" => "",
            "organizationName" => "",
            "organizationalUnitName" => "",
            "emailAddress" => "",
        ];
        if (is_array($fields) == true) {
            $this->fields = array_merge($this->fields, $fields);
        }
    }

    /**
     * Makes field keys be functions. This will
     * return the value of a field if () is added like domains().
     *
     * @param string $name      The name of the field
     * @param string $arguments The arguments for the function
     *
     * @return mixed
     */
    function __call(string $name, string $arguments)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }


    /**
     * Return the value of a field.
     *
     * @param string $name The name of the field.
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * Set a value.
     *
     * @param string $name  The name of the field name.
     * @param mixed $value The value for the field.
     *
     * @return mixed
     */
    public function __set(string $name, $value)
    {
        if (isset($this->fields[$name]) == true) {
            $this->fields[$name] = $value;
        }

        return $this->fields[$name];
    }

    /**
     * Return the fields when trying to var_dump
     * the Settings class.
     *
     * @return array
     */
    public function __debugInfo(): array
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