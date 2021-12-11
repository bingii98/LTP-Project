<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Subjects.php';
$subject = Subjects::getByKey($_GET['subject'], 'id');
?>
<section class="contact section-padding pt-55">
    <div class="container">
        <div class="form">
            <form id="edit-subject" action="admin-ajax">
                <input type="hidden" name="action" value="edit-subject">
                <input type="hidden" name="subject_id" value="<?= $subject->getID() ?>">
                <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Thêm môn học">
                    <div class="form-group ">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" value="<?= $subject->getName() ?>" placeholder="Tên">
                    </div>
                </div>
                <div class="btn-wrap text-center mt-50">
                    <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
                </div>
            </form>
        </div>
    </div>
</section>