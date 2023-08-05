<?php
    $User_level = Model::GetUserLevel();
    if ($User_level == 3) {
        // header('location:' . URL . 'login');
    }


?>

<div class="container-fluid  justify-content-center bg-light admin_tab">
    <div class="row my_admin">
        <div class="col-md-2  bg-light p-4 border mt-1 ">
            <div class="d-flex flex-column">
                <?php if ($User_level == 1) { ?>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'dashboard') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_dashboard"><span>داشبورد</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'category') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="http://digitalocean.tv/admin_category/index/"><span>مدیریت دسته ها</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'product') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="http://digitalocean.tv/admin_product/index/"><span>مدیریت محصول</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'setting') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_setting"><span>تنظیمات</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'slider') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_slider"><span>مدیریت اسلایدر</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'statistics') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_statistics"><span>آمار و گزارشات</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'comment') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_comment"><span>مدیریت نظرات</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'order') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_order"><span>مدیریت سفارشات</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'manage_users') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="manage_users"><span>مدیریت کاربران</span></a>
                    </div>
                <?php } ?>
                <?php if ($User_level == 2) { ?>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'statistics') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_statistics"><span>آمار و گزارشات</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'comment') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_comment"><span>مدیریت نظرات</span></a>
                    </div>
                    <div class="p-3 dropdown-item menu-tab <?php if (@$active == 'order') {
                        echo 'active';
                    } ?>"><i class="fad fa-eye"></i>
                        <a href="admin_order"><span>مدیریت سفارشات</span></a>
                    </div>
                <?php } ?>
            </div>
        </div>


        <script>
            var currentPage = "<?= $User_level; ?>";
            if (currentPage > 2) {
                $(location).prop('href', 'http://digitalocean.tv')
            }
        </script>