<?php

/* Dependences
------------------------------------- */
// Include custom navwalker
require_once('assets/bs4navwalker.php');

/* setup theme
------------------------------------- */
if (!function_exists('nx_setup_theme')) {
    function nx_setup_theme()
    {
        //add support title tag
        add_theme_support("title-tag");
        // enable featured image
        add_theme_support("post-thumbnails");
        // create custom image size
        add_image_size('nx_big', 1400, 800, true); // last attrib.: crop  
        add_image_size('nx_quad', 600, 600, true);
        add_image_size('nx_single', 800, 600, true);

        // create header menu
        register_nav_menus(array(
            'header' => esc_html__('Header', 'nx'),

        ));
    }
}


add_action('after_setup_theme', 'nx_setup_theme');


/* Register sidebars
------------------------------------- */
if (!function_exists('nx_sidebars')) {
    function nx_sidebars()
    {
        // Disables the block editor from managing widgets in the Gutenberg plugin.
        add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);

        // Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
        add_filter('use_widgets_block_editor', '__return_false');
        register_sidebar(array(
            'name' => esc_html__('Primary', 'nx'),
            'id' => 'primary',
            'description' => esc_html__('Main Sidebar', 'nx'),
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            'before_widget' => '<div class="widget my-5 %2$s clearfix">',
            'after_widget' => '</div>',

        ));
    }
}

add_action('widgets_init', 'nx_sidebars');


/* Include Javascript file
------------------------------------- */
if (!function_exists('nx_scripts')) {
    function nx_scripts()
    {
        wp_enqueue_script('nx-bootstrap-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), null, true);
        wp_enqueue_script('nx-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);

    }
    ;
}
;

add_action('wp_enqueue_scripts', 'nx_scripts');

/* Include CSS file
------------------------------------- */
if (!function_exists('nx_styles')) {
    function nx_styles()
    {
        wp_enqueue_style('nx-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('nx-style-default-css', get_template_directory_uri() . '/style.css');

    }
    ;
}
;
add_action('wp_enqueue_scripts', 'nx_styles');

/* Filter comment form default
------------------------------------- */
function wpdocs_comment_form_defaults($defaults)
{
    $defaults['class_submit'] = __('btn bg-primary btn-lg text-light');
    return $defaults;
}
add_filter('comment_form_defaults', 'wpdocs_comment_form_defaults');

?>