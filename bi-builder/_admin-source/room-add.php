<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Room.php';
require_once 'bi-includes/_model/Subjects.php';
$subjectss = Subjects::getAll();
?>
<section class="contact section-padding pt-55">
    <div class="container">
        <div class="form">
            <form id="add-room" action="admin-ajax" method="post">
                <input type="hidden" name="action" value="add-room">
                <input type="hidden" name="admin" value="true">
                <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Thông tin chung">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Môn học</label>
                            <select class="chosen-select" name="subject_id" data-placeholder="Begin typing a name to filter...">
                                <?php foreach ($subjectss as $key => $subjects) : ?>
                                    <option value="<?= $subjects->getID() ?>"><?= $subjects->getName() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Trạng thái</label>
                            <div class="checkbox-wrap">
                                <div class="item">
                                    <input type="radio" name="status" id="waiting" value="1">
                                    <label for="waiting">Đang chờ</label>
                                </div>
                                <div class="item">
                                    <input type="radio" name="status" id="closed" value="0">
                                    <label for="closed">Đã đóng</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Loại</label>
                            <div class="checkbox-wrap">
                                <div class="item">
                                    <input type="radio" name="type" id="online" value="1">
                                    <label for="online">Online</label>
                                </div>
                                <div class="item">
                                    <input type="radio" name="type" id="offline" value="0">
                                    <label for="offline">Offline</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="time">Số buổi/tuần</label>
                            <input type="number" max="7" min="1" class="form-control" name="time">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time">Số giờ/buổi</label>
                            <input type="number" max="5" min="1" class="form-control" name="hours">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time">Giới tính gia sư</label>
                            <div class="checkbox-wrap">
                                <div class="item">
                                    <input type="radio" name="sex" id="male" value="0">
                                    <label for="male">Nam</label>
                                </div>
                                <div class="item">
                                    <input type="radio" name="sex" id="female" value="1">
                                    <label for="female">Nữ</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <div class="editor-wrapper">
                            <div id="editor-toolbar"></div>
                            <div id="editor-content" contenteditable></div>
                            <textarea name="description" hidden></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phí nhận lớp</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label>Lịch học</label>
                        <div class="calendar-week">
                            <div class="item editable">
                                <label>Thứ 2</label>
                            </div>
                            <div class="item editable">
                                <label>Thứ 3</label>
                            </div>
                            <div class="item editable">
                                <label>Thứ 4</label>
                            </div>
                            <div class="item editable">
                                <label>Thứ 5</label>
                            </div>
                            <div class="item editable">
                                <label>Thứ 6</label>
                            </div>
                            <div class="item editable">
                                <label>Thứ 7</label>
                            </div>
                            <div class="item editable">
                                <label>Chủ nhật</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="2s" name="2s" value="true">
                                <label for="2s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="3s" name="3s" value="true">
                                <label for="3s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="4s" name="4s" value="true">
                                <label for="4s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="5s" name="5s" value="true">
                                <label for="5s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="6s" name="6s" value="true">
                                <label for="6s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="7s" name="7s" value="true">
                                <label for="7s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="8s" name="8s" value="true">
                                <label for="8s">Sáng</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="2c" name="2c" value="true">
                                <label for="2c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="3c" name="3c" value="true">
                                <label for="3c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="4c" name="4c" value="true">
                                <label for="4c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="5c" name="5c" value="true">
                                <label for="5c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="6c" name="6c" value="true">
                                <label for="6c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="7c" name="7c" value="true">
                                <label for="7c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="8c" name="8c" value="true">
                                <label for="8c">Chiều</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="2t" name="2t" value="true">
                                <label for="2t">Tối</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="3t" name="3t" value="true">
                                <label for="3t">Tối</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="4t" name="4t" value="true">
                                <label for="4t">Tối</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="5t" name="5t" value="true">
                                <label for="5t">Tối</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="6t" name="6t" value="true">
                                <label for="6t">Tối</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="7t" name="7t" value="true">
                                <label for="7t">Tối</label>
                            </div>
                            <div class="item editable">
                                <input type="checkbox" id="8t" name="8t" value="true">
                                <label for="8t">Tối</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="time">Địa chỉ</label>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Tỉnh / Thành phố</label>
                                    <select name="provinces" required>
                                        <option value="">Tỉnh / Thành phố</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Huyện / Quận</label>
                                    <select name="district">
                                        <option value="">Quận / Huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Tên Phường/ Xã</label>
                                    <input class="form-control border-dark" name="wards" value=""/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Tên Đường/ Số nhà</label>
                                    <input class="form-control border-dark" name="street" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time">Map iframe</label>
                            <textarea class="form-control border-dark" name="map"></textarea>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap text-center mt-50">
                    <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
                </div>
            </form>
        </div>
    </div>
</section>