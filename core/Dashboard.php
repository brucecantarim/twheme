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
    
}