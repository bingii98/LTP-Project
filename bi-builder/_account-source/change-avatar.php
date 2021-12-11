<?php
global $user;
?>
<div class="d-inline-flex flex-column align-items-center">
    <div class="avatar-wrapper bg-repeat bg-img container" data-background="img/bg-pattern.jpg">
        <div class="avatar-box">
            <div class="box-img">
                <?php if ($user->getAvatar()) : ?>
                    <img src="uploads/<?= Media::getFileNameByKey($user->getAvatar()) ?>" alt="">
                <?php else: ?>
                    <img src="img/man.svg" alt="">
                <?php endif; ?>
            </div>
            <button class="-change" id="avatar-change">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path d="M492,327c11.046,0,20-8.954,20-20V177c0-44.112-35.888-80-80-80h-30.361c-8.565,0-16.174-5.447-18.934-13.556    l-6.051-17.777C368.374,41.343,345.548,25,319.854,25H192.083c-25.196,0-47.875,15.923-56.432,39.621l-6.923,19.172    C125.875,91.692,118.316,97,109.917,97H80c-44.112,0-80,35.888-80,80v230c0,44.112,35.888,80,80,80h352c44.112,0,80-35.888,80-80    c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20c0,22.056-17.944,40-40,40H80c-22.056,0-40-17.944-40-40V177    c0-22.056,17.944-40,40-40h29.917c25.196,0,47.875-15.923,56.432-39.621l6.923-19.172C176.125,70.308,183.684,65,192.083,65    h127.771c8.565,0,16.173,5.448,18.934,13.556l6.051,17.777c8.279,24.324,31.105,40.667,56.8,40.667H432c22.056,0,40,17.944,40,40    v130C472,318.046,480.954,327,492,327z"/>
                    <path d="M257,157c-68.925,0-125,56.075-125,125s56.075,125,125,125s125-56.075,125-125S325.925,157,257,157z M257,367    c-46.869,0-85-38.131-85-85s38.131-85,85-85s85,38.131,85,85C342,328.869,303.869,367,257,367z"/>
            </svg>
            </button>
        </div>
    </div>
    <button class="btn-curve btn-normal btn-change-avatar mt-50" style="display: none"><span>Xác nhận</span></button>
</div>
<input id="avatar-upload" type="file" accept="image/png, image/jpeg" class="hidden" name="avatar">