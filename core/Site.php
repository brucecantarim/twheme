<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Site extends \TimberSite {

     /**
     *__construct
     *
     * @param string|int $site_name_or_id
     */
	function __construct() {
        
        // Adding theme support to WP
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
        
        // Hooking up Filters
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        add_filter( 'login_headerurl', array( $this, 'change_wp_login_url') );
        add_filter( 'login_headertitle', array( $this, 'change_wp_login_title' ) );
        add_filter( 'pre_get_posts', array( $this, 'custom_search_filter' ) );
        add_filter( 'init', array( $this, 'change_default_post_type' ) );
        
        // Hooking up Actions
        add_action( 'login_head',  array( $this, 'login_css' ) );
        add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
        add_action( 'init', array( $this, 'deliver_mail' ) );
        
        
        // Calling Timber Construct Function
		parent::__construct();
        
	}
    
    // CUSTOM ADMIN LOGIN HEADER LOGO
 
    function login_css() {
        wp_enqueue_style( 'login_css', get_template_directory_uri() . '/assets/css/login.css' );
    }

    // CUSTOM ADMIN LOGIN LOGO LINK
    function change_wp_login_url() {
        return get_site_url();  // OR ECHO YOUR OWN URL
    }

    // CUSTOM ADMIN LOGIN LOGO & ALT TEXT

    function change_wp_login_title() {
        return get_option('blogname'); // OR ECHO YOUR OWN ALT TEXT
    }

    function change_default_post_type () {
        $customPostType = new CustomPostTypes;
        return $customPostType->mainPostType();
    }
        
        
    // CUSTOM POST TYPES
	function register_post_types() {
        
		$customPostTypes = new CustomPostTypes;
        return $customPostTypes->register();
        
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
        register_taxonomy('category', array(), array('show_in_nav_menus' => false) );
        register_taxonomy('post_tag', array(), array('show_in_nav_menus' => false) );
        register_taxonomy(
		'types',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'produtos',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> __('Tipos', 'twheme'),  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
					'slug' 			=> 'type', // This controls the base slug that will display before each term
					'with_front' 	=> false // Don't display the category base before
					)
			)
		);
        //register_taxonomy_for_object_type( 'category', 'produtos' );
	}
    
    function custom_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'maquina' ); // Here I defined which post types to search for the query, array('for','more','types')
        };
    return $query;
    }
    
    function deliver_mail() { 

        $mailer = new Mailer();
        return $mailer->send();
    }

    /**
     * add_to_context
     *
     * @param $context
     * @return mixed
     */
	function add_to_context() {
        
        // Getting the context from the Context class, and them returning it
        $context = new Context();
        return $context->build($this);
        
    }
    
    /**
     * add_to_twig
     *
     * Add Custom Functions to Twig
     */
	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new \Twig_Extension_StringLoader() );
		return $twig;
	}

}
