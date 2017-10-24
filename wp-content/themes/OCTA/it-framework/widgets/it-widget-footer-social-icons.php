<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'footer_socials_widget_reg');
function footer_socials_widget_reg(){
    register_widget('footer_socials_widget');
}
class footer_socials_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_footer_socials', esc_html__('- Footer Social icons', 'octa'), array( 'description' => esc_html__( 'Footer Social icons widget.', 'octa' )));
    }
    public function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'], $this->id_base );
        $footer_text = $instance['footer_text'];
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ){
            if ( !empty ( $instance['title']) ) {
                echo '<h4 class="block-head">'.esc_html($title).'</h4>';
            }            
        }
        
        if ( !empty ( $instance['footer_text']) ) { echo '<p class="foot-about-par">'.esc_html($footer_text).'</p>';}
        echo footer_social_icons();
        
        echo $args['after_widget'];
    }
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $footer_text = esc_textarea($instance['footer_text']);
        }else {
            $title = esc_html__( 'Social Icons', 'octa' );
            $footer_text = '';
        }
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'octa' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'footer_text' )); ?>"><?php esc_html__( 'Footer text:', 'octa' ); ?></label> 
        <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id( 'footer_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'footer_text' )); ?>"><?php echo esc_attr( $footer_text ); ?></textarea>
    </p>
    <?php 
    }
    
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['footer_text'] = ( ! empty( $new_instance['footer_text'] ) ) ? strip_tags( $new_instance['footer_text'] ) : '';
    return $instance;
    }

}