<?php
require_once './_inc/DBConnection/DBConnection.php';

class Subjects
{
    private $ID;
    private $name;

    /**
     * @param $ID
     * @param $name
     */
    public function __construct($ID, $name)
    {
        $this->ID = $ID;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `subjects`";
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Subjects($row->id, $row->name);
                $rows[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        return $rows;
    }

    public static function getByKey($value, $key = 'id')
    {
        if (!$value)
            return null;
        $user = null;
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `subjects` WHERE `' . $key . '` = "' . $value . '"';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new Subjects($row->id, $row->name);
            }
        }

        DBConnection::closeConnection($conn);
        return $user;
    }

    public static function add($arr = null)
    {
        header('Content-Type: application/json');
        /** CHECK EMPTY */
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

        /** CHECK EXIST */
        $conn = DBConnection::getConnection();
        if (self::getByKey($arr['name'], 'name')) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 1,
            ));
            return;
        }

        try {
            $sql = "INSERT INTO `subjects` (`id`, `name`) 
                    VALUES (NULL, '" . $arr['name'] . "')";
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã thêm môn học ' . $arr['name'] . '!');
                echo json_encode(array(
                    'error' => 0,
                    'admin' => '?action=subjects'
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'error' => 0,
            ));
        }
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
        $subject = self::getByKey($arr['subject_id'], 'id');

        if ($subject) {
            try {
                $sql = "UPDATE `subjects` SET";
                $sql .= " `name` = '" . $arr['name'] . "'";
                $sql .= " WHERE `id` = " . $arr['subject_id'];
                if ($conn->query($sql) == TRUE) {
                    Message::add('Đã chỉnh sửa môn học ' . $subject->getName() . '!');
                    echo json_encode(array(
                        'error' => 0,
                        'admin' => '?action=subjects'
                    ));
                }
            } catch (Exception $e) {
                echo json_encode(array(
                    'error' => 1,
                ));
            }
        }
    }

    public static function delete($ID = null)
    {
        $conn = DBConnection::getConnection();
        //CHECK USER
        $subjects = self::getByKey($ID);

        if ($subjects) {
            $sql = "DELETE FROM `subjects` WHERE id = " . $subjects->getID();
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã xóa môn học ' . $subjects->getName() . '!');
                return (array(
                    'error' => 0,
                    'username' => $subjects->getName(),
                ));
            } else {
                return (array(
                    'error' => 1,
                ));
            }
        }
    }
}