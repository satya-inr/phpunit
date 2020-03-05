<?php

namespace Users;

use Connections\MysqlConnection;

/**
 * Secuting the file from browser access
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die('Unauthrized access');
}

/**
 * User class
 */
class User extends MysqlConnection
{
    /**
     * Get all registered users
     */
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->connect()->query($query);
        return $stmt->fetch();
    }

    /**
     * Get user row count to check user exists
     */
    public function getUser($userName)
    {
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userName]);
        $rowCount = $stmt->rowCount();
        return $rowCount;
    }

    /**
     * Get the perticular user information
     */
    protected function getUserInfo($userName)
    {
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userName]);
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * User registration
     */
    public function createUser($userName, $password)
    {
        $getUser = $this->getUser($userName);
        if (!$getUser) {

            $password_hash = crypt($password, $this::$salt); //$salt is a static object from parent class.

            $sql = "INSERT INTO users(user_name,password) VALUES (?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userName, $password_hash]);

            if ($stmt) {
                return json_encode(['status' => 200, 'message' => 'User created successfully'], true);
            } else {
                return json_encode(['status' => 500, 'message' => 'Some thing went wrong'], true);
            }
        } else {
            return json_encode(['status' => 500, 'message' => 'Already registered as ' . $userName], true);
        }
    }

    /**
     * User login
     */
    public function userLogin($userName, $password)
    {
        $getUser = $this->getUser($userName);
        if (!$getUser) {
            return json_encode(['status' => 500, 'message' => 'User not found'], true);
        } else {

            $password_hash = crypt($password, $this::$salt);

            $getUserInfo = $this->getUserInfo($userName);

            if ($password_hash !=  $getUserInfo['password']) {
                return json_encode(['status' => 404, 'message' => 'Incorrect Password'], true);
            }

            $sql = "SELECT * FROM users WHERE user_name = ?, password = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userName, $password_hash]);
            if ($stmt) {
                $_SESSION['user_name'] = $userName;
                //return json_encode(['status' => 200, 'message' => 'User LoggedIn successfully'], true);
                echo "<script>location.replace('/home')</script>";
                exit;
            } else {
                return json_encode(['status' => 404, 'message' => 'Authentication Failed'], true);
            }
        }
    }
}
