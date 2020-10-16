<?php
//Global functions
include('includes.php');
include('functions/resourcespace/endpoints.php');
include('functions/resourcespace/test.php');

//base
include('functions/base/menus.php');
include('functions/base/widgets.php');
include('functions/classes/footer-widget.php');
include('functions/classes/follow-widget.php');

//resourcespace
include('functions/resourcespace/ResourceSpaceController.php');
include('functions/resourcespace/resourcespace-api.php');

// LMTA request
include('functions/resourcespace/LmtaRequest.php');

//lang
include('lang/lt.php');


require_once('includes.php');
require_once('navwalker/class-wp-bootstrap-navwalker.php');

function lmta_theme_support()
{
    add_theme_support('post-thumbnails');
    add_image_size('news-thumb', 400, 200);
    add_image_size('news-large', 790, 380);
    add_image_size('news-popular', 300, 150);
    add_action('wp_enqueue_scripts', 'custom_js');
}

add_action('after_setup_theme', 'lmta_theme_support');

function arphabet_widgets_init()
{

    register_sidebar(array(
        'name' => 'Home right sidebar',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));
}

//Excerpt text to be max 30 characters
function custom_excerpt_length()
{
    return 40;
}

add_filter('excerpt_length', 'custom_excerpt_length');

const FIND_MORE = 'Skaityti daugiau';
pll_register_string(strtolower(FIND_MORE), FIND_MORE);

//height:150px;
//display: flex;
//align-items: flex-end
//function custom_excerpt_more()
//{
//    $current_lang = pll_current_language();
//    $trans = pll_translate_string(FIND_MORE, $current_lang);
//    return '<div><br><a href="' . get_the_permalink() . '" class="btn btn-light mt-3 custom-more hover-blue__white"> ' . strtoupper($trans) . ' </a></div>';
//}

//On empty showing ... after excerpt
function custom_excerpt_more()
{
    return ;
}
add_filter('excerpt_more', 'custom_excerpt_more');

//add_action('save_post', 'create_resource');

 function create_resource($post_id)
 {
     global $wpdb;
     $post_type = get_post_type($post_id);
     $title = '';
     $newResource = new ResourceSpaceController();
     $newResource->createResource();

 }

// Register Custom Navigation Walker
require_once('parts/wp_bootstrap_pagination.php');

//add_action( 'widgets_init', 'arphabet_widgets_init' );

//function add_additional_class_on_li($classes, $item, $args) {
//    if(isset($args->add_li_class)) {
//        $classes[] = $args->add_li_class;
//    }
//    return $classes;
//}
//add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


