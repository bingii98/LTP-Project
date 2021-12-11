<?php
global $site_title;
$site_title = 'Trang không hợp lệ | Smart-edu';
include_once 'bi-includes/_inc/header.php' ?>
    <section id="services" class="services section-padding bg-repeat bg-img mt-100 mb-100" data-background="img/bg-pattern.jpg">
        <div class="container">
            <div class="sec-head custom-font text-center">
                <h3 class="wow" data-splitting>Không tìm thấy trang</h3>
            </div>
            <div class="item wow fadeInUp md-mb50" data-wow-delay=".3s">
                <div class="caption">
                    <h6 class="custom-font d-flex justify-content-center">
                        <span class="letr bg-img custom-font" data-background="img/s0.jpg">4</span>
                        <span class="letr bg-img custom-font" data-background="img/s0.jpg">0</span>
                        <span class="letr bg-img custom-font" data-background="img/s0.jpg">4</span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
<?php include_once 'bi-includes/_inc/footer.php' ?>

<script>
    $(document).ready(function () {
        var navbar = $(".navbar"),
            logo = $(".navbar .logo > img");
        navbar.addClass("light");
        logo.attr('src', 'img/logo-dark.png');
    })
</script>