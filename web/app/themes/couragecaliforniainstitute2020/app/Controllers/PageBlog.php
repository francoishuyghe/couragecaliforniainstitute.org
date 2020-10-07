<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class PageBlog extends Controller
{
    public function blog_posts() {
        $args = array(
			'post_type' => 'post',
	    	'posts_per_page' => 16,
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
}
