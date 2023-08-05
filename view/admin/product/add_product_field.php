<form enctype="multipart/form-data" action="admin_product/add_product_sub/<?= @$get_productInfo['id_product'] ?>"
      method="post" class=" product_form2 row gy-2 gx-3 align-items-center border-1 m-1">
    <div class="m-2 product_admin_filed_style">

        <div class="col-12 col-md-4 d-flex p-2">
            <input type="hidden" name="product_number" class="form-control time-inpute" id="autoSizingInput">
        </div>
        <div class="col-12 col-md-4 d-flex p-2">
            <input value="" type="hidden" name="selecte_time" class="form-control " id="autoSizingInput">
        </div>

        <div class="col-12 col-md-4 d-flex p-2 menu_div d-block"><label for="autoSizingInput"
                                                                        class="col-form-label w-100"> رنگ مورد
                نظر: </label> <select onchange="disable_ColorTag()" class="form-select color_select"
                                      id="autoSizingSelect" name="get_color">
                <option
                ">انتخاب کنید</option> <?php $get_color = @$data['get_color'];
                    foreach ($get_color as $row) { ?>
                        <option data-title="<?= @$row['title']; ?>" value="<?= @$row['id_color']; ?>"
                                onclick=addColor(this,"<?= @$row['id_color']; ?>","<?= @$row['hex']; ?>")> <?= @$row['title']; ?> </option> <?php
                    } ?> </select>
            <div class="root col-12 col-md-2 d-flex "> <?php @$colorInfo = $get_productInfo['colorInfo'];
                    $colorInfo = array_filter($colorInfo);
                    foreach ($colorInfo as $val) { ?>
                        <div class=" col-auto tag-admin-select remove bg-light d-flex px-2 mx-1 color" id="remove"><span
                                    style="background-color: <?= $val['hex']; ?> " class="span_color"> <input
                                        value=" <?= $val['id_color']; ?>" name="get_color"
                                        type="hidden"> <?= $val['title']; ?></span> <i
                                    class="far fa-times-circle float-left" onclick="removeSelected(this)"></i>
                        </div> <?php
                    } ?> </div>
        </div>
        <div class="col-12 col-md-4 d-flex p-2 d-block-"><label for="autoSizingInput" class="col-form-label w-100 "
                                                                required> موجودی: </label> <input type="text"
                                                                                                  name="remain"
                                                                                                  class="form-control"
                                                                                                  id="autoSizingInput"
                                                                                                  placeholder="تعداد . . ."
                                                                                                  value="<?= @$get_productInfo['remain']; ?>">
        </div>
        <div class="col-12 col-md-4 d-flex p-2 d-block"><label for="autoSizingInput" class="col-form-label w-100 ">
                قیمت: </label> <input type="text" name="price" class="form-control" id="autoSizingInput"
                                      placeholder="قیمت محصول . . ." value="<?= @$get_productInfo['price']; ?>"></div>
        <div class="col-12 col-md-4 d-flex p-2 d-block"><label for="autoSizingInput" class="col-form-label w-100 ">
                تخفیف: </label> <input type="text" name="discount" class="form-control" id="autoSizingInput"
                                       placeholder="تخفیف محصول . . ." value="<?= @$get_productInfo['discount']; ?>">
        </div>
        <div class="col-12 col-md-4 d-flex p-2 menu_div2"><label for="autoSizingInput" class="col-form-label w-100">
                گارنتی محصول: </label> <select onchange="disable_guaranteeTag()" class="form-select guarantee_select"
                                               id="autoSizingSelect" name="get_guarantee">
                <option>انتخاب کنید</option> <?php @$get_guarantee = $data['get_guarantee'];
                    foreach ($get_guarantee as $row) { ?>
                        <option data-title="<?= $row['title']; ?>" value="<?= $row['id_guarantee']; ?>"
                                onclick=addguarantee(this,"<?= $row['id_guarantee']; ?>")> <?= $row['title']; ?> </option> <?php
                    } ?> </select>
            <div class="root2 col-12 col-md-4 d-flex p-2 d-block "> <?php $guaranteeInfo = $get_productInfo['guaranteeInfo'];
                    $guaranteeInfo = array_filter($guaranteeInfo);
                    foreach ($guaranteeInfo as $val) { ?>
                        <div class=" col-auto tag-admin-select remove border bg-light d-flex px-2 mx-1 " id="remove">
                            <span> <input value="<?= $val['id_guarantee']; ?>" name="get_guarantee"
                                          type="hidden"><?= $val['title']; ?> </span> <i
                                    class="far fa-times-circle float-left" onclick="removeSelected(this)"></i>
                        </div> <?php
                    } ?> </div>
        </div>
        <div class="col-12 col-md-4 d-flex p-2">

            <input class="index_number" type="text">

        </div>
    </div>
    </div>


    <div class="form-check">
        <input style="cursor: pointer" class="isCheckbox isCheckbox2 form-check-input" type="checkbox">
        <label class="form-check-label" for="flexCheckDefault">
            افزودن ویژگی
        </label>
    </div>
    <div class="filter_by_attr">


    </div>


<!--    <div class="col-12 col-md-3 d-flex mx-2  ntfs">-->
<!---->
<!--    </div>-->

</form>;





<script>

    // function time_select(){
    //     const now = Date.now();
    //     $('input.selecte_time').val(now);
    //
    // }





    const filters = document.querySelectorAll('.isCheckbox');
    filters.forEach((filter, index) => {
        filter.addEventListener('click', function () {
            if ($(this).is(':checked')) {
                $.ajax({
                    url: 'admin_product/get_select_tag',
                    type: 'HTML',
                    async: true,
                    success: function (data) {
                        $('.filter_by_attr').eq(index).empty();
                        $('.filter_by_attr').eq(index).append(data);
                        $('input.index_number').eq(index).val(index);

                        //$('input.index_number')
                        //rooti = $(this).closest("input.rooti").val();
                    }
                });
            } else {
                $('.filter_by_attr').eq(index).empty();
            }
        });
    });
</script>

