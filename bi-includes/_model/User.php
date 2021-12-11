<?php
if (!isset($_SESSION)) session_start();

require_once './bi-includes/_model/Role.php';
require_once './bi-includes/_model/User.php';
require_once './bi-includes/_model/Message.php';
require_once './bi-includes/_inc/DBConnection/DBConnection.php';

class User
{
    private $userID;
    private $avatar;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $address;
    private $price;
    private $subjects_ids;
    private $description;
    private $birthday;
    private $sex;
    private $phone;
    private $experience;
    private $experience_type;
    private $degree;
    private $graduation_school;
    private $specialized;
    private $schedule;
    private $pendingProfessor;

    /**
     * User constructor.
     * @param $userID
     * @param $avatar
     * @param $username
     * @param $password
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $role
     * @param $address
     * @param $price
     * @param $subjects_ids
     * @param $description
     * @param $birthday
     * @param $sex
     * @param $phone
     * @param $experience
     * @param $experience_type
     * @param $degree
     * @param $graduation_school
     * @param $specialized
     * @param $schedule
     * @param $pendingProfessor
     */
    public function __construct($userID, $avatar, $username, $password, $firstName, $lastName, $email, $role, $address, $price, $subjects_ids, $description, $birthday, $sex, $phone, $experience, $experience_type, $degree, $graduation_school, $specialized, $schedule, $pendingProfessor)
    {
        $this->userID = $userID;
        $this->avatar = $avatar;
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->role = $role;
        $this->address = $address;
        $this->price = $price;
        $this->subjects_ids = $subjects_ids;
        $this->description = $description;
        $this->birthday = $birthday;
        $this->sex = $sex;
        $this->phone = $phone;
        $this->experience = $experience;
        $this->experience_type = $experience_type;
        $this->degree = $degree;
        $this->graduation_school = $graduation_school;
        $this->specialized = $specialized;
        $this->schedule = $schedule;
        $this->pendingProfessor = $pendingProfessor;
    }


    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
    public function setAddress($address)
    {
        $this->address = $address;
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
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getSubjectsIds()
    {
        return $this->subjects_ids;
    }

    /**
     * @param mixed $subjects_ids
     */
    public function setSubjectsIds($subjects_ids)
    {
        $this->subjects_ids = $subjects_ids;
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

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getExperienceType()
    {
        return $this->experience_type;
    }

    /**
     * @param mixed $experience_type
     */
    public function setExperienceType($experience_type)
    {
        $this->experience_type = $experience_type;
    }

    /**
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @param mixed $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     * @return mixed
     */
    public function getGraduationSchool()
    {
        return $this->graduation_school;
    }

    /**
     * @param mixed $graduation_school
     */
    public function setGraduationSchool($graduation_school)
    {
        $this->graduation_school = $graduation_school;
    }

    /**
     * @return mixed
     */
    public function getSpecialized()
    {
        return $this->specialized;
    }

    /**
     * @param mixed $specialized
     */
    public function setSpecialized($specialized)
    {
        $this->specialized = $specialized;
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
    public function getPendingProfessor()
    {
        return $this->pendingProfessor;
    }

    /**
     * @param mixed $pendingProfessor
     */
    public function setPendingProfessor($pendingProfessor): void
    {
        $this->pendingProfessor = $pendingProfessor;
    }

    public static function getAll()
    {
        $rows = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM user';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
                $rows[] = $user;
            }
        }

        DBConnection::closeConnection($conn);
        return $rows;
    }

    public static function getByID($id = null, $role = null)
    {
        if (!$id)
            return null;
        $user = null;
        $conn = DBConnection::getConnection();
        $sql = "SELECT * FROM `user` WHERE `userID` = " . $id;
        $sql .= $role ? " AND `role` = '" . $role . "'" : "";

        try {
            $rs = mysqli_query($conn, $sql);
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_object($rs)) {
                    $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
                }
            }
        } catch (Exception $e) {
        }

        DBConnection::closeConnection($conn);
        return $user;
    }

    public static function getByKey($key = 'username', $value = null)
    {
        if (!$value)
            return null;
        $user = null;
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `user` WHERE `' . $key . '` = "' . $value . '"';
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
            }
        }

        DBConnection::closeConnection($conn);
        return $user;
    }

    public static function login($arr)
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
                'massage' => 'Vui lòng nhập đủ các trường!'
            ));
        } else {
            $conn = DBConnection::getConnection();
            $sql = "SELECT * FROM `user` WHERE `username` = '" . $arr['username'] . "' AND `password` = md5('" . $arr['password'] . "')";
            $rs = mysqli_query($conn, $sql);
            if (mysqli_num_rows($rs) > 0) {
                while ($row = mysqli_fetch_object($rs)) {
                    $_SESSION["2748_loggedin"] = true;
                    $_SESSION["user_id"] = base64_encode($row->userID * 1368546448245512);
                    $_SESSION["user_display_name"] = $row->lastName . ' ' . $row->firstName;
                    $_SESSION["user_role"] = base64_encode($row->role * 1368546448245512);
                    echo json_encode(array(
                        'error' => 0,
                    ));
                    return;
                }
            }

            DBConnection::closeConnection($conn);
            echo json_encode(array(
                'error' => 1,
                'massage' => 'Tên tài khoản hoặc mật khẩu sai!'
            ));
        }
    }

    public static function getCount()
    {
        $conn = DBConnection::getConnection();
        $sql = 'SELECT count(*) FROM user';
        $rs = mysqli_query($conn, $sql);
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }

    public static function getCountByRole($role)
    {
        $conn = DBConnection::getConnection();
        $sql = 'SELECT count(*) FROM `user` WHERE  `role` = 1';
        $rs = mysqli_query($conn, $sql);
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }

    public static function getUser_Pagination($page)
    {
        $users = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = "SELECT * FROM user LIMIT " . Config::OFFSET . ' OFFSET ' . $OFFSET;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
                $users[] = $user;
            }
        }

        DBConnection::closeConnection($conn);
        $data['data'] = $users;
        $data['total'] = self::getCount();
        $data['start'] = $OFFSET + 1;
        $data['end'] = $OFFSET + mysqli_num_rows($rs);
        $data['current_page'] = $page;
        $data['total_page'] = ceil($data['total'] / Config::OFFSET);
        return $data;
    }

    public static function getUser_Pagination_Teacher($page)
    {
        $users = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = "SELECT * FROM `user` WHERE  `role` = 1 LIMIT " . Config::OFFSET . " OFFSET " . $OFFSET;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
                $users[] = $user;
            }
        }

        DBConnection::closeConnection($conn);
        $data['data'] = $users;
        $data['total'] = self::getCountByRole(1);
        $data['start'] = $OFFSET + 1;
        $data['end'] = $OFFSET + mysqli_num_rows($rs);
        $data['current_page'] = $page;
        $data['total_page'] = ceil($data['total'] / Config::OFFSET);
        return $data;
    }

    public static function getUser_Pagination_Teacher_filter($page, $array = array())
    {
        $users = [];

        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = "SELECT * FROM `user` WHERE  `role` = 1";

        //FILTER ATTRIBUTE
        $sql .= isset($array['begin_price']) && isset($array['from_price']) && $array['begin_price'] && $array['from_price'] ? " AND `price` BETWEEN '" . $array['begin_price'] . "' AND '" . $array['from_price'] . "'" : "";
        $sql .= isset($array['begin_price']) && !isset($array['from_price']) && $array['begin_price'] ? " AND `price` >= '" . $array['begin_price'] . "'" : "";
        $sql .= isset($array['from_price']) && !isset($array['begin_price']) && $array['from_price'] ? " AND `price` <= '" . $array['begin_price'] . "'" : "";
        $sql .= isset($array['provinces']) && isset($array['district']) && $array['provinces'] && $array['district'] ? " AND `address` LIKE '%" . $array['provinces'] . "--" . $array['district'] . "%'" : "";
        $sql .= isset($array['subjects']) && $array['subjects'] ? " AND `subjects_ids` LIKE '%" . $array['subjects'] . "%,'" : "";
        $sql .= " LIMIT " . Config::OFFSET . " OFFSET " . $OFFSET;

        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
                $users[] = $user;
            }
        }

        DBConnection::closeConnection($conn);
        $data['data'] = $users;
        $data['total'] = self::getCountByRole(1);
        $data['start'] = $OFFSET + 1;
        $data['end'] = $OFFSET + mysqli_num_rows($rs);
        $data['current_page'] = $page;
        $data['total_page'] = ceil($data['total'] / Config::OFFSET);
        return $data;
    }

    public static function getJoinedPaginationByRoom($page, $roomID)
    {
        $datas = [];
        $page = $page == null ? 1 : $page;
        $conn = DBConnection::getConnection();
        $OFFSET = ($page - 1) * Config::OFFSET;
        $sql = 'SELECT `user`.`userID`, `user`.`username`, `user`.`firstName`, `user`.`lastName`, `user`.`email`, `user`.`password`, `user`.`role`, `user`.`address`, `user`.`price`, `user`.`subjects_ids`, `user`.`description`, `user`.`birthday`,
                `user`.`sex`, `user`.`phone`, `user`.`experience`, `user`.`experience_type`, `user`.`degree`, `user`.`graduation_school`, `user`.`specialized`, `user`.`schedule`, `user`.`pendingProfessor`  
                FROM `user`,`room_user` WHERE `room_user`.`user` = `user`.`userID` AND `user`.`role` = 1';
        $sql .= $roomID != 0 ? ' AND `room_user`.`room` = ' . $roomID : '';
        $sql .= ' ORDER BY `room_user`.`id` DESC';

        $DATA['total'] = self::getCountSQL($sql);

        $sql .= ' LIMIT ' . Config::OFFSET . ' OFFSET ' . $OFFSET;

        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $user = new user($row->userID, $row->avatar, $row->username, $row->password, $row->firstName, $row->lastName, $row->email, $row->role, $row->address, $row->price, $row->subjects_ids, $row->description, $row->birthday, $row->sex, $row->phone, $row->experience, $row->experience_type, $row->degree, $row->graduation_school, $row->specialized, $row->schedule, $row->pendingProfessor);
                $datas[] = $user;
            }
        }

        DBConnection::closeConnection($conn);
        $DATA['data'] = $datas;
        $DATA['start'] = $OFFSET + 1;
        $DATA['end'] = $OFFSET + ($rs ? mysqli_num_rows($rs) : 0);
        $DATA['current_page'] = $page;
        $DATA['total_page'] = ceil($DATA['total'] / Config::OFFSET);
        return $DATA;
    }

    public static function getCountSQL($sql = false, $isSelectForm = true)
    {
        $conn = DBConnection::getConnection();
        $rs = mysqli_query($conn, str_replace('SELECT * FROM', 'SELECT count(*) FROM', $sql));
        $total = $rs->fetch_row();

        DBConnection::closeConnection($conn);
        return $total[0];
    }

    public static function editUser($arr)
    {
        header('Content-Type: application/json');

        /** @var $subjects */
        if (isset($arr['subjects'])) {
            $subjects = join(',', $arr['subjects']) . ',';
            unset($arr['subjects']);
        } else {
            $subjects = '';
        }

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
        } else {
            $conn = DBConnection::getConnection();

            //CHECK USER
            if (isset($arr['userID'])) {
                $user = self::getByID($arr['userID']);
            } else {
                $user = self::getByID(base64_decode($_SESSION["user_id"]) / 1368546448245512);
            }

            if ($user) {
                unset($arr['action']);

                /** GET DATA */
                $address = '[' . $arr['provinces'] . '--' . $arr['district'] . ']';
                $description = strip_tags($arr['description'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
                $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
                $description = base64_encode($description);
                $schedule = [];

                for ($i = 0; $i <= 8; $i++) {
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
                $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $user->getUsername() : '';

                /** REWRITE DATA */
                unset($arr['provinces']);
                unset($arr['district']);
                unset($arr['description']);
                unset($arr['admin']);
                unset($arr['userID']);

                try {
                    $sql = "UPDATE `user` SET";
                    foreach ($arr as $key => $value) {
                        $sql .= " `" . $key . "` = '" . $value . "', ";
                    }
                    $sql .= " `address` = '" . $address . "',";
                    $sql .= " `subjects_ids` = '" . $subjects . "',";
                    $sql .= " `description` = '" . $description . "',";
                    $sql .= " `schedule` = '" . join(',', $schedule) . "'";
                    $sql .= " WHERE `user`.`userID` = " . $user->getUserID();
                    if ($conn->query($sql) == TRUE) {
                        Message::add('Đã chỉnh sửa người dùng ' . $user->getFirstName() . ' ' . $user->getLastName() . '!');
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
        }
    }


    public static function updateAvatar($mediaId, $userID = null)
    {
        header('Content-Type: application/json');

        $conn = DBConnection::getConnection();

        //CHECK USER
        if (isset($arr['userID']) && !empty(isset($arr['userID']))) {
            $user = self::getByID($arr['userID']);
        } else {
            $user = self::getByID(base64_decode($_SESSION["user_id"]) / 1368546448245512);
        }

        if ($user) {
            try {
                $sql = "UPDATE `user` SET avatar = " . $mediaId;
                $sql .= " WHERE `user`.`userID` = " . $user->getUserID();
                if ($conn->query($sql) == TRUE) {
                    Message::add('Đã chỉnh sửa người dùng ' . $user->getFirstName() . ' ' . $user->getLastName() . '!');
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


    public static function updatePendingProfessor($userID)
    {
        $user = self::getByID($userID);
        if (!$user) {
            return [
                'error' => 1,
            ];
        } else {
            $conn = DBConnection::getConnection();

            try {
                $sql = "UPDATE `user` SET";
                $sql .= " `pendingProfessor` = '" . 0 . "',";
                $sql .= " `role` = '" . 1 . "'";
                $sql .= " WHERE `user`.`userID` = " . $user->getUserID();
                if ($conn->query($sql) == TRUE) {
                    Message::add('Đã duyệt người dùng ' . $user->getFirstName() . ' ' . $user->getLastName() . ' làm gia sư!');
                    return [
                        'error' => 0,
                        'username' => $user->getUsername(),
                        'sql' => $sql,
                    ];
                }
            } catch (Exception $e) {
                return [
                    'error' => 1,
                    'sql' => $sql,
                ];
            }
        }
    }

    public static function becomeProfessorUser($arr)
    {
        header('Content-Type: application/json');

        /** @var $subjects */
        if (isset($arr['subjects'])) {
            $subjects = join(',', $arr['subjects']) . ',';
            unset($arr['subjects']);
        } else {
            $subjects = '';
        }

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
        } else {
            $conn = DBConnection::getConnection();

            //CHECK USER
            if (isset($arr['userID'])) {
                $user = self::getByID($arr['userID']);
            } else {
                $user = self::getByID(base64_decode($_SESSION["user_id"]) / 1368546448245512);
            }

            if ($user) {
                unset($arr['action']);

                /** GET DATA */
                $schedule = [];

                for ($i = 0; $i <= 8; $i++) {
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
                $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $user->getUsername() : '';

                /** REWRITE DATA */
                unset($arr['provinces']);
                unset($arr['district']);
                unset($arr['admin']);
                unset($arr['userID']);

                try {
                    $sql = "UPDATE `user` SET";
                    foreach ($arr as $key => $value) {
                        $sql .= " `" . $key . "` = '" . $value . "', ";
                    }
                    $sql .= " `subjects_ids` = '" . $subjects . "',";
                    $sql .= " `schedule` = '" . join(',', $schedule) . "',";
                    $sql .= " `pendingProfessor` = 1";
                    $sql .= " WHERE `user`.`userID` = " . $user->getUserID();
                    if ($conn->query($sql) == TRUE) {
                        Message::add('Người dùng ' . $user->getFirstName() . ' ' . $user->getLastName() . ' đã đăng ký trở thành gia sư!');
                        echo json_encode(array(
                            'error' => 0,
                            'admin' => $isAdmin,
                            'addition_message' => 'Thông tin đã được cập nhật, bạn sẽ được chuyển sang Gia Sư sao khi duyệt!',
                        ));
                    }
                } catch (Exception $e) {
                    echo json_encode(array(
                        'error' => 1,
                    ));
                }
            }
        }
    }

    public static function add($arr)
    {
        header('Content-Type: application/json');

        /** CHECK EXIST */
        $conn = DBConnection::getConnection();
        if (self::getByKey('username', $arr['username'])) {
            echo json_encode(array(
                'error' => 1,
                'exist' => 1,
            ));
            return;
        }

        /** @var $subjects */
        if (isset($arr['subjects'])) {
            $subjects = join(',', $arr['subjects']) . ',';
            unset($arr['subjects']);
        } else {
            $subjects = '';
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
        $address = '[' . $arr['provinces'] . '--' . $arr['district'] . ']';
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
        $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $arr['username'] : '';

        /** REWRITE DATA */
        unset($arr['action']);
        unset($arr['provinces']);
        unset($arr['district']);
        unset($arr['description']);
        unset($arr['admin']);

        try {
            $sql = "INSERT INTO `user` (
                    `userID`, `username`, `password`, `firstName`, `lastName`, 
                    `email`, `role`, `address`, `price`, `subjects_ids`, 
                    `description`, `birthday`, `sex`, `phone`, `experience`, 
                    `experience_type`, `degree`, `graduation_school`, `specialized`, `schedule`) 
                    VALUES (NULL, '" . $arr['username'] . "', '" . md5($arr['password']) . "', 
                    '" . $arr['firstName'] . "', '" . $arr['lastName'] . "', '" . $arr['email'] . "', 
                    '2', '" . $address . "', '" . $arr['price'] . "', 
                    '" . $subjects . "', '" . $description . "', '" . $arr['birthday'] . "', 
                    '" . $arr['sex'] . "', '" . $arr['phone'] . "', '" . $arr['experience'] . "', 
                    '" . $arr['experience_type'] . "', '" . $arr['degree'] . "', '" . $arr['graduation_school'] . "', '" . $arr['specialized'] . "', '" . $schedule . "')";
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã thêm người dùng ' . $arr['firstName'] . ' ' . $arr['lastName'] . '!');
                echo json_encode(array(
                    'error' => 0,
                    'admin' => $isAdmin
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'error' => 0,
            ));
        }
    }

    public static function register($arr)
    {
        header('Content-Type: application/json');

        /** CHECK EXIST */
        $conn = DBConnection::getConnection();
        if (self::getByKey('username', $arr['username'])) {
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
        $address = '[' . $arr['provinces'] . '--' . $arr['district'] . ']';
        $description = strip_tags($arr['description'], '<br><p><strong><i><u><div><em><strike><blockquote><ol><ul><a><hr>');
        $description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
        $description = base64_encode($description);
        $schedule = [];

        /** CONFIG */
        $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $arr['username'] : '';

        /** REWRITE DATA */
        unset($arr['action']);
        unset($arr['provinces']);
        unset($arr['district']);
        unset($arr['description']);
        unset($arr['admin']);

        try {
            $sql = "INSERT INTO `user` (
                    `userID`, `username`, `password`, `firstName`, `lastName`, 
                    `email`, `role`, `address`, `description`, `birthday`, `sex`, `phone`) 
                    VALUES (NULL, '" . $arr['username'] . "', '" . md5($arr['password']) . "', 
                    '" . $arr['firstName'] . "', '" . $arr['lastName'] . "', '" . $arr['email'] . "', 
                    '2', '" . $address . "', '" . $description . "', '" . $arr['birthday'] . "', 
                    '" . $arr['sex'] . "', '" . $arr['phone'] . "')";
            if ($conn->query($sql) == TRUE) {
                Message::add('Người dùng ' . $arr['firstName'] . ' ' . $arr['lastName'] . ' vừa đăng ký!');
                echo json_encode(array(
                    'error' => 0,
                    'admin' => $isAdmin
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                'error' => 0,
            ));
        }
    }

    public static function delete($userID = null)
    {
        $conn = DBConnection::getConnection();
        //CHECK USER
        $user = self::getByID($userID);

        if ($user) {
            $sql = "DELETE FROM `user` WHERE userID = " . $userID;
            if ($conn->query($sql) == TRUE) {
                Message::add('Đã xóa người dùng ' . $user->getUsername() . '!');
                return (array(
                    'error' => 0,
                    'username' => $user->getUsername(),
                ));
            } else {
                return (array(
                    'error' => 1,
                ));
            }
        }
    }
}