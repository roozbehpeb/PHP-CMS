<head>
    <script src="public/js/city.js"></script>

    <script src="../../public/js/bootstrap-select.js"></script>
    <!--  <script src="../../public/js/mahale.js"></script>-->
    <!--<script src="../../public/js/frotel/city.js"></script>
    <script src="../../public/js/frotel/ostan.js"></script>-->
    <!--<link rel="stylesheet" href="../../public/css/bootstrap-select.css">-->
    <!--  <link rel="stylesheet" href="../../public/css/bootstrap.min.css">-->

</head>

<?php /*$address = $data['address']; */ ?>

<!--step to step-->
<div class="container-fluid bg-white">
    <div class="step_order2">
        <div class="row py-3 d-flex align-items-center justify-content-center">
            <div class="col-1 px-0 d-flex justify-content-center flex-column   align-items-end">
                <div class="d-flex ">
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                </div>
            </div>
            <div class="col-1 px-0 d-flex justify-content-center flex-column  align-items-center"
                 style="pointer-events:none">
                <div class="circle rounded-circle  position-relative active_check"></div>
                <span class="">ورود به سایت</span>
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

</div>


<div class="container-fluid p-5 bg-white  ">
    <!--  add adddress-->

    <?php require('add_address.php'); ?>
    <?php require('user_data.php'); ?>
    <?php require('post_type.php'); ?>


    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="d-flex">
                <div class="px-2"><span>آیا فاکتور ارسال شود؟</span></div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <span>بله</span>
                    </label>
                </div>
                <div class="form-check mx-3 ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        <span>خیر</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-5">

        <a href="cart">
            <button type="button" class="btn btn-primary my_btn">
                <i class="fas fa-undo-alt"></i>
                <span>  بازگشت به سبد خرید</span>
            </button>
        </a>
        <a href="cart4">

            <button type="button" class="btn btn-success my_btn">
                <i class="fad fa-shopping-cart  p-1 "></i>
                <span>   ثبت اطلاعات و ادامه خرید</span>
            </button>
        </a>

    </div>
    <!--start footer-->

    <section class="container-fluid  py-4">


        <script>

            function deleteUserAddress(UserAddressId) {

                Swal.fire({
                    title: '',
                    text: "آدرس را حذف می کنید؟",
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'بله',
                    cancelButtonText: 'خیر'
                }).then((result) => {
                    if (result.isConfirmed) {

                        var url = 'cart3/deleteUserAddress';
                        var data = {'UserAddressId': UserAddressId};
                        var address = 'cart3/';
                        $.post(url, data, function (msg) {
                            $('.user-data').load('' + address + ' .user-data', data);
                            UserPostAddress();
                        })

                    }


                })
            }

            var UpdateAddress = '';

            function submitform() {
                //$('#add_address').submit();
                var url = 'cart3/add_address/' + UpdateAddress;
                var data = $('#add_address').serializeArray();
                var address = 'http://digitalocean.tv/cart3';
                $.post(url, data, function (msg) {

                    $('.main_info').load('' + address + ' .table_generator', data);

                })

            }


            function EditAddress(id_user_address) {
                UpdateAddress = id_user_address;
                var url = 'cart3/EditAddress/' + id_user_address;
                var data = {}
                $.post(url, data, function (msg) {
                    myrelod();
                    $('input[name=family]').val(msg['family']);
                    $('input[name=mobile]').val(msg['mobile']);
                    $('input[name=tel]').val(msg['tel']);
                    $('input[name=passport]').val(msg['passport']);
                    $('input[name=email]').val(msg['email']);
                    $('input[name=zipcode]').val(msg['zipcode']);
                    $('input[name=state]').val(msg['state']);
                    $('input[name=city]').val(msg['city']);
                    $('textarea[name=full_address]').val(msg['full_address']);
                    var state = msg['state'];
                    var mycity = msg['city'];

//            console.log(msg);

                    $('.state option').each(function (index) {
                        var txt = $(this).text();
                        if (txt == state) {
                            $(this).attr('selected', 'selected');
                            ostan($('.state'));
                            myrelod();
                        }

                    });


                    $('.city option').each(function (index) {
                        var txt2 = $(this).text();
                        if (txt2 == mycity) {
                            $(this).attr('selected', 'selected');
                            myrelod();

                        }

                    });


                }, 'json');

            }


            myrefresh();
            myrelod();


            function myrelod() {
                $('.selectpicker').selectpicker('refresh');
            }

            function myrefresh() {
                $('.my_btn').on("click", function () {
                    $('#add_address')[0].reset();
                });

            }


            function GetPostPrice() {
                var url = 'cart3/GetPostPrice';
                var addressId = $('.circle.active_post').closest('.post_table').attr('data-city');
                var post_typeId = $('.circle.active_post_type').closest('.post_type').attr('data-post_typeId');
                var data = {'addressId': addressId, 'post_typeId': post_typeId};
                $.post(url, data, function (msg) {
                    console.log(msg);
                    var FinalPriceProduct = msg['FinalPriceProduct'];
                    var FinalPriceProduct = FinalPriceProduct.toLocaleString();
                    $('#FinalPriceProduct').text(FinalPriceProduct);

                    var FinalPrice = msg['FinalPriceBasket'];
                    var FinalPrice = FinalPrice.toLocaleString();
                    $('#FinalPriceBasket').text(FinalPrice);


                }, 'json')
            }


            GetPostPrice();


            function SessionPostType() {

                var post_type_Id = $('.circle.active_post_type').closest('.post_type').attr('data-post_typeId');
                var url = 'cart3/SessionPostType';
                var data = {'post_type_Id': post_type_Id};
                $.post(url, data, function (msg) {

                })
            }


            SessionPostType();

            function UserPostAddress() {
                var post_Item = $('.post_table');
                post_Item.click(function () {
                    $('.circle , .Triangle').removeClass('active_post triangle-topright');
                    $('.Triangle', this).addClass('triangle-topright');
                    $('.circle', this).addClass('active_post');
                    GetPostPrice();
                    SessionPostType();
                })


                var post_Item = $('.post_type');
                post_Item.click(function () {
                    $('.circle').removeClass('active_post_type');
                    $('.circle', this).addClass('active_post_type');
                    GetPostPrice();
                    SessionPostType();
                })
            }

            UserPostAddress();

        </script>


    </section>

