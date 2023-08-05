<?php
    foreach ($get_parents as $row) {
        ?>

        <a href="admin_category/list_category/<?=  $row['id_category']  ?>" class=" p-1 text-center" style="background-color: #dddddd"> <?= $row['title'] ;   ?> > </a>
    <?php   }    ?>
<a href="admin_category/list_category/<?=  @$Category_Info['id_category']  ?>" class=" p-1 text-center" style="background-color: #dddddd"> <?= @$Category_Info['title'] ;   ?> > </a>