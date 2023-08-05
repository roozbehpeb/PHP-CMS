<div>
    <h4>امتیاز کاربران به :</h4>
    <span class="font-weight-bold">هندفری بلوتوث (103 نفر) </span>

    <div class="box_comment container mt-4">

        <!--avrage rate-->
        <div class="row">
            <div class="col-md-6 bc1 col-12">
                <?php


                    $comment_rate = $data['comment_rate'];
                    foreach ($comment_rate as $row) {
                        $scores = $data['comment_rate_average'];
                        $id_comment = $row['id_comment_rate'];
                        $score = $scores[$id_comment];
                        //print_r($score);
                        $width = $score * 10;

                        ?>
                        <div class="row mt-1">
                            <div class="col-lg-5 col-12">
                                <span class="progress_title"><?php echo $row['title'];
                                        echo ':';
                                        echo $score; ?>  </span>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="progress">
                                    <div class="progress-bar" style="width: <?php echo $width ?>%" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-12 text-center text-lg-right px-0">
                            <span class="product_title2">

                                <?php
                                    if (in_array($score, range(9, 10, 0.1))) {
                                        echo "عالی";

                                    } elseif (in_array($score, range(7, 8.9, 0.1))) {
                                        echo 'خوب';
                                    } elseif (in_array($score, range(4, 6.9, 0.1))) {
                                        echo 'متوسط';
                                    } /*elseif (in_array($score, range(0, 3.9, 0.1))) {
                                        echo 'ضعیف';
                                    }*/
                                    else {
                                        echo 'ضعیف';
                                    }

                                ?>
                            </span>
                            </div>
                        </div>
                    <?php } ?>
            </div>
            <div class="col-md-6 col-12 bg2">
                <p>شما هم می توانید در مورد این کالا نظر بدهید</p>
                <span>
                                    برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا از دیجی‌کالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.

                                </span>
                <a href="#" class="btn btn_custom3 mt-4 shadow-sm"><i class="material-icons">add_comment</i>افزودن
                    نظر جدید</a>
            </div>
        </div>

        <!--type order-->
        <div class="container box_filter mt-5 border-bottom">
            <div class="row">
                <div class="col-md-6 bf1">
                    <p><i class="material-icons">transit_enterexit</i>نظرات کاربران</p>
                </div>
                <div class="col-md-6 bf2">
                    <ul class="list-inline">
                        <li class="list-inline-item">مرتب سازی بر اساس :</li>
                        <li class="list-inline-item"><a href="#">نظر خریداران</a></li>
                        <li class="list-inline-item"><a href="#" class="active_custom">مفیدترین نظرات</a></li>
                        <li class="list-inline-item"><a href="#">جدیدترین نظرات</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- user point of view-->
        <?php $tab_comment = $data['get_comment'];
            foreach ($tab_comment as $value) {
                ?>
                <div class="container box_users_comment mt-3 p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box_message_light">
                                <i class="material-icons">shopping_cart</i>خریدار این محصول
                            </div>
                            <div class="root1400">
                                <?php
                                    $comment_rate = $data['comment_rate'];
                                    foreach ($comment_rate as $row) {
                                        $scores = unserialize($value['comment_score']);
                                        $id_comment = $row['id_comment_rate'];
                                        $score = $scores[$id_comment];
                                        //print_r($score);
                                        $width = $score * 10;

                                        ?>
                                        <div class="row mt-1">
                                            <div class="col-lg-5 col-12">
                                                <span class="progress_title"><?php echo $row['title'];
                                                        echo ':';
                                                        echo $score; ?>  </span>
                                            </div>
                                            <div class="col-lg-5 col-12">
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: <?php echo $width ?>%"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-12 text-center text-lg-right px-0">
                            <span class="product_title2">

                                <?php if (in_array($score, range(9, 10))) {
                                    echo "عالی";
                                } elseif (in_array($score, range(7, 8))) {
                                    echo 'خوب';
                                } elseif (in_array($score, range(4, 6))) {
                                    echo 'متوسط';
                                } elseif (in_array($score, range(0, 3))) {
                                    echo 'ضعیف';
                                }


                                ?>
                            </span>
                                            </div>
                                        </div>
                                    <?php } ?>
                            </div>
                            <div class="box_shopping mt-5">
                                <span>خریداری شده از :</span>
                                <p><i class="material-icons">store</i><a href="#">اسمارت الکترونیک</a></p>
                            </div>
                            <div class="box_message_dislike mt-5">
                                <i class="material-icons">thumb_down</i>خرید این محصول را توصیه نمی کنم
                            </div>

                        </div>
                        <div class="col-md-8 pr-5" style="margin-top:-10px">
                            <div class="box_comment_header mt-4 mt-md-0">
                                <span class="span1"><?= $value['title']; ?></span>
                                <br>
                                <span class="span2">توسط مسلم ابراهیمی در تاریخ <?= $value['date']; ?>
</span>
                            </div>
                            <div class="border-bottom mt-3"></div>
                            <div class="row mt-4">
                                <div class="col-md-6 evaluation-positive">
                                    <ul class="list-inline">
                                        <span>نقاط قوت</span>
                                        <li class="list-inline-item ml-3"><?= $value['positive']; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 evaluation-negative">
                                    <ul class="list-inline">
                                        <span>نقاط ضعف</span>
                                        <li class="list-inline-item ml-3"><?= $value['negative']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <p class="box_text_comment">
                                        <?= $value['viewpoint']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row comments_likes justify-content-end">
                                <span class="mr-4 mt-1">
                                    ایا این نظر برایتان مفید بود ؟
                                </span>
                                <a href="#" class="btn btn-like mt-1 mt-md-0">بله <?= $value['likecount']; ?></a>
                                <a href="#" class="btn btn-like mt-1 mt-md-0">خیر <?= $value['dislikecount']; ?></a>
                            </div>

                        </div>
                    </div>
                </div>

            <?php } ?>
    </div>

</div>