<?php
    $active='product';
    require 'view/admin/layout.php';
    $get_product = $data['get_product'];
    $get_product2 = $data['get_product2'];
?>


<div class="col-sm-10   p-2 ">
    <form action="admin_product/delete_product" method="post">
        <span class=" p-1 text-center" style="background-color: #dddddd">لیست دسته ها</span>
        <span class=" p-1 text-center" style="background-color: #dddddd">دسته والد:</span>
        <span class=" p-1 text-center" style="background-color: #dddddd">  <a
                    href="http://digitalocean.tv/admin_category"> همه دسته ها></a>  </span>
        <span class=" p-1 text-center" style="background-color: #dddddd">  <a
                    href="http://digitalocean.tv/admin_category/list_category"> دسته های اصلی></a>  </span>

        <a type="submit">
            <button  class="btn btn-danger float-end ms-3"><i class="fal fa-trash-alt"
                                                                           style="color: #fff; position: relative; top: 1px;"></i>
                حذف محصول
            </button>
        </a>

        <a href="admin_product/add_product">
            <button type="button" class="btn btn-success float-end ms-3"><i class="fas fa-cart-plus"
                                                                            style="color: #fff; position: relative; top: 1px;"></i>
                افزودن محصول
            </button>
        </a>


        <?php if (isset($data['parents_category'])) {
            require 'category_navbar.php';
        } ?>
        <table class="table table-bordered">

            <thead>
            <tr>
                <th scope="col">کد محصول</th>
                <th scope="col">عنوان</th>
                <th scope="col">قیمت</th>
                <th scope="col">تخفیف</th>
                <th scope="col">نقد و برسی</th>
                <th scope="col">گالری تصاویر</th>
                <th scope="col">ویژگی ها</th>
                <th scope="col">دسته</th>
                <th scope="col">مشاهده</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($get_product as $row) { ?>
                <tr>
                    <td><?= @$row['id_product']; ?></td>
                    <td><?= @$row['title']; ?></td>
                    <td><?= @$row['price']; ?></td>
                    <td><?= @$row['discount']; ?>%</td>
                    <td><a href="admin_product/get_product_Specialist/<?= $row['id_product'] ?>"> <i class="fa fa-book"></i></a></td>
                    <td><a href="admin_product/gallery_product/<?= $row['id_product'] ?>"> <i class="fas fa-image"></i></a></td>
                    <td>
                        <a href="admin_product/attribute/<?= $row['id_product']; ?>">
                            <span>افزودن ویژگی</span>
                        </a>
                    </td>

                    <td>
                        <?php

                            foreach ($get_product2 as $val) {
                                if ($row['ID_category'] == $val['id_category']) {
                                    echo $val['title'];
                                    break;

                                }

                            }
                        ?>


                    </td>


                    <td><a href="product/index/<?= $row['id_product'] ?>"> <i class="fas fa-eye"></i></a></td>
                    <td><a href="admin_product/add_product/<?= $row['id_product'] ?>"><i class="fas fa-edit"
                                                                                         style="color: #000"></i></i>
                        </a></td>

                    <td><input type="checkbox"  name="id_product[]" value="<?= $row['id_product'] ?>"></td>

                </tr>
            <?php } ?>
            </tbody>

        </table>
    </form>
</div>
