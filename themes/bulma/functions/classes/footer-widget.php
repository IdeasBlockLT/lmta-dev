<?php

class footer_widget extends WP_Widget {

    function __construct() {

        parent::__construct(
            'LMTA-footer',  // Base ID
            'LMTA-footer'   // Name
        );

        add_action( 'widgets_init', function() {
            register_widget( 'footer_widget' );
        });

    }

    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget( $args, $instance ) {

        echo $args['before_widget'];

//        if ( ! empty( $instance['title'] ) ) {
//            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
//        }

        echo '<div class="textwidget">';

        echo esc_html__( $instance['text'], 'text_domain' );

        echo '</div>';

        echo $args['after_widget'];

    }

    public function form( $instance ) {

        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

        return $instance;
    }

}

$my_widget = new footer_widget();
//dump($my_widget);
?>