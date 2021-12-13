<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Media.php';
$img = Media::getFileByKey($_GET['info']);

if (isset($_GET['del']) && $_GET['del'] == 'true') {
    if (Media::delete($_GET['info'])['error'] == 0) {
        ?>
        <script>
            window.location = window.location.href.split("?")[0] + "?action=media"
        </script>
        <?php
        return;
    }
}
?>
<div class="media-detail row mt-50 justify-content-center">
    <div class="col-md-5 mb-30">
        <div class="box-img">
            <img src="uploads/<?= $img->getFileName() ?>" alt="">
        </div>
    </div>
    <div class="col-md-4">
        <h6 class="main-title"><?= $img->getFileName() ?></h6>
        <div class="title-head mb-10">Tải lên ngày: <?= $img->getUploadedOn() ?></div>
        <div class="title-head mb-10">Loại: <?= pathinfo('uploads/' . $img->getFileName(), PATHINFO_EXTENSION); ?></div>
        <div class="title-head mb-50">Dung lượng: <?= filesize('uploads/' . $img->getFileName()) / 1000 ?> KB</div>
        <a href="?action=media&info=<?= $img->getId() ?>&del=true" class="btn-curve btn-blc"><span>Xóa ngay</span></a>
    </div>
</div>