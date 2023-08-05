<div class="container bg-light p-2  pointofview">
    <div class="row">
        <div class="col-12">
            <p class="p-1 m-1  bg-light"> امتیاز شما به این محصول</p>
        </div>
    </div>
    <?php $commentInfo = $data['commentInfo'];
        //var_dump($commentInfo);
        $commentrate = unserialize(@$commentInfo['comment_score']);
    ?>

    <?php $productInfo = $data['productInfo'];
        //var_dump($productInfo);
    ?>
    <form method="post"
          action="addcomment/savecomment/<?= $productInfo['id_product']; ?>/<?= @$commentInfo['id_comment']; ?>">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="<?= URL ?>/public/img/products/108/product_220.jpg" alt="">
            </div>
            <?php
                $params = $data['param'];
                $number = sizeof($params);
                $right = ceil($number / 2);
                $left = $number - $right;

                $params_right = array_slice($params, 0, $right);
                $params_left = array_slice($params, $right, $left);


            ?>
            <div class="col-12 col-md-9">
                <div class="row ">
                    <div class="col right-col">
                        <ul class="list-group rating ">
                            <?php foreach ($params_right as $row) { ?>
                                <p class="p-0 m-1"><?= $row['title']; ?> </p>
                                <li class="list-group-item p-1 m-1 my-3">
                                    <input data-val="" name="param<?= $row['id_comment_rate'] ?>" type="hidden"
                                           class="single-slider"
                                           value="<?php if (isset($commentrate[$row['id_comment_rate']])) {
                                               echo $commentrate[$row['id_comment_rate']];
                                           } else {
                                               echo '5';
                                           } ?>">
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col left-col">
                        <ul class="list-group">
                            <?php foreach ($params_left as $row) { ?>
                                <p class="p-0 m-1"><?= $row['title']; ?> </p>
                                <li class="list-group-item p-1 m-1 my-3">
                                    <input data-val="" name="param<?= $row['id_comment_rate'] ?>" type="hidden"
                                           class="single-slider"
                                           value="<?php if (isset($commentrate[$row['id_comment_rate']])) {
                                               echo $commentrate[$row['id_comment_rate']];
                                           } else {
                                               echo '5';
                                           } ?>">
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">

            </div>
            <div class="col-12 col-md-9 justify-content-center">
                <div class="row g-1 my-1 ">
                    <div class="col-8 mx-3 my-1">
                        <input name="title" type="text" value="<?= @$commentInfo['title']; ?>" class="form-control"
                               id="inputAddress"
                               placeholder="1234 Main St">
                    </div>

                    <div class="row">
                        <div class="col-md-4 my-1">
                            <input name="positive" value="<?= @$commentInfo['positive']; ?>" type=" text"
                                   class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-4 my-1">
                            <input name="negative" value="<?= @$commentInfo['negative']; ?>" type=" text"
                                   class="form-control" id="other">
                        </div>
                        <div class="col-12 my-1">
                            <input name="id_comment" value="<?= @$commentInfo['id_comment']; ?>" type="hidden"
                                   class="form-control" id="other">
                        </div>
                        <div class="col-12 my-1">
                            <textarea name="massage" id="" cols="90"
                                      rows="7"><?= @$commentInfo['viewpoint']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-12 my-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $('.single-slider').jRange({
        from: 0,
        to: 10,
        step: 1,
        //scale: [-2.0,-1.0,0.0,1.0,2.0],
        //scale: [0,1,2,3,4,5,6,7,8,9,10],
        format: '%s',
        width: 300,
        showLabels: true,
        snap: false
    });
</script>