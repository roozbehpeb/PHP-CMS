<?php require 'view/admin/layout.php';
    $slider=$data['slider'];
    //var_dump($slider);
?>

<div class="col-sm-10   p-2 ">

    <form action="admin_slider/index" enctype="multipart/form-data"
          method="post">
        <div class="flex-column p-1 my-1  mx-5 bg-light radius border-5">
            <div class="d-flex">
                <div class="col-1">
                    <label for="inputPassword6" class="col-form-label">عنوان اسلایدر</label>
                </div>
                <div class="col-3">
                    <input name="title" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
            <div class="d-flex">
                <div class="col-1">
                    <label for="inputPassword6" class="col-form-label">آدرس لینک</label>
                </div>
                <div class="col-3">
                    <input name="link" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </div>
            <div class=" d-flex ">
                <div class="d-flex">
                    <span class="m-2">افزودن تصویر جدید:  </span>
                    <input type="file" class="m-2" name="image">

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
        </div>

    </form>

    <form action="admin_slider/delete" method="post" enctype="multipart/form-data">

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
                foreach ($slider as $row) { ?>
                    <tr>
                        <td><?= $i ; ?></td>
                        <td><?= $row['title'] ; ?></td>
                        <td>
                            <img src="<?= $row['img_slider1']; ?>"
                                 alt="" width="300px">
                        </td>

                        <td><a href="admin_slider/index/<?= $row['id_slider1'] ?>"> <i class="fas fa-eye"></i></a></td>
                        <td><a href="admin_product/add_product/<?= $row['id_slider1'] ?>"><i class="fas fa-edit"
                                                                                             style="color: #000"></i></i>
                            </a></td>

                        <td><input type="checkbox" name="id_slider1[]" value="<?= $row['id_slider1'] ?>"></td>

                    </tr>

                <?php  $i = $i+1 ;  }  ?>


            </tbody>

        </table>
    </form>
</div>
