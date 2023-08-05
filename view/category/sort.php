<div class="col-auto p-0 ">
    <label class="">مرتب سازی00</label>
    <select onchange="dosearch()" name="OrderType1" class="form-check-inline  form-control-sm me-1"
            id="exampleFormControlSelect1">

        <option value="1">قیمت</option>
        <option value="2">پر بازدید ترین</option>
        <option value="3">جدیدترین</option>
        <option value="4">پر فروش ترین</option>
    </select>
</div>
<div class="col-auto p-0">
    <select onchange="dosearch()" name="OrderType2" class="form-check-inline  form-control-sm me-1"
            id="exampleFormControlSelect2">

        <option value="1">صعودی</option>
        <option value="2">نزولی</option>
    </select>
</div>
<div class="col-auto p-0">
    <select onchange="dosearch()" id="limit_page" class="form-check-inline  form-control-sm me-1"
            id="exampleFormControlSelect3">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4" selected>4</option>
    </select>
</div>

<div class="col-auto p-0">
    <button onclick="dosearch2()" name="reset_page" type="button" class="btn btn-primary">پاک کردن فیلتر ها</button>
</div>