<?php require 'view/admin/layout.php';

    $get_attribute = $data['get_attribute'];
    //var_dump($get_attribute);
    $Category_Info = $data['Category_Info'];
    //var_dump($Category_Info);
    $attribute_Info = $data['attribute_Info'];
   // var_dump($attribute_Info);

?>


<div class="col-sm-10   p-2 ">
    <form action="admin_category/delete_attribute/<?= $Category_Info['id_category']?>/<?= @$attribute_Info['id_attribute']    ?>" method="post">

        <span class=" p-1 text-center" style="background-color: #dddddd">
                   <a href="admin_category/get_attribute/<?= $Category_Info['id_category'] ?>"> ویرایش: <?= $Category_Info['title']; ?>
                       :
                   </a>
             </span>

        <span><?= @$attribute_Info['title']; ?></span>


        <a type="submit">
            <button type="submit" class="btn btn-danger float-end ms-3"><i class="fal fa-trash-alt"
                                                                           style="color: #fff; position: relative; top: 1px;"></i>
                حذف ویژگی
            </button>
        </a>

        <a href="admin_category/add_attribute/<?= @$Category_Info['id_category']; ?>/<?= @$attribute_Info['id_attribute']; ?>/">
            <button type="button" class="btn btn-success float-end ms-3"><i class="fas fa-plus"
                                                                            style="color: #fff; position: relative; top: 1px;"></i>
                افزودن ویژگی
            </button>
        </a>


        <table class="table table-bordered">

            <thead>
            <tr>
                <th class="col text-center">ردیف</th>
                <th class="col text-center">عنوان ویژگی</th>
                <?php if (!isset($attribute_Info['id_attribute'])) { ?>
                    <th class="col text-center">مشاهده زیر ویژگی ها</th>
                <?php } ?>
                <th class="col text-center">افزودن مقادیر پیش فرض</a></th>
                <th class="col text-center">ویرایش</th>
                <th class="col text-center">انتخاب</th>
            </tr>
            </thead>
            <tbody>


            <?php foreach ($get_attribute as $row) { ?>
                <tr>
                    <td class="text-center"><?= @$row['id_attribute']; ?></td>
                    <td class="text-center"><?= @$row['title']; ?></td>
                    <?php if (!isset($attribute_Info['id_attribute'])) { ?>
                        <td>
                            <a href="admin_category/get_attribute/<?= $row['ID_category']; ?> /<?= @$row['id_attribute']; ?>">
                                <i class="fas fa-eye"></i></a></td>
                    <?php } ?>

                    <td  class="text-center ">

                            <a    href="admin_category/add_default_val/<?=  $row['id_attribute']  ;?>">
                                <i class="fas fa-plus"></i>
                            </a>


                    </td>

                    <td>
                        <a href="admin_category/add_attribute/<?= $row['ID_category']; ?> / <?= $row['ID_parent']; ?> /<?= @$row['id_attribute']; ?>"><i
                                    class="fas fa-edit" style="color: #000"></i></i> </a></td>
                    <td><input type="checkbox" name="id_attribute[]" value="<?= $row['id_attribute'] ?>"></td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </form>
</div>




<script>


</script>

