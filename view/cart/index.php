<div class="container-fluid bg-white px-lg-5  ">


    <div class="page_content">
        <div class="page_update">
            <?php
                $ProductExist = $this->model->ProductExist();
                if ($ProductExist == 100) {
                    require_once 'table_products.php';
                } else if ($ProductExist == 0) {
                    require_once 'empy_card.php';
                }
            ?>
        </div>
    </div>

</div>


<script>

    input_layout();
    function input_layout() {
        $("input[type='number']").inputSpinner();
    }

    function QuantityBasket() {
        var url = 'cart/QuantityBasket/';
        var data = {};
        var address = 'http://digitalocean.tv';
        $.post(url, data, function (msg) {
            $('.Icon_basket span').text(msg);

            $('.Icon_basket').load('' + address + '.Icon_basket span', function () {
                input_layout();
            });
        })
    }

    QuantityBasket();

    function BasketAlert() {

        let timerInterval
        Swal.fire({
            title: '',
            html: ' به روز رسانی...',
            /* html: 'I will close in <b></b> milliseconds.',*/
            timer: 500,
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


    function UpdataBasket(mycount, BasketId) {

        BasketAlert();
        input_layout();

        var url = 'cart/UpdataBasket/';
        var data = {'BasketId': BasketId, 'count': mycount};
        var address = 'http://digitalocean.tv/cart';
        $.post(url, data, function (msg) {
            input_layout();
            //console.log(msg);


            $('.my-table_info').load('' + address + ' .table_info', function () {

                QuantityBasket();
                baskerHeaderUpdate();
                input_layout();
            });


            $('.plus_all').load('' + address + ' .reloadPrice', data);
            $('.plus_all2').load('' + address + ' .reloadPrice2', data);

        }, 'json')

    }

    /*    function baskerHeaderUpdate() {
     $(".Basket_content2").load(location.href + " .Basket_content2");

     }
     baskerHeaderUpdate();*/


    function removeBasket(basketId) {

        Swal.fire({
            title: '',
            text: "حذف از سبد خرید؟",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'حذف',
            cancelButtonText: 'انصراف'
        }).then((result) => {
            if (result.isConfirmed) {


                var url = 'cart/deleteBasket/' + basketId;
                var data = {};
                var address = 'http://digitalocean.tv/cart';
                $.post(url, data, function (msg) {

                    $('.my-table_info').load('' + address + ' .table_info', function () {
                        input_layout();
                    });

                    $('.plus_all').load('' + address + ' .reloadPrice', data);
                    $('.plus_all2').load('' + address + ' .reloadPrice2', data);
                    QuantityBasket();

                    function baskerHeaderUpdate() {
                        $(".Basket_content2").load(location.href + " .Basket_content2");
                    }

                    baskerHeaderUpdate();

                }, 'json');

                function emptybasket() {
                    // $('.page_content').fadeOut(0).load('' + address + ' .page_update', data).fadeIn(800);
                    var page_update = $('.page_content').fadeOut(10);
                    page_update.load('' + address + ' .page_update', data).fadeIn(800);
                }

                emptybasket();

            }


        })
    }

</script>

