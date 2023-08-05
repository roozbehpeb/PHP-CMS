<div class="  d-flex flex-column align-items-center product_guarantee mt-3">
    <div class="mt-2 position-relative text-center">
        <i class="material-icons">offline_pin</i>
        <span>سرویس ویژه دیجی کالا : ۷ روز تضمین تعویض کالا</span>
    </div>

    <div id="garanti_select" class="position-relative ">
        <div class="garanti d-flex justify-content-between  w-100 bg-light border shadow-sm mt-2 ">
            <i class="fal fa-check "></i>
            <span class="zemanat_title px-5 "></span>
            <i class="fal fa-chevron-down float-left"></i>
        </div>

        <ul class=" garanti_ul list-group shadow-sm border w-100 position-relative ">
            <?php $site_guarantee = $productinfo['custom_guarantee'];
                $first = 1;
                foreach (array_reverse($site_guarantee) as $guarantee) {
                    ?>
                    <li class="list-group-item <?php if ($first == 1) {
                        echo 'active_guarantee';
                    } ?>"
                        data-id="<?= $guarantee['id_guarantee']; ?>"
                        onclick="selectColor()"><?= $guarantee['title']; ?></li>
                    <?php $first = $first++;
                } ?>
        </ul>
    </div>


</div>


<script>
    select_garuntee();

    function select_garuntee() {
        // $('#garanti_select').click();
        $('#garanti_select').click(function () {
            var ul_tag = $('ul', this);
            ul_tag.slideToggle(0);
        })


        ///$('#garanti_select ul li').click();
        $('#garanti_select ul li').click(function () {
            $('li').removeClass('active_guarantee')
            $(this).addClass('active_guarantee');
        })


        $('#garanti_select ul li').click(function () {
            var txt = $('.active_guarantee').text();
            //  var txt = $(this).text();
            $('.zemanat_title').text(txt);

        })


    }


    function selectColor() {
        $('ul.select_color li span.active').click();
    }


</script>