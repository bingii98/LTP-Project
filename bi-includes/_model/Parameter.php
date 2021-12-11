<?php
if (!isset($_SESSION)) session_start();

require_once './bi-includes/_inc/DBConnection/DBConnection.php';

class Parameter
{
    private $key;
    private $data;
    private $value;

    /**
     * @param $key
     * @param $data
     * @param $value
     */
    public function __construct($key, $data, $value)
    {
        $this->key = $key;
        $this->data = $data;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM parameter';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Parameter($row->key, $row->data, $row->value);
                $rows[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        return $rows;
    }

    public static function getValueByKey($key)
    {
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `parameter` WHERE `key` = '" . $key . "'";
        $rs = mysqli_query($conn, $sql);
        $data = 1;
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = $row->value;
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function getCount()
    {
        $conn = DBConnection::getConnection();
        $sql = 'SELECT count(*) FROM parameter';
        $rs = mysqli_query($conn, $sql);
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }
}