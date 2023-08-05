<?php $ActiveTab = $data['ActiveTab']; ?>

<ul class="nav nav-tabs nav-tabs-custom border sticky-top" id="myTab">
    <li class="nav-item border-right">
        <a href="#description" class="nav-link  <?php if ($ActiveTab == 'orders') {
            echo 'active';
        } ?>  ?>  " id="description-tab" data-bs-toggle="tab">
            <i class="material-icons">assignment</i>
            سفارشات من
        </a>
    </li>
    <li class="nav-item border-right">
        <a href="#home2" class="nav-link" id="home-tab" data-bs-toggle="tab">
            <i class="material-icons">assignment</i>
            پیغام های من
        </a>
    </li>
    <li class="nav-item border-start ">
        <a href="#profile" class="nav-link " id="profile-tab" data-bs-toggle="tab">
            <i class="material-icons">message</i>
            لیست مورد علاقه
        </a>
    </li>
    <li class="nav-item border-start">
        <a href="#comment" class="nav-link" id="comment-tab" data-bs-toggle="tab">
            <i class="material-icons">message</i>
            نظرات من
        </a>
    </li>
    <li class="nav-item border-start Digibon">
        <a href="#bon" class="nav-link  <?php if ($ActiveTab == 'digibon') {
            echo 'active';
        } ?>" id="bon-tab" data-bs-toggle="tab">
            <i class="material-icons">message</i>
            دیجی بن
        </a>
    </li>
</ul>

<div class="tab-content box-content" id="myTabContent">

    <?php require('tab1.php'); ?>
    <?php require('tab2.php'); ?>
    <?php require('tab3.php'); ?>
    <?php require('tab4.php'); ?>
    <?php require('tab5.php'); ?>

</div>


<script>
    function deleteComment(CommentId, Tag) {
        var iTag = $(Tag);
        var parentTag = iTag.parents('tr');
        // no problem
        //var parentTag = iTag.closest('tr');

        var url = 'panel/deleteComment';
        var data = {'CommentId': CommentId};
        $.post(url, data, function (msg) {
            parentTag.remove();
            // location.reload();

        })
    }


    function savecode() {
        var code = $('.savecode').val();
        var url = 'panel/savecode';
        var data = {'code': code};
        $.post(url, data, function (msg) {
            window.location = 'panel/index/digibon';
            // $('a').removeClass('active');
            $()

        })
    }


</script>