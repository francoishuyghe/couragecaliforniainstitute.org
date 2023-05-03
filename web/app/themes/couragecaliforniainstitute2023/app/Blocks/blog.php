<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use WP_Query;

class blog extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Blog';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Blog block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'title' => 'Know Your Power',
        'description' => 'Want to make change in your community? Check out our blog!',
        'button' => 'Read More',
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title' => get_field('title') ?: $this->example['title'],
            'description' => get_field('description') ?: $this->example['description'],
            'button' => get_field('button') ?: $this->example['button'],
            'latest_posts' => $this->get_latest_posts()
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $blog = new FieldsBuilder('blog');

        $blog
            ->addText('title')
            ->addText('description')
            ->addText('button');

        return $blog->build();
    }

    /**
     *
     * @return array
     */
    public function get_latest_posts()
    {
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

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
