<form <?= $isEdit ? 'id="become-professor" action="admin-ajax"' : '' ?>>
    <input type="hidden" name="action" value="become-professor">
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
            <?php if ($user->getPendingProfessor() != 1) : ?>
                <a href="?edit=true" class="btn-curve btn-normal"><span>Đăng ký</span></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</form>