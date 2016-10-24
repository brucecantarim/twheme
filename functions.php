<?php

/***********************************
 *   Increasing Max Upload Size    *
 ***********************************/

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


/***********************************
 * Checking if Timber is installed *
 ***********************************/

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>';
            $admin_plugin_page = '<a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
            printf (
                __("Timber not activated. Make sure you activate the plugin in %s.", "twheme"), 
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

require_once('core/init.php');