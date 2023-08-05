<?php

    $BasketHeader = $this->model->GetBasketHeader();
    Model::SessionInit();
    $BasketHeader = Model::SessionGet('BasketHeader');
    //var_dump($BasketHeader[0]['id_basket']);
?>


<!--start product -->

<?php

    $product_main_image = $data['product_main_image'];
    $get_gallery = $data['get_gallery'];

?>
<?php $productinfo = $data['product_info'];
    //var_dump($productinfo);
    if ($productinfo['special_offer'] == 1) {
        require('offer.php');
    }


?>

<div class="nnc">
    <div class="Single_page_product">
        <div class="row bg-success m-0 PageRefresh">

            <!--right-side-->
            <?php require('right-side.php'); ?>
            <!-- End right-side-->


            <?php require('left-side.php'); ?>
            <!--left-side-->
        </div>
    </div>
</div>


<!--End left-side-->


<!--end product -->

<!--product description-->
<?php require('description.php'); ?>
<!--End product description-->


<!--start box-tabs-->
<?php require('tabs.php'); ?>
<!--end box-tabs-->

<!--start box-tabs-->
<?php require('onlyalloweb.php'); ?>
<!--end box-tabs-->


<script>


    function input_layout() {
        $("input[type='number']").inputSpinner();
    }

    function BasketAlert(ID_product, colorSelected, gurantee_selected) {
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
                setTimeout(BasketAjaxUpdate(ID_product, colorSelected, gurantee_selected), 50);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })


    }


    $(document).ready()
    {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            rtl: true,
            margin: 25,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    }
</script>
