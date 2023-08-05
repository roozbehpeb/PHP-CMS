<div class="col-lg-10 p-2">
    <div class="page_navigation d-flex justify-content-start mb-3">
        <?php require('breadcrumb.php'); ?>
    </div>
    <div class="filer_selected d-flex justify-content-start bg-light mb-2 ">
        <!-- <div class="filer_selected_items border bg-light mx-1">
             <span>تعداد سیم کارت : یکxx</span>
             <i class= "fal fa-times float-left"></i>
         </div>-->
    </div>

    <div class="row filter_cat  m-auto w-100">
        <?php require('filter-products.php'); ?>

    </div>


    <div class="row mt-3 filter-elements">
        <?php require('search.php'); ?>
        <?php require('view-type.php'); ?>

    </div>

    <div class="row mt-3 justify-content-sm-start">

        <div class="col-sm-12  col-lg-8">

            <div class="row d-flex flex-row  ">
                <?php require('sort.php'); ?>
            </div>

        </div>

        <div class="col-sm-12 col-lg-4 ">
            <?php require('pagination.php'); ?>
        </div>

    </div>


    <div class="row justify-content-center p-1">

        <?php require('card-products.php'); ?>

    </div>


</div>