<?php
if (!isset($_SESSION)) session_start();

require_once './bi-includes/_inc/DBConnection/DBConnection.php';

class Parameter
{
    private $id;
    private $key;
    private $data;
    private $value;

    /**
     * Parameter constructor.
     * @param $id
     * @param $key
     * @param $data
     * @param $value
     */
    public function __construct($id, $key, $data, $value)
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM parameter';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Parameter($row->key_id, $row->key, $row->data, $row->value);
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

    public static function getByKey($key)
    {
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `parameter` WHERE `key` = '" . $key . "'";
        $rs = mysqli_query($conn, $sql);
        $data = null;
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Parameter($row->key_id, $row->key, $row->data, $row->value);
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function getById($key)
    {
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `parameter` WHERE `key_id` = '" . $key . "'";
        $rs = mysqli_query($conn, $sql);
        $data = null;
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Parameter($row->key_id, $row->key, $row->data, $row->value);
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

    public static function edit($arr)
    {
        header('Content-Type: application/json');

        if (count($arr) != count(array_filter($arr, "strlen"))) {
            echo json_encode(array(
                'error' => 1,
                'empty_fields' => array_filter($arr, function ($value) {
                    return $value === '';
                }),
                'filled' => array_filter($arr, function ($value) {
                    return $value !== '';
                }),
            ));
            return;
        }

        $conn = DBConnection::getConnection();
        //CHECK EXIST
        $data = self::getById($arr['data']);

        if($data->getKey() == 'become_professor_description'){
            $arr['value'] = strip_tags($arr['value'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
            $arr['value'] = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $arr['value']);
            $arr['value'] = base64_encode($arr['value']);
        }

        if ($data) {
            try {
                $sql = "UPDATE `parameter` SET";
                $sql .= " `value` = '" . $arr['value'] . "'";
                $sql .= " WHERE `key_id` = " . $data->getId();
                if ($conn->query($sql) == TRUE) {
                    echo json_encode(array(
                        'error' => 0,
                    ));
                }
            } catch (Exception $e) {
                echo json_encode(array(
                    'error' => 1,
                ));
            }
        }else{
            echo json_encode(array(
                'error' => 1,
            ));
        }
    }
}