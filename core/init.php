<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// namespace Twheme; // To be implemented in future versions

// Loading configuration
require_once('shorts.php');

//require_once 'routes.php'; - Currently not working, deprecated in lastest Timber version

class Twheme extends TimberSite {

	function __construct() {
        
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        add_filter( 'init', array( $this, 'change_default_post_type' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
        add_action('login_head',  array( $this, 'login_css' ) );
        add_filter('login_headerurl', array( $this, 'change_wp_login_url') );
        add_filter('login_headertitle', array( $this, 'change_wp_login_title' ) );
        add_filter('pre_get_posts', array( $this, 'custom_search_filter' ) );
        add_action( 'init', array( $this, 'deliver_mail' ) );
		parent::__construct();
        
	}
    
    // CUSTOM DEFAULT POST
    function change_default_post_type() {
        
        // Instantiating the config class
        $config = new TwhemeConfig();
        // $twheme_default_post = $config->defaultPost();
        
        //if ($twheme_default_post) {
        //this is where you can customize the default post type
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Home';
        $labels->singular_name = 'Home';
        $labels->add_new = 'Nova Seção';
        $labels->add_new_item = 'Nova Seção';
        $labels->edit_item = 'Editar a Seção';
        $labels->new_item = 'Seções';
        $labels->view_item = 'Ver Seção';
        $labels->search_items = 'Procurar Seção';
        $labels->not_found = 'Nenhuma Seção encontrada';
        $labels->not_found_in_trash = 'Nenhuma Seção encontrada no lixo';
        $labels->all_items = 'Todas as Seções';
        $labels->menu_name = 'Home';
        $labels->name_admin_bar = 'Home';
        $post = &$wp_post_types['post'];
        $post->menu_icon = 'dashicons-admin-home';
        //}
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

    // CUSTOM POST TYPES
	function register_post_types() {
		include 'custom-post-types.php';
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
            $query->set('post_type', array('produtos', 'servicos') ); // Here I defined which post types to search for the query
        };
    return $query;
    }

	function add_to_context( $context ) {
        
        require_once(__DIR__ . "/context.php");
        
    }

   function deliver_mail() { 

        require_once(__DIR__ . "/deliver-mail.php");
    }
    
    
	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		return $twig;
	}

}

new Twheme();
