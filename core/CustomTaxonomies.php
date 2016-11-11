<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CustomTaxonomies {
    
    public function hideDefaultTaxonomy() {
        
        $disableDefaultTaxonomy = Config::$disableDefaultTaxonomy;
        
        if($disableDefaultTaxonomy) {
        
            register_taxonomy('category', array(), array('show_in_nav_menus' => false) );
            register_taxonomy('post_tag', array(), array('show_in_nav_menus' => false) );
            
        }
        
    }

    public function register() {
        
        // Grabbing our variables from the Config class
        $customTaxonomy = Config::$customTaxonomy;
        $customTaxonomies = Config::$customTaxonomies;
        
        // Checking if this setting is on
        if ($customTaxonomy) {
            
            // Ok, let's loop through the taxonomies that we had in store
            foreach ($customTaxonomies as $taxonomy) {
                
                if ($taxonomy['wordsex'] == 'female') {
            
                    $labels = [
                        'name'              => _x($taxonomy['plural'], 'taxonomy general name'),
                        'singular_name'     => _x($taxonomy['singular'], 'taxonomy singular name'),
                        'search_items'      => __('Procurar ' . $taxonomy['plural']),
                        'all_items'         => __('Todas as' . $taxonomy['plural']),
                        'parent_item'       => __($taxonomy['singular'] . ' principal'),
                        'parent_item_colon' => __($taxonomy['singular'] . ' principal:'),
                        'edit_item'         => __('Editar ' . $taxonomy['singular']),
                        'update_item'       => __('Atualizar ' . $taxonomy['singular']),
                        'add_new_item'      => __('Adicionar nova ' . $taxonomy['singular']),
                        'new_item_name'     => __('Novo nome de ' . $taxonomy['singular']),
                        'menu_name'         => __($taxonomy['singular']),
                    ];
                    $args = [
                        'hierarchical'      => true, // make it hierarchical (like categories)
                        'labels'            => $labels,
                        'show_ui'           => true,
                        'show_admin_column' => true,
                        'query_var'         => true,
                        'rewrite'           => ['slug' => $taxonomy['slug']],
                    ];
                    
                } elseif ($taxonomy['wordsex'] == 'male') {
                    
                    $labels = [
                        'name'              => _x($taxonomy['plural'], 'taxonomy general name'),
                        'singular_name'     => _x($taxonomy['singular'], 'taxonomy singular name'),
                        'search_items'      => __('Procurar ' . $taxonomy['plural']),
                        'all_items'         => __('Todos os' . $taxonomy['plural']),
                        'parent_item'       => __($taxonomy['singular'] . ' principal'),
                        'parent_item_colon' => __($taxonomy['singular'] . ' principal:'),
                        'edit_item'         => __('Editar ' . $taxonomy['singular']),
                        'update_item'       => __('Atualizar ' . $taxonomy['singular']),
                        'add_new_item'      => __('Adicionar novo ' . $taxonomy['singular']),
                        'new_item_name'     => __('Novo nome de ' . $taxonomy['singular']),
                        'menu_name'         => __($taxonomy['singular']),
                    ];
                    $args = [
                        'hierarchical'      => true, // make it hierarchical (like categories)
                        'labels'            => $labels,
                        'show_ui'           => true,
                        'show_admin_column' => true,
                        'query_var'         => true,
                        'rewrite'           => ['slug' => $taxonomy['slug']],
                    ];
                }
                
                register_taxonomy($taxonomy['slug'], $taxonomy['post'], $args);
            }

        }
        
    }

}