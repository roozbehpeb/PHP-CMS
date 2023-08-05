<?php require 'view/admin/layout.php';
    @$get_productInfo = $data['get_productInfo'];
    @$get_Specialist = $data['get_product_Specialist'];
    @$Specialist_Info = $data['Specialist_Info'];

    if (isset($get_Specialist['id_product'])) {
        @$edit = 'X';
    } else {
        @$edit = '';

    }
?>


<div class="col-sm-10   p-2 ">
    <form action="admin_product/delete_Specialist/<?= $get_productInfo['id_product'];   ?>" method="post">

        <a type="submit">
            <button type="submit" class="btn btn-danger float-end ms-3"><i class="fal fa-trash-alt"
                                                                           style="color: #fff; position: relative; top: 1px;"></i>
                حذف نقد
            </button>
        </a>

        <a href="admin_product/add_product_Specialist/<?= $get_productInfo['id_product']; ?>">
            <button type="button" class="btn btn-success float-end ms-3"><i class="fas fa-plus"
                                                                            style="color: #fff; position: relative; top: 1px;"></i>
                افزودن نقد
            </button>
        </a>

        <div class="row">
            <div class="col">
                <span>نقد و برسی : <?= $get_productInfo['title']; ?></span>
            </div>
        </div>

        <table class="table table-bordered">

            <thead>
            <tr>

                <th scope="col">محصول</th>
                <th scope="col">عنوان نقد</th>
                <th scope="col">برسی تخصصی</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($get_Specialist as $row) { ?>
                <tr>
                    <td><?= @$row['ID_product']; ?></td>
                    <td><?= @$row['title']; ?></td>
                    <td><?= @$row['description']; ?></td>


                    <td>
                        <a href="admin_product/add_product_Specialist/<?= @$get_productInfo['id_product']; ?>/<?= @$row['id_naghd']; ?>"><i
                                    class="fas fa-edit"
                                    style="color: #000"></i></i>
                        </a></td>

                    <td><input type="checkbox" name="id_naghd[]" value="<?= $row['id_naghd'] ?>"></td>

                </tr>
            <?php } ?>
            </tbody>

        </table>
    </form>
</div>
