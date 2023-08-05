

<div class="box_img border-bottom text-center pt-0 pt-md-4">


    <?php

        if (file_exists("public/img/products/" . $productinfo['id_product'] . "/product.jpg")) {
            echo '<img style="width: -moz-available"  src="public/img/products/' . $productinfo['id_product'] . '/product.jpg">';
        } elseif (file_exists("public/img/products/" . $productinfo['id_product'] . "/product.png")) {
            echo '<img style="width: -moz-available"  src="public/img/products/' . $productinfo['id_product'] . '/product.png">';
        }

    ?>

</div>


<!--<img src="public/img/products/<? /*= $productinfo['id_product']; */ ?>/product.jpg"
     id="zoom_product"
     class="img-fluid"
     data-zoom-image="public/img/products/<? /*= $productinfo['id_product']; */ ?>/gallery/large/1472662586.jpg">-->


<div class="box_list_img mt-3 pt-0 pt-md-5 text-center galary_thumbnail">
    <ul class="list-inline ">

        <?php foreach ($get_gallery as $row) { ?>

            <?php if ($row['my_D'] == 1) { ?>
                <li class="list-inline-item" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                    data-main-image=""><img src="public/img/products/1/gallery/modal-galary/thumbnail/3D.jpg" alt="">
                </li>
            <?php } else { ?>
                <li class="list-inline-item" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"
                    data-main-image="public/img/products/<?= $row['ID_product'] ?>/gallery/large/<?= $row['image_name']; ?>">
                    <img src="public/img/products/<?= $row['ID_product'] ?>/gallery/small/<?= $row['image_name']; ?>"
                         alt=""></li>
            <?php } ?>


        <?php } ?>

    </ul>
</div>

<div class="mygalary">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Large
        modal
    </button>


    <!-- Large modal -->


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="modal-main-image">
                                <canvas id="cv" width="420" height="320"></canvas>
                                <img src="" class="main_image">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="modal-thumbnail-image" id="content-d">
                                <ul class="list-group">

                                    <?php foreach ($get_gallery as $row) { ?>

                                        <?php if ($row['my_D'] == 1) { ?>
                                            <li class="list-group-item"
                                                data-main-image="public/img/products/<?= $row['ID_product']; ?>/gallery/large/<?= $row['image_name']; ?>">
                                                <img src="public/img/products/<?= $row['ID_product'] ?>/gallery/small/3D.jpg">

                                            </li>

                                        <?php } else { ?>


                                            <li class="list-group-item"
                                                data-main-image="public/img/products/<?= $row['ID_product']; ?>/gallery/large/<?= $row['image_name']; ?>">
                                                <img src="public/img/products/<?= $row['ID_product'] ?>/gallery/small/<?= $row['image_name']; ?>">

                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var canvasTag = document.getElementById('cv');
    var viewer = new JSC3D.Viewer(canvasTag, {
        SceneUrl: 'public/img/products/<?= $productinfo['id_product']?>/3d/bmw.obj',
        InitRotationX: -100,
        InitRotationY: -100,
        InitRotationZ: 0,
        RenderMode: 'texturesmooth'
    });
    viewer.init();
    viewer.update();
</script>
