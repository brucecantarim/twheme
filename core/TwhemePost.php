<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class TwhemePost extends \TimberPost {

    var $_category;

    public function category() {
        $category = $this->get_terms();
        if (is_array($category) && count($category)) {
            return $category[0];
    }
}