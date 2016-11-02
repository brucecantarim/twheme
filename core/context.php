<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Instantiating the config class
$config = new TwhemeConfig();

// Sending main site elements to all pages
$context['fonts'] = $config->fonts;
$context['header'] = Timber::render('header.twig', $context);
$context['menu'] = new TimberMenu();
$context['posts'] = Timber::get_posts();
$context['site'] = $this;
// $context['footer'] = Timber::render('footer.twig', $context);

// Post Gallery Filter
$gallery = $post->gallery;
$context['gallery'] =  isset($gallery) ? explode(',', $gallery) : null;

// Video Gallery Filter
$gallery = $post->videos;
$context['videos'] =  isset($videos) ? explode(',', $videos) : null;

$twheme_navbar = $config->navbar;

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
// Had to disable this check, untill I figure out why this file is not getting the variables
// Maybe I have to pass the parameters I want in the init.php function call?

//$twheme_slideshow = $config->slideShow;

//if ($twheme_slideshow) {
    
    $slides = array(
        
        'post_type' => 'slides',
        'post_status' => 'publish',
        'orderby'=> 'menu_order',
        'order' => 'asc'
    );

    $context['slides'] = Timber::get_posts($slides);
//}

// Checking if Postslide is activated in the config.php file
// Probably needs fixing, variables still not being called properly? I HATE php...

$twheme_postslide = $config->postSlider;

if ($twheme_postslide) {
    
    $postslides = array(
        
        'post_type' => $twheme_postslide,
        'post_status' => 'publish',
        'orderby'=> 'menu_order',
        'order' => 'asc'
    );

    $context['postslider'] = Timber::get_posts($postslides);
}

// Running a loop for each custom post type in config.php
// $twheme_post_types = $config->postTypes;
// PLACEHOLDER! I need to figure how to return the array from the class yet
$twheme_post_types = array(

        "noticias" => array(
            'type' => 'noticia',
            'plural' => 'Notícias',
            'singular' => 'Notícia',
            'icon' => 'dashicons-admin-site',
            'wordsex' => 'female'
        ),

        "maquinas" => array(
            'type' => 'maquina',
            'plural' => 'Máquinas',
            'singular' => 'Máquina',
            'icon' => 'dashicons-cart',
            'wordsex' => 'female'
        ),

        "eventos" => array(
            'type' => 'evento',
            'plural' => 'Eventos',
            'singular' => 'Evento',
            'icon' => 'dashicons-megaphone',
            'wordsex' => 'male'
        )

    );

foreach ($twheme_post_types as $twheme_post_type_name) { 

    $post_type_args = array(
        
    'post_type' => $twheme_post_type_name,
    'post_status' => 'publish',
    'orderby'=> 'menu_order',
    'order' => 'asc'
        
    );

    $context["'".$twheme_post_type_name."'"] = Timber::get_posts($post_type_args);
    
} 



