<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>


    <base src="<?= URL ?>">
    <base href="<?= URL ?>">


    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دیجی کالا توسط بوت استرپ 4</title>


    <!--bootstrap css-->
    <!--<link rel="stylesheet" href="public/css/material-icons.css">-->
    <link rel="stylesheet" href="public/css/jquery-ui.min.css">
    <link rel="stylesheet" href="public/FontAwesome.Pro.5.14.0.Web/css/all.css">
    <link rel="stylesheet" href="public/fonts/Roboto-Bold.ttf">
    <!--<link rel="stylesheet" href="public/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="public/css/bootstrap.rtl.min.css">

    <!-- <link rel="stylesheet" href="public/css/bootstrap-reboot.min.css">-->
    <link rel="stylesheet" href="public/css/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.rtl.min.css.map">
    <link rel="stylesheet" href="public/css/bootstrap-reboot.rtl.min.css.map">
    <link rel="stylesheet" href="public/css/flipTimer.css">
    <link rel="stylesheet" href="public/css/font.css">
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="public/js/scroll/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="public/css/jquery.countdown.css">
    <link rel="stylesheet" href="public/css/jrange-master-slider/jquery.range.css">
    <link rel="stylesheet/less" type="text/css" href="public/css/jrange-master-slider/jquery.range.less"/>
    <!--<link rel="stylesheet" href="public/css/jquery-nice-number.css">-->
    <link href="/dist/mds.bs.datetimepicker.style.css" rel="stylesheet"/>
    <link href="/public/js/persian-calender/kamadatepicker.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="public/css/style.css">


    <!--bootstrap js-->
    <script src="https://unpkg.com/@popperjs/core@^2.0.0"></script>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-ui.min.js"></script>
    <script src="public/js/jquery.flipTimer.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/bootstrap.min.js.map"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.elevatezoom.js"></script>
    <script src="public/js/jquery.elevatezoom.js"></script>
    <script src="public/js/scroll/jquery.mCustomScrollbar.js"></script>
    <script src="public/js/scroll/jquery.mousewheel.js"></script>
    <script src="public/js/3d/jsc3d.js"></script>
    <script src="public/js/3d/jsc3d.touch.js"></script>
    <script src="public/js/3d/jsc3d.webgl.js"></script>
    <script src="public/js/jquery.countdown.min.js"></script>
    <!-- <script src="public/js/popper.min.js"></script>-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="public/js/input-spinner/custom-editors.js"></script>
    <script src="public/js/input-spinner/bootstrap-input-spinner.js"></script>
    <script src="public/js/jrange-master-slider/jquery.range-min.js"></script>

    <!--<script src="public/js/jquery.nice-number.js"></script>-->
    <script src="public/js/persian-calender/kamadatepicker.holidays.js"></script>
    <script src="public/js/persian-calender/kamadatepicker.min.js"></script>

    <script src="public/js/custom.js"></script>


</head>
<body>

<!--header-->
<div class="container-fluid shadow-sm position-relative">

    <div class="row p-2 ">

        <div class="d-none d-lg-block col-lg-1 ">
            <a href="">
                      <span class="custom-logo">
            </a> </span>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-8">
            <form action="" class="w-50 input-group custom-search ">
                <input type="text" class="form-control rounded-right"
                       placeholder="نام محصول یا برند خود را جستجو کنید ...">
                <div class="input-group-append">
                    <div class="input-group-text custom-search-icon rounded-start">
                        <a href=""><i class="fas fa-search fa-lg"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class=" row justify-content-around">
                <div class="col-lg-6 text-right">
                    <div class="float-start">
                        <?php Model::SessionInit();
                            $UserId = Model::SessionGet('UserId');
                            if ($UserId == FALSE) { ?>
                                <div class="col-lg-1 sign-login ">
                                    <div class="dropdown custom-botton position-relative ">

                <span type="button" class="dropdown-toggle login-panel  " data-bs-toggle="dropdown">
                        <i class="fas fa-user custom-login"></i> ورود/ثبت نام
                </span>
                                        <div class="dropdown-menu text-center rounded p-2 position-absolute custom-menu-panel">
                                            <button type="button" class="btn btn-primary custom-acount" style="font-size: 12px">
                                                <a href="login"> ورود به حساب کاربری</a>
                                            </button>
                                            <ul class="list-inline custom-register pt-2">
                                                <li class="list-inline-item">کاربر جدیدهستید؟</li>
                                                <a href="">
                                                    <li class="list-inline-item "><a href="login">ثبت نام</a></li>
                                                </a>
                                            </ul>
                                            <div class="dropdown-divider "></div>
                                            <div class="text-left pr-2 d-flex ">
                                                <a href="<?php URL ?>panel">
                                                    <button class="dropdown-item custom-profile-item  border-0">
                                                        <i class="fas fa-user"></i>پنل کاربری
                                                    </button>
                                                </a>
                                                <a href="<?php URL ?>admin_order">
                                                    <button class="dropdown-item custom-profile-item  border-0">
                                                        <i class="fas fa-calendar-check"></i>پنل ادمین
                                                    </button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div>

                                    <span>خوش آمدید</span>
                                    <span><a href="<?php URL ?>panel">پنل کاربری</a></span>
                                    <button type="button" class="btn btn-outline-secondary"><a href="Panel/logout"">خروج از حساب
                                        کاربری</a></button>
                                </div>
                            <?php } ?>
                    </div>
                </div>

                <div class="col-lg-6 col_basket2">
                    <a href="cart" class="btn btn-light Icon_basket ">
                        <i class="fad fa-shopping-cart "> </i>سبدخرید <span id="basket"></span>
                    </a>
                    <div id="Basket_content"
                         class=" py-2 mCustomScrollbar  justify-content-center Basket_content bg-light w-100  "
                         data-mcs-theme="rounded-dark">
                        <div class="basketupdate">
                            <div class="Basket_content2">

                                <div class="HeaderBasket">
                                    <?php
                                        $BasketHeader = $this->model->GetBasketHeader();
                                        Model::SessionInit();
                                        $BasketHeader = Model::SessionGet('BasketHeader');
                                        // var_dump($BasketHeader);
                                        //$BasketHeader = $data['BasketHeader'];

                                        foreach ($BasketHeader as $row) {
                                            //var_dump(@$row);
                                            ?>


                                            <ul class="list-inline my_card p-0 mt-1 d-flex justify-content-center Basket_header">

                                                <li class="list-inline-item">
                                                    <img src="public/img/products/<?= @$row['id_product']; ?>/product_220.jpg"
                                                         alt="" style="width: 70px; height: 70px">
                                                </li>
                                                <li class="list-inline-item border-bottom-1">
                                                    <span class="d-block"><?= @$row['title']; ?></span>
                                                    <span class="d-block"><?= @$row['price']; ?> تومان   </span>
                                                    <span type="radio" data-id=""
                                                          class=" circle rounded-circle color_basket "
                                                          style=" background-color: <?php echo @$row['hex']; ?>"></span>
                                                    <span class="d-inline"><?= @$row['ttitlecolor']; ?></span>

                                                    <span class="count-num">
                                                        <div class="d-flex">
                                                            <span>تعداد:</span>
                                                            <span data-idbasket="<?= @$row['id_basket']; ?>"
                                                                  class="d-block"><?= @$row['count']; ?></span>
                                                        </div>
                                                    </span>

                                                    <span class="d-block"><?= @$row['Titleguarantee']; ?></span>
                                                </li>
                                            </ul>


                                        <?php }; ?>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-4 mb-2 justify-content-between">
                            <div class="col"><span>مبلغ قابل پرداخت</span></div>
                            <div class="col">
                                <button type="button" class="btn btn-danger my_btn">
                                    <span>ثبت سفارش</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!--menu-->


<?php $menu = new Model();
    $result = $menu->Getmenu();
    //print_r($result);
?>


<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top"
     style="background-color: <?= menu_color ?> !important;">
    <a href="#" class="navbar-brand d-sm-block d-lg-none"><img src="public/img/logo.svg" height="50" width="50"/></a>
    <a href="#" class="navbar-brand mr-2 d-sm-block d-lg-none">دیجیکالا </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="navbar-nav ">
            <!--
            we remove  dropdown class for make mega menu ( change dropdown menu to mega menu )
            <li class="nav-item dropdown mr-4">-->
            <li class="nav-item">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">کالای دیجیتال</a>
                <div class="dropdown-menu show-visible" id="custom-main-dropdown-menu">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-2 border-start">

                                <div class="d-flex flex-column">
                                    <div class="p-3 dropdown-item menu-tab"><i class="fal fa-phone-laptop cutom"></i>
                                        کالای
                                        دیجیتال
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="fad fa-wrench"></i></i>
                                        خودرو و تجهیزات
                                        صنعتی
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="fad fa-tshirt"></i></i> مد و پوشاک
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="far fa-baby"></i> اسباب بازی کودک
                                        و نوزاد
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="fad fa-mug-hot"></i> خوردنی
                                        وآشامیدنی
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="far fa-heart-rate"></i></i> زیبایی
                                        و سلامتی
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="far fa-book-reader"></i> کتاب و
                                        لوازم
                                        التحریر و هنر
                                    </div>
                                    <div class="p-3 dropdown-item menu-tab"><i class="fas fa-running"></i></i> ورزش و
                                        سفر
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-md-9 col-lg-10" id="alloweb_menu">

                                <div class="row data-item">

                                    <div class="col-12 col-md col-lg pt-2  ">

                                        <div class="pt-2 pb-2"><span
                                                    class="menu-font-title">Xدسته بندی کالای دیجیتال</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1" id="">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">XXX</span> <i></i>
                                        </div>

                                        <ul class="list-list-inline px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">XXX</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">XXX</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">XXX</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                </div>

                                <div class="row data-item">

                                    <div class="col-12 col-md col-lg pt-2  ">

                                        <div class="pt-2 pb-2"><span
                                                    class="menu-font-title">Yدسته بندی کالای دیجیتال</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">yyy</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">yyy</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">yyy</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                    <div class="col-12 col-md col-lg pt-2 ">

                                        <div class="pt-2 pb-2"><span class="menu-font-title">yyy</span> <i></i>
                                        </div>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">

                                            <li class="list-group-item  border-0"><span class="menu-font-title"> لوازم جانبی گوشی</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>

                                            <li class="list-group-item  border-0">
                                                <a href="#">کیف و کاور گوشی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پاور بانک ( شارژ همراه)</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> پایه نگه دارنده گوشی</a></li>
                                        </ul>

                                        <ul class="list-group px-0 border-0 custom-sub-menu-digital-1">
                                            <li class="list-group-item  border-0"><span class="menu-font-title"> گوشی موبایل</span>
                                                <i
                                                        class="fas fa-angle-left "></i></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">سامسونگ</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#">هوآوی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> شیائومی</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> آنر</a></li>
                                            <li class="list-group-item  border-0">
                                                <a href="#"> نوکیا</a></li>
                                        </ul>

                                        <div><span class="menu-font-title">واقعیت مجازی</span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                        <div><span class="menu-font-title">مچ بند و ساعت هوشمند </span> <i
                                                    class="fas fa-angle-left all-digital"></i></div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </li>

            <!--sepratore-->
            <i class="fas fa-ellipsis-v custom-menu-divider mx-2 d-none d-md-block "></i>

            <li class="nav-item ">
                <a href="#" class="nav-link">تماس با ما</a>
            </li>

            <i class="fas fa-ellipsis-v custom-menu-divider mx-2 d-none d-md-block "></i>
            <li class="nav-item ">
                <a href="#" class="nav-link">درباره ما</a>
            </li>

        </ul>
        <div class="mr-auto">
            <ul class="navbar-nav">

                <li class="nav-item ">دیجی مگ</li>

            </ul>

        </div>

    </div>
</nav>


<script>

    $('.Basket_content').hide();

    function mouseen() {
        $('.Basket_content').hide();
        $('.Icon_basket').mouseenter(function () {
            $('.Basket_content').fadeIn(100);
            //BasketAjaxUpdate(104,1,1);
        });

        $('.col_basket2').mouseleave(function () {
            $('.Basket_content').delay(100).fadeOut(0);
        });
        //BasketAjaxUpdate();
    }

    mouseen();


</script>




