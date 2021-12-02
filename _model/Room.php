<?php
require_once './_inc/DBConnection/DBConnection.php';
require_once './_model/Subjects.php';
require_once './_model/User.php';
require_once './_model/Message.php';
if (!isset($_SESSION)) {
    session_start();
}

class Room
{
    private $ID;
    private $title;
    private $status;
    private $subject;
    private $type;
    private $sex;
    private $time;
    private $hours;
    private $price;
    private $offer_to_teach;
    private $description;
    private $schedule;
    private $address;
    private $map;

    /**
     * @param $ID
     * @param $title
     * @param $status
     * @param $subject
     * @param $type
     * @param $sex
     * @param $time
     * @param $hours
     * @param $price
     * @param $offer_to_teach
     * @param $description
     * @param $schedule
     * @param $address
     * @param $map
     */
    public function __construct($ID, $title, $status, $subject, $type, $sex, $time, $hours, $price, $offer_to_teach, $description, $schedule, $address, $map)
    {
        $this->ID = $ID;
        $this->title = $title;
        $this->status = $status;
        $this->subject = $subject;
        $this->type = $type;
        $this->sex = $sex;
        $this->time = $time;
        $this->hours = $hours;
        $this->price = $price;
        $this->offer_to_teach = $offer_to_teach;
        $this->description = $description;
        $this->schedule = $schedule;
        $this->schedule = $schedule;
        $this->address = $address;
        $this->map = $map;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status == 1 ? 'Đang chờ' : 'Đã đóng';
    }

    /**
     * @return mixed
     */
    public function isClosed()
    {
        return $this->status ? false : true;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type == 1 ? 'Online' : 'Offline';
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex == 0 ? 'Nam' : 'Nữ';
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours): void
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getOfferToTeach()
    {
        return $this->offer_to_teach;
    }

    /**
     * @param mixed $offer_to_teach
     */
    public function setOfferToTeach($offer_to_teach): void
    {
        $this->offer_to_teach = $offer_to_teach;
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
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param mixed $schedule
     */
    public function setSchedule($schedule): void
    {
        $this->schedule = $schedule;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param mixed $map
     */
    public function setMap($map): void
    {
        $this->map = $map;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM room';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Room($row->id, $row->title, $row->status, $row->subject_id, $row->type, $row->sex,
                    $row->time, $row->hours, $row->price, $row->offer_to_teach, $row->description, $row->schedule, $row->address, $row->map);
                $rows[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        return $rows;
    }

    public static function getCount()
    {
        $conn = DBConnection::getConnection();
        $sql = 'SELECT count(*) FROM room';
        $rs = mysqli_query($conn, $sql);
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }

    public static function getPagination($page)
    {
        $datas = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = "SELECT * FROM room LIMIT " . Config::OFFSET . ' OFFSET ' . $OFFSET;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Room($row->id, $row->title, $row->status, $row->subject_id, $row->type, $row->sex,
                    $row->time, $row->hours, $row->price, $row->offer_to_teach, $row->description, $row->schedule, $row->address, $row->map);
                $datas[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        $DATA['data'] = $datas;
        $DATA['total'] = self::getCount();
        $DATA['start'] = $OFFSET + 1;
        $DATA['end'] = $OFFSET + mysqli_num_rows($rs);
        $DATA['current_page'] = $page;
        $DATA['total_page'] = ceil($DATA['total'] / Config::OFFSET);
        return $DATA;
    }

    public static function getPaginationByOwner($page, $userID = 0)
    {
        $datas = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = 'SELECT * FROM room WHERE userID = ' . $userID . ' LIMIT ' . Config::OFFSET . ' OFFSET ' . $OFFSET;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Room($row->id, $row->title, $row->status, $row->subject_id, $row->type, $row->sex,
                    $row->time, $row->hours, $row->price, $row->offer_to_teach, $row->description, $row->schedule, $row->address, $row->map);
                $datas[] = $data;
            }
        }

        DBConnection::closeConnection($conn);
        $DATA['data'] = $datas;
        $DATA['total'] = self::getCount();
        $DATA['start'] = $OFFSET + 1;
        $DATA['end'] = $OFFSET + mysqli_num_rows($rs);
        $DATA['current_page'] = $page;
        $DATA['total_page'] = ceil($DATA['total'] / Config::OFFSET);
        return $DATA;
    }

    public static function getByKey($value, $key = 'id')
    {
        if (!$value)
            return null;
        $data = null;
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `room` WHERE `' . $key . '` = "' . $value . '"';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = new Room($row->id, $row->title, $row->status, $row->subject_id, $row->type, $row->sex,
                    $row->time, $row->hours, $row->price, $row->offer_to_teach, $row->description, $row->schedule, $row->address, $row->map);
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function getOwner($value, $key = 'id')
    {
        if (!$value)
            return null;
        $data = null;
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `room` WHERE `' . $key . '` = "' . $value . '"';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $data = $row->userID;
            }
        }

        DBConnection::closeConnection($conn);
        return $data;
    }

    public static function add($arr, $isCurrentUser = false)
    {
        header('Content-Type: application/json');

        /** CHECK EXIST */
        $conn = DBConnection::getConnection();
        if (self::getByKey($arr['title'], 'title')) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 1,
            ));
            return;
        }

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

        /** GET DATA */
        $description = strip_tags($arr['description'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
        $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
        $description = base64_encode($description);
        $schedule = [];

        for ($i = 0; $i < 8; $i++) {
            if (isset($arr[$i . 's']) && $arr[$i . 's'] == 'true') {
                $schedule[] = $i . 's';
                unset($arr[$i . 's']);
            }
            if (isset($arr[$i . 'c']) && $arr[$i . 'c'] == 'true') {
                $schedule[] = $i . 'c';
                unset($arr[$i . 'c']);
            }
            if (isset($arr[$i . 't']) && $arr[$i . 't'] == 'true') {
                $schedule[] = $i . 't';
                unset($arr[$i . 't']);
            }
        }

        /** CONFIG */
        $isAdmin = '';

        /** REWRITE DATA */
        unset($arr['action']);
        unset($arr['description']);
        unset($arr['admin']);

        try {
            $sql = "INSERT INTO `room` (`id`, `title`, `userID`, `status`, `subject_id`, `type`, `sex`, `time`, `hours`, `price`, `offer_to_teach`, `description`, `schedule`) VALUES 
                    (NULL, '" . $arr['title'] . "', '" . (base64_decode($_SESSION["user_id"]) / 1368546448245512) . "', '" . $arr['status'] . "', 
                    '" . $arr['subject_id'] . "', '" . $arr['type'] . "', '" . $arr['sex'] . "', 
                    '" . $arr['time'] . "', '" . $arr['hours'] . "', '" . $arr['price'] . "', 
                    '0', '" . $description . "', '" . join(',', $schedule) . "')";
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã thêm lớp học ' . $arr['title'] . '!');
                echo json_encode(array(
                    'error' => 0,
                    'admin' => $isAdmin
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'error' => 1,
            ));
        }
    }

    public static function edit($arr, $isCurrentUser = false)
    {
        header('Content-Type: application/json');

        /** CHECK EXIST */
        $conn = DBConnection::getConnection();
        $ROOM = self::getByKey($arr['data']);
        if (!$ROOM) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 0,
            ));
            return;
        }
        /** CHECK TITLE */
        $ROOM_CHECK = self::getByKey($arr['title'], 'title');
        if ($ROOM_CHECK && $ROOM->getID() != $ROOM_CHECK->getID()) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 1,
            ));
            return;
        }

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


        /** GET DATA */
        $description = strip_tags($arr['description'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
        $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
        $description = base64_encode($description);

        $map = strip_tags($arr['map'], '<iframe>');
        $map = base64_encode($map);

        $schedule = [];
        for ($i = 0; $i < 8; $i++) {
            if (isset($arr[$i . 's']) && $arr[$i . 's'] == 'true') {
                $schedule[] = $i . 's';
                unset($arr[$i . 's']);
            }
            if (isset($arr[$i . 'c']) && $arr[$i . 'c'] == 'true') {
                $schedule[] = $i . 'c';
                unset($arr[$i . 'c']);
            }
            if (isset($arr[$i . 't']) && $arr[$i . 't'] == 'true') {
                $schedule[] = $i . 't';
                unset($arr[$i . 't']);
            }
        }

        /** CONFIG */
        $isAdmin = '?action=class-edit&data=' . $ROOM->getID();

        /** REWRITE DATA */
        unset($arr['action']);
        unset($arr['description']);
        unset($arr['data']);
        unset($arr['map']);

        try {
            $sql = "UPDATE `room` SET";
            foreach ($arr as $key => $value) {
                $sql .= " `" . $key . "` = '" . $value . "', ";
            }
            $sql .= " `description` = '" . $description . "',";
            $sql .= " `map` = '" . $map . "',";
            $sql .= " `schedule` = '" . join(',', $schedule) . "'";
            $sql .= " WHERE `room`.`id` = " . $ROOM->getID();
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã đổi tên lớp học từ ' . $ROOM->getTitle() . ' sang ' . $arr['title'] . '!');
                echo json_encode(array(
                    'error' => 0,
                    'admin' => $isAdmin
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'error' => 1,
            ));
        }
    }

    public static function checkUserInRoom($room = null, $user = null)
    {
        try {
            $conn = DBConnection::getConnection();
            $user = $user ?? (base64_decode($_SESSION["user_id"]) / 1368546448245512);
            $sql = 'SELECT count(*) FROM `room_user` WHERE `room` = ' . $room . ' AND `user` = ' . $user;
            $rs = mysqli_query($conn, $sql);
            $total = $rs->fetch_row();

            DBConnection::closeConnection($conn);
            return $total[0];
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function checkReviewed($room = null, $user = null)
    {
        $conn = DBConnection::getConnection();
        $user = $user ?? (base64_decode($_SESSION["user_id"]) / 1368546448245512);
        $sql = 'SELECT * FROM `room_user` WHERE `room` = ' . $room . ' AND `user` = ' . $user;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                return [
                    'reviewed' => true,
                    'checked' => $row->checked != 0
                ];
            }
        }

        DBConnection::closeConnection($conn);
        return [
            'reviewed' => false,
            'checked' => false
        ];
    }

    public static function getRating($room = null)
    {
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `room_user` WHERE `room` = ' . $room;
        $rs = mysqli_query($conn, $sql);
        $rate = 0;
        $i = 0;
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $rate += $row->rating;
                $i++;
            }
        }

        DBConnection::closeConnection($conn);
        return [
            'data' => $rate != 0 && $i != 0 ? $rate / $i : 0,
            'count' => $i
        ];
    }

    public static function apply($arr)
    {
        header('Content-Type: application/json');
        /** CHECK EXIST */
        $conn = DBConnection::getConnection();

        /** @var CHECK ROOM $ROOM */
        $ROOM = self::getByKey($arr['data']);
        if (!$ROOM) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 0,
            ));
            return;
        }

        /** @var CHECK USER $USER */
        $USER = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512));
        if (!$USER) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 0,
            ));
            return;
        }

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

        /** CHECK JOINED */
        if (self::checkUserInRoom($ROOM->getID(), $USER->getUserID()) > 0) {
            echo json_encode(array(
                'error' => 1,
                'message' => 'Bạn đã tham gia lớp học này!',
            ));
            return;
        }

        /** GET DATA */
        try {
            $sql = "INSERT INTO `room_user` (`id`, `room`, `user`, `rating`, `checked`) 
                                    VALUES (NULL, '" . $arr['data'] . "', '" . (base64_decode($_SESSION["user_id"]) / 1368546448245512) . "', 5, 0);";
            if ($conn->query($sql) == TRUE) {
                Message::add('Người dùng ' . $USER->getUsername() . ' đã đăng ký lớp ' . $ROOM->getTitle() . '!');
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

    public static function editRating($arr)
    {
        header('Content-Type: application/json');
        /** CHECK EXIST */
        $conn = DBConnection::getConnection();

        /** @var CHECK ROOM $ROOM */
        $ROOM = self::getByKey($arr['data']);
        if (!$ROOM) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 0,
            ));
            return;
        }

        /** @var CHECK USER $USER */
        $USER = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512));
        if (!$USER) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 0,
            ));
            return;
        }

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

        /** CHECK JOINED */
        $joined = self::checkReviewed($ROOM->getID(), $USER->getUserID());
        if (!$joined) {
            echo json_encode(array(
                'error' => 1,
                'message' => 'Bạn chưa tham gia lớp học này!',
            ));
            return;
        }
        if ($joined['checked']) {
            echo json_encode(array(
                'error' => 1,
                'message' => 'Bạn đã đánh giá lớp học này!',
            ));
            return;
        }

        /** RATING */
        $rating = intdiv($arr['rating'], 25) + 2;
        $rating = (int)$rating > 5 ? 5 : $rating;

        /** GET DATA */
        try {
            $sql = "UPDATE `room_user` SET `rating` = '" . $rating . "', `checked` = '1' WHERE `room_user`.`room` = " . $ROOM->getID() . " AND `room_user`.`user` = " . $USER->getUserID();
            if ($conn->query($sql) == TRUE) {
                Message::add('Người dùng ' . $USER->getUsername() . ' đã đánh giá lớp ' . $ROOM->getTitle() . '!');
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
}