<div id="#slider" class="">
    <div id="slider-img" class="position-relative">

        <?php
            $slider_first = $data[0];
            foreach ($slider_first as $row) {
                ?>
                <a href="<?php echo $row['link_slider1'] ?>" class="item">
                    <img src="<?php echo $row['img_slider1'] ?>" alt="">
                </a>

            <?php } ?>

        <div class="d-flex flex-row text-white text-center custom-slider-nav-box" id="slide_navidator">

            <div class="p-2  flex-fill slider-nav-item ">Flex item 1</div>
            <div class="p-2  flex-fill slider-nav-item">Flex item 2</div>
            <div class="p-2  flex-fill slider-nav-item">Flex item 3</div>
            <div class="p-2  flex-fill slider-nav-item">Flex item 4</div>
            <div class="p-2  flex-fill slider-nav-item">Flex item 5</div>

        </div>
        <div class="" id="next_slider"><i
                    class="fal fa-angle-right fa-2x position-absolute slider-icon-right"></i></div>
        <div class="" id="prev_slider"><i
                    class="fal fa-angle-left fa-2x position-absolute slider-icon-left"></i></div>

    </div>
</div>