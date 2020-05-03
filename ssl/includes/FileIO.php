<?php
/**
 * FileIO.php
 *
 * The main configuration file for mysql_websocket_chat
 *
 * PHP version 7
 *
 * @category Configuration
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    GIT:1.0
 */

/**
 * @param string $filename
 * @param string $content
 */
function writeToFile($filename = '', $content = ''): void
{
    $fp = fopen($filename, 'w');
    fwrite($fp, $content, strlen($content));
    fclose($fp);
}


/**
 * @param string $filename
 * @return string
 */
function readFromFile($filename = ''): string
{
    $handle = fopen($filename, "rb");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}