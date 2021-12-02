<?php
$subjectss = Subjects::getAll();

$data = Room::getByKey($_GET['data']);

$isEdit = isset($_GET['edit']) ? true : false;
?>
<section class="contact section-padding pt-0">
    <div class="container">
        <div class="form">
            <input type="hidden" class="back-page" value="<?= Config::HOME_PATH ?>/tai-khoan?lop-hoc&data=<?= $data->getID() ?>">
            <form id="edit-user-room" action="admin-ajax" method="post">
                <input type="hidden" name="action" value="edit-user-room">
                <input type="hidden" name="data" value="<?= $data->getID() ?>">
                <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Lớp học">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="title" class="form-control<?= $isEdit ? '' : ' view'; ?>" value="<?= $data->getTitle() ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Môn học</label>
                            <?php if ($isEdit) : ?>
                                <select class="chosen-select" name="subject_id" data-placeholder="Begin typing a name to filter...">
                                    <?php foreach ($subjectss as $key => $subjects) : ?>
                                        <option value="<?= $subjects->getID() ?>" <?= strpos($data->getSubject(), $subjects->getID() . ',') !== false ? 'selected' : '' ?>><?= $subjects->getName() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                                <?php
                                $subjects_ids = [];
                                foreach ($subjectss as $subjects) {
                                    $subjects_ids[$subjects->getID()] = $subjects->getName();
                                }
                                $subs = explode(",", $data->getSubject());
                                $term = [];
                                foreach ($subs as $sub) :
                                    if (isset($subjects_ids[$sub])) :
                                        $term[] = $subjects_ids[$sub];
                                    endif;
                                endforeach;
                                echo join(', ', $term);
                                ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Trạng thái</label>
                            <div class="checkbox-wrap">
                                <?php if (!$isEdit) : ?>
                                    <?= $data->getStatus() ?>
                                <?php else: ?>
                                    <div class="item">
                                        <input type="radio" name="status" id="waiting" value="1" <?= $data->getStatus() == 'Đang chờ' ? 'checked' : '' ?>>
                                        <label for="waiting">Đang chờ</label>
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="status" id="closed" value="0" <?= $data->getStatus() == 'Đã đóng' ? 'checked' : '' ?>>
                                        <label for="closed">Đã đóng</label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Loại</label>
                            <?php if (!$isEdit) : ?>
                                <?= $data->getType() ?>
                            <?php else: ?>
                                <div class="checkbox-wrap">
                                    <div class="item">
                                        <input type="radio" name="type" id="online" value="1" <?= $data->getType() == 1 ? 'checked' : '' ?>>
                                        <label for="online">Online</label>
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="type" id="offline" value="0" <?= $data->getType() == 0 ? 'checked' : '' ?>>
                                        <label for="offline">Offline</label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="time">Số buổi/tuần</label>
                            <input type="number" max="7" min="1" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="time" value="<?= $data->getTime() ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time">Số giờ/buổi</label>
                            <input type="number" max="5" min="1" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="hours" value="<?= $data->getHours() ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time">Giới tính gia sư</label>
                            <?php if (!$isEdit) : ?>
                                <?= $data->getSex() ?>
                            <?php else: ?>
                                <div class="checkbox-wrap">
                                    <div class="item">
                                        <input type="radio" name="sex" id="male" value="Nam" <?= $data->getType() == 'Nam' ? 'checked' : '' ?>>
                                        <label for="male">Nam</label>
                                    </div>
                                    <div class="item">
                                        <input type="radio" name="sex" id="female" value="Nữ" <?= $data->getType() == 'Nữ' ? 'checked' : '' ?>>
                                        <label for="female">Nữ</label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <?php if ($isEdit) : ?>
                            <div class="editor-wrapper">
                                <div id="editor-toolbar"></div>
                                <div id="editor-content" contenteditable>
                                    <?= base64_decode($data->getDescription()) ?>
                                </div>
                                <textarea name="description" hidden>
                                            <?= base64_decode($data->getDescription()) ?>
                                        </textarea>
                            </div>
                        <?php else: ?>
                            <div class="txt">
                                <?= base64_decode($data->getDescription()) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label>Phí nhận lớp</label>
                        <input type="number" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="price" value="<?= $data->getPrice() ?>">
                    </div>
                    <div class="form-group">
                        <label>Lịch học</label>
                        <div class="calendar-week">
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Thứ 2</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Thứ 3</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Thứ 4</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Thứ 5</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Thứ 6</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Thứ 7</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <label>Chủ nhật</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="2s" name="2s" value="true" <?= strpos($data->getSchedule(), '2s') !== false ? 'checked' : '' ?>>
                                <label for="2s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="3s" name="3s" value="true" <?= strpos($data->getSchedule(), '3s') !== false ? 'checked' : '' ?>>
                                <label for="3s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="4s" name="4s" value="true" <?= strpos($data->getSchedule(), '4s') !== false ? 'checked' : '' ?>>
                                <label for="4s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="5s" name="5s" value="true" <?= strpos($data->getSchedule(), '5s') !== false ? 'checked' : '' ?>>
                                <label for="5s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="6s" name="6s" value="true" <?= strpos($data->getSchedule(), '6s') !== false ? 'checked' : '' ?>>
                                <label for="6s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="7s" name="7s" value="true" <?= strpos($data->getSchedule(), '7s') !== false ? 'checked' : '' ?>>
                                <label for="7s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="8s" name="8s" value="true" <?= strpos($data->getSchedule(), '8s') !== false ? 'checked' : '' ?>>
                                <label for="8s">Sáng</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="2c" name="2c" value="true" <?= strpos($data->getSchedule(), '2c') !== false ? 'checked' : '' ?>>
                                <label for="2c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="3c" name="3c" value="true" <?= strpos($data->getSchedule(), '3c') !== false ? 'checked' : '' ?>>
                                <label for="3c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="4c" name="4c" value="true" <?= strpos($data->getSchedule(), '4c') !== false ? 'checked' : '' ?>>
                                <label for="4c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="5c" name="5c" value="true" <?= strpos($data->getSchedule(), '5c') !== false ? 'checked' : '' ?>>
                                <label for="5c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="6c" name="6c" value="true" <?= strpos($data->getSchedule(), '6c') !== false ? 'checked' : '' ?>>
                                <label for="6c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="7c" name="7c" value="true" <?= strpos($data->getSchedule(), '7c') !== false ? 'checked' : '' ?>>
                                <label for="7c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="8c" name="8c" value="true" <?= strpos($data->getSchedule(), '8c') !== false ? 'checked' : '' ?>>
                                <label for="8c">Chiều</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="2t" name="2t" value="true" <?= strpos($data->getSchedule(), '2t') !== false ? 'checked' : '' ?>>
                                <label for="2t">Tối</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="3t" name="3t" value="true" <?= strpos($data->getSchedule(), '3t') !== false ? 'checked' : '' ?>>
                                <label for="3t">Tối</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="4t" name="4t" value="true" <?= strpos($data->getSchedule(), '4t') !== false ? 'checked' : '' ?>>
                                <label for="4t">Tối</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="5t" name="5t" value="true" <?= strpos($data->getSchedule(), '5t') !== false ? 'checked' : '' ?>>
                                <label for="5t">Tối</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="6t" name="6t" value="true" <?= strpos($data->getSchedule(), '6t') !== false ? 'checked' : '' ?>>
                                <label for="6t">Tối</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="7t" name="7t" value="true" <?= strpos($data->getSchedule(), '7t') !== false ? 'checked' : '' ?>>
                                <label for="7t">Tối</label>
                            </div>
                            <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                <input type="checkbox" id="8t" name="8t" value="true" <?= strpos($data->getSchedule(), '8t') !== false ? 'checked' : '' ?>>
                                <label for="8t">Tối</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="time">Địa chỉ</label>
                            <textarea class="form-control border-dark<?= $isEdit ? '' : ' view'; ?>" name="address"><?= $data->getAddress() ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time">Map iframe</label>
                            <textarea class="form-control border-dark<?= $isEdit ? '' : ' view'; ?>" name="map">
                                <?= base64_decode($data->getMap()) ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap text-center mt-50">
                    <?php if ($isEdit) : ?>
                        <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
                    <?php else: ?>
                        <a href="?lop-hoc&data=<?= $data->getID() ?>&edit=true" class="btn-curve btn-normal"><span>Chỉnh sửa</span></a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</section>
