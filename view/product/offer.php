<div class="container-fluid box_product">
    <div class="row   py-0 px-2 m-2 d-flex  align-items-center  bg-light  rounded border-1">
        <?php @$slider2_data_end = $data[2]; ?>
        <div class="col-5 d-flex flex-row">
            <div class="align-self-center p-2">پیشنهاد شگفت انگیز - 23%</div>
            <div class=" d-flex text-center   bg-info  rounded-pill">
                <div class=" p-2 ra">
                    <span> <?= $productinfo['discount_price'] ?></span>
                </div>
                <div class="bg-info  opacity-25 p-2 border-right  border-warnin">
                    <span>تومان تخفیف</span>

                </div>
            </div>
        </div>


        <div class="col  text-left ">
            <div class="countdown float-end p-1">
                <ul id="example" class="">
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
            <script>
                $('#example').countdown({
                    //date: '9/24/2021 23:59:59'
                    date: '<?= $productinfo['date_special'] ?> '
                }, function () {
                    //alert('Merry Christmas!');
                });
            </script>
        </div>

    </div>
</div>