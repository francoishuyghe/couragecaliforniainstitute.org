<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageBlog extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-blog',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'blog_posts' => $this->blog_posts(),
        ];
    }

    public function blog_posts() {
        $args = array(
			'post_type' => 'post',
            'post__in' => get_option( 'sticky_posts' ),
	    	'posts_per_page' => 3,
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }
}
