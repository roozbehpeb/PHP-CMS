<script src="../../../public/ckeditor/ckeditor.js"></script>


<?php
    require 'view/admin/layout.php';
?>
<?php
    @$get_productInfo = $data['get_productInfo'];
    // @$add_Specialist = $data['add_product_Specialist'];
    @$Specialist_Info = $data['Specialist_Info'];


    if (isset($get_productInfo['id_product'])) {
        @$edit = 'X';
    } else {
        @$edit = '';

    }
?>

<div class="col-sm-10 bg-gradient  border">
    <form class="row gy-2 gx-3 align-items-center border-1 m-1"
    action="admin_product/add_product_Specialist/<?= $get_productInfo['id_product']; ?>/<?= @$Specialist_Info['id_naghd']; ?>"
          method="post">


        <div class="bg-light p-1">

            <?php
                if (isset($Specialist_Info['title'])) {
                    echo "ویرایش نقد:  ";
                } else {
                    echo " نقد جدید :";
                }
            ?>
            <span><?=  $get_productInfo['title'] ; ?></span>
        </div>



        <div class="bg-light flex-column">
            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100 "> عنوان نقد و برسی: </label>
                <input type="text" name="title" class="form-control" id="autoSizingInput"
                       placeholder="عنوان محصول ..." value="<?= @$Specialist_Info['title']; ?>" required>
            </div>


            <div class="col-12 col-md-10  d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label px-2  "> توضیحات: </label>
                <textarea id="editor1" cols="120" rows="10" type="text" name="description"
                          class="form-control">
<?= @$Specialist_Info['description']; ?>
                </textarea>
                <script>
                    CKEDITOR.replace('editor1', {})
                </script>
            </div>


            <div class="col-auto ">
                <a href="">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </a>
            </div>

        </div>
    </form>
</div>
</div>


<script>
    function removeSelected(tag) {
        var crossTag = $(tag);
        var remove = crossTag.parents('div.remove');
        remove.remove();
    }


    function addColor(tag_option, colorId, ColorCode) {
        var option_menu = $(tag_option);
        var ColorName = option_menu.attr('data-title');

        var add_colorTag = ' <div class=" col-auto tag-admin-select remove  bg-light d-flex  px-2  mx-1 color" id="remove"> <span style="background-color: ' + ColorCode + '" class="span_color"> <input  value="' + colorId + '" name="get_color[]" type="hidden"> ' + ColorName + '</span> <i class="far fa-times-circle float-left" onclick="removeSelected(this)"></i> </div>';

        var divRow = option_menu.parents('.menu_div');
        var divRow2 = divRow.find('.root');
        divRow2.append(add_colorTag);
    }

    function addguarantee(tag_option, guaranteeIdId) {
        var option_menu = $(tag_option);
        var guaranteeName = option_menu.attr('data-title');

        var add_colorTag = ' <div class=" col-auto tag-admin-select remove border bg-light d-flex px-2 mx-1 "  id="remove"> <span> <input  value="' + guaranteeIdId + '" name="get_guarantee[]" type="hidden"> ' + guaranteeName + '</span> <i class="far fa-times-circle float-left" onclick="removeSelected(this)"></i> </div>';

        var divRow = option_menu.parents('.menu_div2');
        var divRow2 = divRow.find('.root2');
        divRow2.append(add_colorTag);
    }
</script>