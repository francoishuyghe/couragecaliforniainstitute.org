<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{

    public function data() {
        $data['intro'] = get_field('intro');
        $data['register'] = get_field('register');
        $data['newsletter'] = get_field('newsletter');
        $data['key_dates'] = get_field('key_dates');
        $data['faq'] = get_field('faq');
        $data['about'] = get_field('about');
        
	    return $data;
	}

}
