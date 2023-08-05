/*menu main project*/
$(document).ready(function () {
    $('#alloweb_menu .data-item').fadeOut(0);
    $('#alloweb_menu .data-item').eq(0).fadeIn(0);

    $('.menu-tab').hover(function () {
        $('#alloweb_menu .data-item').fadeOut(0);
        var index = $(this).index();
        $('#alloweb_menu .data-item').eq(index).fadeIn(0);
    }), function () {

    }
})

/*main-slider1 project*/
$(document).ready(function () {

    /* slider */

    var sliderTag = $('#slider-img');
    var slider_pic = sliderTag.find('.item');
    var Total_pic = slider_pic.length;
    var slider_nav_item = $('.slider-nav-item');

    /*   alert(Total_pic);*/
    var slider_num = 1;
    var timeout = 4200;


    function slider() {
        /* for next buttom*/
        if (slider_num > Total_pic) {
            slider_num = 1;
        }

        /* for prev buttom*/
        if (slider_num < 1) {
            slider_num = Total_pic;
        }

        slider_pic.hide();
        slider_pic.eq(slider_num - 1).fadeIn(0);
        /* for navigatore under slider */
        slider_nav_item.removeClass('active');
        slider_nav_item.eq(slider_num - 1).addClass('active');

        slider_num++;
        /*  alert(slider_num);*/
    }

    slider();
    var slider_play = setInterval(slider, timeout);
    sliderTag.mouseleave(function () {
        clearInterval(slider_play);
        /*set  slider function & timeout  for  slider_play variable again  */
        slider_play = setInterval(slider, timeout);
    })
    /*next slider*/
    function go_to_next() {
        slider();
    }

    $('#next_slider').click(function () {
        clearInterval(slider_play);
        go_to_next();
    });

    /*prev slider*/
    function go_to_prev() {
        slider_num = slider_num - 2;
        slider();
    }

    $('#prev_slider').click(function () {
        /* stopped slider Auto-play*/
        clearInterval(slider_play);
        /**/
        go_to_prev();
    });


    /* show slider by hover */

    function go_to_slide(index) {
        slider_num = index;
        slider();

    }

    $('.slider-nav-item').hover(function () {

        /* stopped slider Auto-play*/
        clearInterval(slider_play);
        /**/
        var index = $(this).index();
        go_to_slide(index + 1);

    }, function () {

    });


})


/*slider2 project*/

$(document).ready(function () {

    /* slider2 */

    var sliderTag2 = $('#slider2');
    var slider_pic2 = sliderTag2.find('.slide2_item');
    var Total_pic2 = slider_pic2.length;
    var slider_nav_item2 = $('.slider_nav_item2');

    /*   alert(Total_pic);*/
    var slider_num2 = 1;
    var timeout2 = 2000;


    function slider2() {
        /* for next buttom*/
        if (slider_num2 > Total_pic2) {
            slider_num2 = 1;
        }

        /* for prev buttom*/
        if (slider_num2 < 1) {
            slider_num2 = Total_pic2;
        }

        slider_pic2.hide();
        slider_pic2.eq(slider_num2 - 1).fadeIn(0);
        /* for navigatore under slider */
        slider_nav_item2.removeClass('active2');
        slider_nav_item2.eq(slider_num2 - 1).addClass('active2');

        slider_num2++;
        /*  alert(slider_num);*/
    }

    slider2();
    var slider_play2 = setInterval(slider2, timeout2);
    sliderTag2.mouseleave(function () {
        clearInterval(slider_play2);
        /*set  slider function & timeout  for  slider_play variable again  */
        slider_play2 = setInterval(slider2, timeout2);
    })


    /* show slider by hover */

    function go_to_slide2(index) {
        slider_num2 = index;
        slider2();

    }

    $('.slider_nav_item2').click(function () {

        /* stopped slider Auto-play*/
        clearInterval(slider_play2);
        /**/
        var index2 = $(this).index();
        go_to_slide2(index2 + 1);

    });


})

/*time project  */
$(document).ready(function () {


    $('.flipTimer').flipTimer({
        direction: 'down',
        date: 'march 4, 2022 2:09:02',
        seconds: true,
        minutes: false,
        hours: true,
        callback: function () {
            $('.slider2_content_right').css('opacity', 0.4);
            $('.slide2_finish_offer').fadeIn(0);
        }
    });

})

/*carousel project */
$(document).ready(function () {
    $(".owl-carousel").owlCarousel();
});


/* right panel check box */
$(document).ready(function () {
    $('.check_input').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('.check_div').find('.check_label').addClass('checked');
        }
        else {
            $(this).parents('.check_div').find('.check_label').removeClass('checked');

        }
    })
})


/* single-product - check box */
$(document).ready(function () {
    $('.check_input3').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('.check_div3').find('.check_label3').addClass('checked');
        }
        else {
            $(this).parents('.check_div3').find('.check_label3').removeClass('checked');

        }
    })
})


/* check box hover */
$(document).ready(function () {

    var filter_Item = $('.filer_cat_ul2 li');
    filter_Item.hover(function () {
            $('.check_label', this).addClass('filer_cat_color_li');
    },
    function () {
     $('.check_label', this).removeClass('filer_cat_color_li');

     });

})

/* filter seleced project */
$(document).ready(function () {


    var filter_Item = $('.filer_cat_ul2 li');

    filter_Item.click(function () {
        var title = $(this).parents('.filter_title').find('.title').text();
        var value = $(this).text();
        var id = $(this).attr('data-id');
        var filer_selected = $('.filer_selected');
        var filer_selected_div = filer_selected.find('div[data-id=' + id + ']');
        var len  = filer_selected_div.length;
        /*alert(len);*/

        if(len>0){
            filer_selected_div.remove();
        }
        else {
            var filter_content ='<div  data-id="'+id+'"  class="filer_selected_items border bg-light           mx-1"><span>'+title+':'+value+'</span><i class= "fal fa-times float-left" onclick="removeSelected(this)"></i></div>';
            $('.filer_selected').append(filter_content);
        }
        $('.check_label',this).toggleClass('checked');

    })

})

/*remove selected filter items */
function removeSelected(tag) {
    var section_tag =  $(tag).parents('.filer_selected_items');
    section_tag.remove();
    var myid8= section_tag.attr('data-id');
    $('.filer_cat_ul2 li[data-id='+myid8+']').find('.check_label').removeClass('checked');
}

 /* drop down filter menu */
$(document).ready(function () {
    $('.filter_list').fadeOut(0);
    var  Filter = $('.filter_option');

    Filter.hover(function () {
        $('.filter_list',this).slideDown(250);

    },function () {
        $('.filter_list', this).slideUp(200);
    })

})

/* yes or no filter*/
$(document).ready(function () {
    $('.filter_exist').click(function () {
        $(this).toggleClass('active');

        if($(this).hasClass('active')) {
            $('.filter_bnt', this).animate({'left': '11px'},400);
        }
        else {
            $('.filter_bnt',this).animate({'left':'-2px'},400);

        }


    })
})


/* garanti Ul list*/

$(document).ready(function () {
    $('#garanti_select').click(function () {
        var ul_tag = $('ul',this);
        ul_tag.slideToggle(200);
    })
})

$(document).ready(function () {
    $('#garanti_select ul li').click(function () {
        var txt = $(this).text();
        $('.zemanat_title').text(txt);

    })

})

$(document).ready(function () {
    $('.selected_color').click(function () {
        $('.circle',this).toggleClass('active');

        /* code bala va zirin yeki hast */
       /* $(this).find('.circle').toggleClass('active'); */

    })
})

$(document).ready(function () {
    $('.description_product .more').click(function () {
        $('.description_product').toggleClass('active');

    })
})


$(document).ready(function () {
    $('.item_container .tab_item h4').click(function () {
        $(this).toggleClass('active');
        var tab_item =$(this).parents('.tab_item');
        $('.experting',tab_item).slideToggle(300);
    })
})

$(document).ready(function () {
    $('#zoom_product').elevateZoom({'zoomWindowOffetx':-800, 'scrollZoom':true, 'lensSize':50});
})

/* productgalaary*/
$(document).ready(function () {
    var modal_thumbnail_image = $('.modal-thumbnail-image ul li');
    var galary_thumbnail = $('.galary_thumbnail ul li');
    galary_thumbnail.click(function () {
        var  modal_main_image_url = $(this).attr('data-main-image');
        var index = $(this).index();
        modal_thumbnail_image.removeClass('active2');
        modal_thumbnail_image.eq(index).addClass('active2');
        $('.modal-main-image').find('.main_image').attr('src',modal_main_image_url);

        if (modal_main_image_url.length>0){
            $('#cv').fadeOut(100);
            $('.main_image').fadeIn(100);
        }else {
            $('.main_image').fadeOut(0);
            $('#cv').fadeIn(100);
        }
    })
})


/*product-modal-galaary*/
$(document).ready(function () {
  var modal_thumbnail_image = $('.modal-thumbnail-image ul li');
    modal_thumbnail_image.click(function () {
        modal_thumbnail_image.removeClass('active2');
        $(this).toggleClass('active2');
        var  modal_main_image_url = $(this).attr('data-main-image');
        $('.modal-main-image').find('.main_image').attr('src',modal_main_image_url);
        
        if (modal_main_image_url.length>0){
            $('#cv').fadeOut(100);
            $('.main_image').fadeIn(100);
        }else {
            $('.main_image').fadeOut(0);
            $('#cv').fadeIn(100);
        }
    })
})





