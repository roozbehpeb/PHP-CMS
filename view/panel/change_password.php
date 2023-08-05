<?php if (isset($_GET['error'])) { ?>


    <?php if (@$_GET['error'] != '') { ?>

        <p class="pass_error">
            <?= @$_GET['error']; ?>
        </p>

    <?php } else { ?>

        <p class="pass_success">
            <?= @$_GET['error']; ?>
        </p>

    <?php } ?>

<?php } ?>

<div class="container">

    <div class="row my-4 p-3">
        <div class="col bg-light">
            <span>مشخصات کاربر</span>
        </div>
    </div>
    <div class="row bg-light radius m-1">
        <form method="post" action="panel/change_pass">
            <div class="row p-5">
                <div class="col-2"></div>

                <div class="col-5 ">
                    <div class="row flex-column">
                        <div class="col m-1">
                            <input value="" type="password" class="form-control"
                                   placeholder="رمز فعلی" name="old_pass">
                        </div>
                        <div class="col m-1">
                            <input name="new_pass" value="" type="password" class="form-control"
                                   placeholder="رمز جدید">
                        </div>
                        <div class="col m-1">
                            <input name="confirm_pass" value="" type="password" class="form-control"
                                   placeholder="تکرار رمز جدید">
                        </div>

                    </div>
                </div>

                <div class="col-5"></div>
            </div>

            <div class="row px-2 my-1">
                <div class="col-2">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>

                <div class="col-7">
                </div>
            </div>

        </form>
    </div>

</div>


