<?php if (!is_current_user_admin()) return;

if (isset($_GET['action']) && !empty($_GET['action'])) :
    switch ($_GET['action']) {
        case "user":
            include_once 'bi-builder/_admin-source/user.php';
            break;
        case "user-add":
            include_once 'bi-builder/_admin-source/user-add.php';
            break;
        case "user-edit":
            include_once 'bi-builder/_admin-source/user-edit.php';
            break;
        case "parameter":
            include_once 'bi-builder/_admin-source/parameter.php';
            break;
        case "message":
            include_once 'bi-builder/_admin-source/message.php';
            break;
        case "subjects":
            include_once 'bi-builder/_admin-source/subject.php';
            break;
        case "subject-add":
            include_once 'bi-builder/_admin-source/subject-add.php';
            break;
        case "subject-edit":
            include_once 'bi-builder/_admin-source/subject-edit.php';
            break;
        case "class":
            include_once 'bi-builder/_admin-source/room.php';
            break;
        case "request":
            include_once 'bi-builder/_admin-source/request.php';
            break;
        case "class-add":
            include_once 'bi-builder/_admin-source/room-add.php';
            break;
        case "class-edit":
            include_once 'bi-builder/_admin-source/room-edit.php';
            break;
        default:
            echo 'Xin chào quản trị viên!';
            break;
    }
else:
    echo 'Xin chào quản trị viên!';
endif;