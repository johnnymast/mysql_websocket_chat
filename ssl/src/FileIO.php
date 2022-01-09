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
 * FileIO class
 *
 * This class handles reading from and writing
 * to individual files.
 *
 * PHP version 8.0 and up.
 *
 * @category OpenSSL
 * @package  Mysql_Websocket_Chat
 * @author   Johnny Mast <mastjohnny@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/johnnymast/mysql_websocket_chat
 * @since    1.5
 */
class FileIO
{
    /**
     * Write content to file.
     *
     * @param string $filename The file to write to.
     * @param string $content  The content to write.
     *
     * @return void
     */
    public static function writeToFile(string $filename = '', $content = ''): void
    {
        $fp = fopen($filename, 'wb');
        fwrite($fp, $content, strlen($content));
        fclose($fp);
    }

    /**
     * Read the contents of a file.
     *
     * @param string $filename The file to read.
     *
     * @return string
     */
    public static function readFromFile(string $filename = ''): string
    {
        $handle = fopen($filename, "rb");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        return $contents;
    }

}