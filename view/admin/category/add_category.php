<?php

    require 'view/admin/layout.php';
?>
<?php $edit = $data['edit'];
 $Category_Info = $data['Category_Info']; ?>

<div class="col-sm-10 bg-gradient  border">
    <form class="row gy-2 gx-3 align-items-center border-1 m-1"
          action="admin_category/add_category/<?= @$Category_Info['id_category'] ?>/<?= @$edit; ?>" method="post">

        <div class="bg-light p-1">

            <?php
                if ($edit == '') {
                    echo "افزودن دسته جدید  ";
                } else {
                    echo "ویرایش دسته";
                }
            ?>
        </div>


        <div class="bg-light flex-column">
            <?php
                if ($edit == '') {
                    $field_name = '';
                } else {
                    $field_name = @$Category_Info['title'];
                }
            ?>

            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100 "> دسته مورد نظر: </label>
                <input type="text" name="title" class="form-control" id="autoSizingInput"
                       placeholder="عنوان دسته ..." value="<?= $field_name; ?>">
            </div>
            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100"> دسته والد: </label>
                <select class="form-select" id="autoSizingSelect" name="id_category">
                    <option value="0">انتخاب کنید</option>
                    <?php
                        $get_category = $data['get_category'];
                        $parent_id = $data['parent_id'];

                        if ($edit == '') {
                            $selected_ID = $parent_id;
                        } else {
                            $selected_ID = $Category_Info['parent'];
                        }

                        foreach ($get_category as $row) {
                            if ($row['id_category'] == $selected_ID) {
                                $x = 'selected';
                            } else {
                                $x = '';
                            }

                            ?>


                            <option value="<?= $row['id_category']; ?>" <?= $x ?> > <?= $row['title']; ?>  </option>

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


