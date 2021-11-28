<?php
require_once './_model/User.php';
require_once './_model/Role.php';
require_once './_model/Subjects.php';
require_once './_model/Address.php';
$subjectss = Subjects::getAll();

/** USER INFO */
$user = User::getByKey('username', $_GET['user']);

$isEdit = isset($_GET['edit']) ? true : false;
?>
<section class="contact section-padding pt-55">
    <div class="container">
        <div class="form">
            <?php if ($user) : ?>
                <form <?= $isEdit ? 'id="edit-account" action="admin-ajax"' : '' ?>>
                    <input type="hidden" name="action" value="edit-account">
                    <input type="hidden" name="userID" value="<?= $user->getUserID() ?>">
                    <input type="hidden" name="admin" value="true">
                    <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Thông tin chung">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <p><?= $user->getUsername() ?></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <div class="checkbox-wrap">
                                    <?php if ($isEdit) : ?>
                                        <div class="item">
                                            <input type="radio" name="role" id="role_admin" value="0" <?= $user->getRole() == 0 ? 'checked' : '' ?>>
                                            <label for="role_admin">Admin</label>
                                        </div>
                                        <div class="item">
                                            <input type="radio" name="role" id="role_processor" value="1" <?= $user->getRole() == 1 ? 'checked' : '' ?>>
                                            <label for="role_processor">Gia sư</label>
                                        </div>
                                        <div class="item">
                                            <input type="radio" name="role" id="role_student" value="2" <?= $user->getRole() == 2 ? 'checked' : '' ?>>
                                            <label for="role_student">Học viên</label>
                                        </div>
                                    <?php else: ?>
                                        <?= Role::getRole($user->getRole()) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Họ và tên đệm</label>
                                <input type="text" name="lastName" class="form-control<?= $isEdit ? '' : ' view'; ?>" placeholder="Họ và tên đệm" value="<?= $user->getLastName() ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tên</label>
                                <input type="text" name="firstName" class="form-control<?= $isEdit ? '' : ' view'; ?>" placeholder="Tên" value="<?= $user->getFirstName() ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <?php if ($isEdit) : ?>
                                <div class="editor-wrapper">
                                    <div id="editor-toolbar"></div>
                                    <div id="editor-content" contenteditable>
                                        <?= base64_decode($user->getDescription()) ?>
                                    </div>
                                    <textarea name="description" hidden>
                                            <?= base64_decode($user->getDescription()) ?>
                                        </textarea>
                                </div>
                            <?php else: ?>
                                <div class="txt">
                                    <?= base64_decode($user->getDescription()) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Ngày sinh</label>
                                <input type="date" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="birthday" placeholder="Ngày sinh" value="<?= $user->getBirthday() ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Giới tính</label>
                                <div class="checkbox-wrap">
                                    <?php if ($isEdit) : ?>
                                        <div class="item">
                                            <input type="radio" name="sex" id="male" value="Nam" <?= $user->getSex() == 'Nam' ? 'checked' : '' ?>>
                                            <label for="male">Nam</label>
                                        </div>
                                        <div class="item">
                                            <input type="radio" name="sex" id="female" value="Nữ" <?= $user->getSex() != 'Nam' ? 'checked' : '' ?>>
                                            <label for="female">Nữ</label>
                                        </div>
                                    <?php else: ?>
                                        <?= $user->getSex() ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="email" placeholder="Email" value="<?= $user->getEmail() ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="phone" placeholder="Phone" value="<?= $user->getPhone() ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tỉnh / Thành phố</label>
                                <select class="<?= $isEdit ? '' : 'view'; ?>" name="provinces" required>
                                    <option value="">Tỉnh / Thành phố</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Huyện / Quận</label>
                                <select class="<?= $isEdit ? '' : 'view'; ?>" name="district">
                                    <option value="">Quận / Huyện</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Chuyên môn">
                        <div class="form-group">
                            <label>Môn học</label>
                            <?php if ($isEdit) : ?>
                                <select class="chosen-select<?= $isEdit ? '' : ' view'; ?>" name="subjects[]" data-placeholder="Begin typing a name to filter..." multiple>
                                    <?php foreach ($subjectss as $key => $subjects) : ?>
                                        <option value="<?= $subjects->getID() ?>" <?= strpos($user->getSubjectsIds(), $subjects->getID() . ',') !== false ? 'selected' : '' ?>><?= $subjects->getName() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                                <?php
                                $subjects_ids = [];
                                foreach ($subjectss as $subjects) {
                                    $subjects_ids[$subjects->getID()] = $subjects->getName();
                                }
                                $subs = explode(",", $user->getSubjectsIds());
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Thời gian kinh nghiệm</label>
                                <?php if (!$isEdit) : ?>
                                    <?= $user->getExperience() ?> <?= $user->getExperienceType() ?>
                                <?php else: ?>
                                    <input type="text" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="experience" placeholder="Thời gian kinh nghiệm" value="<?= $user->getExperience() ?>">
                                <?php endif; ?>
                            </div>
                            <?php if ($isEdit) : ?>
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
                            <?php endif; ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Bằng cấp</label>
                                <input type="text" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="degree" placeholder="Bằng cấp" value="<?= $user->getDegree() ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tên trường/ tổ chức cấp</label>
                                <input type="text" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="graduation_school" placeholder="Tên trường/ tổ chức cấp" value="<?= $user->getGraduationSchool() ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Chuyên ngành</label>
                                <input type="text" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="specialized" placeholder="Chuyên ngành" value="<?= $user->getSpecialized() ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Giá dịch vụ (tính theo giờ)</label>
                            <input type="number" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="price" value="<?= $user->getPrice() ?>">
                        </div>
                        <div class="form-group">
                            <label>Giờ trống</label>
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
                                    <input type="checkbox" id="2s" name="2s" value="true" <?= strpos($user->getSchedule(), '2s') !== false ? 'checked' : '' ?>>
                                    <label for="2s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="3s" name="3s" value="true" <?= strpos($user->getSchedule(), '3s') !== false ? 'checked' : '' ?>>
                                    <label for="3s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="4s" name="4s" value="true" <?= strpos($user->getSchedule(), '4s') !== false ? 'checked' : '' ?>>
                                    <label for="4s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="5s" name="5s" value="true" <?= strpos($user->getSchedule(), '5s') !== false ? 'checked' : '' ?>>
                                    <label for="5s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="6s" name="6s" value="true" <?= strpos($user->getSchedule(), '6s') !== false ? 'checked' : '' ?>>
                                    <label for="6s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="7s" name="7s" value="true" <?= strpos($user->getSchedule(), '7s') !== false ? 'checked' : '' ?>>
                                    <label for="7s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="8s" name="8s" value="true" <?= strpos($user->getSchedule(), '8s') !== false ? 'checked' : '' ?>>
                                    <label for="8s">Sáng</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="2c" name="2c" value="true" <?= strpos($user->getSchedule(), '2c') !== false ? 'checked' : '' ?>>
                                    <label for="2c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="3c" name="3c" value="true" <?= strpos($user->getSchedule(), '3c') !== false ? 'checked' : '' ?>>
                                    <label for="3c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="4c" name="4c" value="true" <?= strpos($user->getSchedule(), '4c') !== false ? 'checked' : '' ?>>
                                    <label for="4c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="5c" name="5c" value="true" <?= strpos($user->getSchedule(), '5c') !== false ? 'checked' : '' ?>>
                                    <label for="5c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="6c" name="6c" value="true" <?= strpos($user->getSchedule(), '6c') !== false ? 'checked' : '' ?>>
                                    <label for="6c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="7c" name="7c" value="true" <?= strpos($user->getSchedule(), '7c') !== false ? 'checked' : '' ?>>
                                    <label for="7c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="8c" name="8c" value="true" <?= strpos($user->getSchedule(), '8c') !== false ? 'checked' : '' ?>>
                                    <label for="8c">Chiều</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="2t" name="2t" value="true" <?= strpos($user->getSchedule(), '2t') !== false ? 'checked' : '' ?>>
                                    <label for="2t">Tối</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="3t" name="3t" value="true" <?= strpos($user->getSchedule(), '3t') !== false ? 'checked' : '' ?>>
                                    <label for="3t">Tối</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="4t" name="4t" value="true" <?= strpos($user->getSchedule(), '4t') !== false ? 'checked' : '' ?>>
                                    <label for="4t">Tối</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="5t" name="5t" value="true" <?= strpos($user->getSchedule(), '5t') !== false ? 'checked' : '' ?>>
                                    <label for="5t">Tối</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="6t" name="6t" value="true" <?= strpos($user->getSchedule(), '6t') !== false ? 'checked' : '' ?>>
                                    <label for="6t">Tối</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="7t" name="7t" value="true" <?= strpos($user->getSchedule(), '7t') !== false ? 'checked' : '' ?>>
                                    <label for="7t">Tối</label>
                                </div>
                                <div class="item<?= !$isEdit ? '' : ' editable'; ?>">
                                    <input type="checkbox" id="8t" name="8t" value="true" <?= strpos($user->getSchedule(), '8t') !== false ? 'checked' : '' ?>>
                                    <label for="8t">Tối</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap text-center mt-50">
                        <?php if ($isEdit) : ?>
                            <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
                        <?php else: ?>
                            <a href="?action=user-edit&user=<?= $user->getUsername() ?>&edit=true" class="btn-curve btn-normal"><span>Chỉnh sửa</span></a>
                        <?php endif; ?>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>