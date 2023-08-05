<?php
    require 'view/admin/layout.php';
?>
<?php
    $attribute = $data['attribute'];
   // var_dump($attribute);
    //var_dump($attribute);
    $get_productInfo = $data['get_productInfo'];
    $Get_product_attribute2 = $data['Get_product_attribute2'];
    //var_dump($Get_product_attribute2);

?>

<div class="col-sm-10 bg-gradient  border">


    <div class="bg-light p-1">
        <span><?= $get_productInfo['title']; ?></span>
    </div>

    <form class=" gy-2 gx-3 align-items-center border-1 m-1"
          action="admin_product/attribute/<?= $get_productInfo['id_product']; ?>" method="post">
        <input type="hidden" name="submited">

        <div class="row bg-light">
            <input type="hidden" name="submited">
            <?php foreach ($attribute as $key => $row) { ?>

                <div class="col-2">
                    <label for="autoSizingInput" class="col-form-label w-100 ">
                        <span><?= $row['title']; ?></span>
                    </label>
                </div>

                <div class="col-3">
                    <select name="IdVal[]" class="form-select" aria-label="Default select example">

                        <?php $values = $row['values'];
                            foreach ($values as $val) {
                                // var_dump($values);
                                if ($row['ID_default_value'] == $val['id_default_value']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                ?>
                                <option value="<?= $val['id_default_value']; ?>" <?php if ($selected == 'selected') {
                                    echo 'selected="selected"';
                                } ?>">
                                <?= $val['value']; ?>
                                </option>

                            <?php } ?>
                    </select>
                </div>
                <div class="col-7">
                    <a target="_blank" href="admin_category/add_default_val/<?= $row['id_attribute']; ?>">
                        <i class="fas fa-plus"></i>
                        <span>ویرایش مقادیر</span>
                    </a>
                </div>
                <input type="hidden" name="id_attribute[]" value="<?= $row['id_attribute']; ?>">
            <?php } ?>

            <div class="col-12 mt-3">
                <a href="admin_category/get_attribute/ <?=  $attribute[0]['ID_category'];?>/ <?=  $attribute[0]['ID_parent'];?>">
                    <i class="fas fa-plus"></i>
                </a>
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


