<?php
    $active = 'setting';

    require 'view/admin/layout.php';


    $option = Model::getoption();
    //    var_dump($option);


?>


<div class="col p-2 border bg-light">
    <div class="d-flex justify-content-between">
        <div>
            <h4>تنظیمات سایت</h4>
        </div>
    </div>
    <form action="admin_setting/index" method="post" id="submit">

        <div class="flex-column">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>تعداد اسلایدر</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="text" value="<?= $option['limit_slider']; ?>" name="limit_slider">
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>موبایل</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="text" value="<?= $option['mobile']; ?>" name="mobile">
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>تلفن</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="text" value="<?= $option['phone']; ?>" name="phone">
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>ایمیل</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="text" value="<?= $option['email']; ?>" name="email">
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>آدرس دامین</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="text" value="<?= $option['main_domain']; ?>" name="main_domain">
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>انتخاب رنگ بدنه</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="color" value="<?= $option['body_color']; ?>" name="body_color">
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <span>انتخاب رنگ منو</span>
                </li>
                <li class="list-group-item">
                    <div class="comment_panel">
                        <input type="color" value="<?= $option['menu_color']; ?>" name="menu_color">
                    </div>
                </li>
            </ul>

            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <button type="submit" class="btn btn-primary btn-sm">
                        ذخیره تغییرات
                    </button>
                </li>
            </ul>
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


