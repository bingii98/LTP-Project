<?php
include_once '_inc/header.php';
require_once './_model/User.php';
require_once './_model/Room.php';
require_once './_model/Subjects.php';
require_once './_model/Address.php';
$subjectss = Subjects::getAll();

/** USER INFO */
global $user;
$user = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512), null);

$isEdit = isset($_GET['edit']) ? true : false;
?>
    <section class="call-action section-padding bg-blc">
        <div class="container">
            <div class="content sm-mb30">
                <h2 class="wow" data-splitting><b><?= $user->getLastName() ?></b> <?= $user->getFirstName() ?><b>.</b></h2>
                <p class="wow txt" data-splitting>
                    <a href="<?= Config::HOME_PATH ?>/dang-xuat">Đăng xuất.</a>
                </p>
            </div>
        </div>
        </div>
    </section>
    <section class="contact section-padding ">
        <div class="container account-wrapper">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <ul>
                            <li><a href="?thong-tin">Thông tin</a></li>
                            <li><a href="?lop-hoc">Lớp học</a></li>
                            <li><a href="?de-nghi-day">Đề nghị dạy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="form">
                        <?php if (isset($_SESSION['2748_loggedin'])) {
                            if (isset($_GET['lop-hoc'])) {
                                if (isset($_GET['data']) && !empty($_GET['data'])) {
                                    include_once '_myaccount-source/edit-room.php';
                                } else {
                                    include_once '_myaccount-source/show-class.php';
                                }
                            } elseif (isset($_GET['de-nghi-day'])) {
                                include_once '_myaccount-source/add-room.php';
                            } else {
                                include_once '_myaccount-source/add-room.php';
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once '_inc/footer.php' ?>