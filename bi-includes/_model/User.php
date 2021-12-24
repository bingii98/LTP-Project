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

    public static function get_user_pagination($page)
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

    public static function get_user_pagination_teacher($page)
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

    public static function get_user_pagination_teacher_filter($page, $array = array())
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

    public static function get_joined_pagination_by_room($page, $roomID)
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

    public static function get_user_rating($userID)
    {
        $count = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `room_user` WHERE `owner` = ' . $userID;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $count[] = $row->rating;
            }
        }

        DBConnection::closeConnection($conn);
        return $count;
    }

    public static function get_user_rating_display($userID, $isRoom = false)
    {
        $rating = self::get_user_rating($userID);
        if (count($rating) > 0) {
            $rate = round(array_sum($rating) / count($rating), 1); ?>
            <div class="rating-wrapper">
                <div class="icon-rating">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512">
                        <path d="m491.64 188.725-153.53-22.31-68.66-139.12c-2.75-5.57-8.1-8.36-13.45-8.36l.02 400.2 137.3 72.19c11.01 5.78 23.86-3.56 21.76-15.81l-26.22-152.92 111.09-108.29c8.91-8.68 3.99-23.79-8.31-25.58z" fill="#ffb820"/>
                        <path d="m356.62 312.125s23.68 138.03 23.76 138.49c-.08-.01-122.45-31-124.36-31.48-.02-.01-137.34 72.19-137.34 72.19-11.01 5.78-23.86-3.56-21.76-15.81l26.22-152.92-111.09-108.29c-8.91-8.68-3.99-23.79 8.31-25.58l153.53-22.31 68.66-139.12c2.75-5.57 8.1-8.36 13.45-8.36l62.19 174.9 139.06 20.21z" fill="#ffd06a"/>
                        <path d="m510.883 196.615c-2.666-8.204-9.625-14.07-18.16-15.311l-149.632-21.743-66.918-135.588c-3.817-7.735-11.547-12.54-20.173-12.54s-16.356 4.805-20.173 12.54l-66.917 135.588-149.632 21.744c-8.537 1.24-15.495 7.106-18.161 15.311s-.484 17.04 5.693 23.062l108.274 105.541-9.911 57.786c-.7 4.082 2.042 7.959 6.124 8.66 4.087.7 7.96-2.043 8.66-6.125l10.578-61.672c.417-2.433-.389-4.915-2.157-6.639l-111.098-108.295c-2.089-2.036-2.798-4.909-1.897-7.684.902-2.775 3.164-4.683 6.052-5.103l153.534-22.31c2.443-.354 4.554-1.889 5.647-4.103l68.662-139.125c1.292-2.617 3.804-4.179 6.722-4.179s5.431 1.562 6.722 4.179l68.663 139.125c1.093 2.214 3.204 3.748 5.647 4.103l153.534 22.31c2.888.42 5.15 2.327 6.051 5.102.902 2.775.193 5.648-1.896 7.685l-111.099 108.294c-1.768 1.724-2.575 4.206-2.157 6.639l26.227 152.913c.494 2.876-.621 5.617-2.982 7.332-2.361 1.714-5.312 1.929-7.895.57l-137.325-72.195c-2.186-1.148-4.795-1.148-6.98 0l-137.325 72.195c-2.583 1.358-5.535 1.144-7.894-.57-2.361-1.715-3.476-4.456-2.982-7.332l10.578-61.673c.7-4.082-2.042-7.959-6.124-8.66-4.086-.697-7.96 2.043-8.66 6.125l-10.578 61.673c-1.458 8.502 1.971 16.933 8.95 22.003 3.943 2.865 8.557 4.32 13.201 4.32 3.575 0 7.169-.862 10.49-2.608l133.834-70.36 133.834 70.36c7.635 4.014 16.713 3.357 23.692-1.712 6.979-5.07 10.408-13.502 8.949-22.003l-25.56-149.027 108.275-105.541c6.177-6.022 8.359-14.859 5.693-23.062z"/>
                    </svg>
                </div>
                <span class="number-label">
                <?= $rate ?>
            </span>
                <span class="count-label">
                (<?= count($rating) > 999 ? 999 : count($rating) ?>)
            </span>
            </div>
            <?php
            return;
        }
        return null;
    }

    public static function get_room_rating($roomID)
    {
        $count = [];
        $conn = DBConnection::getConnection();
        $sql = 'SELECT * FROM `room_user` WHERE `room` = ' . $roomID;
        $rs = mysqli_query($conn, $sql);
        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_object($rs)) {
                $count[] = $row->rating;
            }
        }

        DBConnection::closeConnection($conn);
        return $count;
    }

    public static function get_room_rating_display($roomID, $isRoom = false)
    {
        $rating = self::get_room_rating($roomID);
        if (count($rating) > 0) {
            $rate = round(array_sum($rating) / count($rating), 1); ?>
            <div class="rating-wrapper">
                <div class="icon-rating">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512">
                        <path d="m491.64 188.725-153.53-22.31-68.66-139.12c-2.75-5.57-8.1-8.36-13.45-8.36l.02 400.2 137.3 72.19c11.01 5.78 23.86-3.56 21.76-15.81l-26.22-152.92 111.09-108.29c8.91-8.68 3.99-23.79-8.31-25.58z" fill="#ffb820"/>
                        <path d="m356.62 312.125s23.68 138.03 23.76 138.49c-.08-.01-122.45-31-124.36-31.48-.02-.01-137.34 72.19-137.34 72.19-11.01 5.78-23.86-3.56-21.76-15.81l26.22-152.92-111.09-108.29c-8.91-8.68-3.99-23.79 8.31-25.58l153.53-22.31 68.66-139.12c2.75-5.57 8.1-8.36 13.45-8.36l62.19 174.9 139.06 20.21z" fill="#ffd06a"/>
                        <path d="m510.883 196.615c-2.666-8.204-9.625-14.07-18.16-15.311l-149.632-21.743-66.918-135.588c-3.817-7.735-11.547-12.54-20.173-12.54s-16.356 4.805-20.173 12.54l-66.917 135.588-149.632 21.744c-8.537 1.24-15.495 7.106-18.161 15.311s-.484 17.04 5.693 23.062l108.274 105.541-9.911 57.786c-.7 4.082 2.042 7.959 6.124 8.66 4.087.7 7.96-2.043 8.66-6.125l10.578-61.672c.417-2.433-.389-4.915-2.157-6.639l-111.098-108.295c-2.089-2.036-2.798-4.909-1.897-7.684.902-2.775 3.164-4.683 6.052-5.103l153.534-22.31c2.443-.354 4.554-1.889 5.647-4.103l68.662-139.125c1.292-2.617 3.804-4.179 6.722-4.179s5.431 1.562 6.722 4.179l68.663 139.125c1.093 2.214 3.204 3.748 5.647 4.103l153.534 22.31c2.888.42 5.15 2.327 6.051 5.102.902 2.775.193 5.648-1.896 7.685l-111.099 108.294c-1.768 1.724-2.575 4.206-2.157 6.639l26.227 152.913c.494 2.876-.621 5.617-2.982 7.332-2.361 1.714-5.312 1.929-7.895.57l-137.325-72.195c-2.186-1.148-4.795-1.148-6.98 0l-137.325 72.195c-2.583 1.358-5.535 1.144-7.894-.57-2.361-1.715-3.476-4.456-2.982-7.332l10.578-61.673c.7-4.082-2.042-7.959-6.124-8.66-4.086-.697-7.96 2.043-8.66 6.125l-10.578 61.673c-1.458 8.502 1.971 16.933 8.95 22.003 3.943 2.865 8.557 4.32 13.201 4.32 3.575 0 7.169-.862 10.49-2.608l133.834-70.36 133.834 70.36c7.635 4.014 16.713 3.357 23.692-1.712 6.979-5.07 10.408-13.502 8.949-22.003l-25.56-149.027 108.275-105.541c6.177-6.022 8.359-14.859 5.693-23.062z"/>
                    </svg>
                </div>
                <span class="number-label">
                <?= $rate ?>
            </span>
                <span class="count-label">
                (<?= count($rating) > 999 ? 999 : count($rating) ?>)
            </span>
            </div>
            <?php
            return;
        }
        return null;
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

                $price = str_replace(',', '', $arr['price']);

                /** CONFIG */
                $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $user->getUsername() : '';

                /** REWRITE DATA */
                unset($arr['provinces']);
                unset($arr['district']);
                unset($arr['description']);
                unset($arr['admin']);
                unset($arr['userID']);
                unset($arr['price']);

                try {
                    $sql = "UPDATE `user` SET";
                    foreach ($arr as $key => $value) {
                        $sql .= " `" . $key . "` = '" . $value . "', ";
                    }
                    $sql .= " `address` = '" . $address . "',";
                    $sql .= " `subjects_ids` = '" . $subjects . "',";
                    $sql .= " `description` = '" . $description . "',";
                    $sql .= " `price` = '" . $price . "',";
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

                $price = str_replace(',', '', $arr['price']);

                /** CONFIG */
                $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $user->getUsername() : '';

                /** REWRITE DATA */
                unset($arr['provinces']);
                unset($arr['district']);
                unset($arr['admin']);
                unset($arr['userID']);
                unset($arr['price']);

                try {
                    $sql = "UPDATE `user` SET";
                    foreach ($arr as $key => $value) {
                        $sql .= " `" . $key . "` = '" . $value . "', ";
                    }
                    $sql .= " `subjects_ids` = '" . $subjects . "',";
                    $sql .= " `schedule` = '" . join(',', $schedule) . "',";
                    $sql .= " `price` = '" . $price . "',";
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

        $price = str_replace(',', '', $arr['price']);

        /** CONFIG */
        $isAdmin = isset($arr['admin']) && $arr['admin'] == 'true' ? '?action=user-edit&user=' . $arr['username'] : '';

        /** REWRITE DATA */
        unset($arr['action']);
        unset($arr['provinces']);
        unset($arr['district']);
        unset($arr['description']);
        unset($arr['admin']);
        unset($arr['price']);

        try {
            $sql = "INSERT INTO `user` (
                    `userID`, `username`, `password`, `firstName`, `lastName`, 
                    `email`, `role`, `address`, `price`, `subjects_ids`, 
                    `description`, `birthday`, `sex`, `phone`, `experience`, 
                    `experience_type`, `degree`, `graduation_school`, `specialized`, `schedule`) 
                    VALUES (NULL, '" . $arr['username'] . "', '" . md5($arr['password']) . "', 
                    '" . $arr['firstName'] . "', '" . $arr['lastName'] . "', '" . $arr['email'] . "', 
                    '2', '" . $address . "', '" . $price . "', 
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