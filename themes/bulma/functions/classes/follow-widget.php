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
        if (is_page_template('template-mediateka.php')){
            $fontColor = 'black hover-white';
        }else{
            $fontColor = 'hover-blue';
        }

        echo $args['before_widget'];

        echo '<div class="textwidget">';
        ?>


        <h3><?= $instance['title'] ?></h3>
        <div>
            <a class="custom-a pr-2 <?php echo $fontColor; ?>" href="<?= $instance['facebook'] ?>" target="_blank">Facebook</a>
            <span> | </span>
            <a class="custom-a ml-2 pl-2 pr-2 <?php echo $fontColor; ?>" href="<?= $instance['instagram'] ?>" target="_blank">Instagram</a>
            <span> | </span>
            <a class="custom-a ml-2 pl-2 pr-2 <?php echo $fontColor; ?>" href="<?= $instance['youtube'] ?>" target="_blank">Youtube</a>
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

        if (!isset($instance['instagram'])) {
            $instance['instagram'] = 'instagram';
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
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>"
                   name="<?php echo $this->get_field_name('instagram'); ?>" type="text"
                   value="<?php echo $instance['instagram']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>"
                   name="<?php echo $this->get_field_name('youtube'); ?>" type="text"
                   value="<?php echo $instance['youtube']; ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['facebook'] = (!empty($new_instance['facebook'])) ? $new_instance['facebook'] : '';
        $instance['instagram'] = (!empty($new_instance['instagram'])) ? $new_instance['instagram'] : '';
        $instance['youtube']    = (!empty($new_instance['youtube'])) ? $new_instance['youtube'] : '';

        return $instance;
    }
    
}

function load_follow_widget()
{
    register_widget('follow_widget');
}

add_action('widgets_init', 'load_follow_widget');
?>