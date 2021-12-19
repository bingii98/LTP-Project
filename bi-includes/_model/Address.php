<?php
if (!isset($_SESSION)) session_start();

class Address
{
    private $id;
    private $provinces;
    private $district;
    private $description;

    /**
     * Address constructor.
     * @param $id
     * @param $provinces
     * @param $district
     * @param $description
     */
    public function __construct($id, $provinces, $district, $description)
    {
        $this->id = $id;
        $this->provinces = $provinces;
        $this->district = $district;
        $this->description = $description;
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * @param mixed $provinces
     */
    public function setProvinces($provinces)
    {
        $this->provinces = $provinces;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public static function getCountSQL($sql = false, $isSelectForm = true)
    {
        $conn = DBConnection::getConnection();
        $rs = mysqli_query($conn, str_replace('SELECT * FROM', 'SELECT count(*) FROM', $sql));
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }

    public static function getPagination($page, $array = null, $isRequest = false)
    {
        $address = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = "SELECT * FROM address";

        //FILTER ATTRIBUTE
        $sql .= isset($array['provinces']) && $array['provinces'] ? ($sql == "SELECT * FROM address" ? " WHERE" : " AND") . " `provinces` = '" . $array['district'] . "'" : "";
        $sql .= isset($array['district']) && $array['district'] ? ($sql == "SELECT * FROM address" ? " WHERE" : " AND") . " `district` = '" . $array['district'] . "'" : "";
        $sql .= ' ORDER BY `id` ASC';

        $DATA['total'] = self::getCountSQL($sql);

        $sql .= " LIMIT " . Config::OFFSET . " OFFSET " . $OFFSET;

        $rs = mysqli_query($conn, $sql);
        if ($rs && mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Address($row->id, $row->provinces, $row->district, $row->description);
                $address[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        $DATA['data'] = $address;
        $DATA['start'] = $OFFSET + 1;
        $DATA['end'] = $OFFSET + ($rs ? mysqli_num_rows($rs) : 0);
        $DATA['current_page'] = $page;
        $DATA['total_page'] = ceil($DATA['total'] / Config::OFFSET);
        return $DATA;
    }

    public static function getAddress($provinces, $district = null)
    {
        if (!$provinces)
            return null;
        $data = null;
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `address` WHERE `provinces` = "' . $provinces . '" AND `district` = "' . $district . '"';

        $rs = null;
        if ($rs = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_object($rs)) {
                    $data = new Address($row->id, $row->provinces, $row->district, $row->description);
                }
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function getById($id)
    {
        if (!$id)
            return null;
        $data = null;
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `address` WHERE `id` = ' . $id;

        $rs = null;
        if ($rs = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_object($rs)) {
                    $data = new Address($row->id, $row->provinces, $row->district, $row->description);
                }
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function add($arr)
    {
        header('Content-Type: application/json');

        /** CHECK EXIST */
        $conn = DBConnection::getConnection();
        if (self::getAddress($arr['provinces'], $arr['district'])) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 1,
            ));
            return;
        }

        /** GET DATA */
        $description = strip_tags($arr['description'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
        $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
        $description = base64_encode($description);

        if (empty($description)) {
            echo json_encode(array(
                'error' => 1,
                'empty_fields' => [
                    'description' => ''
                ]
            ));
            return;
        }

        try {
            $sql = "INSERT INTO `address` (`id`, `district`, `provinces`, `description`) VALUES 
                    (NULL, '" . $arr['district'] . "', '" . $arr['provinces'] . "', '" . $description . "')";
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
    }

    public static function edit($arr)
    {
        header('Content-Type: application/json');

        try {
            /** CHECK EXIST */
            $conn = DBConnection::getConnection();
            $ADDRESS = self::getById($arr['data']);
            if (!$ADDRESS) {
                echo json_encode(array(
                    'error' => 1,
                    'exist' => 0,
                ));
                return;
            }

            /** CHECK TITLE */
            $ADDRESS_CHECK = self::getAddress($arr['provinces'], $arr['district']);
            if ($ADDRESS_CHECK && $ADDRESS->getId() != $ADDRESS_CHECK->getId()) {
                echo json_encode(array(
                    'error' => 1,
                    'exist' => 1,
                ));
                return;
            }

            /** GET DATA */
            $description = strip_tags($arr['description'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
            $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
            $description = base64_encode($description);

            if (empty($description)) {
                echo json_encode(array(
                    'error' => 1,
                    'empty_fields' => [
                        'description' => ''
                    ]
                ));
                return;
            }

            $sql = "UPDATE `address` SET `description` = '" . $description . "', `provinces` = '" . $arr['provinces'] . "', `district` = '" . $arr['district'] . "' WHERE `address`.`id` = " . $ADDRESS->getId();
            if ($conn->query($sql) == TRUE) {
                echo json_encode(array(
                    'error' => 0,
                ));
            } else {
                echo json_encode(array(
                    'error' => 1,
                    'sql' => $sql,
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'error' => 1,
            ));
        }
    }

    public static function delete($ID = null)
    {
        $conn = DBConnection::getConnection();
        $data = self::getById($ID);

        if ($data) {
            $sql = "DELETE FROM `address` WHERE id = " . $data->getId();
            if ($conn->query($sql) == TRUE) {
                return (array(
                    'error' => 0,
                    'provinces' => $data->getProvinces(),
                    'district' => $data->getDistrict(),
                ));
            } else {
                return (array(
                    'error' => 1,
                ));
            }
        }
    }
}