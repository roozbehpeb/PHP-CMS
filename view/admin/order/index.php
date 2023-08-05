
<?php
    $active = 'order';

    require 'view/admin/layout.php';
?>


<div class="col-sm-10  bg-gradient  border p-1">
    <div class="customer_order p-1 ">
        <h4>سفارشات</h4>
        <form action="admin_order/delete_order" method="post">
            <table class="w-100 border">
                <tr>
                    <td>ردیف</td>
                    <td>کد</td>
                    <td>تاریخ</td>
                    <td>نوع پست</td>
                    <td>هزینه پست</td>
                    <td>مبلغ کل پرداختی</td>
                    <td>وضعیت</td>
                    <td>جزئیات</td>
                    <td>انتخاب</td>
                </tr>

                <?php $get_orders = $data['GetOrder'];

                    foreach ($get_orders as $key => $row) {

                        // var_dump($get_orders);

                        ?>

                        <tr class="customer_order_i border">
                            <td><?= $key + 1 ?></td>
                            <td><?= $row['id_order']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><?= $row['post_type'] ;  ;?></td>
                            <td><?=  number_format($row['post_price']);  ;?></td>
                            <td><?= number_format($row['priceTotal']); ?></td>
                            <td><?php  if ($row['pay']==1){
                                    echo 'پردداخت شده';
                                } else{
                                    echo 'پردداخت نشده';
                                }  ?></td>
                            <td><i onclick="show_description(this)"></i></td>
                            <td><input type="checkbox" name="Id_orders[]" value="<?= $row['id_order']; ?>"></td>
                        </tr>

                        <tr class="details_table">
                            <td colspan="8" class="bg-white">
                                <div class="sub_table1">
                                    <table>
                                        <tr>
                                            <td>کالا</td>
                                            <td>تعداد</td>
                                            <td>قیمت واحد</td>
                                            <td>درصد تخفیف</td>
                                            <td>تخفیف هر محصول</td>
                                            <td>تخفیف مجموع</td>
                                            <td>قیمت کل</td>
                                        </tr>
                                        <?php $Basket = unserialize($row['basket']);
                                            foreach ($Basket as $row2) {
                                                $price = $row2['price'];
                                                $discount = $row2['discount'];
                                                $discountTotal = $row2['discountTotal'];
                                                $count = $row2['count'];
                                                $each_discount = $discountTotal / $count;
                                                $all_price = $price * $count;
                                                $PriceFinal = $all_price - $row2['discountTotal']; ?>

                                                <tr>
                                                    <td><?= $row2['title']; ?></td>
                                                    <td><?= $row2['count']; ?></td>
                                                    <td><?= $row2['price']; ?></td>
                                                    <td><?= $discount * 10 . '%' ?></td>
                                                    <td><?= $each_discount; ?></td>
                                                    <td><?= $row2['discountTotal']; ?></td>
                                                    <td><?= $PriceFinal; ?></td>
                                                </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <div class="step_order2">
                                    <div class="row py-3 d-flex align-items-center justify-content-center">
                                        <div class="col-1 px-0 d-flex justify-content-center flex-column   align-items-end">
                                            <div class="d-flex ">
                                                <div class="p-1 m-1 bg-primary"></div>
                                                <div class="p-1 m-1 bg-primary"></div>
                                                <div class="p-1 m-1 bg-primary"></div>
                                            </div>
                                        </div>
                                        <div class="col-1 px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="circle rounded-circle  position-relative"></div>
                                            <span class="">تکمیل خرید</span>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="line"></div>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="circle rounded-circle position-relative "></div>
                                            <span class="">تکمیل خرید</span>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="line"></div>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="circle rounded-circle active position-relative "></div>
                                            <span class="">تکمیل خرید</span>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="line"></div>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="circle rounded-circle active position-relative "></div>
                                            <span class="">تکمیل خرید</span>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="line"></div>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                                            <div class="circle rounded-circle position-relative "></div>
                                            <span class="">تکمیل خرید</span>
                                        </div>
                                        <div class="col-1  px-0 d-flex justify-content-center flex-column   align-items-start">
                                            <div class="d-flex">
                                                <div class="p-1 m-1 bg-primary"></div>
                                                <div class="p-1 m-1 bg-primary"></div>
                                                <div class="p-1 m-1 bg-primary"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 bg-white">
                                    <div class="col-12 mt-2">
                                        <div class="user_left_widget border bg-white p-4 mx-2">
                                            <div class="row w-100 gx-5">
                                                <div class="header_table  w-100 p-2 d-flex justify-content-start">
                                                    <i class="fas fa-user-tag p-2"></i>
                                                    <span class="text-start box_color post text-start"> مشخصات پستی </span>
                                                    <a class="mx-1"
                                                       href="admin_order/order_edit/<?= $row['id_order']; ?>">
                                                        <button type="button" class="btn btn-primary btn-sm">ویرایش
                                                            سفارش
                                                        </button>
                                                    </a>
                                                    <a class="mx-1"
                                                       href="admin_order/Sales_Invoice/<?= $row['id_order']; ?>">
                                                        <button type="button" class="btn btn-success btn-sm">صدور
                                                            فاکتور
                                                        </button>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="row w-100 mt-3 table_user position-relative">
                                                <div class="col-4 d-flex justify-content-between border-end border-bottom">
                                                    <div class="table">
                                                        <p>نام و نام خانوادگی</p>
                                                        <span><?= $row['family']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between  border-bottom">
                                                    <div class="table">
                                                        <p>تلفن</p>
                                                        <span><?= $row['mobile']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between border-start border-bottom">
                                                    <div class="table">
                                                        <p>تلفن ثابت</p>
                                                        <span><?= $row['tel']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between border-end border-bottom">
                                                    <div class="table">
                                                        <p>ایمیل</p>
                                                        <span><?= $row['email']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between border-end border-bottom">
                                                    <div class="table">
                                                        <p>کد پستی</p>
                                                        <span><?= $row['zipcode']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between  border-bottom">
                                                    <div class="table">
                                                        <p>کدمی</p>
                                                        <span><?= $row['passport']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between border-end border-bottom">
                                                    <div class="table">
                                                        <p>نوع پست</p>
                                                        <span><?= $row['post_type']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between border-end border-bottom">
                                                    <div class="table">
                                                        <p>استان</p>
                                                        <span><?= $row['state']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-4 d-flex justify-content-between  border-bottom">
                                                    <div class="table">
                                                        <p>شهر</p>
                                                        <span><?= $row['city']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between  border-bottom">
                                                    <div class="table">
                                                        <p>آدرس دقیق پستی</p>
                                                        <span><?= $row['full_address']; ?></span>
                                                    </div>
                                                    <div class="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

            </table>
            <div class="row justify-content-end">
                <div class="col-auto me-5 mt-2">
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </div>
            </div>
        </form>
    </div>
</div>


</div>
</div>


