<?php
require_once './_model/Subjects.php';
?>
<section class="contact section-padding pt-55">
    <div class="container">
        <div class="form">
            <form id="add-subjects" action="admin-ajax">
                <input type="hidden" name="action" value="add-subject">
                <div class="form-box bg-repeat bg-img" data-background="img/bg-pattern.jpg" data-title="Thêm môn học">
                    <div class="form-group ">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên">
                    </div>
                </div>
                <div class="btn-wrap text-center mt-50">
                    <button type="submit" class="btn-curve btn-normal"><span>Xác nhận</span></button>
                </div>
            </form>
        </div>
    </div>
</section>