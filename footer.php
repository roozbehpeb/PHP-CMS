<!--start jump-to-top-->
<?php
    $option = Model::getoption();
?>
<div class="container-fluid text-center box_jump_top">
    <a href="#" id="back2Top" class="d-block jump_top pt-2 pb-2">
        <i class="material-icons">
            expand_less
        </i>
        <span>برگشت به بالا</span>
    </a>
</div>

<!--start footer-->
<div class="container-fluid pt-2 bg_footer">
    <div class="row">
        <div class="col-md-3 col-6 serv text-center">
            <img src="public/img/serv3.svg" alt="">
            <p>ضمانت اصل بودن کالا</p>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <img src="public/img/serv4.svg" alt="">
            <p>هفت روز ضمانت بازگشت</p>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <img src="public/img/serv2.svg" alt="">
            <p>پرداخت درب منزل</p>
        </div>
        <div class="col-md-3 col-6 serv text-center">
            <img src="public/img/serv5.svg" alt="">
            <p>پشتیبانی همه روزه</p>
        </div>
    </div>
    <div class="container border-bottom"></div>
    <div class="container border-bottom pb-3 pt-3">
        <div class="row">
            <div class="col">
                <div class="box_footer_links">
                    <p><a href="#">راهنمایی خرید از دیجی کالا</a></p>
                    <ul>
                        <li><a href="#">نحوه ثبت سفارش</a></li>
                        <li><a href="#">رویه ارسال سفارش</a></li>
                        <li><a href="#">شیوه های پرداخت</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="box_footer_links">
                    <p><a href="#">خدمات مشتریان</a></p>
                    <ul>
                        <li><a href="#">پاسخ به پرسش های متداول</a></li>
                        <li><a href="#">رویه های بازگردانی کالا</a></li>
                        <li><a href="#">شرایط استفاده</a></li>
                        <li><a href="#">حریم خصوصی</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="box_footer_links">
                    <p><a href="#">با دیجی‌کالا</a></p>
                    <ul>
                        <li><a href="#">فروش در دیجی‌کالا</a></li>
                        <li><a href="#">همکاری با سازمان‌ها</a></li>
                        <li><a href="#">فرصت‌های شغلی</a></li>
                        <li><a href="#">تماس با دیجی‌کالا</a></li>
                        <li><a href="#">درباره دیجی‌کالا</a></li>
                    </ul>
                </div>
            </div>
            <div class="col mt-3 mt-sm-0">
                <div class="footer_form">
                    <p>از تخفیف‌ها و جدیدترین‌های دیجی‌کالا باخبر شوید:
                    </p>
                    <form>
                        <div class="input-group text-right">
                            <input type="text" class="form-control rounded-right bg-white input_search"
                                   placeholder="آدرس ایمیل خود را وارد کنید">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info border-0 custom-input-group-text rounded-start">
                                    <a href="#" class="text-white">ارسال</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="pt-4">دیجی‌کالا را در شبکه‌های اجتماعی دنبال کنید:
                    </p>
                    <div class="social_instagram text-center">
                        <a href="#"><img src="img/instagrams.svg" class="px-1" alt="">اینستاگرام دیجی کالا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <div class="row">
            <div class="footer_box_right ml-auto">
                <p>هفت روز هفته ، ۲۴ ساعت شبانه‌روز پاسخگوی شما هستیم</p>
                <ul class="list-inline">
                    <li class="list-inline-item">شماره تماس :<a href="#"> <?= $option['phone'] ?>  </a></li>
                    <li class="list-inline-item">آدرس ایمیل :<a href="#"><?= $option['email'] ?>
                        </a></li>
                </ul>
            </div>
            <div class="footer_box_left mr-auto">
                <a href="#"><img src="public/img/bazar.png"> </a>
                <a href="#"><img src="public/img/sibapp.png"> </a>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid  py-4">
    <div class="row pr-5 pt-5 offset-1 ">
        <div class="col-lg-6 col-12 footer_digi">
            <p>فروشگاه اینترنتی دیجی کالا , بررسی , انتخاب و خرید آنلاین</p>
            <span>
                دیجی‌کالا به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با پایبندی به سه اصل کلیدی، پرداخت در محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های معتبر جهان، به بزرگ‌ترین فروشگاه اینترنتی ایران تبدیل شود. به محض ورود به دیجی‌کالا با یک سایت پر از کالا رو به رو می‌شوید! هر آنچه که نیاز دارید و به ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
            </span>
        </div>
        <div class="col-md-5 col-12 box_banner  ">
            <div class="row ">
                <img src="public/img/img_footer.JPG" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <div class="row pt-4 text-center">
        <div class="col-md-3 col-6"><a href=""><img src="public/img/img_footer1.svg" alt=""></a></div>
        <div class="col-md-3 col-6"><a href=""><img src="public/img/img_footer2.svg" alt=""></a></div>
        <div class="col-md-3 col-6 pt-2"><a href=""><img src="public/img/img_footer3.svg" alt=""></a></div>
        <div class="col-md-3 col-6"><a href=""><img src="public/img/img_footer4.svg" alt=""></a></div>
    </div>
    <div class="container border_bottom1 pt-4 "></div>
    <div class="container text-center copyRight pt-4">
        <p>استفاده از مطالب فروشگاه اینترنتی دیجی‌کالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این
            سایت متعلق به شرکت نوآوران فن آوازه (فروشگاه آنلاین دیجی‌کالا) می‌باشد.

        </p>
    </div>

    <script>
        $(document).ready(function () {
            $('#back2Top').click(function () {
                $("html,body").animate({scrollTop: 0}, "slow");
                return false;
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#back2Top').click(function () {
                $("html,body").animate({scrollTop: 0}, "slow");
                return false;
            });
        })
    </script>
    <script>
        $(function () {
            $('#toggle-event').change(function () {
                $('#console-event').html('Toggle: ' + $(this).prop('checked'))
            })
        })
    </script>
    <script>

        (function ($) {
            $(window).on("load", function () {

                $.mCustomScrollbar.defaults.scrollButtons.enable = true; //enable scrolling buttons by default
                $.mCustomScrollbar.defaults.axis = "y"; //enable 2 axis scrollbars by default

                $("#content-l").mCustomScrollbar();

                $("#content-d").mCustomScrollbar({theme: "dark"});

                $("#content-l2").mCustomScrollbar({theme: "light-2"});

                $("#content-d2").mCustomScrollbar({theme: "dark-2"});

                $("#content-l3").mCustomScrollbar({theme: "light-3"});

                $("#content-d3").mCustomScrollbar({theme: "dark-3"});

                $("#content-ltk").mCustomScrollbar({theme: "light-thick"});

                $("#content-dtk").mCustomScrollbar({theme: "dark-thick"});

                $("#content-ltn").mCustomScrollbar({theme: "light-thin"});

                $("#content-dtn").mCustomScrollbar({theme: "dark-thin"});

                $("#content-m").mCustomScrollbar({theme: "minimal"});

                $("#content-md").mCustomScrollbar({theme: "minimal-dark"});

                $("#content-i").mCustomScrollbar({theme: "inset"});

                $("#content-id").mCustomScrollbar({theme: "inset-dark"});

                $("#content-i2").mCustomScrollbar({theme: "inset-2"});

                $("#content-i2d").mCustomScrollbar({theme: "inset-2-dark"});

                $("#content-i3").mCustomScrollbar({theme: "inset-3"});

                $("#content-i3d").mCustomScrollbar({theme: "inset-3-dark"});

                $("#content-r").mCustomScrollbar({theme: "rounded"});

                $("#content-rd").mCustomScrollbar({theme: "rounded-dark"});

                $("#content-rds").mCustomScrollbar({theme: "rounded-dots"});

                $("#content-rdsd").mCustomScrollbar({theme: "rounded-dots-dark"});

                $("#content-3d").mCustomScrollbar({theme: "3d"});

                $("#content-3dd").mCustomScrollbar({theme: "3d-dark"});

                $("#content-3dt").mCustomScrollbar({theme: "3d-thick"});

                $("#content-3dtd").mCustomScrollbar({theme: "3d-thick-dark"});

                $(".all-themes-switch a").click(function (e) {
                    e.preventDefault();
                    var $this = $(this),
                        rel = $this.attr("rel"),
                        el = $(".content");
                    switch (rel) {
                        case "toggle-content":
                            el.toggleClass("expanded-content");
                            break;
                    }
                });

            });
        })(jQuery);
    </script>

</footer>

</body>
</html>