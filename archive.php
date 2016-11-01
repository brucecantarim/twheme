<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$templates = array('archive.twig', 'single.twig');

$data = Timber::get_context();
$datatype = null;

$data['title'] = printf(__('%s', 'twheme'), $datatype); //

if (is_day()){
    $datatype = __('Arquivo :', 'twheme');
    $data['title'] = $data['title'].get_the_date( 'D M Y' );
    
} else if (is_month()){
    $datatype = __('Arquivo :', 'twheme');
    $data['title'] = $data['title'].get_the_date( 'M Y' );

} else if (is_year()){
    $datatype = __('Arquivo :', 'twheme');
    $data['title'] = $data['title'].get_the_date( 'Y' );

} else if (is_tag()){
    $datatype = __('Tag :', 'twheme');
    $data['title'] = $data['title'].single_tag_title('', false);

} else if (is_category()){
    $datatype = __('Categoria :', 'twheme');
    $data['title'] = $data['title'].single_cat_title('', false);
    array_unshift($templates, 'archive-'.get_query_var('cat').'.twig');

} else if (is_tax()){
    // TODO: Not great to have these hardcoded
    $term = get_queried_object();
    if(get_taxonomy('source_type')) {
        $datatype = __('Recurso :', 'twheme');
        $data['title'] = $data['title'].$term->name;
    }
    // array_unshift($templates, 'taxonomy.twig', 'taxonomy-'.get_query_var('cat').'.twig');
    } else if (is_post_type_archive()){
        $data['title'] = post_type_archive_title('', false);
        array_unshift($templates, 'archive-'.get_post_type().'.twig');
    }

$data['posts'] = Timber::get_posts();

Timber::render($templates, $data);