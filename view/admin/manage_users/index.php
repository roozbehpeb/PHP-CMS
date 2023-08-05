<?php
    $active = 'manage_users';

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
                        <option value="1">تغییر به مدیر</option>
                        <option value="2">تغییر به کارمند</option>
                        <option value="3">تغییر به کاربر عادی</option>
                        <option value="4">حذف کاربر</option>
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
            <?php $get_users = $data['get_users']; ?>
            <table class="w-100">
                <tr>
                    <th>ردیف</th>
                    <th>تاریخ عضویت</th>
                    <th>نام</th>
                    <th>موبایل</th>
                    <th>ایمیل</th>
                    <th>کد ملی</th>
                    <th>سطح دسترسی</th>
                    <th>ویرایش کاربر</th>
                    <th>انتخاب</th>
                </tr>
                <?php foreach ($get_users as $key => $row) { ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td>             </td>
                        <td><?= $row['user_name']; ?></td>
                        <td><?= $row['mobile']; ?></td>
                        <td><?= $row['Email']; ?></td>
                        <td><?= $row['national_id']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td>
                            <a href="#"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <input type="checkbox" name="IdUser[]" value="<?= $row['id_user']; ?>">
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
            action = 'manage_users/ToManager';
        }
        if (actionSelected == 2) {
            action = 'manage_users/ToEmployee';
        }
        if (actionSelected == 3) {
            action = 'manage_users/ToOrdinary';
        }
        if (actionSelected == 4) {
            action = 'manage_users/delete';
        }

        var form = $('form#submit');
        form.attr('action', action);
        form.submit();

    }
</script>

