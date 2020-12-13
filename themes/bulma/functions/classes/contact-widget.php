<?php

class contact_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'LMTA-contact',  // Base ID
            'LMTA-contact'   // Name
        );
        add_action( 'widgets_init', function() {
            register_widget( 'contact_widget' );
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
        echo '<div class="textwidget">';
        //Breaking code below as Kontaktai word was not getting inside h3
        ?>

        <h3> <?php pll_e('Kontaktai')?></h3>
        <p style='white-space: pre-line'><?php pll_e(esc_html__( $instance['text'])) ?></p>

        <?php
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

$my_widget = new contact_widget();

?>