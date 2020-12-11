<?php
//Global functions
include('includes.php');

//base
include('functions/base/menus.php');
include('functions/base/widgets.php');
include('functions/classes/footer-widget.php');
include('functions/classes/follow-widget.php');

//resourcespace
include('functions/resourcespace/ResourceSpaceController.php');
include('functions/resourcespace/resourcespace-api.php');

// TODO this probably can have a better place. Becuase here is called many times, isn't it?
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
add_filter('jpeg_quality', function($arg){return 100;});

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

//Excerpt text to be max x words
function custom_excerpt_length()
{
    return 30;
}

add_filter('excerpt_length', 'custom_excerpt_length');

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

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

/**
 * Filter projects for ajax
 */
function filter_projects() {

    // $today = date("Y-m-d H:i");
    $today = date("Y-m-d H:i", strtotime('-3 hours'));
//    $paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
    $paged    = $_POST['page']     ? $_POST['page']     : 1;
    $compare  = $_POST['events']   ? $_POST['events']   : '>=';
    $relation = $_POST['relation'] ? $_POST['relation'] : 'OR';
	$order    = $_POST['order']    ? $_POST['order']    : "DESC";
    $mediateka= $_POST['mediateka']? $_POST['mediateka']: "add_to_mediateka";

    $_SESSION['template'] = $_POST['template'];
    #Choosing the template
    if($_POST['template'] == 'one-column'){
        $template = 'parts/one-column';
        $postPerPage = 6;
    }else{
        $template = 'parts/three-columns';
        $postPerPage = 9;
    }

    $args = [
        'orderby'        => 'streamDate',
        'order'          => $order,
        'meta_key'       => 'streamDate',
        'post_status'    => 'publish',
        'posts_per_page' => $postPerPage,
        'paged'          => $paged,
        'page'           => $paged,
        'meta_query'     => array(
            'relation' => $relation,
            array(
                'key'        => 'streamDate',
                'meta-value' => 'streamDate',
                'value'      => $today,
                'compare'    => $compare,
                'type'       => 'DATETIME',
            ),
            array(
                'key'   => $mediateka,
				'value' => true,
				'type'  => 'BOOLEAN',
            ),
        ),
    ];

    $slug = $_POST['slug'];
    echo get_template_part($template, null, array("args"=> $args, 'slug'=> $slug));
    exit();
}
add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');


function improved_trim_excerpt($text) { // Fakes an excerpt if needed
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace('\]\]\>', ']]&gt;', $text);
    $text = strip_tags($text, '<p>');
    $excerpt_length = 30;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
      array_pop($words);
      array_push($words, '[...]');
      $text = implode(' ', $words);
    }
  }
return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');


function register_fields()
{
    register_setting('general', 'youtube_link_field', 'esc_attr');
    add_settings_field('youtube_link_field', '<label for="youtube_link_field">'.__('Default Youtube Link' , 'youtube_link_field' ).'</label>' , 'print_custom_field', 'general');
}

function print_custom_field()
{
    $value = get_option( 'youtube_link_field', '' );
    echo '<input type="text" id="youtube_link_field" name="youtube_link_field" value="' . $value . '" />';
}

add_filter('admin_init', 'register_fields');
