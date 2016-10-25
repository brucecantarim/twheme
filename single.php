<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$produtos = array(
    'post_type' => 'produtos',
    'post_status' => 'publish',
    'orderby'=> 'menu_order',
    'order' => 'asc'
);
$servicos = array(
    'post_type' => 'servicos',
    'post_status' => 'publish',
    'orderby'=> 'menu_order',
    'order' => 'asc'
);

$context['products'] = Timber::get_posts($produtos);
$context['services'] = Timber::get_posts($servicos);

$gallery = $post->gallery;
$context['gallery'] =  isset($gallery) ? explode(',', $gallery) : null;

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}