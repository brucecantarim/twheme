<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
*
*   This is the configuration file for the theme.
*   Here, you can define variables to customize the functionality.
*   It's still being implemented.
*   In future versions, this will be hooked to the admin dashboard.
*/

/*  
*   POST TYPES
*   Use this sections to add you custom post types
*   Singular name only for now, the s will be add automaticaly
*/

$twheme_is_fullscreen = false;
$twheme_navbar = 'default';
$twheme_middlebar = true;
$twheme_rightbar = true;
$twheme_default_post = false;

// Custom Google Fonts, currently not working
    
$twheme_fonts = "Open Sans Condensed";

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

// Comment this out to disable the Postslide
$twheme_postslide = 'noticia'; // Change this value to the post category you want to use

//  This enables or disables the Slideshow post type
$twheme_slideshow = true;

// Finally, let's go to the init file
require_once(__DIR__ . '/../core/init.php');