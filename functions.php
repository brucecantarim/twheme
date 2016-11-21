<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!defined('THEMENAME')) {
    define('THEMENAME', 'twheme');
}

/***********************************
 *   Increasing Max Upload Size    *
 ***********************************/

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/***********************************
 *    Removing the WP ADMIN BAR    *
 ***********************************/

add_filter('show_admin_bar', '__return_false'); // I HATE THIS FREAKING BAR

/***********************************
 *    Removing the WP META TAG     *
 ***********************************/

remove_action('wp_head', 'wp_generator');


/***********************************
 * Checking if Timber is installed *
 ***********************************/

if ( ! class_exists( '\TimberTheme' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>';
            $admin_plugin_page = '<a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
            printf (
                __("Timber not activated. Twheme requires it to be installed and activated. Make sure you do this in %s.", "twheme"), 
                    $admin_plugin_page
                );
		} );
	return;
};

/*********************************
 * Initializing the theme engine *
 *********************************/

Timber::$dirname = array(
    'views', 
    'views/layouts',
    'views/modules',
    'views/parts'
);

// Loading ACF custom fields backup
include_once 'includes/customfields.php';

// Loading Vafpress, for the dashboard controls
// require_once 'includes/vafpress/bootstrap.php';

// Let's take a look at our configuration variables first
require_once 'core/autoload.php';