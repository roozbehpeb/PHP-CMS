<?php require 'view/admin/layout.php';
    $gallery = $data['gallery'];
    $get_productInfo = $data['get_productInfo'];
?>

<div class="col-sm-10   p-2 ">

    <form action="admin_product/gallery_product/<?= $get_productInfo['id_product'] ?>" enctype="multipart/form-data"
          method="post">
        <div class=" d-flex flex-column my-1  mx-5 bg-light radius border-5">
            <div class="d-flex">
                <span class="m-2">افزودن تصویر جدید:  </span>
                <input type="file" class="m-2" name="add_gallery">

            </div>

            <div>
                <a href="">
                    <button type="submit" class="btn btn-primary btn-sm m-2"><i class="fas fa-image"
                                                                                style="color: #fff;"></i>
                        <span>ذخیره کردن</span>
                    </button>
                </a>
            </div>
        </div>
    </form>

    <form action="admin_product/delete_gallery/<?=  @$get_productInfo['id_product'];   ?>" method="post">

        <div class="d-flex p-2  my-1 mx-5 bg-light radius border-5 justify-content-end">
            <a>
                <button type="submit" class="btn btn-danger btn-sm  ">
                    <i class="fal fa-trash-alt" style="color: #fff;"></i>
                    <span>حذف</span>
                </button>
            </a>
        </div>

        <table class="table table-bordered">

            <thead>
            <tr>
                <th scope="col">ردیف</th>
                <th scope="col">گالری تصاویر</th>
                <th scope="col">مشاهده</th>
                <th scope="col">ویرایش</th>
                <th scope="col">حذف</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                foreach ($gallery as $row) { ?>
                    <tr>
                        <td><?= $i = 1; ?></td>
                        <td>
                            <img src="public/img/products/<?= $row['ID_product']; ?>/gallery/small/<?= $row['image_name']; ?>"
                                 alt="" width="80px">
                        </td>


                        <td><a href="product/index/<?= $row['ID_product'] ?>"> <i class="fas fa-eye"></i></a></td>
                        <td><a href="admin_product/add_product/<?= $row['ID_product'] ?>"><i class="fas fa-edit"
                                                                                             style="color: #000"></i></i>
                            </a></td>

                        <td><input type="checkbox" name="id_gallery[]" value="<?= $row['id_gallery'] ?>"></td>

                    </tr>
                <?php }
                $i = $i++

            ?>
            </tbody>

        </table>
    </form>
</div>
