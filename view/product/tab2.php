<h4>مشخصات فنی</h4>
<span>HBQ-I7 Bluetooth Handsfree</span>

<?php $fani = $data['tab_description'];

    $values = $data['get_product_attribute2'];

    //$bigarray=array_merge($fani,$get_product_attribute2['values']['value']);
    // var_dump($bigarray);

    foreach ($fani as $attribute_parent) {
    //var_dump($attribute_parent);
    // var_dump($attribute_parent);
    $children = $attribute_parent['children'];
    //  $values = $attribute_parent['values'];
    //var_dump($children);
?>

<div class=" mt-4">
    <p class="title"><i class="fas fa-caret-left"></i> <?= $attribute_parent['title']; ?></p>
    <div>

        <?php
            foreach ($children as $key => $row) { ?>

                <ul class="param_list list-inline">
                    <div class="container">
                        <div class="row pr-md-2">
                            <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                <div class="box_params_list">
                                    <p class="block border_right_custom1">
                                        <?= $row['title']; ?>
                                    </p>
                                </div>
                            </li>

                            <li class="list-inline-item col-md-8 p-0 m-0">
                                <div class="box_params_list">
                                    <p class="block border_right_custom2">
                                        <?= @$values[$key]['values']['value']; ?>
                                    </p>
                                </div>
                            </li>

                        </div>
                    </div>
                </ul>
            <?php } ?>
        <?php }; ?>

    </div>

</div>

