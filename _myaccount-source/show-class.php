<?php
global $user;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$rooms = Room::getPaginationByOwner($page, $user->getUserID()); ?>
<div id="services" class="services bg-repeat bg-img" data-background="img/bg-pattern.jpg">
    <a href="http://localhost:3000/LTP-Project/lop-hoc?data=7">http://localhost:3000/LTP-Project/lop-hoc?data=7</a>
    <div class="row">
        <?php foreach ($rooms['data'] as $room) : ?>
            <div class="col-12">
                <div class="item wow fadeInUp md-mb50 pt-20 pb-20 pl-3 pr-4 mb-30" data-wow-delay=".3s">
                    <h6 class="custom-font"><?= $room->getTitle() ?></h6>
                    <div class="d-inline-flex align-items-center">
                        <span class="icon pe-7s-ticket"></span>
                        <span class="price ml-1">
                            <?= number_format($room->getPrice(), 0, '', ',') . " vnđ"; ?>
                        </span>
                    </div>
                    <a href="?lop-hoc&data=<?= $room->getId() ?>" class="more custom-font mt-0">Xem chi tiết <i class="pe-7s-angle-right"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>