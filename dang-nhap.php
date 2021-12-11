<?php include_once 'bi-includes/_inc/header.php'; ?>
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
                        <?php if (!is_user_logged_in()) : ?>
                            <?php if (isset($_GET['dang-ki']) && !empty($_GET['dang-ki'])) : ?>
                                <form action="admin-ajax" id="register">
                                    <h4 class="wow" data-splitting>Đăng Ký.</h4>
                                    <p class="wow txt" data-splitting>
                                        Tạo tài khoản
                                    </p>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Họ và tên đệm</label>
                                            <input type="text" name="lastName" class="form-control" placeholder="Họ và tên đệm">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text" name="firstName" class="form-control" placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <div class="editor-wrapper">
                                            <div id="editor-toolbar"></div>
                                            <div id="editor-content" contenteditable></div>
                                            <textarea name="description" hidden></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Ngày sinh</label>
                                            <input type="date" class="form-control" name="birthday" placeholder="Ngày sinh">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Giới tính</label>
                                            <div class="checkbox-wrap">
                                                <div class="item">
                                                    <input type="radio" name="sex" id="male" value="Nam">
                                                    <label for="male">Nam</label>
                                                </div>
                                                <div class="item">
                                                    <input type="radio" name="sex" id="female" value="Nữ">
                                                    <label for="female">Nữ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tỉnh / Thành phố</label>
                                            <select class="form-control" name="provinces" required>
                                                <option value="">Tỉnh / Thành phố</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Huyện / Quận</label>
                                            <select class="form-control" name="district">
                                                <option value="">Quận / Huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-wrap">
                                            <p>
                                                <button type="submit" class="btn-curve btn-blc"><span>Xác nhận</span></button>
                                            </p>
                                            <p>
                                                <a type="submit" class="btn-curve btn-normal" href="?"><span>Đăng nhập</span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" value="register">
                                    <?php if (isset($_GET['page']) && !empty($_GET['page'])) : ?>
                                        <input type="hidden" class="back-page" value="<?= $_GET['page'] ?>">
                                    <?php endif; ?>
                                </form>
                            <?php else: ?>
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
                                            <div class="btn-wrap">
                                                <p>
                                                    <button type="submit" class="btn-curve btn-blc"><span>Đăng nhập</span></button>
                                                </p>
                                                <p>
                                                    <a type="submit" class="btn-curve btn-normal" href="?dang-ki=true"><span>Đăng ký</span></a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <input type="hidden" name="action" value="login">
                                    <?php if (isset($_GET['page']) && !empty($_GET['page'])) : ?>
                                        <input type="hidden" class="back-page" value="<?= $_GET['page'] ?>">
                                    <?php endif; ?>
                                </form>
                            <?php endif; ?>
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

    <?php include_once 'bi-includes/_inc/footer.php' ?>

    <script>
        $('.navbar.navbar-expand-lg').addClass('light')
    </script>
