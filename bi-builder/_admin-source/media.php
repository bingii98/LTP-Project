<?php if (!is_current_user_admin()) return;

require_once 'bi-includes/_model/Media.php';
$images = Media::getAll(); ?>
<div class="card shadow mb-4">
     <div class="media-grid">
         <?php foreach ($images as $img) : ?>
             <div class="item">
                 <a class="box-img" href="?action=media&info=<?= $img->getId() ?>">
                     <img src="uploads/<?= $img->getFileName() ?>" alt="">
                 </a>
             </div>
         <?php endforeach; ?>
     </div>
</div>