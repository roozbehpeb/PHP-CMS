<?php $getcolor = $data['GetColor']; ?>

<ul class="filer_cat_ul list-group">
    <li class="list-group-item">
        <span class="header_filter m-0 text-black-50">بر اساس رنگ</span>
    </li>
    <?php foreach ($getcolor as $row) { ?>

        <li class="list-group-item check_div position-relative ">
            <input onclick="dosearch()" name="colorSelected[]" value="<?= $row['id_color'];; ?>" type="checkbox"
                   class="check_input">
            <label class="check_label"></label>
            <span class="" style="background-color: <?= $row['hex'];; ?>"></span>
            <span class=""><?= $row['title'];; ?></span>
        </li>
    <?php } ?>
</ul>