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
//include('functions/resourcespace/LmtaRequest.php');

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

//Excerpt text to be max x characters
function custom_excerpt_length()
{
    return 30;
}

add_filter('excerpt_length', 'custom_excerpt_length');

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

/**
 * If last post in query, return TRUE.
 */
function is_last_post($wp_query) {
    $post_current = $wp_query->current_post + 1;
    $post_count = $wp_query->post_count;
    if ( $post_current == $post_count ) {
        return true;
    } else {
        return false;
    }
}

/**
 * If more than one page exists, return TRUE.
 */
function is_paginated() {
    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) {
        return true;
    } else {
        return false;
    }
}

function filter_projects() {
    $today = date("Y-m-d H:i");

    $ajaxposts = new WP_QUERY([
        'orderby' => 'streamDate',
        'order' => 'DESC',
        'meta_key' => 'streamDate',
        'posts_per_page' => 9,
        'meta_query' => [
            'key' => 'streamDate',
            'meta-value' => 'streamDate',
            'value' => $today,
            'compare' => $_POST['events'],//>= <=
//            'type' => 'CHAR',
        ]
    ]);

    #Choosing the template
    if($_POST['template'] == 'one-column'){
        $template = 'parts/one-column';
    }else{
        $template = 'parts/three-columns';
    }

    $response = '';
    $count = $ajaxposts->found_posts;

    if ($ajaxposts->have_posts()) {
        $x = 0;
        if ($template == 'parts/one-column') {
            while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
                $x++;
                if ($x == $count) {
                    $response .= get_template_part($template, 'border', ['border-adjust' => 'border-remove']);
                    break;
                }
                if ($x === 1){
                    $response .= get_template_part($template, 'padding', ['padding-adjust' => 'true']);
                }else {
                    $response .= get_template_part($template);
                }
            endwhile;
        } else {
            while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
                $x++;
                if ($x + 2 >= $count) {
                    $response .= get_template_part($template, 'border', ['border-adjust' => 'border-remove']);
                }else {
                    $response .= get_template_part($template);
                }
            endwhile;
        }
    } else {
        $response = 'empty';
    }
    $count = $ajaxposts->found_posts;
    $_SESSION['counter'] = $count;
    echo $response;
    exit;
}
add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');


