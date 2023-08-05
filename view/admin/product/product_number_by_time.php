<?php
    $time = time();
    $time = $time / 100000;
    $product_number = round($time) * rand(11, 777);
    $product_number2 = 'DP_' . $product_number;