<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'flickr_widget_reg');

function flickr_widget_reg() {
    register_widget('flickr_widget');
}

class flickr_widget extends WP_Widget {
    
    function __construct() {
        parent::__construct('it_widget_flickr',__('- Flickr Feed', 'octa'), array( 'description' => esc_html__( 'Flickr feed widget.', 'octa' )));
    }
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        $flicker_id = $instance['flicker_id'];
        $limit = (int) $instance['limit'];
        $widget_id = $args['widget_id'];
        $widget_txt = $instance['widget_txt'];
         
        echo $args['before_widget'];
        
        if ( ! empty( $title ) ){echo $args['before_title'] . $title . $args['after_title'];}
        
        if( ! empty($widget_txt)){
            echo '<p class="foot-about-par">'.esc_html( $widget_txt ).'</p>';
        }
        echo '<div class="flickDiv" id="'.$widget_id.'">';
            echo '<input type="hidden" class="wid_id" value="'.esc_js($widget_id).'" /><input class="wid_limit" type="hidden" value="'.esc_js($limit).'" /><input class="flick_id" type="hidden" value="'.esc_js($flicker_id).'" />';
        echo '<ul></ul></div>';
                    
        echo $args['after_widget'];
    }
            
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $flicker_id = $instance['flicker_id'];
            $limit = (int) $instance['limit'];
            $widget_txt = $instance['widget_txt'];
        }
        else {
            $title = esc_html__( 'Flickr Feed', 'octa' );
            $flicker_id = '';
            $limit = '';
            $widget_txt = '';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_txt' ); ?>"><?php _e( 'Content:', 'octa' ); ?></label> 
            <textarea cols="12" rows="12" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widget_txt' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_txt' )); ?>"><?php echo esc_attr( $widget_txt ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'flicker_id' )); ?>"><?php _e( 'Flickr ID:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'flicker_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'flicker_id' )); ?>" type="text" value="<?php echo esc_attr( $flicker_id ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>"><?php _e( 'Limit:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'limit' )); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>" />
        </p>

        <?php 
    }
        
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['flicker_id'] = ( ! empty( $new_instance['flicker_id'] ) ) ? strip_tags( $new_instance['flicker_id'] ) : '';
        $instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
        $instance['widget_txt'] = ( ! empty( $new_instance['widget_txt'] ) ) ? strip_tags( $new_instance['widget_txt'] ) : '';
        return $new_instance;
    } 
             
}