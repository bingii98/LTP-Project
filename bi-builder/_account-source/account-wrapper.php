<?php
/** CHECK **/
if (!is_user_logged_in()) return; ?>
<div class="row">
    <div class="col-lg-3">
        <div class="sidebar">
            <ul>
                <li><a href="?thong-tin">Thông tin</a></li>
                <li><a href="?anh-dai-dien">Ảnh đại diện</a></li>
                <?php if ((base64_decode($_SESSION["user_role"]) / 1368546448245512) == 2) : ?>
                    <li><a href="?de-nghi-day">Đề nghị đã đăng</a></li>
                    <li><a href="?tham-gia">Các lớp học đã tham gia</a></li>
                <?php else: ?>
                    <li><a href="?lop-hoc">Quản lý lớp học</a></li>
                    <li><a href="?de-nghi-day">Đã đề nghị dạy</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="form">
            <?php if (is_user_logged_in()) {
                /** FOR ADMIN & PROFESSOR */
                if (isset($_GET['anh-dai-dien'])) {
                    include_once 'bi-builder/_account-source/change-avatar.php';
                } elseif (!is_current_user_student()) {
                    if (isset($_GET['lop-hoc'])) {
                        if (isset($_GET['data']) && !empty($_GET['data'])) {
                            include_once 'bi-builder/_account-source/edit-room.php';
                        } else {
                            include_once 'bi-builder/_account-source/show-room.php';
                        }
                    } elseif (isset($_GET['de-nghi-day'])) {
                        include_once 'bi-builder/_account-source/suggest-room.php';
                    } elseif (isset($_GET['them-lop'])) {
                        include_once 'bi-builder/_account-source/add-room.php';
                    } else {
                        include_once 'bi-builder/_account-source/edit-user.php';
                    }
                } else {
                    /** FOR STUDENT */
                    if (isset($_GET['de-nghi-day'])) {
                        if (isset($_GET['data']) && !empty($_GET['data'])) {
                            if (isset($_GET['view']) && !empty($_GET['view'])) {
                                include_once 'bi-builder/_account-source/view-professor.php';
                            } else {
                                include_once 'bi-builder/_account-source/edit-request.php';
                            }
                        } else {
                            include_once 'bi-builder/_account-source/show-request.php';
                        }
                    } elseif (isset($_GET['tham-gia'])) {
                        include_once 'bi-builder/_account-source/joined-room.php';
                    } elseif (isset($_GET['them-yeu-cau'])) {
                        include_once 'bi-builder/_account-source/add-request.php';
                    } else {
                        include_once 'bi-builder/_account-source/edit-user.php';
                    }
                }
            } ?>
        </div>
    </div>
</div>