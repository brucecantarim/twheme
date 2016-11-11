<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CustomPostTypes {
    
    public function mainPostType() {
        
        // CUSTOM DEFAULT POST
    
        // Checking if the boolean is set in config
        $defaultPostCheck = Config::$defaultPost;
        
        if ( !$defaultPostCheck ) {
            
            // This is where you can customize the default post type
            // I need to improve this later on

            global $wp_post_types;
            $labels = &$wp_post_types['post']->labels;
            $labels->name = _('Home');
            $labels->singular_name = __('Home');
            $labels->add_new = __('Nova Seção');
            $labels->add_new_item = __('Nova Seção');
            $labels->edit_item = __('Editar a Seção');
            $labels->new_item = __('Seções');
            $labels->view_item = __('Ver Seção');
            $labels->search_items = __('Procurar Seção');
            $labels->not_found = __('Nenhuma Seção encontrada');
            $labels->not_found_in_trash = __('Nenhuma Seção encontrada no lixo');
            $labels->all_items = __('Todas as Seções');
            $labels->menu_name = 'Home';
            $labels->name_admin_bar = __('Home');
            $post = &$wp_post_types['post'];
            $post->menu_icon = 'dashicons-admin-home';
            
        }
    }
    
    public function register() {
        
        // Checking if the boolean is set in config
        $slideshowCheck = Config::$slideshow;
        
        if ( $slideshowCheck ) {
            
            register_post_type( 'slides' , array(
                'labels'=> array(
                    'name' => _x('Slideshow', 'post type general name'),
                    'singular_name' => _x('Slide', 'post type singular name'),
                    'add_new' => _x('Novo Slide', 'Novo Slide'),
                    'all_items' => __('Todos os Slides'),
                    'add_new_item' => __('Novo Slide'),
                    'edit_item' => __('Editar Slide'),
                    'new_item' => __('Novo Slide'),
                    'view_item' => __('Ver Slide'),
                    'search_items' => __('Procurar Slide'),
                    'not_found' =>  __('Nenhum registro encontrado'),
                    'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
                    'parent_item_colon' => '',
                    'menu_name' => 'Slideshow'
                    ),
                'public' => true,
                'public_queryable' => true,
                'show_ui' => true,			
                'query_var' => true,
                'rewrite' => true,
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-slides',		
                'supports' => array(
                    'title', 'editor', 'thumbnail' // This is where you can add more fields
            )));
            
        }

        // Creating the user defined post types
        $twheme_post_types = Config::$postTypes;
        
        foreach (  $twheme_post_types as $twheme_post_type) {

            if ( $twheme_post_type['wordsex'] == 'female' ) {

                register_post_type( $twheme_post_type['type'] , array(
                    'labels'=> array(
                        'name' => _x($twheme_post_type['plural'], 'post type general name'),
                        'singular_name' => _x($twheme_post_type['singular'], 'post type singular name'),
                        'add_new' => _x('Nova ' . $twheme_post_type['singular'], 'Nova ' . $twheme_post_type['singular']),
                        'all_items' => 'Todas as ' . $twheme_post_type['plural'],
                        'add_new_item' => __('Nova ' . $twheme_post_type['singular']),
                        'edit_item' => __('Editar ' . $twheme_post_type['singular']),
                        'new_item' => __('Nova ' . $twheme_post_type['singular']),
                        'view_item' => __('Ver ' . $twheme_post_type['singular']),
                        'search_items' => __('Procurar ' . $twheme_post_type['singular']),
                        'not_found' =>  __('Nenhum registro encontrado'),
                        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
                        'parent_item_colon' => '',
                        'menu_name' => $twheme_post_type['plural']
                        ),
                    'public' => true,
                    'public_queryable' => true,
                    'show_ui' => true,			
                    'query_var' => true,
                    'rewrite' => true,
                    'capability_type' => 'post',
                    'has_archive' => true,
                    'hierarchical' => false,
                    'menu_position' => 5,
                    'menu_icon' => $twheme_post_type['icon'],		
                    'supports' => array(
                        'title', 'editor', 'thumbnail' // This is where you can add more fields
                )));

            } elseif ( $twheme_post_type['wordsex'] == 'male' ) {

                register_post_type( $twheme_post_type['type'] , array(
                    'labels'=> array(
                        'name' => _x($twheme_post_type['plural'], 'post type general name'),
                        'singular_name' => _x($twheme_post_type['singular'], 'post type singular name'),
                        'add_new' => _x('Novo ' . $twheme_post_type['singular'], 'Novo ' . $twheme_post_type['singular']),
                        'all_items' => 'Todos os ' . $twheme_post_type['plural'],
                        'add_new_item' => __('Novo ' . $twheme_post_type['singular']),
                        'edit_item' => __('Editar ' . $twheme_post_type['singular']),
                        'new_item' => __('Novo ' . $twheme_post_type['singular']),
                        'view_item' => __('Ver ' . $twheme_post_type['singular']),
                        'search_items' => __('Procurar ' . $twheme_post_type['singular']),
                        'not_found' =>  __('Nenhum registro encontrado'),
                        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
                        'parent_item_colon' => '',
                        'menu_name' => $twheme_post_type['plural']
                        ),
                    'public' => true,
                    'public_queryable' => true,
                    'show_ui' => true,			
                    'query_var' => true,
                    'rewrite' => true,
                    'capability_type' => 'post',
                    'has_archive' => true,
                    'hierarchical' => false,
                    'menu_position' => 5,
                    'menu_icon' => $twheme_post_type['icon'],		
                    'supports' => array(
                        'title', 'editor', 'thumbnail' // This is where you can add more fields
                )));

            }
        }
        
    flush_rewrite_rules();
        
    }
}
