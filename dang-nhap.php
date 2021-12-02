<?php include_once '_inc/header.php'; ?>
<!-- ==================== Start wrapper ==================== -->
<div class="wrapper">
    <!-- ==================== Start Minimal-Area ==================== -->
    <section class="min-area bg-repeat bg-img" data-background="img/bg-pattern.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img">
                        <img class="thumparallax-down" src="img/min-area.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 valign">
                    <div class="content">
                        <?php if (!isset($_SESSION['2748_loggedin'])) : ?>
                            <form action="admin-ajax" id="login">
                                <h4 class="wow" data-splitting>Đăng Nhập.</h4>
                                <p class="wow txt" data-splitting>
                                    Xây dựng hệ sinh thái của riêng bạn.
                                </p>
                                <ul class="feat">
                                    <li class="wow fadeInUp" data-wow-delay=".2s">
                                        <h6>Tên tài khoản</h6>
                                        <p>
                                            <label>
                                                <input type="text" class="form-control" name="username"/>
                                            </label>
                                        </p>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay=".4s">
                                        <h6>Mật khẩu</h6>
                                        <p>
                                            <label>
                                                <input type="password" class="form-control" name="password">
                                            </label>
                                        </p>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay=".6s">
                                        <p>
                                            <button type="submit" class="btn-curve btn-normal"><span>Login</span></button>
                                        </p>
                                    </li>
                                </ul>
                                <input type="hidden" name="action" value="login">
                                <?php if (isset($_GET['page']) && !empty($_GET['page'])) : ?>
                                    <input type="hidden" class="back-page" value="<?= $_GET['page'] ?>">
                                <?php endif; ?>
                            </form>
                        <?php else: ?>
                            <h4 class="wow" data-splitting>Welcome <a href="<?= Config::HOME_PATH ?>/chinh-sua-tai-khoan"><?= $_SESSION["user_display_name"] ?></a>.</h4>
                            <p class="wow txt" data-splitting>
                                <a href="<?= Config::HOME_PATH ?>/dang-xuat">Đăng xuất.</a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== End Minimal-Area ==================== -->

    <?php include_once '_inc/footer.php' ?>

    <script>
        $('.navbar.navbar-expand-lg').addClass('light')
    </script>
