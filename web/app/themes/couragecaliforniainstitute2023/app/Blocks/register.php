<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class register extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Register';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Register block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'features';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'heart';

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
        'title' => "Make sure your voice is heard each and every election year.",
        'button' => 'Register Now',
        'text' => "Register to vote. Think you’re registered? Don’t think, know. Confirm it!",
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
            'text' => get_field('text') ?: $this->example['text'],
            'button' => get_field('button') ?: $this->example['button'],
            'image' => get_field('image')
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $register = new FieldsBuilder('register');

        $register
            ->addText('title')
            ->addText('text')
            ->addText('button')
            ->addImage('image');

        return $register->build();
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
