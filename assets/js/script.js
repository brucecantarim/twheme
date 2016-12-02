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

    /*// Slideshow controls
    var wait = false,
        waitDelay = (wait) ? 1000 : 0;

    // Next Arrow Code
    $('.arrow-next').click(function () {

        // Handle Slides
        var currentSlide = $('.active-slide');
        var nextCount = currentSlide.next('.slide');
        var nextSlide = nextCount.length == 0 ? currentSlide.next() : $('.slide').first();

        var currentDot = $('.active-dot');
        var nextDot = nextCount.length == 0 ? currentDot.next() : $('.dot').first();

        var currentSlideTitle = $('.active-title');
        var nextSlideTitle = nextCount.length == 0 ? currentSlideTitle.next() : $('slide-title').first();

        currentSlide.fadeIn().removeClass('active-slide');
        nextSlide.fadeOut().addClass('active-slide');

        currentDot.removeClass('active-dot');
        nextDot.addClass('active-dot');

        currentSlideTitle.hide().removeClass('active-title');
        nextSlideTitle.show().addClass('active-title');

        wait = true;
    });

    // Previous Arrow Code
    $('.arrow-prev').click(function () {

        // Handle Slides
        var currentSlide = $('.active-slide');
        var prevCount = currentSlide.next('.slide');
        var prevSlide = prevCount.length == 0 ? currentSlide.prev() : $('.slide').last();

        var currentDot = $('.active-dot');
        var prevDot = prevCount.length == 0 ? currentDot.prev() : $('.dot').last();

        var currentSlideTitle = $('.active-title');
        var prevSlideTitle = prevCount.length == 0 ? currentSlideTitle.prev() : $('.slide-title').last();

        currentSlide.fadeIn().removeClass('active-slide');
        prevSlide.fadeOut().addClass('active-slide');

        currentDot.removeClass('active-dot');
        prevDot.addClass('active-dot');

        currentSlideTitle.hide().removeClass('active-title');
        prevSlideTitle.show().addClass('active-title');

        wait = true;

    });

    // Slideshow
    /*$('.slider > .slide:gt(0)').hide();
    var slideTotal = $('.slide').length;
    var intervalDuration = (wait) ? slideTotal * 1000 : slideTotal * 2000;

    setInterval(function () {

        var currentSlide = $('.active-slide');
        var nextSlide = currentSlide.next('.slide');

        var currentDot = $('.active-dot');
        var nextDot = currentDot.next('.dot');

        var currentSlideTitle = $('.active-title');
        var nextSlideTitle = currentSlideTitle.next('.slide-title');

        if (currentSlide.data('toggle') === 'off' && slideCount <= 1) {
            // This stops the slider if there's only one image
        } else {

            // If there is no next slide, we need to go back to the start
            if ((nextSlide.length + nextDot.length + nextSlideTitle.length) === 0) {
                nextSlide = $('.slide').first();
                nextDot = $('.dot').first();
                nextSlideTitle = $('.slide-title').first();
            }

            // Checking if the buttons were pressed
                currentSlide.delay(waitDelay).fadeOut('slow').removeClass('active-slide');
                nextSlide.delay(waitDelay).fadeIn('slow').addClass('active-slide');

                currentDot.delay(waitDelay).removeClass('active-dot');
                nextDot.delay(waitDelay).addClass('active-dot');

                currentSlideTitle.delay(waitDelay).hide().removeClass('active-title');
                nextSlideTitle.delay(waitDelay).show().addClass('active-title');

                if (wait) {
                    wait = false;
                }

        }
    }, intervalDuration);*/

    // Some pages have only 1 image, so, we need to hide the controllers
    // Hide slide controls is data-toggle='off'
    $(function () {
        var currentSlide = $('.active-slide');
        var sliderCheck = $('.slider').children();
        if (currentSlide.data('toggle') === 'off' && sliderCheck.length <= 1) {
            $('.slider-nav', '.product-slider-nav', '.slider-control', '.product-slider-control').hide();
        }
    });

    // Accordion (Refer to jQueryUI documentation)
    $(function () {
        $("#accordion").accordion();
    });

    // Accordion Buttons Chevrons
    $('.accordion-button').click(function () {
        var chevron = $(this).children('.chevron');
        if (chevron.hasClass('glyphicon-chevron-down')) {
            $('.glyphicon-chevron-up').addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
            chevron.toggleClass('glyphicon-chevron-up');
            chevron.toggleClass('glyphicon-chevron-down');
        }
    });

    // Bootstrap Lightbox
    $('.lightbox').click(function () {
        var title = $(this).attr('title');
        var src = $(this).children('img').attr("src");
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