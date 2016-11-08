<?php

namespace Twheme; 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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


abstract class Config {


   public static
        $isFullscreen = false, // This will define if all content is above the fold
        $navBar = 'default',  // Here you can define which navbar to use, default or bootstrap for now
        $middleBar = true, // This activates a middlebar in the twheme context
        $rightBar = true, // This activates a rightbar in the twheme context
        $fonts = "Open Sans Condensed", // This value accept Google Fonts name
        $slideshow = true, //  This enables or disables the Slideshow post type
        $devFooter = false, // This is the optional devFooter, for cool clients
    
    /*  
    *
    *   POST TYPES
    *
    *   Use this sections to add you custom post types
    *   These will appear in the admin dashboard, and will be called in the context
    *
    */
        $defaultPost = false, // True for the default WP main post type, false for a custom type instead
    
        $mainPostType = array( // Here, you can customize the main custom post type
            'type' => 'home',
            'plural' => 'Seções',
            'singular' => 'Seção',
            'icon' => 'dashicons-admin-home',
            'wordsex' => 'female'
        ),
    
        $postSlide = 'noticia', // Change this value to the post category you want to use
    
        $postTypes = array( // Here, you can add all the custom post types that you may need

        "noticias" => array(
            'type' => 'noticia',
            'slug' => 'noticias',
            'plural' => 'Notícias',
            'singular' => 'Notícia',
            'icon' => 'dashicons-admin-site',
            'wordsex' => 'female',
            'orderby' => 'date'
        ),

        "maquinas" => array(
            'type' => 'maquina',
            'slug' => 'maquinas',
            'plural' => 'Máquinas',
            'singular' => 'Máquina',
            'icon' => 'dashicons-cart',
            'wordsex' => 'female',
            'orderby' => 'rand'
        ),

        "eventos" => array(
            'type' => 'evento',
            'slug' => 'eventos',
            'plural' => 'Eventos',
            'singular' => 'Evento',
            'icon' => 'dashicons-megaphone',
            'wordsex' => 'male',
            'orderby' => 'date'
        )

    );
    
    /*  
    *
    *   GETTERS, SETTERS AND CHECKERS
    *
    *   In theory, not realllly necessary here, since I added
    *   "use Config;" where I needed it, but they are here for the
    *   simple case if you do need to access them without declaring
    *   the use of the trait further down the road.
    *   I guess they would work, if it doesn't count as an instance.
    *   You can't instantiate a trait, so you might need to change this,
    *   if you get some errors with what you're trying to achieve.
    *
    *   If you do use them, here's some guidelines for it:
    *   These are some of the regular tool to access these variables
    *   I encapsulated them, so we make sure these values can only
    *   be altered through these gatekeepers. SAFETY FIRST. ;)
    *   This way, we can change the variables names for better
    *   organization, without breaking the rest of the code.
    *   
    *   Don't forget to add an alias check bellow if you do change
    *   one of the internal variables name, ok? Otherwise, you'll
    *   have to change if through all the rest of the code.
    *
    */
    
    public static function get($name)
    {
        return isset(self::$name) ? self::$name : null;
    }
    
    public function __set($name, $value)
    {
        self::$name = $value;
    }
    
    public function __get($name)
    {
        return isset(self::$name) ? self::$name : null;
    }
    
    public function __isset($name)
    {
        return isset(self::$name);
    }
    
    public function __unset($name)
    {
        if (isset(self::$name)) {
            unset(self::$name);
        }
    }
}