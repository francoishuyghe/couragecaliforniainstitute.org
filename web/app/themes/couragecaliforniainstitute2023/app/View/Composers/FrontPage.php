<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class FrontPage extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'latest_posts' => $this->latest_posts(),
            'post_categories' => $this->post_categories(),
            'data' => $this->data(),
        ];
    }

    public function latest_posts() {
        $args = array(
			'post_type' => 'post',
	    	'post_status'            => array('publish'), 
            'posts_per_page'         => '3', 
            'order'                  => 'DESC',
            'orderby'                => 'date',
            'ignore_sticky_posts' => 1
	    );
	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }

    public function post_categories(){
        return get_categories();
    }

    public function data() {
        $data['intro'] = get_field('intro');
        $data['register'] = get_field('register');
        $data['blog'] = get_field('blog');
        $data['track'] = get_field('track');
        $data['counties'] = get_field('counties');
        $data['newsletter'] = get_field('newsletter');
        $data['key_dates'] = get_field('key_dates');
        $data['faq'] = get_field('faq');
        $data['about'] = get_field('about');
        
	    return $data;
	}
}