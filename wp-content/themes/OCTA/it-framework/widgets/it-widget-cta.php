<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'cta_widget_reg');
function cta_widget_reg(){
    register_widget('cta_widget');
    wp_enqueue_style('thickbox');
}
class cta_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_cta', esc_html__('- Footer CTA Widget', 'octa'), array( 'description' => esc_html__( 'Call to action Widget.', 'octa' )));
    }
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $footer_text_image = $instance['footer_text_image'];
        $btn_txt = $instance['btn_txt'];
        $btn_link = $instance['btn_link'];
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ){
            if (function_exists ( 'icl_translate' )){
                $footer_text_image = icl_translate('Widgets', 'Image & Text Widget', esc_html($instance['footer_text_image']));
            }
            echo '<p class="lg-txt f-left">'.esc_html($footer_text_image).'</p>';
            echo '<a class="f-right btn uppercase main-gradient skew-btn" href="'.esc_url($btn_link).'"><span>'.esc_html($btn_txt).'</span></a>';
            echo $args['after_widget'];
        }
        
    }
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $footer_text_image = esc_textarea($instance['footer_text_image']);
            $btn_txt = esc_attr($instance['btn_txt']);
            $btn_link = esc_attr($instance['btn_link']);
        }else {
            $title = esc_html__( 'Image & Text', 'octa' );
            $footer_text_image = '';
            $btn_txt = '';
            $btn_link = '';
        }
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'octa' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'footer_text_image' )); ?>"><?php esc_html__( 'Text:', 'octa' ); ?></label> 
        <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id( 'footer_text_image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'footer_text_image' )); ?>"><?php echo esc_attr( $footer_text_image ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'btn_txt' )); ?>"><?php esc_html__( 'Button Text:', 'octa' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btn_txt' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btn_txt' )); ?>" type="text" value="<?php echo esc_attr( $btn_txt ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'btn_link' )); ?>"><?php esc_html__( 'Button Link:', 'octa' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btn_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btn_link' )); ?>" type="text" value="<?php echo esc_attr( $btn_link ); ?>" />
    </p>
    <?php 
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['footer_text_image'] = ( ! empty( $new_instance['footer_text_image'] ) ) ? strip_tags( $new_instance['footer_text_image'] ) : '';
        $instance['btn_txt'] = ( ! empty( $new_instance['btn_txt'] ) ) ? strip_tags( $new_instance['btn_txt'] ) : '';
        $instance['btn_link'] = ( ! empty( $new_instance['btn_link'] ) ) ? esc_url( $new_instance['btn_link'] ) : '';
        return $instance;
    }

}