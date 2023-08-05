<!--step to step-->
<div class="container-fluid bg-white">
    <div class="step_order2">
        <div class="row py-3 d-flex align-items-center justify-content-center">
            <div class="col-1 px-0 d-flex justify-content-center flex-column   align-items-end">
                <div class="d-flex ">
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                </div>
            </div>
            <div class="col-1 px-0 d-flex justify-content-center flex-column  align-items-center"
                 style="pointer-events:none">
                <div class="circle rounded-circle  position-relative active_check"></div>
                <span class="">ورود به سایت</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle active position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle active position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column   align-items-start">
                <div class="d-flex">
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="my-basket">
    <div class="container-fluid bg-white px-lg-5 ">
        <div class="row mt-3 pt-3">
            <div class="col-12">
                <div class=" comment_panel">
                    <table class="w-100 my_card">
                        <thead>
                        <tr>
                            <th> شرح محصول</th>
                            <th>تعداد</th>
                            <th>قیمت واحد</th>
                            <th colspan="2">قیمت کل</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $GetBasketInfo = $data['GetBasketInfo'];
                            $basket = $GetBasketInfo[0];
                            foreach ($basket as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <ul class="list-inline my_card p-0 m-0 d-flex justify-content-center">

                                            <li class="list-inline-item">
                                                <img src="public/img/products/<?= $row['id_product']; ?>/product_220.jpg"
                                                     alt="" style="width: 110px; height: 110px">
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="d-block"> <?= $row['title']; ?> </span>

                                                <span class="d-block">رنگ:<?= $row['TitleColor'];
                                                    ?> </span>
                                                <span class="d-block">گارانتی:<?= $row['Titleguarantee']; ?></span>

                                                <span class="d-block"><?= $row['description']; ?></span>

                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span><?= $row['count']; ?></span>
                                    </td>
                                    <td>
                                        <span> <?= $row['price']; ?></span>
                                    <td>
                                        <span>
                                            <?php $finalPrice = $row['price'] * $row['count'];
                                                echo number_format($finalPrice);
                                            ?>
                                        </span>
                                        <span>تومان</span>
                                        <div class="discountTotal">تخفیف: <?= number_format($row['discountTotal']); ?>
                                            تومان
                                        </div>
                                    </td>

                                    <td class="p-0" style="background-color: #373737;">
                                        <a href="cart"> <i class="fa fa-retweet" style="color:#00a6b2"></i> </a>
                                        <a onclick="removeBasket(<?= $row['id_basket'] ?>)"><i class="fas fa-times"
                                                                                               style="color:#00a6b2;display: block"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="row mt-3  mb-0 pb-1  justify-content-end ">


            <div class="col-12 col-md-4 p-3 border  justify-content-between">
                <span>جمع کل خرید شما:</span>
                <span><?= number_format($GetBasketInfo[1]); ?>  </span>
                <span>تومان</span>
            </div>

        </div>

        <div class="row mt-1  mb-0 pb-1  justify-content-end ">


            <div class="col-12 col-md-4 p-3 border  justify-content-between">
                <span>هزینه پستی:</span>
                <span><?php $PostPrice = $data['PostPrice'];
                        //var_dump($PostPrice);
                        $PostPrice = $PostPrice['price'];
                        echo number_format($PostPrice);
                    ?>
                    <span>تومان</span>

                </span>

                <span class="final_pay"></span>
            </div>

        </div>

        <div class="row mt-1  mb-0 pb-1  justify-content-end ">


            <div class="col-12 col-md-4 p-3 border justify-content-between discount">
                <span>جمع کل تخفیف:</span>
                <span>
                    <?php

                        /*
                         *  solution 1

                         *  $Finaldiscount=[];
                         foreach ($basket as $row) {
                             $discount = $row['discountTotal'];
                             array_push($Finaldiscount,$discount);
                             //var_dump($discount);
                         }
                         echo number_format(array_sum($Finaldiscount));
                     //var_dump($basket);*/

                        /* solution 2*/


                        // var_dump($GetBasketInfo);
                        $discount = $GetBasketInfo[2];
                        echo number_format($discount);
                    ?>
                    <span>تومان</span>
                </span>

                <span class="final_pay"></span>
            </div>

        </div>

        <div class="row  mb-0 pb-1  justify-content-end">

            <div class="col-12 col-md-4 p-3 total_price  justify-content-between">
                <span>مبلغ قابل پرداخت:</span>
                <?php
                    $ToalPrice = $PostPrice + $GetBasketInfo[1];
                    $FinalPrice = $ToalPrice - $discount;
                ?>
                <span><?= number_format($FinalPrice); ?></span>
                <span>تومان</span>
                <span class="final_pay "></span>
            </div>
        </div>

        <div class="row">
            <?php $addressInfo = $data['addressInfo'];
                /*
                 * I write below code to model_cart4.php
                 *  $addressInfo= unserialize($addressInfo);*/
                //var_dump($addressInfo);
            ?>

            <div class=" col-sm12 col-md-10 d-flex send_address p-2 border bg-light ">
                <i class="fas fa-map-marked-alt"></i>
                <span>این سفارش به</span>
                <span><?= $addressInfo['family']; ?></span>
                <span>با شماره تلفن</span>
                <span><?= $addressInfo['mobile']; ?></span>
                <span>به آدرس</span>
                <span><?= $addressInfo['full_address']; ?></span>
                <span>ارسال میگردد</span>
            </div>

        </div>


        <div class="row">
            <?php $post_type = $data['post_type'];
                //var_dump($post_type);
            ?>

            <div class=" col-sm12 col-md-10 d-flex send_address p-2 border bg-light ">
                <i class="fas fa-map-marked-alt"></i>
                <span><?= $post_type['title']; ?></span>
                <span><?= $post_type['description']; ?></span>
                <span>هزینه ارسال مرسوله:</span>
                <span><?= $post_type['price']; ?></span>
            </div>
        </div>


        <div class="row  mb-0 pb-1  justify-content-end">

            <div class=" d-block d-xl-none col-12 col-md-4 p-3 total_price d-flex justify-content-start p-1">
                <i class="fad fa-info p-1 "></i>
                <span> بر اساس مکان سفارش ، مبلغ نهایی افزایش می یابد </span>
            </div>
        </div>


        <!--   my issue    -->


        <div class="row  card_buy cart_page">

            <div class="  col-6   ">

                <a href="cart3">
                    <button type="button" class="btn btn-primary my_btn">
                        <i class="fas fa-undo-alt"></i>
                        <span> بازگشت به مرحله قبل</span>
                    </button>
                </a>

            </div>


            <div class=" col-6 text-left  ">
                <a href="/cart5">
                    <button type="button" class="btn btn-success my_btn">
                        <i class="fad fa-shopping-cart   p-1 "></i>
                        <span>  تایید اطلاعات و ادامه خرید</span>
                    </button>
                </a>
            </div>


        </div>


    </div>
</div>


<script>

    // remove basket Item
    function removeBasket(basketId) {

        Swal.fire({
            title: '',
            text: "حذف از سبد خرید؟",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'حذف',
            cancelButtonText: 'انصراف'
        }).then((result) => {
            if (result.isConfirmed) {

                var url = 'cart/deleteBasket/' + basketId;
                var data = {};
                var address = 'cart4/';
                $.post(url, data, function (msg) {
                    $('.my-basket').load('' + address + ' .my-basket', data);
                }, 'json');
            }
        })


    }
</script>



