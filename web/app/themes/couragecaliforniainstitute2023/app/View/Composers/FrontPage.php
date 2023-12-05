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
        'front-page',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'data' => $this->data(),
        ];
    }

    public function data() {
        $data['intro'] = get_field('intro');
        $data['blog'] = get_field('blog');
        $data['newsletter'] = get_field('newsletter');
        $data['key_dates'] = get_field('key_dates');
        $data['faq'] = get_field('faq');
        $data['about'] = get_field('about');
        
	    return $data;
	}
}
