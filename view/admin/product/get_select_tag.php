<?php
    @$add_product = $data['get_category'];
    @$get_select_tag = $data['get_select_tag'];
    @$get_productInfo = $data['get_productInfo'];

    @$get_product_attribute = $data['get_product_attribute'];
    @$show_product_attribute = $data['show_product_attribute'];
    ///var_dump($show_product_attribute);
    if (isset($get_productInfo['id_product'])) {
        @$edit = 'X';
    } else {
        @$edit = '';

    }
?>


<div class="col-12 col-md-4 d-flex p-2  my-3 ">
    <label for="autoSizingInput" class="col-form-label w-100"> انتخاب دسته: </label>
    <select onclick="setNumSelectText(event.target.id)" class="form-select rooti" name="ID_category" required>
        <option onclick="clear_select()" value="<?= @$get_productInfo['ID_category']; ?>">انتخاب کنید</option>


        <?php
            $get_category = $data['get_category'];
            $categoryID = $get_productInfo['ID_category'];
            foreach ($get_category as $row) {
                if ($row['id_category'] == $categoryID) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }


                echo '<option  class="mit"    value="' . $row['id_category'] . '" ' . $selected . ' onclick=" select_category(event.target.value,optionId);">' . @$row['title'] . '</option>';


            }


        ?>
    </select>


    <div class="col-12 col-md-3 d-flex mx-2  ntfs">

    </div>

</div>

<div class="border-bottom w-50 p-1 my-2"></div>


<script>
    var roozbeh
    var id_select;
    var optionId;
    function setNumSelectText(tag) {
        const filters = document.querySelectorAll('select.rooti');
        filters.forEach((filter, index) => {
            filter.setAttribute("id", index);
            optionId = tag;
            //alert(optionId);
        });

    }





</script>