<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

namespace Twheme; 

class Context {
    
    use Config;

    // Sending main site elements to all pages
    $context['fonts'] = $fonts;
    $context['header'] = Timber::render('header.twig', $context);
    $context['menu'] = new TimberMenu();
    $context['posts'] = Timber::get_posts();
    $context['site'] = $this;
    // $context['footer'] = Timber::render('footer.twig', $context);

    if ($navBar == 'default') {
        $context['navbar'] = Timber::render('navbar.twig', $context);
    } else if($navBar == 'bootstrap') {
        $context['navbar'] = Timber::render('bootstrap-navbar.twig', $context);
    } else {
        $context['navbar'] = Timber::render('navbar.twig', $context);
    }

    // This calls the home post type sections
    $homeargs = array(
        'orderby'=> 'menu_order',
        'order' => 'asc',
        'category_name' => 'home'
    );
    $context['sections'] = Timber::get_posts($homeargs);

    // Client logo loops  
    $context['clients'] = ["client_logo_1", "client_logo_2", "client_logo_3", "client_logo_4", "client_logo_5", "client_logo_6", "client_logo_7", "client_logo_8", "client_logo_9"];

    // Checking if Slideshow is activated in the config.php file

    if ($slideshow) {

        $slides = array(

            'post_type' => 'slides',
            'post_status' => 'publish',
            'orderby'=> 'menu_order',
            'order' => 'asc'
        );

        $context['slides'] = Timber::get_posts($slides);
    }

    // Checking if Postslide is activated in the config.php file

    if ($postSlide) {

        $postSlides = array(

            'post_type' => $postSlide,
            'post_status' => 'publish',
            'orderby'=> 'menu_order',
            'order' => 'asc'
        );

        $context['postslider'] = Timber::get_posts($postSlides);
    }

    // Running a loop for each custom post type in config.php
   

    foreach ($postTypes as $postTypeName) { 

        $postTypeName = array(

        'post_type' => $postTypeName,
        'post_status' => 'publish',
        'orderby'=> 'menu_order',
        'order' => 'asc'

        );

        $context["'".$postTypeName."'"] = Timber::get_posts($postTypeNamepostTypeName);

    }

}



