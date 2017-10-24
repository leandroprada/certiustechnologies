<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_action('widgets_init', 'it_recent_posts_widget_reg');

function it_recent_posts_widget_reg() {
    register_widget('it_recent_posts_widget');
}

class it_recent_posts_widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => esc_html__( "Your site&#8217;s most recent Posts.", 'octa') );
        parent::__construct('it_widget_recent_posts', esc_html__('- Recent Posts', 'octa'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
    }

    public function widget($args, $instance) {
        $cache = array();
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'widget_recent_posts', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = array();
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        $holder = theme_option('img_placeholder');
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'octa' );

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) ) );

        if ($r->have_posts()) :
        
        echo $args['before_widget'];
        
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        } 
        ?>
        
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>
               <div class="post-img">
                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ){
                        the_post_thumbnail('thumbnail');
                    } else if ($holder) {
                        echo '<img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/placeholder-sm.jpg" />';
                    }
                    ?>
                    </a>
                </div>
                <div class="widget-post-info">
                    <h5>
                        <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                    </h5>
                    <div class="meta">
                        <?php if ( $show_date ) { ?>
                        <span class="wid_post-date"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span>
                        <?php } ?>
                        <?php if ( comments_open() && get_comments_number() ) { ?>
                        <span class="wid_comments"><i class="fa fa-comments"></i><?php comments_popup_link( 'Add comment', '1', '%' ); ?></span>
                        <?php } ?>
                    </div>
                </div>       
            </li>
        <?php endwhile; ?>
        </ul>
        
        <?php 
        
        echo $args['after_widget'];

        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'octa' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'octa' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'octa' ); ?></label></p>
<?php
    }
}