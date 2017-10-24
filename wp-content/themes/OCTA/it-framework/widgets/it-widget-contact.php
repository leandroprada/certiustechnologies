<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'contact_widget_reg');

function contact_widget_reg(){
    register_widget('contact_widget');
}
class contact_widget extends WP_Widget {

    function __construct() {
        parent::__construct('it_widget_contact',__('- Contact info', 'octa'), array( 'description' => esc_html__( 'Contact us widget.', 'octa' )));
    }
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        $langcode = '';
        $footer_text = $instance['footer_text'];
        $NL = $instance['NL'];
        if ( class_exists( 'SitePress' ) ) {
            $langcode = '-'.ICL_LANGUAGE_CODE;
        }
        echo $args['before_widget'];
        if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];
        if (function_exists ( 'icl_translate' )){
            $footer_text = icl_translate('Widgets', 'Social Icons Footer Text', esc_html($instance['footer_text']));
        }
        if($footer_text){
            echo '<p class="foot-about-par">'.esc_html($footer_text).'</p>';
        }
        
        echo "<ul class='details'>";
            
            if(theme_option('contact_address') != ''){
                echo "<li><i class='fa fa-map-marker shape'></i><span><span class='heavy-font'>";
                    echo esc_html(theme_option('contact_address_title'.$langcode)); 
                    echo "</span>".esc_html(theme_option('contact_address'.$langcode))."</span>";
                echo "</li>";
            }
            
            if(theme_option('contact_email') != ''){
                echo "<li><i class='fa fa-envelope shape'></i><span><span class='heavy-font'>";
                    echo esc_html(theme_option('contact_email_title'.$langcode));
                    echo "</span><a href='mailto:".esc_attr(theme_option('contact_email'))."'>".esc_html(theme_option('contact_email'))."</a></span>";
                echo "</li>";
            }
            
            if(theme_option('contact_phone') != ''){
                echo "<li><i class='fa fa-phone shape'></i><span><span class='heavy-font'>";
                    echo esc_html(theme_option('contact_phone_title'.$langcode));
                    echo "</span>".esc_html(theme_option('contact_phone'))."</span>";
                echo "</li>";
            }
            
            if(theme_option('contact_fax') != ''){
                echo "<li><i class='fa fa-fax shape'></i><span><span class='heavy-font'>";
                    echo esc_html(theme_option('contact_fax_title'.$langcode));
                    echo "</span>".esc_html(theme_option('contact_fax'))."</span>";
                echo "</li>";    
            }
            
        echo "</ul>";
        
        if($NL){
            echo '<div class="foot-newletters boo-nl"><label>'.__('Subscribe to our NewsLetters:', 'octa').'</label>'.do_shortcode($NL).'</div>';
        }      
        echo $args['after_widget'];
    }
            
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else{
            $title = esc_html__( 'Contact Us', 'octa' );
        }
        if ( isset( $instance[ 'footer_text' ] ) ) {
            $footer_text = esc_textarea($instance['footer_text']);    
        }else{
            $footer_text = '';
        }
        if ( isset( $instance[ 'NL' ] ) ) {
            $NL = esc_textarea($instance['NL']);
        }else {
            $NL = '';
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
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'NL' )); ?>"><?php esc_html__( 'NewsLetters:', 'octa' ); ?></label> 
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'NL' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'NL' )); ?>" value="<?php echo esc_attr( $NL ); ?>">
        </p>
    <?php 
    }
        
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['footer_text'] = ( ! empty( $new_instance['footer_text'] ) ) ? strip_tags( $new_instance['footer_text'] ) : '';
        $instance['NL'] = ( ! empty( $new_instance['NL'] ) ) ? strip_tags( $new_instance['NL'] ) : '';
        return $instance;
    }
}