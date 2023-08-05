<div class="container-fluid gx-lg-5 tabs-colors">

    <div class="row px-lg-5 py-0 d-flex align-items-center justify-content-start">

        <div class="col col-md-auto justify-content-center  align-items-center  tab_btn active">
            <div class="mytab    position-relative">
                <i class=" d-none d-md-inline   fad fa-book"></i>
                <span>برسی تخصصی</span>
            </div>
        </div>

        <div class="col col-md-auto  justify-content-center  align-items-center   tab_btn">
            <div class="mytab   position-relative">
                <i class=" d-none d-md-inline   fad fa-book"></i>
                <span class="">مشخصات</span>
            </div>
        </div>

        <div class="col col-md-auto  justify-content-center  align-items-center  tab_btn User_Comment">
            <div class="mytab   position-relative">
                <i class=" d-none d-md-inline   fad fa-book"></i>
                <span>نظرات کاربران</span>
            </div>
        </div>

        <div class="col col-md-auto  justify-content-center  align-items-center  tab_btn">
            <div class="mytab   position-relative">
                <i class=" d-none d-md-inline   fad fa-book"></i>
                <span>پرسش و پاسخ</span>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid gx-lg-5 bg-white mt-3">
    <div class="row px-lg-5 py-0 d-flex align-items-center justify-content-start " id="tab_child">

        <section>
            1
        </section>

        <section>
            2
        </section>

        <section>
            3
        </section>

        <section>

        </section>

    </div>

</div>

<?php
    /*$url=$_GET['url'];
    //var_dump($url);
    function getUrl($url)
    {
        filter_var($url, FILTER_SANITIZE_URL);
        $url = rtrim($url ,'/' );
        $url = explode('/',$url);

        return $url;
    }
    $tab_url= getUrl($url);
    var_dump($tab_url['2']);*/
?>

<script>

    //see note PHP MVC part 94 for some tip!

    $(document).ready(function () {
        $("#tab_child section").hide();
        $("#tab_child section").eq(0).fadeIn(0);

        $("div.tab_btn").click(function () {
            changeTabe($(this));
        });


        function changeTabe(TAG) {
            $("div.tab_btn").removeClass('active');
            TAG.addClass('active');
            $("#tab_child section").fadeOut(0);
            var index = TAG.index();
            var section_selected = $("#tab_child section").eq(index);

            /*
             var url =' http://digitalocean.tv/product/tab';
             other solution : get url by $_get['url'] in page and pass that to var url
             watch one note part 115 :
             */

            // var url ='  <?php /*echo URL */?>       /product/tab/  <?php /*echo $tab_url['2']*/?>   ';
            var url = '<?= URL ?>product/tab/<?=  $productinfo['id_product'] ?>/<?=  $productinfo['ID_category'] ?>';
            //alert(url);
            var data = {'number': index};
            $.post(url, data, function (msg) {
                section_selected.html(msg);
            });

            section_selected.fadeIn(400);

        }


        $('.<?=  $data['Acivetabe'];?>').trigger('click');


    })


</script>

