<?php

class follow_widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'LMTA-follow',  // Base ID
            'LMTA-follow'   // Name
        );

        add_action('widgets_init', function () {
            register_widget('follow_widget');
        });

    }

    public $args = array(
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => '</div></div>'
    );

    public function widget($args, $instance)
    {

        echo $args['before_widget'];

//        if ( ! empty( $instance['title'] ) ) {
//            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
//        }

        echo '<div class="textwidget">';
        ?>
        <h3><?= $instance['title'] ?></h3>
        <div>
            <a class="custom-a pr-2 hover-blue" href="<?= $instance['facebook'] ?>">Facebook</a>
            <span> | </span>
            <a class="custom-a ml-2 pl-2 pr-2 hover-blue" href="<?= $instance['linkedin'] ?>">Linkedin</a>
            <span> | </span>
            <a class="custom-a ml-2 pl-2 pr-2 hover-blue" href="<?= $instance['youtube'] ?>">Youtube  </a>
        </div>

        <?php

//        echo esc_html__($instance['text'], 'text_domain');
        echo '</div>';
        echo $args['after_widget'];

    }


    // Widget Backend
    public function form($instance)
    {
        if (!isset($instance['title'])) {
            $instance['title'] = 'title';
        }

        if (!isset($instance['facebook'])) {
            $instance['facebook'] = 'facebook';
        }

        if (!isset($instance['linkedin'])) {
            $instance['linkedin'] = 'linkedin';
        }

        if (!isset($instance['youtube'])) {
            $instance['youtube'] = 'youtube';
        }

        $title = 'Set up your follow links';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title']; ?>" placeholder="Follow"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>"
                   name="<?php echo $this->get_field_name('facebook'); ?>" type="text"
                   value="<?php echo $instance['facebook']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>"
                   name="<?php echo $this->get_field_name('linkedin'); ?>" type="text"
                   value="<?php echo $instance['linkedin']; ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['facebook'] = (!empty($new_instance['facebook'])) ? $new_instance['facebook'] : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin'])) ? $new_instance['linkedin'] : '';
        $instance['title'] = (!empty($new_instance['title'])) ? $new_instance['title'] : '';

        return $instance;
    }

}

function load_follow_widget()
{
    register_widget('follow_widget');
}

add_action('widgets_init', 'load_follow_widget');
?>