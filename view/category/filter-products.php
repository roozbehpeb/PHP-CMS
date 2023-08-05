<!--<style>
    .progress
    {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #F2F2F2;
    }
    .bar
    {
        background-color: #819FF7;
        width:0%;
        height:5px;
        border-radius: 3px;
    }
    .percent
    {
        position:absolute;
        display:inline-block;
        top:3px;
        left:48%;
    }

</style>-->

<!--<div class='progress' id="progress_div">
    <div class='bar' id='bar1'></div>
    <div class='percent' id='percent1'></div>
</div>

<div id="wrapper">
    <div id="content">
    </div>
</div>

<input type="hidden" id="progress_width" value="0">-->


<?php $Attribute = $data['Attribute'];

    foreach ($Attribute as $row) {
        ?>
        <div class="col filter_title filter_option ">
            <div class="filter_cat_header">
                <span class="title">  <?= $row['title']; ?>  </span>
                <i class="fal fa-angle-left "></i>
            </div>
            <div class=" d-flex justify-content-start position-relative">
                <ul class="filer_cat_ul2 list-group filter_height filter_list shadow-sm position-absolute">
                    <?php
                        $values = $row['values'];
                        foreach ($values as $val) { ?>
                            <li data-id="<?= $val['id_default_value']; ?>"
                                data-Idttribute="<?= $row['id_attribute']; ?>"
                                class="list-group-item check_div2 position-relative">
                                <input type="checkbox" class="check_input">
                                <label class="check_label"></label>
                                <span><?= $val['value']; ?></span>
                            </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>


<!--<script>


    document.onreadystatechange = function(e)
    {
        if(document.readyState=="interactive")
        {
            var all = document.getElementsByTagName("*");
            for (var i=0, max=all.length; i < max; i++)
            {
                set_ele(all[i]);
            }
        }
    }

    function check_element(ele)
    {
        var all = document.getElementsByTagName("*");
        var totalele=all.length;
        var per_inc=100/all.length;

        if($(ele).on())
        {
            var prog_width=per_inc+Number(document.getElementById("progress_width").value);
            document.getElementById("progress_width").value=prog_width;
            $("#bar1").animate({width:prog_width+"%"},10,function(){
                if(document.getElementById("bar1").style.width=="100%")
                {
                    $(".progress").fadeOut("slow");
                }
            });
        }

        else
        {
            set_ele(ele);
        }
    }

    function set_ele(set_element)
    {
        check_element(set_element);
    }


</script>-->