<?php
include_once 'bi-includes/_inc/header.php';
require_once 'bi-includes/_inc/Config.php';

/** LOGIN CHECK **/
if (!is_user_logged_in()) : ?>
    <script>
        window.location.href = '<?= Config::HOME_PATH . '/dang-nhap' ?>';
    </script>
<?php
return;
endif; ?>
    <section class="call-action section-padding bg-blc">
        <div class="container">
            <div class="content sm-mb30 color-white">
                <?php
                require_once 'bi-includes/_model/User.php';
                require_once 'bi-includes/_model/Room.php';
                require_once 'bi-includes/_model/Subjects.php';
                require_once 'bi-includes/_model/Address.php';
                require_once 'bi-includes/_model/Media.php';
                $subjectss = Subjects::getAll();

                /** USER INFO */
                global $user;
                $user = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512), null);

                $isEdit = isset($_GET['edit']) ? true : false;
                ?>
                <h2 class="wow" data-splitting>
                    <b><?= $user->getLastName() ?></b> <?= $user->getFirstName() ?><b>.</b>
                    <span class="d-inline-block text-white smaller font-weight-light" data-splitting><b>(<?= Role::getRole($user->getRole()) ?>)</b></span>
                </h2>
                <p class="wow txt" data-splitting>
                    <a href="<?= Config::HOME_PATH ?>/dang-xuat">Đăng xuất.</a>
                </p>
            </div>
        </div>
    </section>
    <section class="contact section-padding ">
        <div class="container account-wrapper">
            <?php include_once 'bi-builder/_account-source/account-wrapper.php'; ?>
        </div>
    </section>

<?php include_once 'bi-includes/_inc/footer.php' ?>