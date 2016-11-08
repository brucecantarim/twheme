<?php

namespace Twheme; 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Here in this class, we define which will be the global contexts that will be passed
// and be acessible through our twig files. If you need one for just a specific page, then
// You should refer to the individual pages files in the root directory of the theme.
class Context {

    function build ( $site ) {
        // Retrieving the values stored in the config
        $context['site'] = $site;
        $context['fonts'] = Config::$fonts;
        $context['menu'] = new \TimberMenu();
        $context['posts'] = \Timber::get_posts();
        $context['dir'] = get_template_directory_uri();
        
        // This calls the home post type sections, as sections, if needed
        // Use this to manage the main page content, it's pretty handy
        if ( !Config::$defaultPost ) {

            $homeargs = array(
                'orderby'=> 'menu_order',
                'order' => 'asc',
                'category_name' => 'home'
            );

            $context['sections'] = \Timber::get_posts( $homeargs );
        }

        // Checking if Slideshow is activated in the config.php file
        // The use is up to you, made this for a project where I had
        // to show multiple products above the hero in a main page
        if ( Config::$slideshow ) {

            $slides = array(

                'post_type' => 'slides',
                'post_status' => 'publish',
                'orderby'=> 'menu_order',
                'order' => 'asc'
            );

            $context['slides'] = \Timber::get_posts( $slides );
        }

        // Checking if Postslide is activated in the config.php file
        // This is similar to the slideshow function, but more customizable.
        // Can be attached to another custom post type, where you can
        // define a custom field to check which posts should apear in
        // the slider. The check must be done in the twig files.
        if ( Config::$postSlide ) {

            $postSlides = array(

                'post_type' => Config::$postSlide,
                'post_status' => 'publish',
                'orderby'=> 'menu_order',
                'order' => 'asc'
            );

            $context['postslider'] = \Timber::get_posts( $postSlides );
        }

        // Running a loop for each custom post type in config.php
        // This way, they'll be add to the context by the name of
        // the array. Almost an autoloader of sorts for context
        // post types and it's fields.
        
        // OK! Almost there! I need to change this so it iterates through
        // the name keys in this array. I'll make this work in the morning.
        // Funny thing is that this didn't gave me an error at work.
        // Noticed it only at my home computer. That's why you should
        // check your code in different enviroments, I guess.
        $twheme_post_types = Config::$postTypes;
        
        foreach ( $twheme_post_types as $postTypeName ) { 

            $postTypeNameArray = array(

            'post_type' => $postTypeName,
            'post_status' => 'publish',
            'orderby'=> 'menu_order',
            'order' => 'asc'

            );

            $context["'".$postTypeName."'"] = \Timber::get_posts( $postTypeNameArray );
        }
        
        // Rendering the default bits of the website
        // I should change this later on...
        // For now, keep them below here, as the order of the calls
        // directly influences the content that gets passed here
        // with the render function. I'm probably gonna throw these
        // in a render function inside this context class.
        $context['header'] = \Timber::render( 'header.twig', $context );
        
        // Checking which navbar should we send to the context
        // That's all we got for now, bootstrap or the default
        if (Config::$navBar === 'bootstrap') {
            $context['navbar'] = \Timber::render( 'bootstrap-navbar.twig', $context );
        } else {
            $context['navbar'] = \Timber::render( 'navbar.twig', $context );
        }
        
        // Optional devFooter, for cool clients to sport our brand
        if (Config::$devFooter ) {
            $context['footer'] = \Timber::render( 'footer.twig', $context );
        }
            
        return $context;
    }

}



