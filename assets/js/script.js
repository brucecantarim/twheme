$(document).ready(function () {

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

        $(target).mouseenter(function () {
            $(this).show();
        });

        $(target).mouseleave(function () {
            $(this).children().fadeOut();
            $(this).children().hide();
            $(this).toggleClass('wow fadeOut').slideUp('slow').hide(400);
        });

    });

    // Next Arrow Code
    $('.arrow-next').click(function () {

        // Handle Slides
        var currentSlide = $('.active-slide');
        var nextSlide = currentSlide.next();

        var currentDot = $('.active-dot');
        var nextDot = currentDot.next();

        var currentSlideTitle = $('.active-title');
        var nextSlideTitle = currentSlideTitle.next();

        if (nextSlide.length === 0 || nextDot.length === 0 || nextSlideTitle.length === 0) {
            nextSlide = $('.slide').first();
            nextDot = $('.dot').first();
            nextSlideTitle = $('.slide-title').first();
        }

        currentSlide.hide( "slide", "left", 600 ).removeClass('active-slide');
        nextSlide.show( 'fast' ).addClass('active-slide');

        currentDot.removeClass('active-dot');
        nextDot.addClass('active-dot');

        currentSlideTitle.hide().removeClass('active-title');
        nextSlideTitle.show().addClass('active-title');

    });

    // Previous Arrow Code
    $('.arrow-prev').click(function () {

        // Handle Slides
        var currentSlide = $('.active-slide');
        var prevSlide = currentSlide.prev();

        var currentDot = $('.active-dot');
        var prevDot = currentDot.prev();

        var currentSlideTitle = $('.active-title');
        var prevSlideTitle = currentSlideTitle.prev();

        if (prevSlide.length === 0 || prevDot.length === 0 || prevSlideTitle.length === 0) {
            prevSlide = $('.slide').last();
            prevDot = $('.dot').last();
            prevSlideTitle = $('.slide-title').last();
        }

        currentSlide.hide( "slide", "right", 600 ).removeClass('active-slide');
        prevSlide.show( "fast" ).addClass('active-slide');

        currentDot.removeClass('active-dot');
        prevDot.addClass('active-dot');

        currentSlideTitle.hide().removeClass('active-title');
        prevSlideTitle.show().addClass('active-title');

    });

    // Slideshow
    $('.slider > .slide:gt(0)').hide();

    setInterval(function () {

        var sliderCheck = $('.slider').children();

        var currentSlide = $('.active-slide');
        var nextSlide = currentSlide.next();

        var currentDot = $('.active-dot');
        var nextDot = currentDot.next();

        var currentSlideTitle = $('.active-title');
        var nextSlideTitle = currentSlideTitle.next();

        if (nextSlide.length === 0 || nextDot.length === 0 || nextSlideTitle.length === 0) {
            nextSlide = $('.slide').first();
            nextDot = $('.dot').first();
            nextSlideTitle = $('.slide-title').first();
        }

        if (currentSlide.data('toggle') === 'off' && sliderCheck.length <= 1) {
            // This stops the slider if there's only one image
        } else {

            currentSlide.hide( "slide", "left", 1000 ).removeClass('active-slide');
            nextSlide.fadeIn().addClass('active-slide');

            currentDot.removeClass('active-dot');
            nextDot.addClass('active-dot');

            currentSlideTitle.hide().removeClass('active-title');
            nextSlideTitle.show().addClass('active-title');

        }
    }, 5000);

    // Hide slide controls is data-toggle='off'
    $(function () {
        var currentSlide = $('.active-slide');
        var sliderCheck = $('.slider').children();
        if (currentSlide.data('toggle') === 'off' && sliderCheck.length <= 1) {
            $('.slider-nav', '.product-slider-nav', '.slider-control', '.product-slider-control').hide();
        }
    });

    // Accordion
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