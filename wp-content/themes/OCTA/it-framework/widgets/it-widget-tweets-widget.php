<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'tweets_widget_reg');

function tweets_widget_reg() {
    register_widget('tweets_widget');
}
class tweets_widget extends WP_Widget {
    
    function __construct() {
        parent::__construct('it_widget_tweets',__('- Latest Tweets', 'octa'), array( 'description' => esc_html__( 'Latest tweets widget.', 'octa' )));
    }
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $tw_user = $instance['tw_user'];
        $tw_num = (int) $instance['tw_num'];
        $widget_id = $args['widget_id'];
        
        echo $args['before_widget'];
        if ( ! empty( $title ) ){echo $args['before_title'] . $title . $args['after_title'];}
        echo '<div id="'.esc_attr($widget_id).'" class="tweet" data-tweets-num="'.esc_js($tw_num).'"></div>';
        ?>                                                        
        <a class="twitter-timeline" href="//twitter.com/<?php echo esc_attr($tw_user); ?>"></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <?php
                    
        echo $args['after_widget'];
    }
            
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            $tw_user = $instance[ 'tw_user' ];
            $tw_num = (int) $instance['tw_num']; 
        }
        else {
            $title = '';
            $tw_num = '';
            $tw_user = '';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'tw_user' )); ?>"><?php esc_html__( 'Twitter User:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tw_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tw_user' )); ?>" type="text" value="<?php echo esc_html( $tw_user ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'tw_num' )); ?>"><?php esc_html__( 'Visible Tweets:', 'octa' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tw_num' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tw_num' )); ?>" type="text" value="<?php echo esc_html( $tw_num ); ?>" />
        </p>

        <?php 
    }
        
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['tw_num'] = ( ! empty( $new_instance['tw_num'] ) ) ? strip_tags( $new_instance['tw_num'] ) : '2';
        $instance['tw_user'] = ( ! empty( $new_instance['tw_user'] ) ) ? strip_tags( $new_instance['tw_user'] ) : '';
        return $new_instance;
    }  
             
}
