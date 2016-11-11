<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Dashboard {
    
    public function removeWidgets() {
        
        $isAdmin = current_user_can( 'manage_options');
        
        if ( !$isAdmin ) {
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
            
        }
        
    }
    
    public function removeMenus() {
        
        $isAdmin = current_user_can( 'manage_options');
        
        if ( !$isAdmin ) {
            remove_menu_page( 'themes.php' );          // Appearance
            remove_menu_page( 'plugins.php' );         // Plugins
            remove_menu_page( 'users.php' );           // Users
            remove_menu_page( 'tools.php' );           // Tools
            remove_menu_page( 'options-general.php' ); // Settings
        }
        
    }
    
    public function removeSubMenus() {
        
        // WIP - To be implemented
	    $page = remove_submenu_page( $parent, $children );
    }
    
    // Custom Admin footer
    function customFooter () {
        
        $footerMessage = Config::$footerMessage;
        $footerLink = Config::$footerLink;
        $footerName = Config::$footerName;
        
        echo '<span id="footer-thankyou">' . $footerMessage . '<a href="' . $footerLink . '" target="_blank">' . $footerName . '</a></span>';
    }
    
}