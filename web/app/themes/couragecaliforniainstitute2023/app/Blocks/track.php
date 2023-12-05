<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class track extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Ballot Tracker';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'The frontpage Ballot Tracker block.';

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
        'title' => "Know when your ballot is in the mail, when it's received and when it's counted.",
        'button' => 'Track Your Ballot',
        'button_link' => 'https://california.ballottrax.net/voter',
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
            'button' => get_field('button') ?: $this->example['button'],
            'button_link' => get_field('button_link') ?: $this->example['button_link'],
            'image' => get_field('image'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $track = new FieldsBuilder('track');

        $track
            ->addText('title')
            ->addText('button')
            ->addUrl('button_link')
            ->addImage('image');

        return $track->build();
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
