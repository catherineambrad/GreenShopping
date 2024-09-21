<?php

add_filter('block_categories', 'add_gutenberg_block_categories', 10, 2);
function add_gutenberg_block_categories($categories)
{
    return array_merge([
        [
            'slug' => 'container-blocks',
            'title' => 'Контейнеры',
            'icon' => 'editor-kitchensink',
        ]
    ],
        $categories
    );
}

add_action('acf/init', function () {

    acf_register_block_type([
        'name' => 'Slider-hero',
        'title' => 'Slider-hero',
        'description' => 'Slider-hero',
        'render_template' => get_template_directory() . '/acf-setup/acf-blocks/slider-hero.php',
        'category' => 'container-blocks',
        'icon' => 'welcome-view-site',
        'mode' => 'preview'
    ]);
    acf_register_block_type([
        'name' => 'Posts',
        'title' => 'Posts',
        'description' => 'Posts',
        'render_template' => get_template_directory() . '/acf-setup/acf-blocks/posts.php',
        'category' => 'container-blocks',
        'icon' => 'welcome-view-site',
        'mode' => 'preview'
    ]);

    acf_register_block_type([
        'name' => 'Additional information',
        'title' => 'Additional information',
        'description' => 'Additional information',
        'render_template' => get_template_directory() . '/acf-setup/acf-blocks/additional-information.php',
        'category' => 'container-blocks',
        'icon' => 'welcome-view-site',
        'mode' => 'preview'
    ]);
});
