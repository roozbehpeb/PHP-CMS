<div  class="box_price mt-2 text-center text-md-left">

    <input type="text" id="price-input">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="hot_root">
                    <div class="page_update">
                        <div class="cctv2022">
                            <div class="basket_add_button">
                                <button onclick="AddToBasket(<?= $Product_info_page[0]['id_product']; ?>); BasketAlert(); Big(<?= $Product_info_page[0]['id_product']; ?>);"
                                        class="btn btn_custom2 shadow-sm"><i class="material-icons ">shopping_cart</i>افزودن به سبد خرید
                                </button>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>

    </div>
</div>


<script>


    var gurantee_selected = '';
    function Get_gurantee() {
        $('#garanti_select ul li').click();
        $('#garanti_select ul li').click(function () {
            gurantee_selected = $(this).attr('data-id');
        })
    }
    Get_gurantee();
    Get_gurantee();


    function AddToBasket(Id_product) {
        var color = $('.selected_color').find('.circle.active').attr('data-id');
        var gurantee_selected2 = $('ul.garanti_ul li.active_guarantee').attr('data-id');
        var url = '<?= URL ?>product/addtobasket/' + Id_product + '/' + color + '/' + gurantee_selected;
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'html',
            success: function (data) {
                var root = $(data).find(".HeaderBasket");
                $(".HeaderBasket").html(root);
                QuantityBasket();
                selectColor();
                last_Color_Selected(color);
                Last_guarantee_selected(gurantee_selected2);
                $('.garanti_ul').hide(0);

            }
        });

    }

    function AddToBasket2(mycount, BasketId) {
        var color = $('.selected_color').find('.circle.active').attr('data-id');
        var ID_product = '<?= $productinfo['id_product']; ?>';
        // alert(gurantee_selected);
        var url = 'product/addtobasket2/';
        var data = {
            'count': mycount,
            'id_basket': BasketId,
            'ID_product': ID_product,
            'color': color,
            'guarantee': gurantee_selected
        };
        $.post(url, data, function (msg) {

        }, 'json')

    }


    function Big(Id_product) {

        var url = '<?= URL ?>product/index/' + Id_product;
        $.ajax({
            cache: false,
            url: url,
            type: 'post',
            dataType: 'html',
            success: function (data) {

                var count = $(data).find('.Single_page_product');
                $('.nnc').html(count);

            }
        });

    }


    function BasketAjaxUpdate(ID_product, color, gurantee_selected) {

        //  var url = 'http://digitalocean.tv/cart';
        $.ajax({
            cache: false,
            url: 'product/Ajax_count',
            type: 'POST',
            //contentType: "application/json",
            dataType: 'text',
            data: {'ID_product': ID_product, 'color': color, 'guarantee': gurantee_selected},
            success: function (data) {
                var obj = JSON.parse(data)

                var IdBasket = obj.id_basket

                $('.count-num span[data-idbasket=' + IdBasket + ']').empty();
                $('.count-num span[data-idbasket=' + IdBasket + ']').text(obj.count);
                BasketNumUpadate();


                /* var countBasket = $(data).find('.fullBasket');
                 $('.fullBasket').html(countBasket);*/


                /*  var IdBasket =  $('.count-num').find('span').attr(obj.id_basket);
                 if (  obj.id_basket == IdBasket )
                 {
                 $('.count-num span').text(obj.count);

                 }*/


            }
        });

    }


    function BasketNumUpadate() {
        var url = 'cart/QuantityBasket/';
        var data = {};
        var address = 'http://digitalocean.tv';
        $.post(url, data, function (msg) {
            $('.Icon_basket span').text(msg);
        })
    }

    BasketNumUpadate();


    function Last_guarantee_selected(gurantee_selected) {
        // var guarantee = $('.garanti_ul').find('li.active_guarantee').attr('data-id');
        //  var pptp= $('ul.garanti_ul li.list-group-item[data-id="' + gurantee_selected + '"]');

        $('ul.garanti_ul li[data-id="' + gurantee_selected + '"]').click();
        var txt = $('.active_guarantee').text();
        $('.zemanat_title').text(txt);

    }


    function last_Color_Selected(color) {
        //$('ul.select_color li span.active').click();
        $('ul.select_color li span[data-id="' + color + '"]').click();

    }


</script>

