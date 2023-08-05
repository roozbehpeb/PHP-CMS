<?php
    $active = 'comment';
    require 'view/admin/layout.php';
?>
<div class="col-sm-10   p-2">
    <div class="d-flex justify-content-between">
        <div>
            <h4>مدیریت نظرات</h4>
        </div>

        <div>
            <ul class="list-group list-group-horizontal mb-3">
                <li class="list-group-item">
                    <select class=" selectTag form-select form-select-sm" aria-label=".form-select-sm example" name="action">
                        <option selected>انتخاب کنید </option>
                        <option value="1">تایید</option>
                        <option value="2">عدم تایید</option>
                        <option value="3">حذف</option>
                    </select>
                </li>
                <li class="list-group-item ">
                    <a class="mx-1 px-1 align-items-start" onclick="submitFormMulti()">
                        <button type="button" class="btn btn-success btn-sm">اجرای عملیات </button>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <form action="" method="post" id="submit">
        <div class="comment_panel">
            <?php $GetComment = $data['Getcomment']; ?>
            <table class="w-100">
                <tr>
                    <th>ردیف</th>
                    <th>تاریخ</th>
                    <th>محصول</th>
                    <th>عنوان پیام</th>
                    <th>پیام</th>
                    <th>وضعیت</th>
                    <th>مشاهده</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    <th>انتخاب</th>
                </tr>
                <?php foreach ($GetComment as $key => $row) { ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['title_product']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['viewpoint']; ?></td>
                        <td><?php  if ($row['confirm']==0){
                                echo 'منتشر نشده';
                            }else{
                                echo 'منتشر شده';
                            }  ?>

                        </td>
                        <td>
                            <a href="product/index/<?= $row['ID_product']; ?>/User_Comment"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="addcomment/index/<?= $row['ID_product']; ?>/<?= $row['id_comment']; ?>"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <i onclick="deleteComment (<?= $row['id_comment']; ?>,this)" class="far fa-times-circle"></i>
                        </td>

                        <td>
                            <input type="checkbox" name="Id_Comment[]" value="<?= $row['id_comment']; ?>">
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </form>
</div>

<script>
    function submitFormMulti() {

        var actionSelected = $('.selectTag option:selected').val();
        var action = '';
        if (actionSelected == 1) {
            action = 'admin_comment/confirm';
        }
        if (actionSelected == 2) {
            action = 'admin_comment/unconfirm';
        }
        if (actionSelected == 3) {
            action = 'admin_comment/delete';
        }

        var form = $('form#submit');
        form.attr('action', action);
        form.submit();

    }
</script>

