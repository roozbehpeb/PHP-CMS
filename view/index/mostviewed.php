<div class="col-md-12  col-lg-9  ">
    <section class="slider box_shadow">
        <div class="card panel-title-custom">
            <div class="card-header card-header-custom">
                <p>پربازدیدترین ها</p>
            </div>
            <div class="card-body">
                <div class="owl-carousel owl-theme">
                    <?php
                        $result = $data[4];
                        foreach ($result as $row) {
                            ?>
                            <div class="item">
                                <a href="product/index/<?= $row['id_product'] ?> ">
                                    <div class="card panel-custom">
                                        <div class="card-body panel-body-custom">
                                            <img src="public/img/products/<?= $row['id_product'] ?>/product_220.jpg">
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