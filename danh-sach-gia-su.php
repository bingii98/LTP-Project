<?php
require_once './_model/User.php';
require_once './_model/Subjects.php';
require_once './_model/Address.php';
require_once './_model/Parameter.php';


$page = isset($_GET['page']) ? $_GET['page'] : 1;

$users = User::getUser_Pagination_Teacher_filter($page, $_GET);

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
$rate = isset($_GET['rate']) && !empty($_GET['rate']) ? $_GET['rate'] : null;
$subjects_id = isset($_GET['subjects']) && !empty($_GET['subjects']) ? $_GET['subjects'] : null;
?>

<?php include_once '_inc/header.php' ?>


    <!-- ==================== Start Slider ==================== -->

    <header class="pages-header bg-img valign bg-bottom" data-background="img/serv-bg.jpg" data-overlay-dark="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1 class="custom-font">Danh Sách Gia Sư</h1>
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
                                        <label for="">Cấp bậc</label>
                                        <select name="rate" required>
                                            <option value="5" <?= $rate == 5 ? 'selected' : '' ?>>5 sao</option>
                                            <option value="4" <?= $rate == 4 ? 'selected' : '' ?>>4 sao</option>
                                            <option value="3" <?= $rate == 3 ? 'selected' : '' ?>>3 sao</option>
                                            <option value="2" <?= $rate == 2 ? 'selected' : '' ?>>2 sao</option>
                                            <option value="1" <?= $rate == 1 ? 'selected' : '' ?>>1 sao</option>
                                        </select>
                                    </div>
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
                                <button class="btn btn-primary">Submit</button>
                                <button class="btn btn-outline-primary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php foreach ($users['data'] as $user) : ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="item wow fadeInUp md-mb50" data-wow-delay=".3s">
                                    <div class="avatar">
                                        <img src="img/profile/immo-wegmann-rReG42Hkqo4-unsplash.jpg" alt="">
                                    </div>
                                    <div class="caption">
                                        <h6 class="custom-font"><?= $user->getLastName() . ' ' . $user->getFirstName() ?></h6>
                                        <p class="content">
                                            <span class="icon bg-img pe-7s-cash" data-background="img/s1.jpg"></span>
                                            <?= number_format($user->getPrice(), 0, '', ',') . " vnđ"; ?>
                                        </p>
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
                                        <a class="btn-curve btn-normal" href="<?= Parameter::getValueByKey('home_path') ?>/chi-tiet-gia-su?id=<?= $user->getUserID() ?>"><span>Mời dạy</span></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="pagination-wrap">
                        <ul class="pagination">
                            <?php if ($users['current_page'] > 1 && $users['total_page'] > 1) : ?>
                                <li class="paginate_button page-item previous" id="dataTable_previous"><a href="<?= Parameter::getValueByKey('home_path') ?>/danh-sach-gia-su?page=<?= $users['current_page'] - 1 ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-caret-left"></i></a></li>
                            <?php endif; ?>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <?php if ($users['current_page'] < $users['total_page'] && $users['total_page'] > 1) : ?>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="<?= Parameter::getValueByKey('home_path') ?>/danh-sach-gia-su?page=<?= $users['current_page'] + 1 ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><i class="fas fa-caret-right"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== End Testimonials ==================== -->

<?php include_once '_inc/footer.php' ?>