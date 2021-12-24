<?php
require_once 'bi-includes/_model/User.php';
require_once 'bi-includes/_model/Subjects.php';
require_once 'bi-includes/_model/Address.php';
require_once 'bi-includes/_model/Parameter.php';


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$room = isset($_GET['data']) ? $_GET['data'] : 1;

$users = User::get_joined_pagination_by_room($page, $room);

$subjectss = Subjects::getAll();
$subjects_ids = [];
foreach ($subjectss as $subjects) {
    $subjects_ids[$subjects->getID()] = $subjects->getName();
}
?>
<section id="services" class="services section-padding bg-repeat bg-img pt-0" data-background="img/bg-pattern.jpg">
    <div class="container">
        <div class="row">
            <?php if (count($users['data']) > 0) : ?>
                <?php foreach ($users['data'] as $user) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="item profile-item wow fadeInUp md-mb50" data-wow-delay=".3s">
                            <div class="avatar">
                                <img src="img/profile/immo-wegmann-rReG42Hkqo4-unsplash.jpg" alt="">
                            </div>
                            <div class="caption">
                                <h6 class="custom-font"><?= $user->getLastName() . ' ' . $user->getFirstName() ?></h6>
                                <p class="content">
                                    <span class="icon bg-img pe-7s-cash" data-background="img/s1.jpg"></span>
                                    <?= number_format($user->getPrice(), 0, '', ',') . " vnđ"; ?>
                                </p>
                                <?php if ($user->getSubjectsIds()) : ?>
                                    <p class="content">
                                        <span class="icon bg-img pe-7s-bookmarks" data-background="img/s1.jpg"></span>
                                        <?php
                                        $subs = explode(",", $user->getSubjectsIds());
                                        $term = [];
                                        foreach ($subs as $sub) :
                                            if (isset($subjects_ids[$sub])) :
                                                $term[] = $subjects_ids[$sub];
                                            endif;
                                        endforeach;
                                        echo join(', ', $term);
                                        ?>
                                    </p>
                                <?php endif; ?>
                                <p class="content">
                                    <span class="icon bg-img pe-7s-map-2" data-background="img/s1.jpg"></span>
                                    <?php
                                    $arr_address = Address::convertStringToAddress($user->getAddress());
                                    $str_address = [];
                                    foreach ($arr_address as $k => $address) {
                                        $str_address[] = $address->toString();
                                    }
                                    echo join(' / ', $str_address);
                                    ?>
                                </p>
                                <a class="btn-curve btn-normal" href="<?= Config::HOME_PATH ?>/chi-tiet-gia-su?id=<?= $user->getUserID() ?>"><span>Mời dạy</span></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="item room-item wow fadeInUp md-mb50 pt-20 pb-20 pl-3 pr-4 mb-30" data-wow-delay=".3s">
                        <div class="top-caption d-flex justify-content-center">
                            <h6 class="custom-font">Chưa có gia sư ứng tuyển!</h6>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="pagination-wrap">
            <ul class="pagination">
                <?php if ($users['current_page'] > 1 && $users['total_page'] > 1) : ?>
                    <li class="paginate_button page-item previous" id="dataTable_previous"><a href="<?= Config::HOME_PATH ?>/danh-sach-gia-su?page=<?= $users['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                <?php endif; ?>
                <?php if ($users['current_page'] < $users['total_page'] && $users['total_page'] > 1) : ?>
                    <li class="paginate_button page-item next" id="dataTable_next"><a href="<?= Config::HOME_PATH ?>/danh-sach-gia-su?page=<?= $users['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>