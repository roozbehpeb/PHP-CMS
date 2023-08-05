<div class="my-2 " id="slider2">
    <div class="row">

        <div class="col-lg-9 ">
            <div class="row ">
                <?php
                    $slider2 = $data[1];
                    $slider2_data_end = $data[2];
                    foreach ($slider2 as $row) {
                        ?>
                        <div class="slide2_item h-100 w-100 position-relative">
                            <<!--div class="slide2_finish_offer">
                                    <p>پایان یافت !</p>
                                </div>-->
                            <a href="product/index/<?= $row['id_product'] ?> ">
                                <div class="col-lg-8 text-center float-end h-100 ">
                                    <p class="pt-2"><?php echo $row['title'] ?></p>
                                    <div class="slide2-image .baner"><img
                                                src="public/img/products/<?= $row['id_product'] ?>/product_220.jpg"
                                                alt=""
                                                style="max-width: 250px">
                                    </div>
                                </div>

                            </a>
                            <div class="col-lg-4 text-center float-end ">
                                <p>جشنواره دیجیکالا</p>
                                <div class="price d-flex  justify-content-center">
                                    <div class="old-price p-2">7,100,000</div>
                                    <div class="final-price p-2"> <?php echo $row['price_total'] ?>هزار تومان</div>
                                </div>
                                <div class="text-center pt-3">
                                    <p>پشتیبانی از انواع کنسول</p>
                                    <p>پشتیبانی از انواع کنسول</p>
                                    <p>پشتیبانی از انواع کنسول</p>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
            </div>
            <div class="row">
                <div class="col justify-content-start">
                    <div class="countdown ">
                        <ul id="example" style="text-align: right !important; margin: 0px !important;">
                            <li><span class="seconds">00</span>
                                <p class="seconds_text">ثانیه</p></li>
                            <li class="seperator">:</li>
                            <li><span class="minutes">00</span>
                                <p class="minutes_text">دقیقه</p></li>
                            <li class="seperator">:</li>
                            <li><span class="hours">00</span>
                                <p class="hours_text">ساعت</p></li>
                            <li class="seperator">:</li>
                            <li><span class="days">00</span>
                                <p class="days_text">روز</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 border-right">
            <div class="d-flex flex-column slider2-nav">
                <?php $slider2 = $data[1];
                    foreach ($slider2 as $row) { ?>
                        <div class="p-3 dropdown-item slider_nav_item2"><i class="fad fa-wrench"></i></i>
                            <span><?= $row['title'] ?></span>
                        </div>
                    <?php } ?>

            </div>
        </div>

    </div>
</div>


<!--<script>
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?php /* echo $slider2_data_end */ ?>',
        seconds: true,
        minutes: false,
        hours: true,
        callback: function () {
            $('.slider2_content_right').css('opacity', 0.4);
            $('.slide2_finish_offer').fadeIn(0);
        }
    });
</script>-->

<script>
    $('#example').countdown({
        date: '<?php  echo $slider2_data_end  ?>'
    }, function () {
        // alert('Merry Christmas!');
    });
</script>

<!--<script>
    $('#example').countdown({
        date: '9/24/2021 23:59:59'
    }, function () {
        alert('Merry Christmas!');
    });
</script>-->