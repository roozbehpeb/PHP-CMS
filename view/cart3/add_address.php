<form id="add_address">
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-between">
            <div><span>انتخاب آدرس</span></div>
            <div>
                <button type="button" class="btn btn-success my_btn " data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        data-bs-whatever="@mdo">
                    <i class="fas fa-map-marker-alt mx-1"></i>انتخب آدرس جدید
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

                                    <div class="mb-3  d-md-flex  justify-content-around ">
                                        <div class="m-1">
                                            <label for="recipient-name" class="col-form-label list-inline">نام و نام
                                                خانوادگی:</label>
                                            <input name="family" type="text" class="form-control list-inline"
                                                   id="recipient-name">
                                        </div>
                                        <div class=" m-1">
                                            <label for="recipient-name" class="col-form-label">تلفن همراه:</label>
                                            <input name="mobile" type="text" class="form-control"
                                                   id="recipient-name2">
                                        </div>
                                        <div class=" m-1">
                                            <label for="recipient-name" class="col-form-label"> تلفن ثابت:</label>
                                            <input name="tel" type="text" class="form-control" id="recipient-name3">
                                        </div>
                                    </div>
                                    <div class="mb-3  d-md-flex  justify-content-around ">
                                        <div class="m-1">
                                            <label for="recipient-name" class="col-form-label list-inline">
                                                ایمیل:</label>
                                            <input name="email" type="text" class="form-control list-inline"
                                                   id="recipient-name4">
                                        </div>
                                        <div class=" m-1">
                                            <label for="recipient-name" class="col-form-label">کد
                                                ملی/گذرنامه:</label>
                                            <input name="passport" type="text" class="form-control"
                                                   id="recipient-name5">
                                        </div>
                                        <div class=" m-1">
                                            <label for="recipient-name" class="col-form-label">کد پستی:</label>
                                            <input name="zipcode" type="text" class="form-control"
                                                   id="recipient-name7">
                                        </div>
                                    </div>


                                    <div class="mb-3 mb-3  px-lg-5  d-md-flex  justify-content-start ">
                                        <div class="mx-2 ">
                                            <label for="validationCustom04" class="form-label">استان</label>
                                            <select onclick="ostan(this);" name="state" class=" selectpicker state"
                                                    id="validationCustom04"
                                            <!--required-->>
                                            <option selected disabled value="">انتخاب کنید</option>
                                            <option data-val="31" value="اصفهان">اصفهان</option>
                                            <option data-val="21" value="تهران">تهران</option>
                                            <option data-val="26" value="البرز">البرز</option>
                                            <option data-val="77" value="بوشهر">بوشهر</option>
                                            </select>
                                        </div>
                                        <div class="mx-2 shahr">
                                            <label for="validationCustom04" class="form-label">شهر</label>
                                            <select onclick="mahale(this);" name="city" class=" selectpicker city"
                                                    id="validationCustom66"
                                            <!--required-->>
                                            <!-- <option selected disabled value="">Choose...</option>-->
                                            <option>...</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="mb-3 px-lg-5">
                                        <label for="message-text" class="col-form-label">آدرس دقیق محل
                                            دریافت:</label>
                                        <textarea name="full_address" class="form-control"
                                                  id="message-text"></textarea>

                                    </div>


                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن
                                    </button>
                                    <button data-bs-dismiss="modal" onclick="submitform();" type="button"
                                            class="btn btn-secondary send">save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>


    function myrelod() {
        $('.selectpicker').selectpicker('refresh');
    }

</script>