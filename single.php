<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$gallery = $post->gallery;
$context['gallery'] =  isset($gallery) ? explode(',', $gallery) : null;

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}