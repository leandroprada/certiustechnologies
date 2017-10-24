<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'banners_ads_widget_reg');

function banners_ads_widget_reg(){
    register_widget('banners_ads_widget');
    wp_enqueue_style('thickbox');
}
class banners_ads_widget extends WP_Widget {
    
    function __construct() {
        parent::__construct('it_widget_side_banners',__('- Side Banners', 'octa'), array( 'description' => esc_html__( 'Add Banners on the sidebars.', 'octa' )));
    }
    
    public function widget( $args, $instance ) {
        
        $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        $image = $instance['image'];
        $im_link = $instance['im_link'];
         
        echo $args['before_widget'];
        if ( ! empty( $title ) ){echo $args['before_title'] . $title . $args['after_title'];}
        echo '<div class="banner_img">';
            echo '<a href="'.esc_url($im_link).'"><img alt="" src="'.esc_url($image).'" /></a>';
        echo '</div>';
        echo $args['after_widget'];
    }
            
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $image = $instance['image'];
            $im_link = $instance['im_link'];
        }else{
            $title = '';
            $image = '';
            $im_link = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'im_link' )); ?>"><?php esc_html__( 'Banner Link:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'im_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'im_link' )); ?>" type="text" value="<?php echo esc_url( $im_link ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'image' )); ?>"><?php esc_html__( 'Image:', 'octa' ); ?></label> <br>
            <input class="regular-text txt-banner" id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button btn-banner" type="button" value="Upload" />
        </p>
        <?php 
    }
        
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
        $instance['im_link'] = ( ! empty( $new_instance['im_link'] ) ) ? strip_tags( $new_instance['im_link'] ) : '';
        return $new_instance;
    } 
}
