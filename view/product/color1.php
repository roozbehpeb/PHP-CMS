<ul class="list-inline select_color">

    <?php
        $all_color = $productinfo['custom_color'];
        $Product_info_page = $data['Product_info_page'];


        $first = 1;
        foreach (@$Product_info_page as $color) { ?>
            <li onclick="select_color(); select_color_price(<?= $color['id_color']; ?>,<?= $color['id_product']; ?>);"
                class="selected_color list-inline-item border  position-relative">
        <span type="radio" data-id="<?= $color['id_color']; ?>" class="circle rounded-circle <?php if ($first == 1) {
            echo 'active';
        } ?>" style=" background-color: <?php echo $color['hex'] ?>;"></span>
                <span class="mr-1"><?php echo $color['TitleColor'] ?></span>
            </li>
            <?php $first = 0;
        } ?>
</ul>


<script>

    select_color();
    function select_color() {
        $('.selected_color').click(function () {
            $('.circle').removeClass('active');
            $('.circle', this).addClass('active');
        })
    }


    function select_color_price(ID_color, ID_product) {
        var url = 'product/Product_price/';
        var dataToSend = {
            'id_color': ID_color,
            'id_product': ID_product
        };
        // Set the `dataType` parameter to `text` to properly parse the response.
        $.ajax({
            url: url,
            type: 'POST',
            data: dataToSend, // Send the data to the server.
            dataType: 'json',
            success: function (data) {
//                $('.box_price p').html(data);
//
//                //$('#price-input').val(data.price);
//               var obj = JSON.parse(data);
////                var price2 = obj
////                $('.box_price p').empty();
////                $('.box_price p').val(data.price2);
//
////                console.log(data);
//               alert(obj.price);
                // Parse the JSON string to convert it into a JavaScript object
               // console.log(data);
                //var jsonData = JSON.parse(data);
                //var price = jsonData[1].price;
                $('#price-input').val(data[0].price);
            },
            error: function (xhr, textStatus, errorThrown) {
            }
        });
    }




    var root = '';

    function refreshcount(colorSelected, ID_product) {
        var url = 'product/refreshcount/';
        var data = {
            'color': colorSelected,
            'guarantee': gurantee_selected,
            'ID_product': ID_product
        };
        $.post(url, data, function (msg) {

            $('input[name=count]').val(msg);
            root = msg;
            //  $('ul li span.active').click();


        }, 'json')
        //$('ul li span.active').click()
    }


    function buttonorInput(colorSelected, id_basket, remain) {

        var ID_product = '<?= $productinfo['id_product']; ?>';
        var url = 'product/buttonorInput/';
        var data = {
            'color': colorSelected,
            'guarantee': gurantee_selected,
            'ID_product': ID_product,
            'id_basket': id_basket,
            'remain': remain
        };

        $.post(url, data, function (msg) {

            var AddToBasket = '<div class="basket_add_button"> <button onclick="AddToBasket(' + ID_product + '); BasketAlert()" class="btn btn_custom2 shadow-sm"><i class="material-icons ">shopping_cart</i>افزودن به سبد خرید </button> </div>';

            var AddToBasket100 = '<div class="nice-number"><input   onchange="AddToBasket2($(this).val(),' + id_basket + ');BasketNumUpadate();BasketAjaxUpdate(' + ID_product + ',' + colorSelected + ',' + gurantee_selected + ');BasketAlert(' + ID_product + ',' + colorSelected + ',' + gurantee_selected + ')" id="num_order" name="count" type="number"   value=" " min="1" max="' + remain + '" step="1"/></div>';

            if (msg == 100) {
                $('.page_update').empty();
                $('.page_update').append(AddToBasket100);
                $('input[name=count]').val(root);
                input_layout();
            }
            if (msg == 0) {

                $('.page_update').empty();
                $('.page_update').append(AddToBasket);

            }

        }, 'json')
    }


</script>

