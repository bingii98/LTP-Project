<?php
require_once './_inc/DBConnection/DBConnection.php';

class Message
{
    private $ID;
    private $value;
    private $date;

    /**
     * @param $ID
     * @param $value
     */
    public function __construct($ID, $value, $date)
    {
        $this->ID = $ID;
        $this->value = $value;
        $this->date = $date;
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
    public function setID($ID): void
    {
        $this->ID = $ID;
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
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `message` ORDER BY id DESC LIMIT 10";
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Message($row->id, $row->value, $row->date);
                $rows[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        return $rows;
    }

    public static function getCount()
    {
        $conn = DBConnection::getConnection();
        $sql = 'SELECT count(*) FROM message';
        $rs = mysqli_query($conn, $sql);
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }

    public static function getPagination($page = null)
    {
        $DATA = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * 20;
        $sql = "SELECT * FROM `message` ORDER BY id DESC LIMIT 20 OFFSET " . $OFFSET;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Message($row->id, $row->value, $row->date);
                $DATA['data'][] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        $DATA['total'] = self::getCount();
        $DATA['start'] = $OFFSET + 1;
        $DATA['end'] = $OFFSET + mysqli_num_rows($rs);
        $DATA['current_page'] = $page;
        $DATA['total_page'] = ceil($DATA['total'] / 20);
        return $DATA;
    }

    public static function add($message)
    {
        $description = strip_tags($message, '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
        $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
        $description = base64_encode($description);

        try {
            $conn = DBConnection::getConnection();
            $date = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
            $sql = "INSERT INTO `message` (`id`, `value`, `date`) 
                    VALUES (NULL, '" . $description . "','" . $date->format('d-m-Y') . "')";
            if ($conn->query($sql) == TRUE) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}