$(function () {

    // Hiding the WP admin bar, I HATE IT
    $('#wpadminbar').hide();

    // Killing Horizontal Scrolling
    var scrollEventHandler = function () {
        window.scroll(0, window.pageYOffset);
    };

    window.addEventListener("scroll", scrollEventHandler, false);

    // Adding the menu mouseover functionality
    $('.menuitem').hover(function () {

        var target = $(this).data("target");

        $('.submenu').hide();
        $(target).toggleClass('wow fadeIn').slideDown('fast').show();
        $(target).children().hide();
        $(target).children().fadeIn();

    }, function () {

        var target = $(this).data("target");

        $(target).mouseover(function () {
            $(this).show();
        });

        $(target).mouseleave(function () {
            $(this).children().fadeOut(400);
            $(this).children().hide(400);
            $(this).toggleClass('wow fadeOut').slideUp('slow').hide(400);
        });
    });

    // Adding the mobile menu functionality
    $('.hamburger').click(function() {
            $('.mobilemenu').slideToggle();
    });

    // SLIDESHOW
    // Some pages have only 1 image, so, we need to hide the controllers
    // Hide slide controls is data-toggle='off'
    $(function () {
        var currentSlide = $('.active-slide');
        var sliderCheck = $('.slider').children();
        if (currentSlide.data('toggle') === 'off' && sliderCheck.length <= 1) {
            $('.slider-nav', '.product-slider-nav', '.slider-control', '.product-slider-control').hide();
        } else {
            // Custom options for the carousel
            var slideCount = $('.slide').length;

            var args = {
                arrowRight : '.arrow-next', //A jQuery reference to the right arrow
                arrowLeft : '.arrow-prev', //A jQuery reference to the left arrow
                speed : 1000, //The speed of the animation (milliseconds)
                slideDuration : slideCount * 2000 //The amount of time between slides, in ms
            };

            $('.slider').slider(args);
        }
    });

    // Accordion (Refer to jQueryUI documentation)
    /*$(function () {
        $("#accordion").accordion();
    });*/

    // Accordion Buttons Chevrons
    /*$('.accordion-button').click(function () {
        var chevron = $(this).children('.chevron');
        if (chevron.hasClass('glyphicon-chevron-down')) {
            $('.glyphicon-chevron-up').addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
            chevron.toggleClass('glyphicon-chevron-up');
            chevron.toggleClass('glyphicon-chevron-down');
        }
    });*/

    // Bootstrap Lightbox
    $('.lightbox').click(function () {
        var title = $(this).attr('title');
        var src = $(this).children('img').attr("data-target");
        var alt = $(this).children('img').attr("alt") || "";
        var $img = $('<img class="center-block img-responsive" alt="' + alt + '" src="' + src + '">');
        $('.modal-title').html(title);
        $('.modal-body').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>');
        $('#lightbox').modal({
            show: true
        });
        $img.ready(function () {
            $('.modal-body').html($img);
        });
    });

});