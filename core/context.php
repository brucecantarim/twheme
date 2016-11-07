<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

namespace Twheme; 

// Here in this class, we define which will be the global contexts that will be passed
// and be acessible through our twig files. If you need one for just a specific page, then
// You should refer to the individual pages files in the root directory of the theme.
class Context {
    
    use Config; // Loading the configuration trait, that's where our variables are

    // Checking which navbar should we send to the context
    // That's all we got for now, bootstrap or the default
    if ($navBar == 'bootstrap') {
        $context['navbar'] = Timber::render('bootstrap-navbar.twig', $context);
    } else {
        $context['navbar'] = Timber::render('navbar.twig', $context);
    }
    
    // Sending the other main site elements to all pages
    $context['header'] = Timber::render('header.twig', $context);
    $context['menu'] = new TimberMenu();
    $context['posts'] = Timber::get_posts();
    $context['footer'] = Timber::render('footer.twig', $context);
    
    // Retrieving the values stored in the config
    $context['fonts'] = $fonts;
    $context['site'] = $this;
    
    // This calls the home post type sections, as sections, if needed
    // Use this to manage the main page content, it's pretty handy
    if ($defaultPost) {
    
        $homeargs = array(
            'orderby'=> 'menu_order',
            'order' => 'asc',
            'category_name' => 'home'
        );
        
        $context['sections'] = Timber::get_posts($homeargs);
    }

    // Checking if Slideshow is activated in the config.php file
    // The use is up to you, made this for a project where I had
    // to show multiple products above the hero in a main page
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
    // This is similar to the slideshow function, but more customizable.
    // Can be attached to another custom post type, where you can
    // define a custom field to check which posts should apear in
    // the slider. The check must be done in the twig files.
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
    // This way, they'll be add to the context by the name of
    // the array. Almost an autoloader of sorts for context
    // post types and it's fields.
    foreach ($postTypes as $postTypeName) { 

        $postTypeName = array(

        'post_type' => $postTypeName,
        'post_status' => 'publish',
        'orderby'=> 'menu_order',
        'order' => 'asc'

        );

        $context["'".$postTypeName."'"] = Timber::get_posts($postTypeName);
    }
    
    /*  
    *
    *   GETTERS, SETTERS AND CHECKERS
    *
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



