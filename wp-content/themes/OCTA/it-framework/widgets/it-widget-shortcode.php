<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'shortcode_widget_reg');

function shortcode_widget_reg(){
    register_widget('shortcode_widget');
}
class shortcode_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_shortcode',__('- Shortcode Widget', 'octa'), array( 'description' => esc_html__( 'Shortcode widget.', 'octa' )));
    }
    
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $langcode = '';
    $shortc = $instance['shortc'];

    echo $args['before_widget'];
    if ( $title ) {
        echo $args['before_title'] . $title . $args['after_title'];
    }
    if ( ! empty( $title ) )

    echo do_shortcode($shortc);
    echo $args['after_widget'];
    }
            
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $shortc = esc_textarea($instance['shortc']);
        }
        else {
            $title = '';
            $shortc = '';
        }
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'shortc' )); ?>"><?php esc_html__( 'Shortcode:', 'octa' ); ?></label> 
            <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id( 'shortc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'shortc' )); ?>"><?php echo esc_attr( $shortc ); ?></textarea>
            <span><?php echo 'Ex: [shoertcode]'; ?></span>
        </p>
    <?php 
    }
        
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['shortc'] = ( ! empty( $new_instance['shortc'] ) ) ? strip_tags( $new_instance['shortc'] ) : '';
    return $instance;
    }
}