<?php
require_once './bi-includes/_inc/Config.php';
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $currentUrl = "https://";
else
    $currentUrl = "http://";
$currentUrl .= $_SERVER['HTTP_HOST'];
$currentUrl .= $_SERVER['REQUEST_URI'];
?>
<span>Vui lòng <a class="note link" href="<?= Config::HOME_PATH ?>/dang-nhap?page=<?= urlencode($currentUrl) ?>">đăng nhập</a> để đăng yêu cầu!</span>