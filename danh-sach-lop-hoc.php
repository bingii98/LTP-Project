<?php
require_once 'bi-includes/_model/User.php';
require_once 'bi-includes/_model/Subjects.php';
require_once 'bi-includes/_model/Room.php';
require_once 'bi-includes/_model/Parameter.php';
require_once 'bi-includes/_model/Media.php';

$subjectss = Subjects::getAll();
$subjects_ids = [];
foreach ($subjectss as $subjects) {
    $subjects_ids[$subjects->getID()] = $subjects->getName();
}

//QUERY PARAM
$begin_price = isset($_GET['begin_price']) && !empty($_GET['begin_price']) ? $_GET['begin_price'] : null;
$from_price = isset($_GET['from_price']) && !empty($_GET['from_price']) ? $_GET['from_price'] : null;
$provinces = isset($_GET['select_provinces']) && !empty($_GET['select_provinces']) ? $_GET['select_provinces'] : null;
$district = isset($_GET['select_district']) && !empty($_GET['select_district']) ? $_GET['select_district'] : null;
$subjects_id = isset($_GET['subjects']) && !empty($_GET['subjects']) ? $_GET['subjects'] : null;
?>

<?php include_once 'bi-includes/_inc/header.php' ?>


    <!-- ==================== Start Slider ==================== -->

    <header class="pages-header bg-img valign bg-bottom" data-background="img/serv-bg.jpg" data-overlay-dark="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1 class="custom-font">Danh Sách Lớp Học</h1>
                        <div class="path txt">
                            <a href="#0">Trang chủ</a><span>/</span><a href="#0" class="active">Gia sư</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ==================== End Slider ==================== -->

    <div class="main-content">

    <!-- ==================== Start Services ==================== -->

    <section id="services" class="services section-padding bg-repeat bg-img" data-background="img/bg-pattern.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-wrap">
                        <form>
                            <div class="wrap">
                                <div class="sub-headline">Địa điểm</div>
                                <div class="content">
                                    <div class="select-custom">
                                        <label for="">Thành phố</label>
                                        <select name="provinces" required>
                                            <option value="">Tỉnh / Thành phố</option>
                                        </select>
                                    </div>
                                    <div class="select-custom">
                                        <label for="">Quận/Huyện</label>
                                        <select name="district">
                                            <option value="">Quận / Huyện</option>
                                        </select>
                                    </div>
                                    <input class="billing_address_1" name="" type="hidden" value="">
                                    <input class="billing_address_2" name="" type="hidden" value="">
                                </div>
                            </div>
                            <div class="wrap">
                                <div class="sub-headline">Mức Giá</div>
                                <div class="content price-filter row">
                                    <div class="select-custom col-md-6">
                                        <label for="">Từ</label>
                                        <input name="begin_price" type="number" value="<?= $begin_price ?>">
                                    </div>
                                    <div class="select-custom col-md-6">
                                        <label for="">Đến</label>
                                        <input name="from_price" type="number" value="<?= $from_price ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <div class="sub-headline">Gia sư</div>
                                <div class="content">
                                    <div class="select-custom">
                                        <label for="">Môn Học</label>
                                        <select name="subjects" required>
                                            <?php foreach ($subjectss as $subjects) : ?>
                                                <option value="<?= $subjects->getID() ?>" <?= $subjects_id == $subjects->getID() ? 'selected' : '' ?>><?= $subjects->getName() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrap">
                                <button class="btn-curve btn-normal"><span>Submit</span></button>
                                <a class="btn btn-link" href="<?= Config::HOME_PATH ?>/danh-sach-lop-hoc">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $rooms = Room::getPagination($page, $_GET, false); ?>
                    <div id="services" class="services bg-repeat bg-img" data-background="img/bg-pattern.jpg">
                        <div class="row">
                            <?php if (count($rooms['data']) > 0) : ?>
                                <?php foreach ($rooms['data'] as $room) : ?>
                                    <div class="col-12">
                                        <div class="item room-item wow fadeInUp md-mb50 pt-20 pb-20 pl-3 pr-4 mb-30" data-wow-delay=".3s">
                                            <div class="-professor">
                                                <?php
                                                $user_room_id = Room::getOwner($room->getID());
                                                $user_room = User::getByID($user_room_id);
                                                ?>
                                                <div class="-avatar">
                                                    <div class="-box-img">
                                                        <?php if ($user_room->getAvatar()) : ?>
                                                            <img src="uploads/<?= Media::getFileNameByKey($user_room->getAvatar()) ?>" alt="">
                                                        <?php else: ?>
                                                            <img src="img/man.svg" alt="">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="name text-center mt-20">
                                                    <?= $user_room->getFirstName() . ' ' . $user_room->getLastName() ?>
                                                </div>
                                                <div class="-birthday text-center">
                                                    <?php $date = DateTime::createFromFormat('Y-m-d', $user_room->getBirthday()); ?>
                                                    <?= $date->format('d/m/Y'); ?>
                                                </div>
                                            </div>
                                            <div class="-content">
                                                <div class="top-caption d-flex">
                                                    <h6 class="custom-font">
                                                        <a href="<?= Config::HOME_PATH ?>/lop-hoc?data=<?= $room->getId() ?>"><?= $room->getTitle() ?></a>
                                                    </h6>
                                                    <div class="ml-30 price">
                                                        <div class="d-inline-flex align-items-center">
                                                            <span class="icon pe-7s-ticket"></span>
                                                            <span class="ml-1">
                                                            <?= number_format($room->getPrice(), 0, '', '.'); ?><span class="prefix">vnđ</span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="desc mb-4">
                                                    <?php
                                                    $string = strip_tags(base64_decode($room->getDescription()));
                                                    if (strlen($string) > 150) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 150);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '...';
                                                    }
                                                    echo $string; ?>
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
                                                            <?php $address = explode('--', $room->getAddress()); ?>
                                                            <?= $address[1] . ', ' . $address[2] ?>
                                                            <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <a href="<?= Config::HOME_PATH ?>/lop-hoc?data=<?= $room->getId() ?>" class="more custom-font mt-0 link">Nhận lớp <i class="pe-7s-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="item room-item wow fadeInUp md-mb50 pt-20 pb-20 pl-3 pr-4 mb-30" data-wow-delay=".3s">
                                        <div class="top-caption d-flex justify-content-center">
                                            <h6 class="custom-font">Không có lớp nào phù hợp!</h6>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pagination-wrap">
                            <ul class="pagination">
                                <?php if ($rooms['current_page'] > 1 && $rooms['total_page'] > 1) : ?>
                                    <li class="paginate_button page-item previous" id="dataTable_previous"><a href="<?= Config::HOME_PATH ?>/danh-sach-lop-hoc?page=<?= $rooms['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                                <?php endif; ?>
                                <?php if ($rooms['current_page'] < $rooms['total_page'] && $rooms['total_page'] > 1) : ?>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="<?= Config::HOME_PATH ?>/danh-sach-lop-hoc?page=<?= $rooms['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== End Testimonials ==================== -->

<?php include_once 'bi-includes/_inc/footer.php' ?>