<div class="tab-pane fade bg-white p-5" id="profile">
    <div class="row whishlist">
        <div class="col-12 favarite">
            <ul class="list-inline w-100">
                <li onclick="FavoriteProduct(0,this)" class="list-inline-item border px-4  mx-1 position-relative ">


                    <img src="public/img/folder.png" alt="" style="width: 50px">
                    <span class="titleFav">همه پوشه ها</span>
                    <!--<i onclick="" class="fas fa-edit  stop position-absolute"></i>-->
                    <!--<i class="fas  fa-check  position-absolute"></i>-->


                </li>

                <?php $Folder = $data['GetFolder'];
                    foreach ($Folder as $row) {

                        ?>
                        <li onclick="FavoriteProduct(<?= $row['id_favorite']; ?>,this)"
                            class="list-inline-item border px-4  mx-1 position-relative ">
                            <div>
                                <img src="public/img/folder.png" alt="" style="width: 50px">
                                <span class="titleFav p-1"><?= $row['title']; ?></span>
                                <i onclick="EditFavfolder(this),stop()"
                                   class="fas fa-edit edit stop position-absolute"></i>
                                <i onclick="SaveEdit(<?= $row['id_favorite']; ?>,this)"
                                   class="fas  fa-check savebtn position-absolute"></i>

                            </div>
                        </li>
                    <?php } ?>
            </ul>

        </div>
    </div>
</div>

<script>

    function stop() {
        $('.favarite ul li i.stop').click(function (a) {
            a.stopPropagation();
        });
        $('.favarite ul li input').click(function (b) {
            b.stopPropagation();
        });

        $('.favarite ul li .savebtn').click(function (c) {
            c.stopPropagation();
        });
    }
    stop();


    $('.savebtn').fadeOut(0);
    function EditFavfolder(tag) {



        //alert("serf");
        var imgtag = $(tag);
        // var spanTag = imgtag.closest('.titleFav');
        var liTag = imgtag.parents('li');
        var spanTag = liTag.find('.titleFav');
        var title = spanTag.text();
        var inputTag = ' <input class="p-1 m-1 myinput" type="text" value="' + title + '">';
        spanTag.html(inputTag);


        liTag.find('.edit').addClass('edit_hidden');
        //liTag.find('.edit').fadeOut(0);

        liTag.find('.savebtn').fadeIn(0);


    }

    //  var  FolderId='';
    function FavoriteProduct(FolderId, tag) {
        var LiTag = $(tag);
        $('.favarite li').removeClass('activeProduct');
        LiTag.addClass('activeProduct')

        var url = 'panel/FavoriteProduct'
        var data = {'FolderId': FolderId};
        $.post(url, data, function (msg) {
            //$('.items_whish').html('');
            $('.items_whish').empty();
            $.each(msg, function (index, val) {
                var FavoriteId = val['id_favorite'];
                var price = val['price'].toLocaleString();
                var items = '<div class="items_whish"> <div class="row mt-3"> <div class="col-sm-12 col-md-2 col-xl-1 text-center"> <img src="public/img/products/' + val['id_product'] + '/product_220.jpg" alt="" style="width: 120px"> </div> <div class="col-sm-12 col-md-10 col-xl-11 mt-3"> <div class="d-flex justify-content-between border-bottom border-top py-1"> <div class="title"> <span>' + val['title_product'] + '</span> </div> <div class="edit">  <i class="far fa-times-circle deleteFav" onclick="deleteFavorite(' + FavoriteId + ',this)"></i> </div> </div> <div class="d-flex justify-content-start"> <span>قیمت: </span> <span>' + price + '</span> </div> </div> </div> </div>';
                $('.favarite').append(items);
            })
        }, 'json');

    }


    function SaveEdit(FolderId, Tag) {

        var SpanTag = $(Tag);
        var liTag = SpanTag.parents('li');
        var inputTag = liTag.find('.titleFav input');
        var Newname = inputTag.val();

        liTag.find('.titleFav').html(Newname);
        liTag.find('.savebtn').fadeOut(0);
        liTag.find('.edit').removeClass('edit_hidden');
        //liTag.find('.edit').fadeIn(0);

        var url = 'panel/SaveEdit';
        var data = {'FolderId': FolderId, 'Newname': Newname};
        $.post(url, data, function (msg) {

        });
    }


    function deleteFavorite(FavoriteId, Tag) {
        var Item = $(Tag).closest('.items_whish');

        var url = 'panel/deleteFavorite'
        var data = {'FavoriteId': FavoriteId};
        $.post(url, data, function (msg) {
            Item.remove();
        })
    }

    function myhover() {
        $('.whishlist ul li').hover(function () {
            $('.edit', this).fadeIn(200);
        }, function () {
            $('.edit', this).fadeOut(200);
        })

    }
    myhover();

</script>