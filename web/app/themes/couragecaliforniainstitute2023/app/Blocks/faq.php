<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class faq extends Block
{
    /**
     * The block name.
     * 
     * @var string
     */
    public $name = 'Faq';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Faq block.';

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
        'title' => 'Frequently Asked Questions',
        'questions' => [
            [
                'question' => 'Question?',
                'answer' => 'Answer',
            ],
            [
                'question' => 'Question?',
                'answer' => 'Answer',
            ],
            [
                'question' => 'Question?',
                'answer' => 'Answer',
            ],
        ],
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
            'questions' => get_field('questions') ?: $this->example['questions'],
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $faq = new FieldsBuilder('faq');

        $faq
            ->addText('title')
            ->addRepeater('questions')
                ->addText('question')
                ->addWysiwyg('answer')
            ->endRepeater();

        return $faq->build();
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
