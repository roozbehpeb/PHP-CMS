<div class="container-fluid text-center custom-sidebar ">

    <form id="form_search2">
        <div class="row justify-content-center m-auto bg-white p-2">

            <?php require('right-sidebar.php'); ?>
            <?php require('left-sidebar.php'); ?>

        </div>
    </form>


</div>


<script type="text/javascript">
    function dosearch() {
        var UserData = $('#form_search2').serializeArray();
        var exist = 0;
        if ($('.filter_exist ').hasClass('active')) {
            exist = 1;
        }
        UserData.push({'name': 'exist', 'value': exist});

        var keyword = $('#keyword').val();
        UserData.push({'name': 'keyword', 'value': keyword});

        //$('#target').html('sending..');
        $('#My_product_list').html('');

        $.ajax({
            url: 'category/dosearch',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                alert('fef');

                // $('#target').html(data.msg);
                //alert('fff');
                $.each(data, function (index, val) {
                    var price = val['price'];
                    var items7 = '<div class="col-sm-12 col-md-6 col-lg-3 mb-1"> <div class="card position-relative custom-card"> <span class="position-absolute rounded text-white custom-post-type">ویژه</span> <span class="position-absolute rounded text-white badge-dark custom-badge-card">VIP</span> <img src="public/img/root-laptop4.jpg" class="card-img-top"> <div class="card-body custom-card-body p-1 w-100" > <ul class="list-inline"> <li class="list-inline-item attribute" style="background-color: #00a6b2"></li> <li class="list-inline-item attribute" style="background-color: #003f54"></li> <li class="list-inline-item attribute" style="background-color: #c00000"></li> <li class="list-inline-item attribute" style="background-color: #a0d3e8"></li> </ul> <span ><a href="">' + val['title'] + ' </a></span> <div class="stars float-left"> <div class="gray-star"> <div class="gold-star"></div> </div> </div> </div> <div class="card-footer p-1 "> <ul class="list-inline custom-footer-card p-0 m-0 "> <li class="list-inline-item"> <span > ' + val['price'] + '</span></li> <li class="list-inline-item add-to-card"></i> <i class="fad fa-cart-arrow-down"></i> </li> </ul> </div> </div> </div>';

                    $('#My_product_list').append(items7);
                })
            },
            data: JSON.stringify(UserData)

        });
    }

    function dosearch9() {
        var person = {
            name: $("#id-name").val(),
            address: $("#id-address").val(),
            phone: $("#id-phone").val()
        }

        $('#target').html('sending..');

        $.ajax({
            url: '/test/PersonSubmit',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
                alert('fef');
                $('#target').html(data.msg);
            },
            data: JSON.stringify(person)
        });
    }
</script>


