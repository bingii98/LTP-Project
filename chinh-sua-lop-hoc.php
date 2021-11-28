<?php
require_once './_model/User.php';
require_once './_model/Subjects.php';
require_once './_model/Address.php';
$subjectss = Subjects::getAll();

/** USER INFO */
$user = User::getByID((base64_decode($_SESSION["user_id"]) / 1368546448245512), null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= Parameter::getValueByKey('home_path') ?>/assets/css/theme.min.css">
</head>
<body>
<section class="professor-grid">
    <div class="container">
        <form id="edit-account" action="admin-ajax">
            <input type="hidden" name="action" value="edit-account">
            <div class="form-box" data-title="Thông tin chung">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Họ và tên đệm</label>
                        <div class="checkbox-wrap">
                            <div class="item">
                                <input type="radio" name="sex" id="male" value="Nam" <?= $user->getSex() == 'Nam' ? 'checked' : '' ?>>
                                <label for="male">Đang tìm </label>
                            </div>
                            <div class="item">
                                <input type="radio" name="sex" id="female" value="Nữ" <?= $user->getSex() != 'Nam' ? 'checked' : '' ?>>
                                <label for="female">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tên</label>
                        <input type="text" name="firstName" class="form-control" placeholder="Tên" value="<?= $user->getFirstName() ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <div class="editor-wrapper">
                        <div id="editor-toolbar"></div>
                        <div id="editor-content" contenteditable>
                            <?= $user->getDescription() ?>
                        </div>
                        <textarea name="description" hidden>
                            <?= $user->getDescription() ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Ngày sinh</label>
                        <input type="date" class="form-control" name="birthday" placeholder="Ngày sinh" value="<?= $user->getBirthday() ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Giới tính</label>
                        <div class="checkbox-wrap">
                            <div class="item">
                                <input type="radio" name="sex" id="male" value="Nam" <?= $user->getSex() == 'Nam' ? 'checked' : '' ?>>
                                <label for="male">Nam</label>
                            </div>
                            <div class="item">
                                <input type="radio" name="sex" id="female" value="Nữ" <?= $user->getSex() != 'Nam' ? 'checked' : '' ?>>
                                <label for="female">Nữ</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $user->getEmail() ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?= $user->getPhone() ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tỉnh / Thành phố</label>
                        <select name="provinces" required>
                            <option value="">Tỉnh / Thành phố</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Huyện / Quận</label>
                        <select name="district">
                            <option value="">Quận / Huyện</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-box" data-title="Chuyên môn">
                <div class="form-group">
                    <label>Môn học</label>
                    <select class="chosen-select" name="subjects[]" data-placeholder="Begin typing a name to filter..." multiple>
                        <?php foreach ($subjectss as $key => $subjects) : ?>
                            <option value="<?= $subjects->getID() ?>" <?= strpos($user->getSubjectsIds(), $subjects->getID() . ',') !== false ? 'selected' : '' ?>><?= $subjects->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Thời gian kinh nghiệm</label>
                        <input type="text" class="form-control" name="experience" placeholder="Thời gian kinh nghiệm" value="<?= $user->getExperience() ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Đơn vị</label>
                        <div class="checkbox-wrap">
                            <div class="item">
                                <input type="radio" name="experience_type" id="month" value="Tháng" <?= $user->getExperienceType() == 'Tháng' ? 'checked' : '' ?>>
                                <label for="month">Tháng</label>
                            </div>
                            <div class="item">
                                <input type="radio" name="experience_type" id="year" value="Năm"<?= $user->getExperienceType() == 'Năm' ? 'checked' : '' ?>>
                                <label for="year">Năm</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Bằng cấp</label>
                        <input type="text" class="form-control" name="degree" placeholder="Bằng cấp" value="<?= $user->getDegree() ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tên trường/ tổ chức cấp</label>
                        <input type="text" class="form-control" name="graduation_school" placeholder="Tên trường/ tổ chức cấp" value="<?= $user->getGraduationSchool() ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Chuyên ngành</label>
                        <input type="text" class="form-control" name="specialized" placeholder="Chuyên ngành" value="<?= $user->getSpecialized() ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Giá dịch vụ (tính theo giờ)</label>
                    <input type="number" class="form-control" name="price" value="<?= $user->getPrice() ?>">
                </div>
            </div>
            <div class="btn-wrap">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</section>
<script src="<?= Parameter::getValueByKey('home_path') ?>/assets/js/jquery.js"></script>
<script src="<?= Parameter::getValueByKey('home_path') ?>/assets/js/districts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= Parameter::getValueByKey('home_path') ?>/assets/js/theme.min.js"></script>
</body>
</html>