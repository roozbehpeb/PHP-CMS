<?php $tab_row = $data['tab_info'];
    /*foreach ($tab_row as $row){
        $tab_url = $row['id_product'];
        //print_r($tab_url);
    }*/


?>

<div class="item_container">
    <?php foreach ($tab_row as $tab) { ?>
        <div class="tab_item">
            <h4>
                <i></i>
                <span>  <?= $tab['title'] ?></span>
            </h4>
            <div class="experting">
                <p>
                    <?= $tab['description'] ?>
                </p>
            </div>
        </div>
    <?php } ?>
</div>


<script>
    $(document).ready(function () {
        $('.item_container .tab_item h4').click(function () {
            $(this).toggleClass('active');
            var tab_item = $(this).parents('.tab_item');
            $('.experting', tab_item).slideToggle(300);
        })
    })
</script>