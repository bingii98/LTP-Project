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
                $data = new Address($row->id, $row->provinces, $row->district, $row->descrption);
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
}