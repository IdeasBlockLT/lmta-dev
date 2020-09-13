<?php

function initWidgets($id)
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="side-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'contact',
        'id' => 'contact',
        'before_widget' => '<div id="contact-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'follow',
        'id' => 'follow',
        'before_widget' => '<div class="side-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => 'footer',
        'id' => 'footer',
//        'before_widget' => '<div class="side-widget">',
//        'after_widget' => '</div>',
//        'before_title' => '<h3>',
//        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'initWidgets');

class hstngr_widget extends WP_Widget {
//Insert functions here
}