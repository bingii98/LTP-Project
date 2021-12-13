<?php
if (!isset($_SESSION)) session_start();

require_once './bi-includes/_inc/DBConnection/DBConnection.php';

class Media
{
    private $id;
    private $file_name;
    private $uploaded_on;

    /**
     * Media constructor.
     * @param $id
     * @param $file_name
     * @param $uploaded_on
     */
    public function __construct($id, $file_name, $uploaded_on)
    {
        $this->id = $id;
        $this->file_name = $file_name;
        $this->uploaded_on = $uploaded_on;
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

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name): void
    {
        $this->file_name = $file_name;
    }

    /**
     * @return mixed
     */
    public function getUploadedOn()
    {
        return $this->uploaded_on;
    }

    /**
     * @param mixed $uploaded_on
     */
    public function setUploadedOn($uploaded_on): void
    {
        $this->uploaded_on = $uploaded_on;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM media';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Media($row->id, $row->file_name, $row->uploaded_on);
                $rows[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        return $rows;
    }

    public static function getFileByKey($key)
    {
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `media` WHERE `id` = '" . $key . "'";
        $rs = mysqli_query($conn, $sql);
        $data = 1;
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                return new Media($row->id, $row->file_name, $row->uploaded_on);
            }
        }

        DBConnection::closeConnection($conn);
        return null;
    }

    public static function getFileNameByKey($key)
    {
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `media` WHERE `id` = '" . $key . "'";
        $rs = mysqli_query($conn, $sql);
        $data = 1;
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = $row->file_name;
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function upload($data)
    {
        $conn = DBConnection::getConnection();
        $targetDir = "uploads/";
        $date = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
        $fileRenameName = $date->format('Y-m-d-H-i-s') . '-' . basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileRenameName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $id = $date->getTimestamp() + rand(10, 1000000);

        if (empty($_FILES["file"]["name"])) {
            return (array(
                'error' => 1,
                'message' => 'Tệp không hợp lệ'
            ));
        }

        $allowTypes = array('jpg', 'png', 'jpeg');
        if (!in_array($fileType, $allowTypes)) {
            return (array(
                'error' => 1,
                'message' => 'Tệp không hợp lệ (Chỉ chấp nhận file jpg, png và jpeg!'
            ));
        }

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT INTO `media` (`id`, `file_name`, `uploaded_on`) 
                    VALUES (" . $id . ", '" . $fileRenameName . "','" . $date->format('d-m-Y') . "')";
            if ($conn->query($sql) == TRUE) {
                return (array(
                    'error' => 0,
                    'media' => $id
                ));
            }
        }

        return (array(
            'error' => 1,
            'message' => 'Something went wrong!'
        ));
    }

    public static function delete($ID = null)
    {
        $conn = DBConnection::getConnection();
        //CHECK USER
        $img = self::getFileByKey($ID);

        if ($img) {
            $sql = "DELETE FROM `media` WHERE id = " . $img->getId();
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã xóa file ' . $img->getFileName() . '!');
                unlink('uploads/' . $img->getFileName());
                return (array(
                    'error' => 0,
                    'file' => $img->getFileName(),
                ));
            } else {
                return (array(
                    'error' => 1,
                ));
            }
        }
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