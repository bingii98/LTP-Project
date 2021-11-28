<?php
include_once '_model/Parameter.php';
include_once '_inc/Config.php';
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="zxx" data-scroll-index="0">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="keywords" content="HTML5 Template Byra onepage themeforest"/>
    <meta name="description" content="Byra - Onepage Multi-Purpose HTML5 Template"/>
    <meta name="author" content=""/>
    <!-- Title  -->
    <title>Title</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <!-- Core Style Css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= Parameter::getValueByKey('home_path') ?>/css/theme.min.css"/>
</head>
<body>
<!-- ==================== Start Loading ==================== -->
<!--<section class="load">-->
<!--    <div class="loader"></div>-->
<!--    <div class="count"></div>-->
<!--</section>-->
<!-- ==================== End Loading ==================== -->

<!-- ==================== Start progress-scroll-button ==================== -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- ==================== End progress-scroll-button ==================== -->
<!-- ==================== Start cursor ==================== -->

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- ==================== End cursor ==================== -->

<!-- ==================== Start Navbar ==================== -->

<nav class="navbar change navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="<?= Parameter::getValueByKey('home_path') ?>/">
            <img src="img/logo-light.png" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link style.css" href="danh-sach-gia-su">Gia sư</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-font" href="services.html">Yêu cầu mới</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-font" href="contact.html">Đăng yêu cầu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-font" href="contact.html">Trở thành gia sư</a>
                </li>
                <li class="nav-item">
                    <?php if (!isset($_SESSION['2748_loggedin'])) : ?>
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/dang-nhap.">Đăng nhập</a>
                    <?php else: ?>
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/tai-khoan"><?= $_SESSION["user_display_name"] ?></a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ==================== End Navbar ==================== -->