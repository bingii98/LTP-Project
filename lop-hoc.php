<?php
require_once './_model/Room.php';
require_once './_model/Subjects.php';

$data = Room::getByKey($_GET['data']);

include_once '_inc/header.php'; ?>
<!-- ==================== Start Services ==================== -->
<section class="services serv-pg section-padding bg-repeat bg-img pb-0" data-background="img/bg-pattern.jpg">
    <div class="sec-head custom-font text-center">
        <h6 class="wow fadeIn" data-wow-delay=".5s">Lớp học</h6>
        <h3 class="wow lts-0" data-splitting>
            <?= $data->getTitle() ?>
        </h3>
    </div>
    <div class="item wow fadeInUp p-5" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="line">
                        <span class="icon-2 pe-7s-switch"></span>
                        <h6 class="sub-title">Trạng thái:</h6>
                        <span><?= $data->getStatus() ?></span>
                    </div>
                    <div class="line">
                        <span class="icon-2 pe-7s-note2"></span>
                        <h6 class="sub-title">Môn học:</h6>
                        <span><?= Subjects::getByKey($data->getSubject())->getName() ?></span>
                    </div>
                    <div class="line">
                        <span class="icon-2 pe-7s-bookmarks"></span>
                        <h6 class="sub-title">Hình thức:</h6>
                        <span><?= $data->getType() ?></span>
                    </div>
                    <div class="line">
                        <span class="icon-2 pe-7s-map-marker"></span>
                        <h6 class="sub-title">Địa chỉ:</h6>
                        <span><?= $data->getAddress() ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line">
                        <span class="icon-2 pe-7s-switch"></span>
                        <h6 class="sub-title">Gia sư:</h6>
                        <span><?= $data->getSex() ?></span>
                    </div>
                    <div class="line">
                        <span class="icon-2 pe-7s-note2"></span>
                        <h6 class="sub-title">Thời lượng:</h6>
                        <span><?= $data->getTime() ?> buổi/tuần (<?= $data->getHours() ?> giờ/buổi)</span>
                    </div>
                    <div class="line">
                        <span class="icon-2 pe-7s-bookmarks"></span>
                        <h6 class="sub-title">Học phí 1 buổi:</h6>
                        <span class="price-big"><?= number_format($data->getPrice(), 0, '', ',') . " vnđ"; ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line">
                        <span class="icon-2 pe-7s-switch"></span>
                        <h6 class="sub-title">Đánh giá:</h6>
                        <?php $rate = Room::getRating($data->getID()); ?>
                        <span class="rating">
                            <?php for ($index = 0; $index < 5; $index++) : ?>
                                <?php if ($index < $rate['data']) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512"><g id="star"><path
                                                    d="m29.911 13.75-6.229 6.072 1.471 8.576c.064.375-.09.754-.398.978-.174.127-.381.191-.588.191-.159 0-.319-.038-.465-.115l-7.702-4.049-7.701 4.048c-.336.178-.745.149-1.053-.076-.308-.224-.462-.603-.398-.978l1.471-8.576-6.23-6.071c-.272-.266-.371-.664-.253-1.025s.431-.626.808-.681l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25c.377.055.69.319.808.681s.019.758-.253 1.025z"/></g></svg>
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="511pt" viewBox="0 -10 511.98685 511" width="511pt"><path
                                                d="m114.59375 491.140625c-5.609375 0-11.179688-1.75-15.933594-5.1875-8.855468-6.417969-12.992187-17.449219-10.582031-28.09375l32.9375-145.089844-111.703125-97.960937c-8.210938-7.167969-11.347656-18.519532-7.976562-28.90625 3.371093-10.367188 12.542968-17.707032 23.402343-18.710938l147.796875-13.417968 58.433594-136.746094c4.308594-10.046875 14.121094-16.535156 25.023438-16.535156 10.902343 0 20.714843 6.488281 25.023437 16.511718l58.433594 136.769532 147.773437 13.417968c10.882813.980469 20.054688 8.34375 23.425782 18.710938 3.371093 10.367187.253906 21.738281-7.957032 28.90625l-111.703125 97.941406 32.9375 145.085938c2.414063 10.667968-1.726562 21.699218-10.578125 28.097656-8.832031 6.398437-20.609375 6.890625-29.910156 1.300781l-127.445312-76.160156-127.445313 76.203125c-4.308594 2.558594-9.109375 3.863281-13.953125 3.863281zm141.398438-112.875c4.84375 0 9.640624 1.300781 13.953124 3.859375l120.277344 71.9375-31.085937-136.941406c-2.21875-9.746094 1.089843-19.921875 8.621093-26.515625l105.472657-92.5-139.542969-12.671875c-10.046875-.917969-18.6875-7.234375-22.613281-16.492188l-55.082031-129.046875-55.148438 129.066407c-3.882812 9.195312-12.523438 15.511718-22.546875 16.429687l-139.5625 12.671875 105.46875 92.5c7.554687 6.613281 10.859375 16.769531 8.621094 26.539062l-31.0625 136.9375 120.277343-71.914062c4.308594-2.558594 9.109376-3.859375 13.953126-3.859375zm-84.585938-221.847656s0 .023437-.023438.042969zm169.128906-.0625.023438.042969c0-.023438 0-.023438-.023438-.042969zm0 0"/></svg>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </span>
                        <span>(<?= $rate['count'] ?>)</span>
                    </div>
                    <div class="line">
                        <span class="icon-2 pe-7s-switch"></span>
                        <h6 class="sub-title">Đề nghị dạy:</h6>
                        <span>Đã có <?= Room::checkUserInRoom($data->getID()) ?> học viên</span>
                    </div>
                    <?php $isJoined = Room::checkReviewed($data->getID()); ?>
                    <div class="line">
                        <form id="apply-class" method="post" action="admin-ajax">
                            <input type="hidden" name="action" value="apply-class">
                            <input type="hidden" name="data" value="<?= $data->getID() ?>">
                            <button class="btn-curve btn-normal dark" <?= $isJoined['reviewed'] ? 'disabled' : '' ?>><span><?= $isJoined['reviewed'] ? 'Đã tham gia' : 'Ứng tuyển' ?></span></button>
                            <?php if ($isJoined['reviewed'] && $data->isClosed()) : ?>
                                <?php if (!$isJoined['checked']) : ?>
                                    <button type="button" class="btn-curve btn-normal btn-popup" <?= $isJoined ? '' : 'disabled' ?>><span>Đánh giá lại</span></button>
                                <?php else: ?>
                                    <button type="button" class="btn-curve btn-normal" disabled><span>Đã đánh giá</span></button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="line">
                        <label class="error" id="apply-error">
                            <?php if ($isJoined['reviewed'] && !$isJoined['checked'] && !$data->isClosed()) : ?>
                                Đánh giá tạm thời của bạn cho lớp học này là 5 sao, bạn có thể đánh giá lại sao khi hoàn thành khóa học!
                            <?php elseif ($isJoined['reviewed'] && !$isJoined['checked'] && $data->isClosed()): ?>
                                Bạn có thể đánh giá lại
                            <?php endif; ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="sec-head mt-40 mb-0">
                <h5 class="wow fadeIn">Mô tả:</h5>
                <?= base64_decode($data->getDescription()) ?>
            </div>
        </div>
    </div>
</section>
<section class="price section-padding-2 pb-70 bg-blc">
    <div class="container">
        <div class="sec-head custom-font text-center">
            <h3 class="wow" data-splitting>Lịch học.</h3>
        </div>
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
                <input type="checkbox" id="2s" name="2s" value="true" <?= strpos($data->getSchedule(), '2s') !== false ? 'checked' : '' ?>>
                <label for="2s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="3s" name="3s" value="true" <?= strpos($data->getSchedule(), '3s') !== false ? 'checked' : '' ?>>
                <label for="3s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="4s" name="4s" value="true" <?= strpos($data->getSchedule(), '4s') !== false ? 'checked' : '' ?>>
                <label for="4s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="5s" name="5s" value="true" <?= strpos($data->getSchedule(), '5s') !== false ? 'checked' : '' ?>>
                <label for="5s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="6s" name="6s" value="true" <?= strpos($data->getSchedule(), '6s') !== false ? 'checked' : '' ?>>
                <label for="6s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="7s" name="7s" value="true" <?= strpos($data->getSchedule(), '7s') !== false ? 'checked' : '' ?>>
                <label for="7s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="8s" name="8s" value="true" <?= strpos($data->getSchedule(), '8s') !== false ? 'checked' : '' ?>>
                <label for="8s">Sáng</label>
            </div>
            <div class="item">
                <input type="checkbox" id="2c" name="2c" value="true" <?= strpos($data->getSchedule(), '2c') !== false ? 'checked' : '' ?>>
                <label for="2c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="3c" name="3c" value="true" <?= strpos($data->getSchedule(), '3c') !== false ? 'checked' : '' ?>>
                <label for="3c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="4c" name="4c" value="true" <?= strpos($data->getSchedule(), '4c') !== false ? 'checked' : '' ?>>
                <label for="4c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="5c" name="5c" value="true" <?= strpos($data->getSchedule(), '5c') !== false ? 'checked' : '' ?>>
                <label for="5c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="6c" name="6c" value="true" <?= strpos($data->getSchedule(), '6c') !== false ? 'checked' : '' ?>>
                <label for="6c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="7c" name="7c" value="true" <?= strpos($data->getSchedule(), '7c') !== false ? 'checked' : '' ?>>
                <label for="7c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="8c" name="8c" value="true" <?= strpos($data->getSchedule(), '8c') !== false ? 'checked' : '' ?>>
                <label for="8c">Chiều</label>
            </div>
            <div class="item">
                <input type="checkbox" id="2t" name="2t" value="true" <?= strpos($data->getSchedule(), '2t') !== false ? 'checked' : '' ?>>
                <label for="2t">Tối</label>
            </div>
            <div class="item">
                <input type="checkbox" id="3t" name="3t" value="true" <?= strpos($data->getSchedule(), '3t') !== false ? 'checked' : '' ?>>
                <label for="3t">Tối</label>
            </div>
            <div class="item">
                <input type="checkbox" id="4t" name="4t" value="true" <?= strpos($data->getSchedule(), '4t') !== false ? 'checked' : '' ?>>
                <label for="4t">Tối</label>
            </div>
            <div class="item">
                <input type="checkbox" id="5t" name="5t" value="true" <?= strpos($data->getSchedule(), '5t') !== false ? 'checked' : '' ?>>
                <label for="5t">Tối</label>
            </div>
            <div class="item">
                <input type="checkbox" id="6t" name="6t" value="true" <?= strpos($data->getSchedule(), '6t') !== false ? 'checked' : '' ?>>
                <label for="6t">Tối</label>
            </div>
            <div class="item">
                <input type="checkbox" id="7t" name="7t" value="true" <?= strpos($data->getSchedule(), '7t') !== false ? 'checked' : '' ?>>
                <label for="7t">Tối</label>
            </div>
            <div class="item">
                <input type="checkbox" id="8t" name="8t" value="true" <?= strpos($data->getSchedule(), '8t') !== false ? 'checked' : '' ?>>
                <label for="8t">Tối</label>
            </div>
        </div>
    </div>
</section>

<?php if ($isJoined['reviewed'] && !$isJoined['checked'] && $data->isClosed()): ?>
    <div class="custom-popup popup-hide">
        <div class="popup-content">
            <div class="content-wrapper">
                <div class="popup-title">
                    <div class="sec-head custom-font text-center mb-30">
                        <h6 class="wow fadeIn" data-wow-delay=".5s"><?= $data->getTitle() ?></h6>
                        <h3 class="wow lts-0 words chars splitting animated" data-splitting="">
                            Đánh giá
                        </h3>
                    </div>
                </div>
                <div class="popup-body">
                    <form method="post" action="admin-ajax" id="rating-form" class="rating-box">
                        <div class="card">
                            <div class="row">
                                <div class="icon">
                                    <svg id="icon-bad" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 103.696 103.695">
                                        <path d="M75.835,72.818c0.656,1.521-0.043,3.287-1.563,3.945s-3.286-0.043-3.944-1.563c-2.894-6.688-9.729-11.013-17.42-11.013
                                    c-7.869,0-14.748,4.32-17.523,11.006c-0.48,1.152-1.596,1.85-2.771,1.852c-0.385,0-0.773-0.074-1.15-0.23
                                    c-1.531-0.637-2.256-2.393-1.619-3.922c3.709-8.933,12.764-14.703,23.064-14.703C62.993,58.189,71.993,63.932,75.835,72.818z
                                     M28.452,36.484c-0.676-1.176-0.27-2.676,0.906-3.351l9.045-5.196c1.176-0.674,2.676-0.268,3.352,0.907
                                    c0.676,1.176,0.27,2.676-0.906,3.351l-9.045,5.194C30.626,38.065,29.126,37.66,28.452,36.484z M42.487,36.59
                                    c1.688,1.689,1.688,4.429,0,6.115c-1.688,1.688-4.426,1.688-6.117-0.002c-1.688-1.688-1.688-4.426,0-6.113
                                    C38.059,34.901,40.797,34.901,42.487,36.59z M57.188,21.907c0.121-1.35,1.312-2.347,2.662-2.226l10.391,0.934
                                    c1.35,0.121,2.348,1.313,2.225,2.664c-0.121,1.351-1.312,2.347-2.664,2.225l-10.389-0.933
                                    C58.063,24.45,57.065,23.256,57.188,21.907z M68.28,36.519c1.688,1.688,1.688,4.426,0,6.113c-1.691,1.69-4.43,1.69-6.117,0.002
                                    c-1.688-1.687-1.688-4.426,0-6.115C63.852,34.829,66.59,34.829,68.28,36.519z M85.465,103.695H18.23
                                    C8.178,103.695,0,95.518,0,85.465V18.23C0,8.177,8.179,0,18.23,0h67.235c10.053,0,18.229,8.178,18.229,18.23v67.235
                                    C103.696,95.518,95.518,103.695,85.465,103.695z M18.23,8.577c-5.322,0-9.652,4.33-9.652,9.652v67.234
                                    c0,5.322,4.33,9.652,9.652,9.652h67.235c5.321,0,9.651-4.33,9.651-9.652V18.23c0-5.322-4.33-9.652-9.651-9.652L18.23,8.577
                                    L18.23,8.577z"/>
                                    </svg>
                                    <svg id="icon-ok" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 103.696 103.695">
                                        <path d="M50.803,71.848c0-2.482,1.305-4.496,2.913-4.496h24.27c1.607,0,2.91,2.014,2.91,4.496c0,2.481-1.303,4.496-2.91,4.496
                                    h-24.27C52.108,76.344,50.803,74.329,50.803,71.848z M30.559,29.488c0-4.113,3.12-7.451,6.965-7.451
                                    c3.846,0,6.966,3.338,6.966,7.451c0,4.117-3.12,7.453-6.966,7.453C33.679,36.941,30.559,33.605,30.559,29.488z M60.145,29.488
                                    c0-4.113,3.123-7.451,6.969-7.451c3.845,0,6.965,3.338,6.965,7.451c0,4.117-3.12,7.453-6.965,7.453
                                    C63.268,36.941,60.145,33.605,60.145,29.488z M85.465,103.695H18.23C8.178,103.695,0,95.518,0,85.465V18.23
                                    C0,8.177,8.179,0,18.23,0h67.235c10.053,0,18.229,8.178,18.229,18.23v67.235C103.696,95.518,95.518,103.695,85.465,103.695z
                                     M18.23,8.577c-5.322,0-9.652,4.33-9.652,9.652v67.234c0,5.322,4.33,9.652,9.652,9.652h67.235c5.321,0,9.651-4.33,9.651-9.652
                                    V18.23c0-5.322-4.33-9.652-9.651-9.652L18.23,8.577L18.23,8.577z"/>
                                    </svg>
                                    <svg version="1.1" id="icon-good" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 103.696 103.696">
                                        <path d="M32.06,37.489c0-3.423,2.777-6.201,6.201-6.201c3.423,0,6.2,2.777,6.2,6.201c0,3.426-2.777,6.203-6.2,6.203
                                    C34.836,43.692,32.06,40.915,32.06,37.489z M60.176,37.489c0-3.423,2.78-6.201,6.203-6.201c3.424,0,6.201,2.777,6.201,6.201
                                    c0,3.426-2.777,6.203-6.201,6.203C62.957,43.692,60.176,40.915,60.176,37.489z M74.836,62.887
                                    c-3.843,8.887-12.843,14.629-22.928,14.629c-10.301,0-19.354-5.771-23.064-14.703c-0.636-1.529,0.089-3.285,1.62-3.92
                                    c0.376-0.156,0.766-0.23,1.15-0.23c1.176,0,2.292,0.695,2.771,1.85c2.777,6.686,9.655,11.004,17.523,11.004
                                    c7.689,0,14.527-4.321,17.421-11.01c0.658-1.521,2.424-2.223,3.944-1.564S75.495,61.366,74.836,62.887z M85.467,103.696H18.23
                                    C8.179,103.696,0,95.518,0,85.467V18.23C0,8.178,8.179,0,18.23,0h67.235c10.053,0,18.23,8.178,18.23,18.23v67.235
                                    C103.697,95.518,95.518,103.696,85.467,103.696z M18.23,8.579c-5.321,0-9.651,4.33-9.651,9.651v67.235
                                    c0,5.321,4.33,9.651,9.651,9.651h67.235c5.321,0,9.651-4.33,9.651-9.651V18.23c0-5.321-4.33-9.651-9.651-9.651H18.23z"/>
                                    </svg>
                                    <svg version="1.1" id="icon-great" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 103.696 103.696">
                                        <path d="M30.557,36.281c-0.185-0.189-0.248-0.465-0.164-0.715s0.301-0.432,0.561-0.472l4.604-0.703l2.065-4.4
                                    c0.116-0.247,0.364-0.404,0.637-0.404s0.521,0.157,0.637,0.404l2.065,4.4l4.604,0.703c0.26,0.04,0.477,0.222,0.561,0.472
                                    s0.021,0.525-0.164,0.714l-3.352,3.437l0.794,4.857c0.043,0.266-0.068,0.533-0.289,0.688c-0.121,0.085-0.263,0.128-0.405,0.128
                                    c-0.117,0-0.234-0.029-0.34-0.087l-4.11-2.271l-4.108,2.271c-0.234,0.131-0.524,0.115-0.745-0.041
                                    c-0.22-0.155-0.332-0.422-0.289-0.688l0.791-4.857L30.557,36.281z M58.675,36.281c-0.185-0.189-0.248-0.465-0.164-0.715
                                    s0.301-0.432,0.562-0.472l4.604-0.703l2.064-4.4c0.115-0.247,0.363-0.404,0.637-0.404s0.521,0.157,0.637,0.404l2.065,4.4
                                    l4.604,0.703c0.26,0.04,0.477,0.222,0.561,0.472s0.021,0.525-0.164,0.714l-3.354,3.438l0.795,4.857
                                    c0.043,0.266-0.068,0.533-0.289,0.688c-0.121,0.085-0.264,0.128-0.405,0.128c-0.117,0-0.233-0.029-0.34-0.087l-4.11-2.271
                                    l-4.107,2.271c-0.234,0.131-0.524,0.115-0.746-0.041c-0.219-0.155-0.331-0.422-0.288-0.688l0.791-4.857L58.675,36.281z
                                     M77.365,59.885c0.265,0.402,0.31,0.912,0.118,1.355c-4.285,9.904-14.318,16.304-25.563,16.304
                                    c-11.486,0-21.58-6.431-25.714-16.382c-0.185-0.443-0.135-0.949,0.131-1.348c0.267-0.397,0.714-0.637,1.192-0.637
                                    c0.001,0,0.001,0,0.002,0l48.638,0.061C76.651,59.238,77.101,59.48,77.365,59.885z M85.466,103.696H18.231
                                    c-10.053,0-18.23-8.179-18.23-18.229V18.23C0.001,8.178,8.179,0,18.231,0h67.235c10.053,0,18.229,8.178,18.229,18.23v67.235
                                    C103.696,95.518,95.519,103.696,85.466,103.696z M18.231,8.579c-5.322,0-9.652,4.33-9.652,9.651v67.235
                                    c0,5.321,4.33,9.651,9.652,9.651h67.235c5.321,0,9.651-4.33,9.651-9.651V18.23c0-5.321-4.33-9.651-9.651-9.651H18.231z"/>
                                    </svg>
                                </div>
                                <div class="range">
                                    <svg width="360" height="15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient id="gradient" x1="1" y1="0" x2="0" y2="0">
                                                <stop id="gradient-grey" offset="0%" stop-color="#EAEEF4"/>
                                                <stop id="gradient-stop" offset="0%" stop-color="#ff5757"/>
                                            </linearGradient>
                                        </defs>
                                        <path d="M0 7.65377C0 6.22069 1.1207 5.01982 2.5 5L177.5 2.5L352.776 0.000723075C356.75 -0.0563631 360 3.27402 360 7.40212C360 11.5262 356.756 14.855 352.786 14.8037L177.5 13L2.5 10.5C1.11931 10.4821 0 9.08826 0 7.65377Z" fill="url(#gradient)"/>
                                    </svg>
                                    <input type="hidden" name="action" value="edit-rating">
                                    <input type="hidden" name="data" value="<?= $data->getID() ?>">
                                    <input type="range" name="rating" min="0" max="100" value="75" class="slider">
                                </div>
                            </div>
                        </div>
                        <label id="rating-error"></label>
                        <div class="btn-wrap mt-40 d-flex justify-content-center">
                            <button class="btn-curve btn-normal dark"><span>Xác nhận</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="backdrop"></div>
    </div>
<?php endif; ?>

<section class="page-header">
    <div class="img-wrapper">
        <div class="map" id="ieatmaps">
            <?= base64_decode($data->getMap()) ?>
        </div>
    </div>
</section>

<?php include_once '_inc/footer.php' ?>

<script>
    $(document).ready(function () {
        var navbar = $(".navbar"),
            logo = $(".navbar .logo > img");
        navbar.addClass("light");
        logo.attr('src', 'img/logo-dark.png');
    })
</script>