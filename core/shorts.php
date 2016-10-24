<?php 

// [gmaps] shortcode: [gmaps] address width height

function gmaps_shorttag($atts) {
    
    // if you need to sanitize anything, here's the place
    if(isset($atts['address'])) {
        $address = sanitize_text_field($atts['address']);
    } else {
        $address = false;
    }
    
    // here I'm defining the args
    $args = array(
    
        'address' => $address,
        'width' => $atts['width'],
        'height' => $atts['height']
        
    );
    
    
    // this time we use Timber::compile since shorttags should return the code
    return Timber::compile('gmaps.twig', $args);
}

add_shortcode('gmaps', 'gmaps_shorttag');

// [card] shortcode: [card] args: title, content, table, footer

function card_shorttag($atts, $content) {
    
    $args = array(
    
        'title' => $atts['title'],
        'content' => preg_replace('%<td(.*?)></td>%', '<td$1><br/></td>', strip_tags(html_entity_decode(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content)), '<td><tr><b><i><strong><h1><h2><h3><h4><h5><h6><span><small>')),
        'table' => $atts['table'],
        'footer' => $atts['footer'],
        'single' => $atts['single']
        
    );
    
    return Timber::compile('cards.twig', $args);
    
}

add_shortcode('card', 'card_shorttag');

// [youtube] shortcode: [youtube] args: id, format (wide or standart), autoplay, nofullscreen

function youtube_shorttag($atts, $content) {
    
    $args = array(
        
        'id' => $atts['id'],
        'format' => $atts['format'],
        'autoplay' => $atts['autoplay']
        
    );
    
    return Timber::compile('cards.twig', $args);
    
}

add_shortcode('youtube', 'youtube_shorttag');