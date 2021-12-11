<?php
include_once 'bi-includes/functions.php';
require_once 'bi-includes/_model/Parameter.php';
require_once 'bi-includes/_model/Message.php';

/** START - CHECK ADMIN **/
if (!is_current_user_admin()){
    include_once './404.php';
    return;
}
/** END - CHECK ADMIN **/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="<?= Config::HOME_PATH ?>/bi-source/_assets/css/admin-style.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="<?= Config::HOME_PATH ?>/css/theme.min.css" rel="stylesheet">
</head>

<body id="page-top" class="admin-bar">
<div id="wrapper">
    <?php include_once 'bi-builder/_admin-source/sidebar.php'; ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include_once 'bi-builder/_admin-source/topbar.php'; ?>
            <div class="container-fluid">
                <?php include_once 'bi-builder/_admin-source/init/redirect.php'; ?>
            </div>
        </div>
        <?php include_once 'bi-builder/_admin-source/footer.php'; ?>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng đăng xuất?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Chọn "Đăng xuất" để kết thúc phiên hoạt động.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="dang-xuat">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= Config::HOME_PATH ?>/js/jquery-3.0.0.min.js"></script>
<script src="<?= Config::HOME_PATH ?>/js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= Config::HOME_PATH ?>/js/districts.min.js"></script>
<script src="<?= Config::HOME_PATH ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= Config::HOME_PATH ?>/js/plugins.js"></script>
<script src="<?= Config::HOME_PATH ?>/bi-source/_assets/js/sb-admin-2.js"></script>
<script src="<?= Config::HOME_PATH ?>/js/theme.js"></script>
</body>

</html>