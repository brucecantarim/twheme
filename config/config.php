<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
*
*   This is the configuration file for the theme.
*   Here, you can define variables to customize the functionality.
*   It's still being implemented. PHP is hell. I need to figure out what to do.
*   In future versions, this will be hooked to the admin dashboard.
*
*/


class TwhemeConfig {

    //
    var $default_post = false;
    
    public function defaultPost() {
        return $this->default_post;
    }

    //     
    var $is_fullscreen = false;
    
    public function isFullscreen() {
        return $this->is_fullscreen;
    }

    //    
    var $navbar = 'default';
    
    public function navbar() {
        return $this->navbar;
    }

    //
    var $middlebar = true;
    
    public function middlebar() {
        return $this->middlebar;
    }

    //
    var $rightbar = true;
    
    public function rightbar() {
        return $this->rightbar;
    }

    // Custom Google Fonts, currently not fully implemented
    var $twheme_fonts = "Open Sans Condensed";
    
    public function fonts() {
        return $this->twheme_fonts;
    }

    /*  
    *   POST TYPES
    *   Use this sections to add you custom post types
    *   Singular name only for now, the s will be add automaticaly
    *
    *   WARNING!!!
    *   Not currently working, I need to figure how to return the array from the class yet
    *   Make changes to this variable in context.php and custom-post-types.php instead for now
    */
    var $twheme_post_types = array(

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
    
    public function postTypes() {
        return $this->twheme_post_types;
    }

    var $twheme_post_types_list = array('noticia', 'maquina', 'evento');
    
    public function postTypesList() {
        return $this->twheme_post_types_list;
    }

    // Comment this out to disable the Postslide
    var $twheme_postslide = 'noticia'; // Change this value to the post category you want to use
    
    public function postSlider() {
        return $this->twheme_postslide;
    }

    //  This enables or disables the Slideshow post type
    var $twheme_slideshow = true;
    
    public function slideShow() {
        return $this->twheme_slideshow;
    }

}

// Finally, let's go to the init file
require_once(__DIR__ . '/../core/init.php');