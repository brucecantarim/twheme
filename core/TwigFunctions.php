<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class TwigFunctions {
    
    public function register( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new \Twig_Extension_StringLoader());
        //$twig->addFilter(new \Twig_SimpleFilter( 'category', array( $this, 'category' ) );
		return $twig;
	}
    
    /*public function category( $array ) {
        return $array[0]['name'];
    }*/

}