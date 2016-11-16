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
        add_filter( 'admin_footer_text', array( $this, 'custom_footer_admin') );
        add_filter( 'init', array( $this, 'change_default_post_type' ) );
        
        // Hooking up Actions
        add_action( 'login_head',  array( $this, 'login_css' ) );
        add_action( 'admin_init', array( $this, 'remove_dashboard_meta') );
        add_action( 'admin_init', array( $this, 'remove_dashboard_menus') );
        add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
        add_action( 'init', array( $this, 'deliver_mail' ) );
        add_action( 'init', array( $this, 'add_shortcodes' ) );
        
        
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
    
    // Hiding dashboard widgets from Clients
    function remove_dashboard_meta() {
        
        $dashboard = new Dashboard();
        return $dashboard->removeWidgets();
        
    }
    
    // Hiding admin menus from Clients
    function remove_dashboard_menus() {
        
        $dashboard = new Dashboard();
        return $dashboard->removeMenus();
        
    }
    
    // Changing the default WP footer in the admin page
    function custom_footer_admin() {
        
        $dashboard = new Dashboard();
        return $dashboard->customFooter();
        
    }
    
    // Change the default post type
    function change_default_post_type () {
        
        $customPostType = new CustomPostTypes;
        return $customPostType->mainPostType();
        
    }
        
    /**
     * register_post_types
     *
     * This functions calls the register method from the
     * CustomPostTypes, which you can configure in the
     * Config Class file (always check there FIRST, before
     * you start messing with the functions of the rest of
     * the twheme core).
     */
	function register_post_types() {
        
		$customPostTypes = new CustomPostTypes;
        return $customPostTypes->register();
        
	}
    
    /**
     * register_taxonomies
     *
     * This is where we can set custom categories and such.
     * I still haven't messed with it, but I'll make a better integration of
     * it in a near future, when the need arrives.
     */
	function register_taxonomies() {
		//this is where you can register custom taxonomies
        $taxonomies = new CustomTaxonomies();
        return $taxonomies->register();
	}
    
    /**
     * custom_search_filter
     *
     * This controls where we will be searching for the terms the user inputs
     * I still need to improve this, for more flexibility, and integrate with
     * the Config Class.
     */
    function custom_search_filter($query) {
        
        if ($query->is_search) {
            $query->set('post_type', 'maquina', 'noticia', 'evento' ); // Here I defined which post types to search for the query, array('for','more','types')
        };
    return $query;
        
    }
    
    /**
     * deliver_mail
     *
     * used for form send
     */
    function deliver_mail() { 

        $mailer = new Mailer();
        return $mailer->send();
        
    }
    
    /**
     * add_shortcodes
     *
     * This can be used in the editor or in twig.
     * Check the Shorts Class for reference.
     */
    function add_shortcodes() {
        
        $shorts = new Shorts();
        return $shorts->register();
        
    }

    /**
     * add_to_context
     *
     * This is where I register variables to be available
     * 'globally' for the twig files, and call default twigs
     * such as the header, navbar and footer.
     *
     * Refer to the context class for more information.
     */
	function add_to_context() {
        
        // Getting the context from the Context class, and them returning it
        $context = new Context();
        return $context->build($this);
        
    }
    
    /**
     * add_to_twig
     *
     * Add Custom Functions to Twig.
     */
	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new \Twig_Extension_StringLoader() );
		return $twig;
	}

}
