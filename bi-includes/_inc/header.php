<?php
include_once 'bi-includes/functions.php';
include_once 'bi-includes/_inc/Config.php';

/** INIT HEADER PARAM **/
global $site_title;
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
    <title><?= $site_title ? $site_title : 'Smart-edu' ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <!-- Core Style Css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= Config::HOME_PATH ?>/css/theme.min.css?ver=1.1"/>
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
        <a class="logo" href="<?= Config::HOME_PATH ?>/">
            <img src="img/logo-light.png" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if (is_current_user_student() || !is_user_logged_in()) : ?>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/tro-thanh-gia-su">Trở thành gia sư</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link style.css" href="<?= Config::HOME_PATH ?>/danh-sach-gia-su">Gia sư</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/danh-sach-lop-hoc">Lớp học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/dang-yeu-cau">Đăng yêu cầu</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link style.css" href="<?= Config::HOME_PATH ?>/danh-sach-gia-su">Gia sư</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/danh-sach-lop-hoc">Lớp học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/danh-sach-yeu-cau">Yêu cầu</a>
                    </li>
                <?php endif; ?>
                <?php if (is_current_user_admin()) : ?>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/admin">Admin</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <div class="account-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" height="682pt" viewBox="-91 -21 682 682.66669" width="682pt">
                            <path d="m369.722656 314.1875c-34.074218 27.535156-77.410156 44.054688-124.53125 44.054688s-90.457031-16.519532-124.539062-44.058594c-74.648438 43.175781-124.984375 123.898437-124.984375 216.160156v90.300781c0 10.6875 8.664062 19.355469 19.355469 19.355469h460.332031c10.6875 0 19.347656-8.667969 19.347656-19.355469v-90.300781c0-92.257812-50.332031-172.980469-124.980469-216.15625zm0 0"/>
                            <path d="m404.957031 159.765625c0-88.09375-71.667969-159.765625-159.765625-159.765625-88.09375 0-159.765625 71.671875-159.765625 159.765625s71.671875 159.765625 159.765625 159.765625c88.097656 0 159.765625-71.671875 159.765625-159.765625zm0 0"/>
                        </svg>
                        <?php if (!is_user_logged_in()) : ?>
                            <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/dang-nhap">Đăng nhập</a>
                        <?php else: ?>
                            <a class="nav-link custom-font" href="<?= Config::HOME_PATH ?>/tai-khoan"><?= current_user_display() ?></a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ==================== End Navbar ==================== -->