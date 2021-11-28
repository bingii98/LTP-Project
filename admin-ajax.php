<?php
include_once '_model/User.php';
include_once '_model/Subjects.php';
include_once '_model/Room.php';
$data = $_POST;
$action = $data['action'];
switch ($action) {
    case "edit-account":
        echo User::editUser($data);
        break;
    case "login":
        echo User::login($data);
        break;
    case "add-account":
        echo User::add($data);
        break;
    case "add-subject":
        echo Subjects::add($data);
        break;
    case "edit-subject":
        echo Subjects::edit($data);
        break;
    case "add-room":
        echo Room::add($data);
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
    default:
        echo 'No action choose';
}
