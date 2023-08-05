<?php
    $active = 'statistics';
    require 'view/admin/layout.php';
?>

<div class="col-sm-10   p-2">
    <div class="bg-light p-3">
        <form action="admin_statistics/statistics" method="post">
            <div class="p-3">
                <h6>گزارشات</h6>
            </div>
            <div class="d-flex justify-content-start">
                <div class="col-auto">
                    <span>تاریخ شروع</span>
                </div>
                <div class="col-auto mx-2">
                    <input value="" name="date_start" type="text" id="date1" required>
                </div>
                <div class="col-auto mx-4">

                </div>
                <div class="col-auto">
                    <span>تاریخ پایان</span>
                </div>
                <div>
                    <div class="col-auto mx-2">
                        <input value="" name="date_end" type="text" id="date2" required>
                    </div>
                </div>
                <div>
                    <div class="col-auto mx-2">
                        <button type="submit" class="btn btn-primary">اجرا</button>
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
    kamaDatepicker('date1', customOptions);
</script>