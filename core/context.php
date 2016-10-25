<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Loading configuration
require(__DIR__ . "/../config/config.php");

// Sending main site elements to all pages
$context['fonts'] = $twheme_fonts;
$context['header'] = Timber::render('header.twig', $context);
$context['menu'] = new TimberMenu();
$context['posts'] = Timber::get_posts();
$context['site'] = $this;
$context['footer'] = Timber::render('footer.twig', $context);


if ($twheme_navbar == 'default') {
    $context['navbar'] = Timber::render('navbar.twig', $context);
} else if($twheme_navbar == 'bootstrap') {
    $context['navbar'] = Timber::render('bootstrap-navbar.twig', $context);
} else {
    $context['navbar'] = Timber::render('bootstrap-navbar.twig', $context);
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
if ($twheme_slideshow) {
    
    $slides = array(
        
        'post_type' => 'slides',
        'post_status' => 'publish',
        'orderby'=> 'menu_order',
        'order' => 'asc'
    );

    $context['slides'] = Timber::get_posts($slides);
}

// Checking if Postslide is activated in the config.php file
if (isset($twheme_postslide)) {
    
    $postslides = array(
        
        'post_type' => $twheme_postslide,
        'post_status' => 'publish',
        'orderby'=> 'menu_order',
        'order' => 'asc'
    );

    $context['postslider'] = Timber::get_posts($postslides);
}

// Running a loop for each custom post type in config.php
foreach ($twheme_post_types as $twheme_post_type) {

    $post_type_name = $twheme_post_type["type"];

    $post_type_args = array(
        
    'post_type' => $post_type_name,
    'post_status' => 'publish',
    'orderby'=> 'menu_order',
    'order' => 'asc'
        
    );

$context[$post_type_name] = Timber::get_posts($post_type_args);

}