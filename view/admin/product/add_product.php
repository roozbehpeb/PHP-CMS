<script src="../../../public/ckeditor/ckeditor.js"></script>


<?php
    require 'view/admin/layout.php';
    require 'view/admin/product/product_number_by_time.php';
?>
<?php
    @$add_product = $data['get_category'];
    @$get_product_attribute = $data['get_product_attribute'];
    @$show_product_attribute = $data['show_product_attribute'];
    ///var_dump($show_product_attribute);
    if (isset($get_productInfo['id_product'])) {
        @$edit = 'X';
    } else {
        @$edit = '';

    }
?>

<div class="col-sm-10 bg-gradient  border">
    <form enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center border-1 m-1 product_form"
          action="admin_product/add_product/<?= @$get_productInfo['id_product'] ?>" method="post">

        <div class="bg-light p-1">

            <?php
                if ($edit == '') {
                    echo "افزودن محصول جدید  ";
                } else {
                    echo "ویرایش محصول";
                }
            ?>
        </div>


        <div class="bg-light flex-column">

            <div class="col-12 col-md-4 d-flex  p-2">
                <input type="hidden" name="id_product" class="form-control" id="autoSizingInput"
                       placeholder="......" value="<?= @$id_product; ?>" required>
            </div>

            <div class="col-12 col-md-4 d-flex  p-2">

                <input type="hidden" name="product_number" class="form-control time_create" id="autoSizingInput"
                       placeholder="......" value="<?= $product_number2; ?>" required>
            </div>

            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100 "> محصول مورد نظر: </label>
                <input type="text" name="product_title" class="form-control" id="autoSizingInput"
                       placeholder="عنوان محصول ..." value="<?= @$get_productInfo['title']; ?>" required>
            </div>


            <div class="col-12 col-md-4 d-flex  p-2">
                <label for="autoSizingInput" class="col-form-label w-100"> انتخاب دسته: </label>
                <select class="form-select" id="autoSizingSelect" name="ID_category" required>
                    <option value="<?= @$get_productInfo['ID_category']; ?>"
                    ">انتخاب کنید</option>
                    <?php
                        $get_category = $data['get_category'];
                        $categoryID = $get_productInfo['ID_category'];
                        foreach ($get_category as $row) { ?>

                            <?php
                            if ($row['id_category'] == $categoryID) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            ?>

                            <option value="<?= $row['id_category']; ?>" <?= $selected ?> >  <?= @$row['title']; ?>  </option>

                        <?php } ?>

                </select>
            </div>


            <div class="col-12 col-md-10  d-flex  p-2">
                <textarea id="editor1" name="description" id="" cols="120" rows="10" type="text" name="title"
                          class="form-control">
                <?= @$get_productInfo['description']; ?>
                </textarea>
                <script>
                    CKEDITOR.replace('editor1', {})
                </script>
            </div>

            <div class="col-12 col-md-4 d-flex  p-2 w-100 float-start">
                <label for="upload" class="col-form-label px-1  "> آپلود عکس: </label>
                <input id="upload" type="file" name="upload" class="mr-2" style="position: relative;
right: 72px;">
            </div>

            <div class="col-12 col-md-4 d-flex  p-2 w-100 float-start">
                <?php if (isset($get_productInfo['id_product'])) { ?>
                    <img src="public/img/products/<?= $get_productInfo['id_product']; ?>/product_220.jpg" alt="">
                <?php } ?>
            </div>

            <div class="row divInpute">

            </div>

            <div class="col-12 col-md-4 d-flex mt-2  p-2 my-2 border-top">
                <label for="inputEmail3" class="col-5 col-form-label mx-1">افزودن ویژگی جدید</label>
<!--                <span class="btn btn-light mt-2 rounded"><i class="fas fa-plus myplusbtn"></i></span>-->
                <div class="myplusbtn"><a class="btn btn-primary"  role="button" style="color: #FFFFFF">فیلتر جدید  <i style="color: #FFFFFF" class="  fa fa-long-arrow-down"></i></a></div>
            </div>




            <div class="col-auto ">
                <button onclick="submitform1()" class="btn btn-primary">ذخیره</button>
            </div>

        </div>
    </form>
</div>




<script>


    function auto_click () {
        $(".myplusbtn").trigger('click');
    }


    $(document).ready(function() {
        auto_click();
    });


    $(".myplusbtn").click(function () {
        $.ajax({
            url: 'admin_product/add_product_field',
            type: 'GET',
            async: true,
            success: function (data) {
                $('.divInpute').append(data);
                var time_create= $('.time_create').val();
                var product_number=time_create;
                $('.time-inpute').val(product_number);

            }
        });

    });




   //let rooti;
    //let rooti; = $(this).closest("input.index_number").val();



    function select_category(id_category,tag) {
        var url = 'admin_product/attr_of_category/' + id_category;
        $.ajax({
            type: 'POST',
            url: url,
            //async: true,
            data_type: 'json',
            success: function (data) {
                //alert('kkk')
                var obj = JSON.parse(data);
                var title = [];
                var id_attribute = [];
                for (var i = 0; i < obj.length; i++) {
                    title.push(obj[i].title);
                }
                for (var i = 0; i < obj.length; i++) {
                    id_attribute.push(obj[i].id_attribute);

                }

                let mydiv;

                mydiv = document.getElementsByClassName('ntfs')[tag];



                let newElem1 = document.createElement('select');
                newElem1.setAttribute("id", "my-select");
                newElem1.setAttribute("class", "form-select");

                //newElem2.innerHTML='';
                let newElem2 = '<option>Select an option</option>';
                for (var i = 0; i < title.length; i++) {
                    newElem2 += '<option  class="form-control" id="my-select" onclick="select_attr('+id_attribute[i]+')" value="' + title[i] + '">' + title[i] + '</option>';
                }

                newElem1.innerHTML = newElem2;

                mydiv.innerHTML = '';
                mydiv.appendChild(newElem1);
            },
            error: function (xhr, status, error) {
                // Handle form submission error
                alert("Form submission error: " + error);
            }
        });
    }



    function clear_select(){
        const filters = document.querySelectorAll('.ntfs');
        let ntfs;
        filters.forEach((filter, index) => {
            ntfs = document.getElementsByClassName('ntfs')[index];
        });
        ntfs.innerHTML = '';
    }





    function select_attr(id_attribute) {
        var url = 'admin_product/attr_of_category2/' + id_attribute;
        $.ajax({
            type: 'POST',
            url: url,
            //async: true,
            data_type: 'json',
            success: function (data) {
                var obj = JSON.parse(data);
                var value = [];
                for (var i = 0; i < obj.length; i++) {
                    value.push(obj[i].value);
                }

                var select = document.getElementById('my-select2');
                var html = '<select class="form-control" id="my-select2">';
                html += '<option value="">Select an option</option>';
                for (var i = 0; i < value.length; i++) {
                    html += '<option value="' + value[i] + '">' + value[i] + '</option>';
                }
                html += '</select>';
                select.innerHTML = html;
            },
            error: function (xhr, status, error) {
                // Handle form submission error
                alert("Form submission error: " + error);
            }
        });
    }

    var Id_product = '';

    function submitform1() {
        var url = 'admin_product/add_product/' + Id_product;
        var data = $('form.product_form').serializeArray();
        var file = new FormData($('form.product_form')[0]);
        $.each(data, function (key, input) {
            file.append(input.upload, input.value);
        });
        $('form.product_form').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: url,
                data: file,
                contentType: false,
                processData: false,
                success: function (msg) {
                    submitform2();
                },
                error: function (xhr, status, error) {
                    // Handle form submission error
                    console.log("Form submission error: " + error);
                }
            });
        });
    }


    var Id_product2 = '';

    // variable forms
    function submitform2() {
        $("form.product_form2").each(function () {
            var url = 'admin_product/add_product_sub/' + Id_product2;
            var data = $(this).serializeArray();
            /// var formData = form.serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function (msg) {
                    location.reload();
                    // location.reload()
                },
                error: function (xhr, status, error) {
                    // Handle form submission error
                    alert("Form submission error: " + error);
                }
            });
        });
    }


    function removeSelected(tag) {
        var crossTag = $(tag);
        var remove = crossTag.parents('div.remove');
        remove.remove();
    }

    function disable_guaranteeTag() {
        $('.guarantee_select').click(function () {
            $(this).prop('disabled', true);
        })
    }

    disable_guaranteeTag();


    function disable_ColorTag() {
        $('.color_select').click(function () {
            $(this).prop('disabled', true);
        })
    }

    disable_ColorTag();


    function addColor(tag_option, colorId, ColorCode) {
        var option_menu = $(tag_option);
        var ColorName = option_menu.attr('data-title');

        var add_colorTag = ' <div class=" col-auto tag-admin-select remove  bg-light d-flex  px-2  mx-1 color" id="remove"> <span style="background-color: ' + ColorCode + '" class="span_color"> <input  value="' + colorId + '" name="get_color" type="hidden"> ' + ColorName + '</span> <i class="far fa-times-circle float-left" onclick="removeSelected(this)"></i> </div>';

        var divRow = option_menu.parents('.menu_div');
        var divRow2 = divRow.find('.root');
        divRow2.append(add_colorTag);
    }

    function addguarantee(tag_option, guaranteeIdId) {
        var option_menu = $(tag_option);
        var guaranteeName = option_menu.attr('data-title');

        var add_colorTag = ' <div class=" col-auto tag-admin-select remove border bg-light d-flex px-2 mx-1 "  id="remove"> <span> <input  value="' + guaranteeIdId + '" name="get_guarantee" type="hidden"> ' + guaranteeName + '</span> <i class="far fa-times-circle float-left" onclick="removeSelected(this)"></i> </div>';

        var divRow = option_menu.parents('.menu_div2');
        var divRow2 = divRow.find('.root2');

        divRow2.append(add_colorTag);
    }


</script>