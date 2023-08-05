<?php $user_Info = $data['user_Info']; ?>

<div class="container">
    <div class="row my-4 p-3">
        <div class="col bg-light">
            <span>مشخصات کاربر</span>
        </div>
    </div>
    <div class="row bg-light radius m-1">
        <form method="post" action="panel/EditProfile">
            <div class="row p-5">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row">
                        <div class="col m-1">
                            <input value="<?= $user_Info['user_name']; ?>" type="text" class="form-control"
                                   placeholder="نام و نام خانوادگی" name="user_name">
                        </div>
                        <div class="col m-1">
                            <input name="mobile" value="<?= $user_Info['mobile']; ?>" type="text" class="form-control"
                                   placeholder="همراه" disabled>
                        </div>
                        <div class="col m-1">
                            <input name="Email" value="<?= $user_Info['Email']; ?>" type="text" class="form-control"
                                   placeholder="ایمیل" disabled>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col m-1">
                            <input name="national_id" value="<?= $user_Info['national_id']; ?>" type="text"
                                   class="form-control"
                                   placeholder="کد ملی" disabled>
                        </div>

                        <div class="col m-1">
                            <input value="<?= $user_Info['tel']; ?>" type="text" class="form-control"
                                   placeholder="تلفن ثابت" name="tel">
                        </div>

                        <div class="col m-1">
                            <input value="<?= $user_Info['born']; ?>" name="born" type="text" id="date2">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col m-1">
                            <textarea name="address" id="" cols="100" rows="8"
                                      placeholder="آدرس محل سکونت..."><?= $user_Info['address']; ?></textarea>
                        </div>
                    </div>

                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 d-flex">
                    <?php if ($user_Info['newsletter'] == 1) {
                        $newsletter = 'checked';
                    }
                        if ($user_Info['newsletter'] != 1) {
                            $newsletter = '';
                        }
                    ?>
                    <div class="form-check mx-3">
                        <input name="newsletter" class="form-check-input" type="checkbox"
                               id="flexCheckDefault" <?= @$newsletter; ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            <span>اشتراک در خبر نامه</span>
                        </label>
                    </div>
                    <div class="col d-flex mx-3">
                        <div class="form-check mx-3">

                            <?php if ($user_Info['sex'] == 1) {
                                $man = 'checked';
                            }
                                if ($user_Info['sex'] != 1) {
                                    $women = 'checked';
                                }
                            ?>
                            <input class="form-check-input" type="radio" name="sex"
                                   id="flexRadioDefault1" <?= @$women; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <span>زن</span>
                            </label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="sex" id="flexRadioDefault2"
                                <?= @$man; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <span>مرد</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-1">

                </div>
                <div class="row mt-5 mb-3">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>


<script>

    var customOptions = {
        placeholder: "روز / ماه / سال"
        , twodigit: false
        , closeAfterSelect: true
        , nextButtonIcon: "fa fa-arrow-circle-right"
        , previousButtonIcon: "fa fa-arrow-circle-left"
        , buttonsColor: "blue"
        , forceFarsiDigits: true
        , markToday: true
        , markHolidays: true
        , highlightSelectedDay: true
        , sync: true
        , gotoToday: true
    }
    kamaDatepicker('date2', customOptions);

</script>