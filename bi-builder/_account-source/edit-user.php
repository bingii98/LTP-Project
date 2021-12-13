<form <?= $isEdit ? 'id="edit-account" action="admin-ajax"' : '' ?>>
    <input type="hidden" name="action" value="edit-account">
    <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Thông tin chung">
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
    <?php if ((base64_decode($_SESSION["user_role"]) / 1368546448245512) != 2) : ?>
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
                <input type="text" data-type="currency" class="form-control<?= $isEdit ? '' : ' view'; ?>" name="price" value="<?= $user->getPrice() ?>">
            </div>
        </div>
    <?php endif; ?>
    <div class="btn-wrap text-center mt-50">
        <?php if ($isEdit) : ?>
            <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
        <?php else: ?>
            <a href="?edit=true" class="btn-curve btn-normal"><span>Chỉnh sửa</span></a>
        <?php endif; ?>
    </div>
</form>