<?php
    $active='category';
    require 'view/admin/layout.php';

    if (isset($data['main_category'])){
        $get_category=$data['main_category'];
    }

if (isset($data['Category_Info'])){
    $Category_Info=$data['Category_Info'];
}
    if (isset($data['get_category'])){
    $get_category=$data['get_category'];
    }
    if (isset($data['parents_category'])) {
        $get_parents = $data['parents_category'];
        $get_parents=array_reverse($get_parents);
    }




?>




    <div class="col-sm-10   p-2 ">
        <form action="admin_category/delete_category/<?= @$Category_Info['id_category'];?>" method="post">
            <span class=" p-1 text-center" style="background-color: #dddddd">لیست دسته ها</span>
            <span class=" p-1 text-center" style="background-color: #dddddd">دسته والد:</span>
            <span class=" p-1 text-center" style="background-color: #dddddd">  <a href="http://digitalocean.tv/admin_category"> همه دسته ها></a>  </span>
            <span class=" p-1 text-center" style="background-color: #dddddd">  <a href="http://digitalocean.tv/admin_category/list_category"> دسته های اصلی></a>  </span>

            <a type="submit"> <button  type="submit" class="btn btn-danger float-end ms-3"> <i class="fal fa-trash-alt" style="color: #fff; position: relative; top: 1px;"></i> حذف دسته</button></a>

            <a href="admin_category/add_category/<?= @$Category_Info['id_category']; ?>"> <button  type="button" class="btn btn-success float-end ms-3"> <i class="fas fa-plus" style="color: #fff; position: relative; top: 1px;"></i> افزودن دسته </button></a>



            <?php   if (isset($data['parents_category'])) {
                require 'category_navbar.php';
            }?>
            <table class="table table-bordered">

                <thead>
                <tr>
                    <th class="col text-center">ردیف</th>
                    <th class="col text-center">عنوان دسته</th>
                    <th class="col text-center">مشاهده زیر دسته ها</th>
                    <th class="col text-center">مشاهده ویژگی ها</th>
                    <th class="col text-center">ویرایش</th>
                    <th class="col text-center">انتخاب</th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach ($get_category as $row)  {?>
                    <tr>
                        <td class="text-center"><?=  $row['id_category'];   ?></td>
                        <td class="text-center"><?=  $row['title'];   ?></td>
                        <td class="text-center"><a href="admin_category/list_category/<?=  $row['id_category']  ?>"><i class="fas fa-eye" style="color: #000"></i></i></a></td>
                        <td class="text-center" > <a href="admin_category/get_attribute/<?= $row['id_category']   ?>"> <i class="fas fa-eye"></i></a></td>
                        <td class="text-center" > <a href="admin_category/add_category/<?=  $row['id_category']  ?>/edit"> <i class="fas fa-edit"></i></a></td>

                        <td class="text-center"><input type="checkbox" name="cat_ids[]" value="<?=  $row['id_category']  ?>"></td>


                    </tr>
                <?php  }  ?>
                </tbody>

            </table>
        </form>
    </div>
