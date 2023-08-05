<script src="public/js/frotel/city.js"></script>
<script src="public/js/frotel/ostan.js"></script>
<script src="public/js/city.js"></script>

<div class="container-fluid bg-white">
    <div class="step_order2">
        <div class="row py-3 d-flex align-items-center justify-content-center">
            <div class="col-1 px-0 d-flex justify-content-center flex-column   align-items-end">
                <div class="d-flex ">
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                </div>
            </div>
            <div class="col-1 px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle  position-relative"></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle active position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle active position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="line"></div>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column  align-items-center">
                <div class="circle rounded-circle position-relative "></div>
                <span class="">تکمیل خرید</span>
            </div>
            <div class="col-1  px-0 d-flex justify-content-center flex-column   align-items-start">
                <div class="d-flex">
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                    <div class="p-1 m-1 bg-primary"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid p-5 bg-white ">
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-between">
            <div><span>انتخاب آدرس</span></div>
            <div>
                <button type="button" class="btn btn-success my_btn" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        data-bs-whatever="@mdo">
                    <i class="fas fa-map-marker-alt"></i>انتخب آدرس جدید
                </button>
                <!-- roozbeh-modal-->
                <div class="alloweb_post">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">آدرس پستی</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="" action="">
                                        <div class="mb-3  d-md-flex  justify-content-around ">
                                            <div class="m-1">
                                                <label for="recipient-name" class="col-form-label list-inline">نام و نام
                                                    خانوادگی:</label>
                                                <input type="text" class="form-control list-inline" id="recipient-name">
                                            </div>
                                            <div class=" m-1">
                                                <label for="recipient-name" class="col-form-label">تلفن همراه:</label>
                                                <input type="text" class="form-control" id="recipient-name2">
                                            </div>
                                            <div class=" m-1">
                                                <label for="recipient-name" class="col-form-label"> تلفن ثابت:</label>
                                                <input type="text" class="form-control" id="recipient-name3">
                                            </div>
                                        </div>
                                        <div class="mb-3  d-md-flex  justify-content-around ">
                                            <div class="m-1">
                                                <label for="recipient-name" class="col-form-label list-inline">
                                                    ایمیل:</label>
                                                <input type="text" class="form-control list-inline"
                                                       id="recipient-name4">
                                            </div>
                                            <div class=" m-1">
                                                <label for="recipient-name" class="col-form-label">کد ملی:</label>
                                                <input type="text" class="form-control" id="recipient-name5">
                                            </div>
                                            <div class=" m-1">
                                                <label for="recipient-name" class="col-form-label">کد پستی:</label>
                                                <input type="text" class="form-control" id="recipient-name7">
                                            </div>
                                        </div>
                                        <div class="mb-3 px-lg-5">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>

                                        <div class="mb-3 mb-3  px-lg-5  d-md-flex  justify-content-start ">
                                            <div class="mx-2" onchange="ostan(this);">
                                                <label for="validationCustom04" class="form-label">استان</label>
                                                <select class="form-select" id="validationCustom04" required>
                                                    <option selected disabled value="">انتخاب کنید</option>
                                                    <option data-val="31" value="اصفهان">اصفهان</option>
                                                    <option data-val="21" value="تهران">تهران</option>
                                                    <option data-val="26" value="البرز">البرز</option>
                                                    <option data-val="77" value="بوشهر">بوشهر</option>
                                                </select>
                                            </div>
                                            <div class="mx-2 shahr">
                                                <label for="validationCustom04" class="form-label">شهر</label>
                                                <select class="form-select" id="validationCustom66" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>

                                        </div>


                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن
                                    </button>
                                    <button type="button" class="btn btn-primary">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="showcart2_table">
                <table class="w-100">
                    <tr>
                        <td rowspan="3" class="position-relative my_bg">
                            <span class="circle rounded-circle p-1 "></span>
                        </td>
                        <td colspan="3">روزبه پبدنی</td>
                        <td rowspan="3" width="1px">
                            <div class="edit"><i class="fas fa-edit" style="color: #000000"></i></div>
                            <div class="cross"><i class="fas fa-times" style="color: #000000"></i></div>
                        </td>

                    </tr>

                    <tr>
                        <td>استان: اصفهان</td>
                        <td rowspan="2">my center پروپژه بزرگ</td>
                        <td>شماره: 9137909054</td>

                    </tr>

                    <tr>
                        <td>شهر: فولادشهر</td>
                        <td>کد ملی : 116025998</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <div class="row showcart4_table mt-3 my_shiping">
        <div class="col-sm-12">
            <table class="w-100">
                <tr class="">
                    <td class="position-relative my_bg p-3">
                        <span class="circle rounded-circle p-1 "></span>
                    </td>

                    <td class="p-3 d-flex align-self-center">
                        <i class="far fa-truck "></i>
                        <span class="p-1">ارسال رایگان در سرتاسر دیگر و تمامی شهر ها و روستای ایران</span>
                    </td>

                    <td class="text-center price">
                        <div>هزینه ارسال</div>
                        <div>36000</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row showcart4_table mt-3 my_shiping">
        <div class="col-sm-12">
            <table class="w-100">
                <tr class="">
                    <td class="position-relative my_bg p-3">
                        <span class="circle rounded-circle p-1 "></span>

                    </td>

                    <td class="p-3 d-flex align-self-center">
                        <i class="far fa-truck "></i>
                        <span class="p-1">ارسال رایگان در سرتاسر دیگر و تمامی شهر ها و روستای ایران</span>
                    </td>

                    <td class="text-center price">
                        <div>هزینه ارسال</div>
                        <div>پس کرایه</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="d-flex">
                <div class="px-2"><span>آیا فاکتور ارسال شود؟</span></div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <span>بله</span>
                    </label>
                </div>
                <div class="form-check mx-3 ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        <span>خیر</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-5">

        <button type="button" class="btn btn-success my_btn">بازگشت به سبد خرید</button>
        <button type="button" class="btn btn-primary my_btn">ثبت اطلاعات و ادامه خرید</button>

    </div>


