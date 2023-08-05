<div class="container-fluid bg-white px-lg-5 ">

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


    <div class="row">
        <div class="col-sm-12 mb-2">
            <i class="fas fa-tag"></i>
            <span5>کد تخفیف</span5>
        </div>
        <div class="d-md-flex border p-3 mb-2">
            <div class="flex-grow-1">
                <h6>کد تخفیف دیجیکالا دارم</h6>
                <span>کد تخفیف خود راوارد کنید تا از مبلغ نهایی پرداختی کسر گردد</span>
            </div>

            <div class=" px-1 border-1  discount_msg">

            </div>
            <div class="mx-3 discount  position-relative ">
                <input onchange="check_discount_code()" maxlength="6" checked type="text" class="form-control text-left"
                       id="discount_code"
                       aria-describedby="emailHelp">
            </div>

            <div class=" my_btn2">

                <a onclick="check_discount_code()">
                    <button type="button" class="btn btn-success my_btn">
                        ثبت کد تخفیف
                    </button>
                </a>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mb-2">
            <i class="fas fa-gift"></i>
            <span5>کارت هدیه دارم</span5>
        </div>
        <div class="d-md-flex border p-3 mb-2">
            <div class="flex-grow-1">
                <h6>کارت هدیه دیجیکالا دارم </h6>
                <span>کد کارت هدیه خود راوارد کنید تا از مبلغ نهایی پرداختی کسر گردد</span>
            </div>

            <div class="mx-3 ">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class=" my_btn2 ">
                <button type="button" class="btn btn-primary my_btn">
                    ثبت کارت هدیه
                </button>
            </div>

        </div>
    </div>

    <div class="row  mb-0 pb-1 d-flex justify-content-end mb-3">

        <div class="col-12 col-md-12 p-2 total_price d-flex justify-content-end">
            <span class="px-5">مبلغ قابل پرداخت:</span>

            <span id="Final_price"> </span>
            <span>تومان</span>

        </div>
    </div>

    <div class="row border payment_select d-flex">


        <div class="col col-md-8 p-1">
            <p class="pt-2 d-block mb-1">پرداخت انلاین</p>
            <div class="d-md-flex  justify-content-start align-items-center">
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        درگاه پرداخت بانک سامان
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                           checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        درگاه پرداخت بانک ملت
                    </label>
                </div>
            </div>
        </div>

        <div class="d-none d-md-flex col-md-3   d-flex flex-column  align-items-center p-1">
            <div class="p-1">
                <picture>
                    <img src="assets/img/pay-online.png" alt="Flowers" style="width:200px;">
                </picture>
            </div>
            <span class="p-1" style="font-size: 12px">با پرداخت آنلاین برنده جایزه شوید !  </span>
        </div>

    </div>

    <div class="row border payment_select d-flex mt-2">

        <div class="col-auto col-md-1 border d-flex justify-content-center align-items-center p-1 w-auto ">
            <div class="form-check m-2">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault38">
            </div>
        </div>

        <div class="col  col-md-11 p-1 w-auto ">
            <p class="pt-2 d-block mb-1">کارت به کارت</p>
            <div class="d-md-flex  justify-content-start align-items-center">
                <span>شما می توانید انتقال وجه خور را به صورت کارت به کارت انجام دهید</span>
            </div>
        </div>

    </div>

    <div class="row border payment_select d-flex mt-2">

        <div class="col-auto col-md-1 border d-flex justify-content-center align-items-center p-1 w-auto ">
            <div class="form-check m-2">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault96">
            </div>
        </div>

        <div class="col col-md-11 p-1  ">
            <p class="pt-2 d-block mb-1">واریز به حساب</p>
            <div class="d-md-flex  justify-content-start align-items-center">
                <span>شما می توانید انتقال وجه خور را به صورت واریز به حساب انجام دهید</span>
            </div>
        </div>

    </div>

    <div class="row my-3">
        <div class="col-sm-12 border p-2">
            <div class="p-1 ">
                <div class="form-check">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        قوانین و مقررات را می پذیرم
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class=" row  card_buy   justify-content-between">

        <div class="col-6">

            <a href="cart4">
                <button type="button" class="btn btn-primary my_btn">
                    <i class="fas fa-undo-alt"></i>
                    <span> بازگشت به مرحله قبل</span>
                </button>
            </a>
            </a>

        </div>


        <div class="col-6 d-flex flex-column  align-items-end ">
            <button onclick="submitform2()" class="btn btn-success">
                <i class="fad fa-shopping-cart   p-1 "></i>
                پرداخت
            </button>

        </div>


    </div>


</div>


<script>

    function BasketAlert() {
        let timerInterval
        Swal.fire({
            title: '',
            html: ' درحال برسی...',
            /* html: 'I will close in <b></b> milliseconds.',*/
            timer: 600,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })

    }

    function CalculatePriceValue() {

        var discount_code = $('#discount_code').val();
        var url = 'cart5/calculatepriceBasket';
        var data = {'discount_code': discount_code};
        $.post(url, data, function (msg) {
            //console.log(msg);

            $('#Final_price').text(msg);


        })
    }

    function check_discount_code() {
        var discount_code = $('#discount_code').val();
        var url = 'cart5/check_discount_code';
        var data = {'discount_code': discount_code};
        //var url = 'cart5/check_discount_code/'+discount_code;
        //var data = {};
        $.post(url, data, function (msg) {

            //if (msg == true) {
            //if (msg == valid) {
            if (msg[0] != 0) {

                $('.discount').removeClass('discountInputefaild');
                $('#discount_code').removeClass('discount_faild');
                $('.discount').addClass('discountInputeSuccess');
                $(' #discount_code').addClass('discount_Success');
                $(' #discount_code').prop("disabled", true);

                $('.discount_msg').empty();

                var html = '<i class="fas fa-badge-check"style="color: green"></i>  <span>کد تخفیف اعمال شد</span>'
                BasketAlert();
                $('.discount_msg').append(html);
                $('.discount_msg span').css('color', 'green')
                //$('#Final_price').text(msg[1]);
                var PayPrice = (msg[1]).toLocaleString();
                $('#Final_price').text(PayPrice)


            } else {
                BasketAlert();
                $('.discount').removeClass('discountInputeSuccess');
                $(' #discount_code').removeClass('discount_Success');
                $('.discount').addClass('discountInputefaild ');
                $(' #discount_code').addClass('discount_faild ');


                $('.discount_msg').empty();
                var html = '<i class="fas fa-exclamation-triangle"style="color: #c00000"></i>  <span>کد تخفیف اشتباه است</span>'
                $('.discount_msg').append(html);
                $('.discount_msg span').css('color', 'red')

                //$('#Final_price').text(msg[1]);

            }

        }, 'json');


    }

    CalculatePriceValue();


    function submitform2() {
        var discount_code = $('#discount_code').val();
        var url = 'cart5/SaveOrder';
        var data = {'discount_code': discount_code};
        $.post(url, data, function (msg) {
            window.location = "<?php  URL  ?>panel"
        })
    }


    /*
     function submitform2() {
     var Final_price = $('#pay_price').val();
     alert(Final_price);
     var url = 'cart5/SaveOrder';
     var data = {'Final_price': Final_price};
     $.post(url, data, function (msg) {
     // window.location.href="http://digitalocean.tv;
     })
     }
     */


</script>