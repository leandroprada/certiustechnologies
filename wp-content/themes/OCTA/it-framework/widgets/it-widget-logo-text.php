<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'image_text_widget_reg');
function image_text_widget_reg(){
    register_widget('image_text_widget');
    wp_enqueue_style('thickbox');
}
class image_text_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_image_text', esc_html__('- Image & Text Widget', 'octa'), array( 'description' => esc_html__( 'Image & Text Widget.', 'octa' )));
    }
    
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $image = $instance['image'];
        
        if (function_exists ( 'icl_translate' )){
            $text = icl_translate('Widgets', 'Image & Text Widget', esc_html($instance['text']));
        } else {
            $text = $instance['text'];
        }
        
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        
        echo '<div class="foot-image"><img alt="" src="'.esc_url($image).'" /></div>';
        echo '<p class="widget-txt">'.wp_kses($text,it_allowed_tags()).'</p>';
        
        echo $args['after_widget'];
        
    }
    
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $image = $instance['image'];
            $text = $instance['text'];
        }else {
            $title = esc_html__( 'Image & Text', 'octa' );
            $image = '';
            $text = '';
        }
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'octa' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
            <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'image:', 'octa' ); ?></label> 
            <input class="regular-text txt-image" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />
        <input class="upload_image_button btn-image" type="button" value="Upload" />
        </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'footer_text_image' ); ?>"><?php _e( 'Text:', 'octa' ); ?></label> 
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
    </p>
    <?php 
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
        $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';
        return $instance;
    }

}