<?php
require_once './_model/User.php';
require_once './_model/Subjects.php';
require_once './_model/Address.php';
$subjectss = Subjects::getAll();

/** USER INFO */
$user = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512), null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= Parameter::getValueByKey('home_path') ?>/assets/css/theme.min.css">
</head>
<body>
<section class="professor-grid">
    <div class="container">

    </div>
</section>
<script src="<?= Parameter::getValueByKey('home_path') ?>/assets/js/jquery.js"></script>
<script src="<?= Parameter::getValueByKey('home_path') ?>/assets/js/districts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= Parameter::getValueByKey('home_path') ?>/assets/js/theme.min.js"></script>
</body>
</html>