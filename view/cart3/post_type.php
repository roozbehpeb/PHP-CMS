<?php
    $post_type = $data['PostType'];
    $first = 1;
    foreach ($post_type as $row) {


        ?>
        <div class="row cart3_table2 mt-3 my_shiping">
            <div class="col-sm-12">
                <table class="w-100 post_type" data-post_typeId="<?= $row['id_post']; ?>">
                    <tr class="">
                        <td rowspan="" class=" position-relative select_post selectPost   ">

                            <div class="  circle  position-relative choosen_post <?php if ($first == 1) {
                                echo 'active_post_type';
                            } ?> "></div>
                        </td>

                        <td class="p-3 d-flex align-self-center">
                            <i class="far fa-truck "></i>
                            <span class="p-1"><?= $row['title']; ?> : </span>
                            <span class="p-1"><?= $row['description']; ?></span>

                        </td>

                        <td class="text-center price">
                            <div>هزینه ارسال</div>
                            <div><?= $row['price']; ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <?php $first = 0;
    } ?>

<div class="row flex-column   align-items-end mt-2">
    <div class="col-12 col-md-4 p-3 border  justify-content-start mt-2">
        <span class="p-2">مبلغ سبد خرید:</span>
        <span class=" p-2" id="FinalPriceProduct"></span>
        <span class="final_pay"></span>
    </div>

    <div class="col-12 col-md-4 p-3 border  justify-content-between mt-2">
        <span class="p-2">مبلغ کل قابل پرداخت:</span>
        <span class=" p-2" id="FinalPriceBasket"></span>
        <span class="final_pay"></span>
    </div>
</div>


