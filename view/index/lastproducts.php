<div class="col-md-12  col-lg-9  ">
    <section class="slider box_shadow">
        <div class="card panel-title-custom">
            <div class="card-header card-header-custom">
                <p>جدیدترین محصولات </p>
            </div>
            <div class="card-body">
                <div class="owl-carousel owl-theme">
                    <?php
                        $result = $data[5];
                        foreach ($result as $row) {
                            ?>
                            <div class="item">
                                <a href="product/index/<?= $row['id_product'] ?> ">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">


                                            <?php
                                                $filename ="public/img/products/".$row['id_product']."/product_220.jpg";
                                                $filename2 ="public/img/products/".$row['id_product']."/product_220.png";

                                                if (is_file($filename)) {
                                                    echo '<img src="' . $filename . '">';
                                                }
                                                elseif (is_file($filename2)){
                                                    echo '<img src="' . $filename2 . '">';
                                                }

                                            ?>



                                        </div>
                                        <div class="card-footer panel-footer-custom">
                                            <h4><?php echo $row['title'] ?></h4>
                                            <p><?php echo $row['price'] ?> هزاز تومان</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>

                </div>
            </div>
        </div>
    </section>
</div>