<div class="row mt-3 pt-3">
    <div class="col-12">
        <div class=" comment_panel">
            <div class="d-flex justify-content-between m-2">
                <div class="title">
                    <span class="">سبد خرید شما در دیجیکالا</span>
                </div>
            </div>

            <div class="table_info">
                <table class="w-100 my_card my-table_info">
                    <thead>
                    <tr>
                        <th> شرح محصول</th>
                        <th>تعداد</th>
                        <th>قیمت واحد</th>
                        <th colspan="2">قیمت کل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $GetBasket = $data['GetBasket'];
                        foreach ($GetBasket as $row) {
                            ?>
                            <tr>
                                <td>
                                    <ul class="list-inline my_card p-0 m-0 d-flex justify-content-center">

                                        <li class="list-inline-item">
                                            <img src="public/img/products/<?= $row['id_product']; ?>/product_220.jpg"
                                                 alt="" style="width: 110px; height: 110px">
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="d-block"><?= $row['title']; ?></span>
                                            <span class="d-block">رنگ:<?= $row['TitleColor']; ?> </span>
                                            <span class="d-block">گارانتی:<?= $row['Titleguarantee']; ?></span>
                                            <span class="d-block"><?= $row['description']; ?></span>
                                        </li>
                                    </ul>
                                </td>
                                <td class="td_order" style="width: 10%;">
                                    <div class="input_order">
                                        <input onchange="UpdataBasket($(this).val(),<?= $row['id_basket']; ?>),QuantityBasket()"
                                               id="num_order" type="number" value="<?= $row['count']; ?>" min="1"
                                               max="<?= $row['remain']; ?>" step="1"/>
                                    </div>

                                </td>
                                <td><?= $row['price']; ?></td>
                                <td id="<?= $row['id_basket'] ?>">
                                    <span id="priceFinal"> <?= $row['price'] * $row['count']; ?> </span>
                                </td>
                                <td style="background-color: #c00000"
                                    onclick="removeBasket(<?= $row['id_basket'] ?>)">
                                    <i class="fas fa-times" style="color: #FFFFFF"></i>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="row mt-3  mb-0 pb-1 d-flex justify-content-end  plus_all">


    <div class="col-12 col-md-4 p-3 border d-flex justify-content-between reloadPrice">
        <span>جمع کل خرید شما:</span>

        <span class="final_pay"><?= $data['GetBasket_finalPrice']; ?></span>

    </div>

</div>

<div class="row  mb-0 pb-1 d-flex justify-content-end plus_all2">

    <div class="col-12 col-md-4 p-3 total_price d-flex justify-content-between reloadPrice2">
        <span>مبلغ قابل پرداخت:</span>
        <span class="final_pay "><?= @$data['GetBasket_finalPrice']; ?></span>
    </div>
</div>

<div class="row  card_buy">

    <div class=" d-flex justify-content-between p-4 cart_page">

        <a href="">
            <button type="button" class="btn btn-primary my_btn">
                <i class="fad fa-home p-1 "></i>
                <span>   بازگشت به صفحه اصلی</span>
            </button>
        </a>

        <a href="cart2">
            <button type="button" class="btn btn-success my_btn">
                <i class="fad fa-shopping-cart   p-1 "></i>
                <span>ثبت سفارش و ادامه خرید</span>
            </button>
        </a>

    </div>
</div>

