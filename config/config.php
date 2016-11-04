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


class Config {

    //
    var $default_post = false;

    //     
    var $is_fullscreen = false;

    //    
    var $navbar = 'default';

    //
    var $middlebar = true;
    
    //
    var $rightbar = true;

    // Custom Google Fonts, currently not fully implemented
    var $twheme_fonts = "Open Sans Condensed";
    
    // Comment this out to disable the Postslide
    var $twheme_postslide = 'noticia'; // Change this value to the post category you want to use

    //  This enables or disables the Slideshow post type
    var $twheme_slideshow = true;
    
    /*  
    *   POST TYPES
    *   Use this sections to add you custom post types
    *   Singular name only for now, the s will be add automaticaly
    *
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
    
    function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    function __get($name)
    {
        return isset($this->$name) ? $this->$name : null;
    }
    
    function __isset($name)
    {
        return isset($this->$name);
    }
    
    function __unset($name)
    {
        if (isset($this->$name)) {
            unset($this->$name);
        }
    }
}