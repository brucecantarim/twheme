<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

namespace Twheme; 

/*
*
*   This is the configuration file for the theme.
*   Here, you can define variables to customize the functionality.
*
*   I defined it as a trait, so, the correct usage is "use Config;"
*   inside your class. A trait can't be instantied on it's own.
*   That's by design, so we save some lines and headaches.
*
*   In future versions, this will be hooked to the admin dashboard.
*
*/


trait Config {


    var $default_post = false, // Here you can set if you want to use the default post type, or Home one  
        $is_fullscreen = false, // This will define if all content is above the fold
        $navbar = 'default',  // Here you can define which navbar to use, default or bootstrap for now
        $middlebar = true, // This activates a middlebar in the twheme context
        $rightbar = true, // This activates a rightbar in the twheme context
        $twheme_fonts = "Open Sans Condensed", // This value accept Google Fonts name
        $twheme_postslide = 'noticia', // Change this value to the post category you want to use
        $twheme_slideshow = true, //  This enables or disables the Slideshow post type
    
    /*  
    *   POST TYPES
    *   Use this sections to add you custom post types
    *   Singular name only for now, the s will be add automaticaly
    *
    */
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
    
    /*  
    *   GETTERS, SETTERS AND CHECKERS
    *   These are some of the regular tool to access these variables
    *   I encapsulated them, so we make sure these values can only
    *   be altered through these gatekeepers. SAFETY FIRST. ;)
    *
    */
    
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