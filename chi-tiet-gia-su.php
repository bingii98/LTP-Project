<?php
require_once 'bi-includes/_model/User.php';
require_once 'bi-includes/_model/Subjects.php';
require_once 'bi-includes/_model/Room.php';
require_once 'bi-includes/_model/Address.php';
require_once 'bi-includes/_model/Media.php';

$subjectss = Subjects::getAll();
$subjects_ids = [];
foreach ($subjectss as $subjects) {
    $subjects_ids[$subjects->getID()] = $subjects->getName();
}

$user = User::getByID($_GET['id']);

include_once 'bi-includes/_inc/header.php';
?>
    <div class="wrapper">
    <section class="work-header proj-det bg-img parallaxie valign" style="background-image: url('<?= $user->getAvatar() ? Parameter::getValueByKey('home_path') . '/uploads/' . Media::getFileNameByKey($user->getAvatar()) : 'img/profile/immo-wegmann-rReG42Hkqo4-unsplash.jpg' ?>')" data-overlay-dark="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-9">
                    <div class="cont">
                        <h6>Gia sư</h6>
                        <h2><?= $user->getLastName() . ' ' . $user->getFirstName() ?></h2>
                    </div>
                </div>
            </div>
            <div class="bg-black opacity-70 p-3">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="item mt-20 mb-20">
                            <h6>Chuyên môn</h6>
                            <p>
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
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="item mt-20 mb-20">
                            <h6>Mức giá trung bình</h6>
                            <div class="price price-big color-white"><?= price_format($user->getPrice()); ?></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="item mt-20 mb-20">
                            <h6>Địa chỉ nhận lớp</h6>
                            <p>
                                <?php
                                $arr_address = Address::convertStringToAddress($user->getAddress());
                                $str_address = [];
                                foreach ($arr_address as $k => $address) {
                                    $str_address[] = $address->toString();
                                }
                                echo join(' / ', $str_address);
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="item mt-20 mb-20">
                            <h6>Kinh nghiệm</h6>
                            <p><?= $user->getExperience() . ' ' . $user->getExperienceType() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="intro-section section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="htit">
                        <h4><span>01 </span> Giới thiệu</h4>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 col-md-8">
                    <div class="text js-scroll__content">
                        <div class="extra-text desc desc-1">
                            <?= base64_decode($user->getDescription()) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="intro-section section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="htit">
                        <h4><span>02 </span> Đặt lịch</h4>
                    </div>
                    <div class="txt">
                        Màu cam là những buổi gia sư còn trống
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 col-md-8 mb-30">
                    <div class="text js-scroll__content">
                        <div class="calendar-week">
                            <div class="item">
                                <label>Thứ 2</label>
                            </div>
                            <div class="item">
                                <label>Thứ 3</label>
                            </div>
                            <div class="item">
                                <label>Thứ 4</label>
                            </div>
                            <div class="item">
                                <label>Thứ 5</label>
                            </div>
                            <div class="item">
                                <label>Thứ 6</label>
                            </div>
                            <div class="item">
                                <label>Thứ 7</label>
                            </div>
                            <div class="item">
                                <label>Chủ nhật</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="2s" name="2s" value="true" <?= strpos($user->getSchedule(), '2s') !== false ? 'checked' : '' ?>>
                                <label for="2s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="3s" name="3s" value="true" <?= strpos($user->getSchedule(), '3s') !== false ? 'checked' : '' ?>>
                                <label for="3s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="4s" name="4s" value="true" <?= strpos($user->getSchedule(), '4s') !== false ? 'checked' : '' ?>>
                                <label for="4s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="5s" name="5s" value="true" <?= strpos($user->getSchedule(), '5s') !== false ? 'checked' : '' ?>>
                                <label for="5s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="6s" name="6s" value="true" <?= strpos($user->getSchedule(), '6s') !== false ? 'checked' : '' ?>>
                                <label for="6s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="7s" name="7s" value="true" <?= strpos($user->getSchedule(), '7s') !== false ? 'checked' : '' ?>>
                                <label for="7s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="8s" name="8s" value="true" <?= strpos($user->getSchedule(), '8s') !== false ? 'checked' : '' ?>>
                                <label for="8s">Sáng</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="2c" name="2c" value="true" <?= strpos($user->getSchedule(), '2c') !== false ? 'checked' : '' ?>>
                                <label for="2c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="3c" name="3c" value="true" <?= strpos($user->getSchedule(), '3c') !== false ? 'checked' : '' ?>>
                                <label for="3c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="4c" name="4c" value="true" <?= strpos($user->getSchedule(), '4c') !== false ? 'checked' : '' ?>>
                                <label for="4c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="5c" name="5c" value="true" <?= strpos($user->getSchedule(), '5c') !== false ? 'checked' : '' ?>>
                                <label for="5c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="6c" name="6c" value="true" <?= strpos($user->getSchedule(), '6c') !== false ? 'checked' : '' ?>>
                                <label for="6c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="7c" name="7c" value="true" <?= strpos($user->getSchedule(), '7c') !== false ? 'checked' : '' ?>>
                                <label for="7c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="8c" name="8c" value="true" <?= strpos($user->getSchedule(), '8c') !== false ? 'checked' : '' ?>>
                                <label for="8c">Chiều</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="2t" name="2t" value="true" <?= strpos($user->getSchedule(), '2t') !== false ? 'checked' : '' ?>>
                                <label for="2t">Tối</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="3t" name="3t" value="true" <?= strpos($user->getSchedule(), '3t') !== false ? 'checked' : '' ?>>
                                <label for="3t">Tối</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="4t" name="4t" value="true" <?= strpos($user->getSchedule(), '4t') !== false ? 'checked' : '' ?>>
                                <label for="4t">Tối</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="5t" name="5t" value="true" <?= strpos($user->getSchedule(), '5t') !== false ? 'checked' : '' ?>>
                                <label for="5t">Tối</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="6t" name="6t" value="true" <?= strpos($user->getSchedule(), '6t') !== false ? 'checked' : '' ?>>
                                <label for="6t">Tối</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="7t" name="7t" value="true" <?= strpos($user->getSchedule(), '7t') !== false ? 'checked' : '' ?>>
                                <label for="7t">Tối</label>
                            </div>
                            <div class="item">
                                <input type="checkbox" id="8t" name="8t" value="true" <?= strpos($user->getSchedule(), '8t') !== false ? 'checked' : '' ?>>
                                <label for="8t">Tối</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$rooms = Room::getPaginationByOwner($page, $user->getUserID()); ?>
<?php if (count($rooms['data']) > 0) : ?>
    <section class="intro-section section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-50">
                    <div class="htit">
                        <h4><span>03 </span> Các lớp học</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text js-scroll__content">
                        <div id="services" class="services bg-repeat bg-img" data-background="img/bg-pattern.jpg">
                            <div class="row">
                                <?php foreach ($rooms['data'] as $room) : ?>
                                    <div class="col-lg-6 col-12">
                                        <div class="room-item item wow fadeInUp md-mb50 pt-20 pb-20 pl-3 pr-4 mb-30" data-wow-delay=".3s">
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
                                                <span>Đã có <?= Room::checkUserInRoom($room->getID()) ?> <?= $room->getIsRequest() == 1 ? ' ứng tuyển' : 'học viên' ?></span>
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
                                                <a href="<?= Config::HOME_PATH ?>/lop-hoc?data=<?= $room->getId() ?>" class="more custom-font mt-0">Nhận lớp <i class="pe-7s-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php include_once 'bi-includes/_inc/footer.php' ?>