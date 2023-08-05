<?php
    require 'view/admin/layout.php';
    $default_val = $data['default_val'];
    $IDattribute = $data['IDattribute'];
    //    var_dump($default_val)

?>

<div class="col-10 p-5">
    <form action="admin_category/add_default_val/<?= $IDattribute['id_attribute']; ?>" method="post" id="attrvalue">
        <?php foreach ($default_val as $row) { ?>
            <div class="row mb-5 icc">
                <label  class="col-2 col-form-label mx-1 ">افزودن ویژگی جدید</label>
                <div class="col-3 position-relative attr-remove">
                    <i onclick="clear_input(this)" class="fas fa-times"></i>
                    <input name="attrval-<?= $row['id_default_value']; ?>" value="<?= $row['value']; ?>" type="text" class=" form-control">
                </div>
            </div>
        <?php } ?>

        <div class="plusInpute">

        </div>


        <div>
            <label for="inputEmail3" class="col-2 col-form-label mx-1">افزودن ویژگی جدید</label>
            <span onclick="add_input();"  class="btn btn-light mt-2 rounded"><i class="fas fa-plus"></i></span>
        </div>

        <button name="submit" type="submit" class="btn btn-primary mt-5">ذخیره</button>
    </form>
</div>


<script>



    function clear_input(Tag){

  /* $(Tag).closest('.icc').find('input').val("")
        $(Tag).closest('.icc').remove();*/

        $(Tag).closest('.icc').find('input').val("");
        setTimeout(function() {
            remove_input(Tag);
        }, 0);

    }

    function remove_input(Tag) {
        $(Tag).closest('.icc').hide();
    }



    function add_input() {
        var myinput = '<div class="row mb-5 icc"> <label class="col-2 col-form-label mx-1 ">افزودن ویژگی جدید</label> <div class="col-3 position-relative attr-remove"> <i onclick="clear_input(this)" class="fa fa-times"></i> <input name="attrvalnew[]" value="" type="text" class=" form-control"> </div> </div>';
        $('.plusInpute').append(myinput);
    }




</script>