<?php
/**
 * FileIO.php
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
 * @since    1.5
 */

/**
 * Write content to file.
 *
 * @param string $filename - The file to write to.
 * @param string $content - The content to write.
 */
function writeToFile($filename = '', $content = ''): void
{
    $fp = fopen($filename, 'w');
    fwrite($fp, $content, strlen($content));
    fclose($fp);
}

/**
 * Read the contents of a file.
 *
 * @param string $filename - The file to read.
 * @return string
 */
function readFromFile($filename = ''): string
{
    $handle = fopen($filename, "rb");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}