<?php
global $user;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$rooms = Room::getJoinedPaginationByOwner($page, $user->getUserID(), true);

/** @var CLASS $subjects_ids */
$subjectss = Subjects::getAll();
$subjects_ids = [];
foreach ($subjectss as $subjects) {
    $subjects_ids[$subjects->getID()] = $subjects->getName();
}
?>
<div id="services" class="services bg-repeat bg-img container" data-background="img/bg-pattern.jpg">
    <div class="row">
        <?php foreach ($rooms['data'] as $room) : ?>
            <div class="col-12">
                <div class="item room-item wow fadeInUp md-mb50 pt-20 pb-20 pl-3 pr-4 mb-30" data-wow-delay=".3s">
                    <div class="-content">
                        <div class="top-caption d-flex">
                            <h6 class="custom-font"><?= $room->getTitle() ?></h6>
                            <div class="d-inline-flex mr-30 align-items-center price">
                                <span class="icon pe-7s-ticket"></span>
                                <span class="price ml-1">
                                <?= number_format($room->getPrice(), 0, '', '.'); ?><span class="prefix">vnđ</span>
                            </span>
                            </div>
                        </div>
                        <div class="desc mb-4">
                            <span>Có <?= Room::checkUserInRoom($room->getID()) ?> học viên</span>
                        </div>
                        <div class="bottom-caption">
                            <div class="wrapper">
                                <?php if ($room->getSubject()) : ?>
                                    <div class="d-inline-flex mb-2 mr-30 align-items-center">
                                        <span class="icon pe-7s-paper-plane"></span>
                                        <span class="price ml-1">
                                <?php
                                $subs = explode(",", $room->getSubject());
                                $term = [];
                                foreach ($subs as $sub) :
                                    if (isset($subjects_ids[$sub])) :
                                        $term[] = $subjects_ids[$sub];
                                    endif;
                                endforeach;
                                echo join(', ', $term);
                                ?>
                            </span>
                                    </div>
                                <?php endif; ?>
                                <div class="d-inline-flex mb-2 mr-30 align-items-center">
                                    <?php if ($room->getAddress()) : ?>
                                    <span class="icon pe-7s-map-marker"></span>
                                    <span class="price ml-1">
                                    <?= str_replace('--', ',', $room->getAddress()) ?>
                                    <?php endif; ?>
                                </span>
                                </div>
                            </div>
                            <a href="<?= Config::HOME_PATH ?>/lop-hoc?data=<?= $room->getId() ?>" class="more custom-font mt-0 link">Xem chi tiết <i class="pe-7s-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination-wrap">
        <ul class="pagination">
            <?php if ($rooms['current_page'] > 1 && $rooms['total_page'] > 1) : ?>
                <li class="paginate_button page-item previous" id="dataTable_previous"><a href="<?= Config::HOME_PATH ?>/tai-khoan?tham-gia&page=<?= $rooms['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
            <?php endif; ?>
            <?php if ($rooms['current_page'] < $rooms['total_page'] && $rooms['total_page'] > 1) : ?>
                <li class="paginate_button page-item next" id="dataTable_next"><a href="<?= Config::HOME_PATH ?>/tai-khoan?tham-gia&page=<?= $rooms['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>