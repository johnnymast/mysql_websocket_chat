<?php
/*
 * This file is part of Mysql Websocket Chat.
 *
 * (c) Johnny Mast <mastjohnny@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JM\WebsocketChat\Cert;

/**
 * Class Settings
 *
 * Default settings for the Certificate builder for mysql_websocket_chat.
 *
 * PHP version 8.0 and up.
 *
 * @category Settings
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
    protected array $fields = [];

    /**
     * CertInfo constructor.
     *
     * @param array $fields (optional) initialize the settings class with fields.
     */
    public function __construct(array $fields = [])
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
        if (is_array($fields) === true) {
            $this->fields = array_merge($this->fields, $fields);
        }
    }

    /**
     * Makes field keys be functions. This will
     * return the value of a field if () is added like domains().
     *
     * @param string $name      The name of the field
     * @param array  $arguments The arguments for the function
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments = [])
    {
        if (isset($this->fields[$name]) === true) {
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
        if (isset($this->fields[$name]) === true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * Set a value.
     *
     * @param string $name  The name of the field name.
     * @param mixed  $value The value for the field.
     *
     * @return mixed
     */
    public function __set(string $name, mixed $value)
    {
        if (isset($this->fields[$name]) === true) {
            $this->fields[$name] = $value;
        }

        return $this->fields[$name];
    }

    /**
     * Check to see if a field exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return (isset($this->fields[$name]) === true);
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