<div class="container-fluid text-center custom-sidebar ">
    <!--<form id="form_search2" action="category/dosearch" method="post">-->

    <form id="form_search2">
        <div class="row justify-content-center m-auto bg-white p-2">
            <?php require('right-sidebar.php'); ?>
            <?php require('left-sidebar.php'); ?>

        </div>
    </form>
    <!--<span style="font-size: 26px">55</span>-->
</div>


<script type="text/javascript">

    dosearch(page = 1);
    //var curent_page=1;
    var curent_page = '';

    function dosearch(page = 1) {
        mydelay();
        if (typeof(page) != 'undefine') {
            curent_page = page;
        } else {
            // curent_page=1;
        }

        if (curent_page < 1) {
            curent_page = 1;
        }

        var last_page = $('#pagination ul li:last').text();
        if (curent_page > last_page) {
            curent_page = last_page;
        }
        // $('#form_search2').submit(event);
        // event.preventDefault()
        var Mydata = $('form#form_search2').serializeArray();

        var exist = 0;
        if ($('.filter_exist ').hasClass('active')) {
            exist = 1;
        }
        Mydata.push({'name': 'exist', 'value': exist});

        var keyword = $('#keyword').val();
        Mydata.push({'name': 'keyword', 'value': keyword});

        var page_reset = 0;
        if ($('ul.filer_cat_ul2 li label ').hasClass('checked')) {
            page_reset = 1;
        }
        Mydata.push({'name': 'page_reset', 'value': page_reset});

        //  var curent_page= $('#pagination ul li.active_pagination').text();
        Mydata.push({'name': 'curent_page', 'value': curent_page});
        var limit_page = $('#limit_page option:selected').val();
        Mydata.push({'name': 'limit_page', 'value': limit_page});

        var page_url = window.location.href;
        //  var url = $(location).attr('href');
        var parts = page_url.split("/");
        var Id_category = parts[parts.length - 1];
        //  alert(Id_category);
        // alert(page_url);
        Mydata.push({'name': 'Id_category', 'value': Id_category});

        //  $('#My_product_list').html('');
        $.ajax({
            data: Mydata,
            // data: '{"name":"John", "age":30, "car":null}' ,
            url: "category/dosearch",
            cache: false,
            method: "post",
            dataType: "json",
            //type: "json",
            //async: false,
            // dataType: 'text',
            // contentType: 'json',

            success: function (response) {
                //var userdaraObj2 = JSON.parse(response2);
                //alert(userdaraObj2);
                // console.log(response2);
                //alert(userdaraObj2)
                emptyField();
                // $('input').removeAttr('checked');
                $.each(response[0], function (index, val) {

                    //var object2 = val['title'];
                    //var obj2 =JSON.parse(data);
                    // var root = val['title']

                    var items7 = '<div class="col-sm-12 col-md-6 col-lg-3 mb-1"> <div class="card position-relative custom-card"> <span class="position-absolute rounded text-white custom-post-type">ویژه</span> <span class="position-absolute rounded text-white badge-dark custom-badge-card">VIP</span> <img src="public/img/root-laptop4.jpg" class="card-img-top"> <div class="card-body custom-card-body p-1 w-100" > <ul class="list-inline"> <li class="list-inline-item attribute" style="background-color: #00a6b2"></li> <li class="list-inline-item attribute" style="background-color: #003f54"></li> <li class="list-inline-item attribute" style="background-color: #c00000"></li> <li class="list-inline-item attribute" style="background-color: #a0d3e8"></li> </ul> <span ><a href="">' + val['title'] + ' </a></span> <div class="stars float-left"> <div class="gray-star"> <div class="gold-star"></div> </div> </div> </div> <div class="card-footer p-1 "> <ul class="list-inline custom-footer-card p-0 m-0 "> <li class="list-inline-item"> <span > ' + val['price'] + '</span></li> <li class="list-inline-item add-to-card"></i> <i class="fad fa-cart-arrow-down"></i> </li> </ul> </div> </div> </div>';

                    $('#My_product_list').append(items7);
                    /* afer user search key word and result show input search must be empty; */
                    $('input#keyword').val('');
                })


                //console.log(response[1]);
                $('#pagination ul').empty();
                var page_number = response[1];
                var i = '';
                var active = '';
                var start = curent_page - 3;
                if (start < 1) {
                    start = 1;
                }
                var end = curent_page + 3;
                if (end > page_number) {
                    end = page_number;
                }
                for (i = start; i <= end; i++) {
                    if (i == curent_page) {
                        active = 'active_pagination';
                    } else {
                        active = '';
                    }
                    var item2 = '<li onclick="pagination(this,' + i + ');" class="page-item ' + active + '  "><a class="page-link">' + i + '</a></li>';
                    $('#pagination ul').append(item2);

                }

            }
            //data: JSON.stringify(Mydata)
        });


        function emptyField() {
            $('#My_product_list').empty();
            //$('form#form_search2').reset();
        }

    }


    function dosearch2() {
        location.reload();
    }

    function pagination(tag, page) {
        var LiTag = $(tag)
        $('#pagination ul li').removeClass('active_pagination');
        LiTag.addClass('active_pagination');
        dosearch(page);

    }


    function mydelay() {


        let timerInterval
        Swal.fire({
            title: '',
            html: 'به روز رسانی...',
            /* html: 'I will close in <b></b> milliseconds.',*/
            timer: 500,
            timerProgressBar: true,

            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */

        })
    }


</script>


