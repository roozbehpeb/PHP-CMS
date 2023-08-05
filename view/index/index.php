<?php
    /*print_r($data);
    */ ?>

<!--baner-->

<?php require('baner.php'); ?>

<!--slider1 + sidebar righ 1-->
<div class="container-fluid px-5 " style="background-color: <?= body_color; ?> !important;">
    <div class="row">
        <div class="col-md-3 carusel ">
            <?php require('right-sidbar1.php'); ?>
        </div>

        <div class="col-md-9">
            <!-- slider 1 اصلی  -->
            <?php require('slider1.php') ?>

            <!-- slider 2 ویژه  -->
            <?php require('slider2.php') ?>

        </div>

    </div>
</div>

<!--carosel + sidebar righ 2-->
<div class="container-fluid px-5"  style="background-color: <?= body_color; ?> !important;">

    <div class="row ">
        <div class="col-md-3 carusel">
            <?php require('right-sidbar2.php') ?>
        </div>

        <div class="col-md-9">
            <?php require('carousel-slider.php') ?>
        </div>
    </div>

</div>


<!--carosel + sidebar righ 3-->
<div class="container-fluid px-5 "  style="background-color: <?= body_color; ?> !important;">

    <div class="row">
        <div class="col-md-3 carusel">
            <?php require('right-sidbar2.php') ?>
        </div>

        <div class="col-md-9">
            <?php require('mostviewed.php') ?>
        </div>
    </div>

</div>



<!--carosel + sidebar righ 2-->
<div class="container-fluid px-5 "  style="background-color: <?= body_color; ?> !important;">

    <div class="row">
        <div class="col-md-3 carusel">
            <?php require('right-sidbar2.php') ?>
        </div>

        <div class="col-md-9">
            <?php require('lastproducts.php') ?>
        </div>
    </div>

</div>









<script>
    $(document).ready()
    {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            rtl: true,
            margin: 25,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    }
</script>