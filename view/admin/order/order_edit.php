<?php $order_edit = $data['order_edit']; ?>

<div class="container">
    <div class="row my-4 p-3">
        <div class="col bg-light">
            <span>ویرایش اطلاعات سارش کاربران</span>
        </div>
    </div>
    <div class="row bg-light radius m-1">
        <form method="post" action="admin_order/order_update/<?= $order_edit['id_order']; ?>">
            <div class="row p-5">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row">
                        <div class="col m-1">
                            <input value="<?= $order_edit['state']; ?>" type="text" class="form-control"
                                   placeholder="استان" name="state">
                        </div>
                        <div class="col m-1">
                            <input name="city" value="<?= $order_edit['city']; ?>" type="text" class="form-control"
                                   placeholder="شهر">
                        </div>
                        <div class="col m-1">
                            <input name="tel" value="<?= $order_edit['tel']; ?>" type="text" class="form-control"
                                   placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-1">
                            <input name="zipcode" value="<?= $order_edit['zipcode']; ?>" type="text"
                                   class="form-control"
                                   placeholder="کد پستی">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col m-1">
                            <textarea name="full_address" id="" cols="100" rows="8" placeholder="آدرس محل سکونت..."> <?= @$order_edit['full_address']; ?>
                            </textarea>
                        </div>
                    </div>


                </div>
                <div class="col-1"></div>
            </div>
            <div class="row justify-content-start">
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
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