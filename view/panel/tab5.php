<div class="tab-pane fade <?php if ($ActiveTab == 'digibon') {
    echo 'show active';
} ?> bg-white p-5" id="bon">
    <div class="bon_panel">
        <form class="form-check-inline">
            <div class="form-group mb-2">
                <span>دیجی بن</span>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="text2" class="sr-only">دیجی بن</label>
                <input type="text" class="form-control savecode" id="text2" placeholder="دیجی بن">
            </div>
            <div class=" bg-primary bon_btn rounded p-1 m-0">
                <i class="fas fa-plus border-start p-1 "></i>
                <span onclick="savecode()" class="mycursor">ثبت اطلاعات</span>
            </div>
        </form>
    </div>

    <div class="digibon comment_panel">
        <table class="w-100">
            <tr>
                <th>ردیف</th>
                <th>کد</th>
                <th>سفارش</th>
                <th>شرح</th>
                <th>تاریخ ثبت</th>
                <th>تاریخ انقضا</th>
                <th>اعتبار اولیه</th>
                <th>اعتبار مصرفی</th>
                <th>مانده</th>
                <th>وضعیت</th>
                <th>جزئیات</th>
            </tr>
            <?php $Get_discount_code = $data['Get_discount_code'];
                $i = 1;
                foreach ($Get_discount_code as $row) {
                    ?>
                    <tr>
                        <td>1</td>
                        <td>85749</td>
                        <td>DKC-5646848</td>
                        <td>دیجی بن دریافتی از سفارش64684</td>
                        <td><?= $row['date_start']; ?></td>
                        <td><?= $row['date_end']; ?></td>
                        <td><?= $row['max']; ?></td>
                        <td><?= $row['discount_used']; ?></td>
                        <td><?= $row['max'] - $row['discount_used']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td><i onclick="show_description(this)"></i></td>
                    </tr>

                    <tr class="details_table ">
                        <td colspan="11" class="bg-white">
                            <table class="w-100">
                                <tr>
                                    <th>سفارش</th>
                                    <th>نوع</th>
                                    <th>تاریخ</th>
                                </tr>
                                <?php $orders = $row['orders'];
                                    foreach ($orders as $row2) { ?>
                                        <tr>
                                            <td><?= $row2['id_order'];; ?></td>
                                            <td>خرید</td>
                                            <td>تعریف نشده</td>
                                        </tr>
                                    <?php } ?>
                            </table>
                        </td>
                    </tr>

                    <?php $i++;
                } ?>
        </table>
    </div>

</div>