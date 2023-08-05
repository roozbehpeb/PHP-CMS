<?php

    require 'view/admin/layout.php';
    $get_attribute = $data['get_attribute'];
    //var_dump($get_attribute);
    $editId = $data['editId'];
    /* $edit='';
     if (isset($editId['title'])){
         $edit="edite";
     }*/
    $Category_Info = $data['Category_Info'];
    $ID_parent = $data['ID_parent'];
    //var_dump($ID_parent);

    /* $selected_ID = $editId['ID_parent'];
     var_dump($selected_ID);*/

?>

<div class="col-sm-10 bg-gradient  border">
    <form class="row gy-2 gx-3 align-items-center border-1 m-1"
          action="admin_category/add_attribute/<?= $Category_Info['id_category'] ?>/<?= $ID_parent ?>/<?= @$editId['id_attribute'] ?>"
          method="post">

        <div class="bg-light p-1">

            <?php
                if ($editId == '') {
                    echo "افزودن ویژگی جدید /   ";
                } else {
                    echo "ویرایش ویژگی";
                }
            ?>
            <span><?= $Category_Info['title']; ?></span>
        </div>


        <div class="bg-light flex-column">
            <?php
                if ($editId == '') {
                    $field_name = '';
                } else {
                    $field_name = @$editId['title'];
                }
            ?>

            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100 "> ویژگی مورد نظر: </label>
                <input type="text" name="title" class="form-control" id="autoSizingInput"
                       placeholder="عنوان ویژگی ..." value="<?= $field_name ?>">
            </div>
            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100"> ویژگی والد: </label>
                <select class="form-select" id="autoSizingSelect" name="ID_parent">
                    <option value="0">انتخاب کنید</option>
                    <?php
                        $ID_parent = $data['ID_parent'];
                        $selected_ID = $ID_parent;
                        /* see one note part 140  very very very  important note  for this section of project
                        /*if ($editId == '') {
                            $selected_ID = $ID_parent;
                        } else {
                            $selected_ID = $editId['ID_parent'];
                        }*/

                        foreach ($get_attribute as $row) {
                            if ($row['id_attribute'] == $selected_ID) {
                                $x = 'selected';
                            } else {
                                $x = '';
                            }

                            ?>


                            <option value="<?= $row['id_attribute']; ?>" <?= $x ?> > <?= $row['title']; ?>  </option>

                        <?php } ?>
                </select>
            </div>
            <div class="col-auto ">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>

        </div>
    </form>
</div>
</div>


