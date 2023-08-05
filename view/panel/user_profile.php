<?php $userInfo = $data['UserInfo']; ?>
<div class="col-md-9">
    <div class="user_left_widget border bg-white p-4">
        <div class="row w-100 gx-5">
            <div class="header_table  w-100 p-2">
                <i class="fas fa-user-tag p-2"></i>
                <span class="text-end box_color">اطلاعات شخصی</span>
            </div>
        </div>
        <div class="row w-100 mt-3 table_user position-relative">
            <div class="col-6 d-flex justify-content-between border-end border-bottom">
                <div class="table">
                    <p>نام و نام خانوادگی</p>
                    <span><?= $userInfo['user_name']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-bottom">
                <div class="table">
                    <p>همراه</p>
                    <span><?= $userInfo['mobile']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between border-end border-bottom">
                <div class="table">
                    <p>ایمیل</p>
                    <span><?= $userInfo['Email']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-bottom">
                <div class="table">
                    <p>کد ملی</p>
                    <span><?= $userInfo['national_id']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between border-end ">
                <div class="table">
                    <p>تلفن ثابت</p>
                    <span><?= $userInfo['tel']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  ">
                <div class="table">
                    <p>تولد</p>
                    <span><?= $userInfo['born']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-top border-end ">
                <div class="table">
                    <p>جنسیت</p>
                    <span><?php

                            if ($userInfo['sex'] == 1) {
                                echo 'مرد';
                            } else {
                                echo 'زن';
                            }

                        ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-top  border-bottom  ">
                <div class="table">
                    <p>خبرنامه</p>
                    <span><?php

                            if ($userInfo['newsletter'] == 1) {
                                echo 'بله';
                            } else {
                                echo 'خیر';
                            }

                        ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-top border-end">
                <div class="table">
                    <p>آدرس</p>
                    <span><?= $userInfo['address']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  ">
                <div class="table">
                    <p>شناسه کاربر</p>
                    <span><?= $userInfo['id_user']; ?></span>
                </div>
                <div class="edit">
                    <a href="panel/user_Info"><i class="fas fa-edit"></i></a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-end  ">

            </div>
            <div class="col-6 d-flex justify-content-end  ">
                <a href="panel/change_password">
                    <button type="button" class="btn btn-primary btn-sm mx-2">تغییر رمز ورود</button>
                </a>
                <a href="panel/user_Info">
                    <button type="button" class="btn btn-primary btn-sm">ویرایش مشخصات</button>
                </a>
            </div>
        </div>
    </div>


</div>

<div class="col-md-3">
    <?php $Statistics = $data['Statistics']; ?>
</div>
<div class="col-md-9 justify-content-end">
    <div class="user_left_widget border bg-white p-4">
        <div class="row w-100 gx-5">
            <div class="header_table  w-100 p-2">
                <i class="fas fa-user-tag p-2"></i>
                <span class="text-end box_color">گزارش عملکرد</span>
            </div>
        </div>
        <div class="row w-100 mt-3 table_user position-relative">
            <div class="col-6 d-flex justify-content-between border-end border-bottom">
                <div class="table">
                    <p>تعداد کل سفارشات</p>
                    <span><?= $Statistics['num_order']; ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-bottom">
                <div class="table">
                    <p>سفارشات در حال برسی</p>
                    <span><?= $Statistics['order_verify']; ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between border-end border-bottom">
                <div class="table">
                    <p>سفارشات در حال پردازش</p>
                    <span><?= $Statistics['order_progress']; ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-bottom">
                <div class="table">
                    <p>تعداد نظرات ارسال شده</p>
                    <span><?= $Statistics['comment_num']; ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between border-end ">
                <div class="table">
                    <p>دیجی بن های مصرفی</p>
                    <span><?php ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  ">
                <div class="table">
                    <p>تعداد نقد ها</p>
                    <span><?php ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-top border-end ">
                <div class="table">
                    <p>پیغام های خوانده نشده</p>
                    <span>
                        <?= $Statistics['unread_massage']; ?>
                    </span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-top  border-bottom  ">
                <div class="table">
                    <p>پیغام های خوانده شده</p>
                    <span><?= $Statistics['read_massage']; ?></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  border-top border-end">
                <div class="table">
                    <p>سایر 2</p>
                    <span></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-between  ">
                <div class="table">
                    <p>سایر 3</p>
                    <span></span>
                </div>
                <div class="edit">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
        </div>
    </div>


</div>
