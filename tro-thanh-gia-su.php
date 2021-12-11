<?php
/** init header **/
include_once 'bi-includes/_inc/header.php';
include_once 'bi-includes/_model/User.php';

/** USER INFO */
global $user;
?>
    <section class="call-action section-padding bg-blc">
        <div class="container">
            <div class="content sm-mb30">
                <?php if (is_user_logged_in()) :
                    $user = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512), null); ?>
                    <h2 class="wow" data-splitting>
                        <?= $user->getFirstName() ?>&nbsp;
                        <b><?= $user->getLastName() ?></b><b>.</b>
                    </h2>
                    <p class="wow txt" data-splitting>
                        <a href="<?= Config::HOME_PATH ?>/dang-xuat">Đăng xuất.</a>
                    </p>
                <?php else: ?>
                    <h2 class="wow" data-splitting>
                        <b>Trở thành gia sư</b>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </section>
    <section class="contact section-padding ">
        <div class="container account-wrapper">
            <div class="form">
                <?php
                /** check login **/
                if (is_user_logged_in()) {
                    /** check role **/
                    if (is_current_user_student()) {
                        require_once 'bi-includes/_model/User.php';
                        require_once 'bi-includes/_model/Room.php';
                        require_once 'bi-includes/_model/Subjects.php';
                        require_once 'bi-includes/_model/Address.php';
                        $subjectss = Subjects::getAll();
                        $isEdit = isset($_GET['edit']) ? true : false;
                        include_once 'bi-builder/_account-source/become-professor.php';
                    } else { ?>
                        <span class="pt-100 pb-100">Hiện tại bạn là gia sư!</span>
                    <?php }
                } else {
                    include_once 'bi-builder/_admin-source/login-required.php';
                } ?>
            </div>
        </div>
    </section>

<?php include_once 'bi-includes/_inc/footer.php' ?>