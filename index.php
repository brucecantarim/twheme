<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	$admin_plugin_page = '<a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
    printf(
        __('Timber not activated. Make sure you activate the plugin in', 'twheme'),
        $admin_plugin_page
        );
	return;
}

$context = Timber::get_context();

$templates = array( 'index.twig' );
if ( is_home() ) {
    $context['active'] = true;
	array_unshift( $templates, 'home.twig' );
}

Timber::render( $templates, $context );