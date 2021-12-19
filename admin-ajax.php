<?php
include_once 'bi-includes/_inc/Config.php';
include_once 'bi-includes/_model/User.php';
include_once 'bi-includes/_model/Subjects.php';
include_once 'bi-includes/_model/Room.php';
include_once 'bi-includes/_model/Media.php';
include_once 'bi-includes/_model/Address.php';
$data = $_POST;
$action = $data['action'];
switch ($action) {
    /** ACCOUNT **/
    case "edit-account":
        echo User::editUser($data);
        break;
    case "become-professor":
        echo User::becomeProfessorUser($data);
        break;
    case "login":
        echo User::login($data);
        break;
    case "add-account":
        echo User::add($data);
        break;
    case "register":
        echo User::register($data);
        break;
    /** SUBJECT **/
    case "add-subject":
        echo Subjects::add($data);
        break;
    case "edit-subject":
        echo Subjects::edit($data);
        break;
    /** ROOM **/
    case "add-room":
        echo Room::add($data);
        break;
    case "add-request":
        echo Room::add($data, true, true);
        break;
    case "add-user-room":
        echo Room::add($data, true);
        break;
    case "edit-user-room":
        echo Room::edit($data, true);
        break;
    case "edit-room":
        echo Room::edit($data);
        break;
    case "apply-class":
        echo Room::apply($data);
        break;
    case "edit-rating":
        echo Room::editRating($data);
        break;
    /** ADDRESS **/
    case "add-address":
        echo Address::add($data);
        break;
    case "edit-address":
        echo Address::edit($data);
        break;
    /** PARAMETER **/
    case "edit-parameter":
        echo Parameter::edit($data);
        break;
    /** FILE **/
    case "upload-file":
        $upload = Media::upload($data);
        if ($upload['error'] == 0 && isset($upload['media']) && !empty($upload['media'])) {
            echo User::updateAvatar($upload['media']);
        }
        break;
    default:
        echo 'No action choose';
}
