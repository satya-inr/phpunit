<?php

namespace Connections;

use PDO;

/**
 * Secuting the file from browser access
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die('Unauthrized access');
}

/**
 * MysqlConnection class
 */
class MysqlConnection
{

    /**
     * Private objects to access within the class
     */
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db = 'php_oops';

    /**
     * Protected static object. Can access from the extended class without an instance.
     * For reference: check the Users Class.
     * This is used for the password encryption.
     */
    protected static $salt = "Tkl";

    /**
     * Database connection
     */
    protected function connect()
    {
        $dns = "mysql:host=" . $this->host . ";dbname=" . $this->db;
        $pdo = new PDO($dns, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
