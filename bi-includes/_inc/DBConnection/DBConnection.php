<?php
require_once './bi-includes/_inc/Config.php';

class DBConnection
{
    public static function getConnection()
    {
        $HOST = 'localhost';
        $PORT = '3306';
        $DB   = 'u785150665_smartedu';
        $USER = 'root';
        $PASSWORD = '';
        $conn = new mysqli($HOST . ':' . $PORT, $USER, $PASSWORD, $DB);

        if ($conn->connect_error) {
            die('Connection error: ' . mysqli_error($conn));
        }

        return $conn;
    }

    public static function closeConnection($link)
    {
        mysqli_close($link);
    }
}