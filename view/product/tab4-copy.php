<div>
    <h4 class="font-weight-bold">پرسش و پاسخ</h4>
    <span class="font-weight-bold">پرسش خود را در مورد محصول مطرح نمایید</span>
    <div class="box_questions container mt-4">
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="7"></textarea>
            </div>
        </form>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-12 text-center">
                    <a href="#" class="btn btn_custom3 btn-lg shadow-sm">ثبت پرسش</a>
                </div>
                <div class="col-md-9 col-12 m-0 p-0 pt-3 pt-md-0 email_check">
                    <form action="">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1"/>
                            <label class="custom-control-label pr-4" for="customCheck1">
                                اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید. <br>
                                با انتخاب دکمه “ثبت پرسش”، موافقت خود را با <a href="#">قوانین انتشار محتوا</a>
                                در دیجی کالا
                                اعلام می کنم.
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container box_filter mt-5 border-bottom">
                <div class="row">
                    <div class="col-md-4 bf1">
                        <p><i class="material-icons">transit_enterexit</i>پرسش ها و پاسخ ها ( ۲۲ پرسش )</p>
                    </div>
                    <div class="col-md-8 bf2 text-md-right text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item">مرتب سازی بر اساس :</li>
                            <li class="list-inline-item"><a href="#">جدیدترین پرسش</a></li>
                            <li class="list-inline-item"><a href="#" class="active_custom">بیشترین پاسخ به
                                    پرسش</a></li>
                            <li class="list-inline-item"><a href="#"> پرسش های شما</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php $tab_questions = $data['get_question'];
                foreach ($tab_questions as $row) { ?>
                    <div class="container box_questions mt-4">
                    <div class="row">
                        <div class="col-md-2 bq1 text-center">
                            <i class="material-icons">
                                contact_support
                            </i>
                            <br>
                            <span class="span1">پرسش</span>
                            <br>
                            <span class="span2">فرزاد عباسقلی زاده</span>
                        </div>
                        <div class="col-md-10 bq2">
                            <p> <?php echo $row['text'] ?> </p>

                            <div class="row" style="position: relative;top: 100px">
                                <div class="col-md-5 col-6">
                                    <span class="date">  <?php echo $row['date'] ?>
</span>
                                </div>
                                <div class="col-md-7 col-6 text-right">
                                    <a href="#" class="d-none d-sm-block">
                                        به این پرسش پاسخ دهید (۱ پاسخ)
                                    </a><a href="#" class="d-sm-none d-block">پاسخ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $answer = $row['answer'];
                    //var_dump($answer);
                    foreach ($answer as $row) { ?>
                        <div class="row">
                            <div class="col-md-2 bq1 text-center">
                                <i class="material-icons highlight">
                                    highlight
                                </i>
                                <br>
                                <span class="span1">پاسخ</span>
                                <br>
                                <span class="span2">حسین زارع</span>
                            </div>
                            <div class="col-md-10 bq2 bg-transparent">
                                <p><?php echo $row['text']; ?></p>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="row footer">
                                    <div class="col-md-5 col-12">
                                    <span class="date">۲۲ مهر ۱۳۹۷
</span>
                                    </div>
                                    <div class="col-md-7 col-12 text-right">
                                        <div class="comments_likes">
                                        <span class="mr-4 mt-1">
                                            ایا این پاسخ برایتان مقید بود ؟
                                        </span>
                                            <a href="#" class="btn btn-like mt-1 mt-md-0">بله 70</a>
                                            <a href="#" class="btn btn-like mt-1 mt-md-0">خیر </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php } ?>

                <?php } ?>


        </div>
    </div>
</div>
