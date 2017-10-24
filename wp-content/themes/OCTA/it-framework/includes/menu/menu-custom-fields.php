<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

class it_custom_menu {

	protected static $fields = array();

	public static function init() {
		add_action( 'wp_nav_menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 4 );
		add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );

        self::$fields = array(
            'megamenu' => esc_html__( 'Megamenu' , 'octa' ),
            'column' => esc_html__( 'Column' , 'octa' ),
            'inner_mega' => esc_html__('Add Widget', 'octa'),
            'hide_title' => esc_html__('Hide Menu Label', 'octa'),
            'icon' => esc_html__( 'Icon' , 'octa' ),
            'hint' => esc_html__( 'Hint' , 'octa' ),
            'hint_type' => esc_html__( 'Hint Type', 'octa' ),
        );
        
	}

	public static function _fields( $id, $item, $depth = 0, $args ) {
        
        foreach ( self::$fields as $_key => $label ) {
			$key   = sprintf( 'menu-item-%s', $_key );
			$id    = sprintf( 'edit-%s-%s', $key, $item->ID );
			$name  = sprintf( '%s[%s]', $key, $item->ID );
			$value = get_post_meta( $item->ID, $key, true );
			$class = sprintf( 'field-%s', $_key );
            global $wp_registered_sidebars;
            
            switch ( $_key ) {
                
                case 'icon':
                ?>
                <div class="m-sep-block">
                <p class="field-custom description description-wide <?php echo esc_attr( $class ) ?>">
                    <i class="<?php echo esc_attr( $item->icon ); ?> ico"></i>
                    <a class="button button-primary btn_icon" href="#"><?php echo esc_html__('Add Icon','octa') ?></a>
                    <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" class="icon_cust" value="<?php echo esc_attr($value); ?>" />
                    <a class="button icon-remove"><?php echo esc_html__('Remove Icon','octa') ?></a> 
                </p>
                </div>
                <?php    
                break;
                
                case 'megamenu':
                $mg = $value ? $value : "0";
                ?>
                <div class="m-sep-block mega-menu-block">
                <p class="field-custom description description-thin mega-choose <?php echo esc_attr( $class ) ?>">
                    <span class="block"><?php echo esc_html__( 'Mega Menu', 'octa' ); ?> </span>
                    <input type="hidden" id="<?php echo esc_attr($id); ?>" class="checktxt hid-vl-chk" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($mg); ?>" />
                    <span class="it_bx custom-checkbox"><span class="switcher"></span></span>
                </p>
                <?php    
                break;
                
                case 'column':
                $co = $value ? $value : "3";
                ?>
                <p class="field-custom description description-thin column-choose <?php echo esc_attr( $class ) ?>">
                    <span class="block"><?php echo esc_html__( 'Columns', 'octa' ); ?> </span>
                    <select>
                        <option value="1">1 Column</option>
                        <option value="2">2 Columns</option>
                        <option value="3">3 Columns</option>
                        <option value="4">4 Columns</option>
                        <option value="6">6 Columns</option>
                        <option value="12">12 Columns</option>
                    </select>
                    <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" class="hid-vl" value="<?php echo esc_attr($co); ?>" />
                </p>
                </div>
                <?php    
                break;
                
                case 'hint':
                ?>
                <div class="m-sep-block">
                <p class="field-custom description description-thin <?php echo esc_attr( $class ) ?>">
                    <span class="block"><?php echo esc_html__( 'Hint', 'octa' ); ?> </span>
                    <input type="text" id="<?php echo esc_attr($id); ?>" class="widefat edit-menu-item-hint" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" />
                </p>
                <?php    
                break;

                case 'hint_type':
                $ht = $value ? $value : "default";
                ?>
                <p class="field-custom description description-thin <?php echo esc_attr( $class ) ?>">
                    <span class="block"><?php echo esc_html__( 'Hint Type', 'octa' ); ?> </span>
                    <select>
                        <option value="default">Default</option>
                        <option value="info">Info</option>
                        <option value="success">Success</option>
                        <option value="warning">Warning</option>
                        <option value="error">Error</option>
                    </select>
                    <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" class="hid-vl" value="<?php echo esc_attr($ht); ?>" />
                </p>
                </div>
                <?php    
                break;
                
                case 'inner_mega':
                    if ($depth != 0 ){
                        $wd = $value ? $value : "";
                        ?>
                        <div class="m-sep-block">
                            <p class="field-custom description description-wide column-widget <?php echo esc_attr( $class ) ?>">
                                <span class="block"><?php echo esc_html__( 'Add Widget', 'octa' ); ?> </span>
                                <select>
                                    <option value=""><?php echo esc_html__('-- Select Widget Area --', 'octa') ?></option>
                                    <?php
                                    foreach($wp_registered_sidebars as $sidebar_id => $sidebar){
                                        ?>
                                        <option value="<?php echo esc_attr($sidebar_id) ?>"><?php echo esc_html($sidebar['name']) ?></option>
                                        <?php
                                    }    
                                    ?>
                                </select>
                                <input type="hidden" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" class="hid-widget" value="<?php echo esc_attr($wd); ?>" />
                            </p>
                        </div>
                    <?php 
                    }   
                break;
                
                case 'hide_title':
                if ($depth != 0 ){
                    $htl = $value ? $value : "0";
                    ?>
                    <div class="m-sep-block hide-lbl-block">
                        <p class="field-custom description description-thin hide-lbl <?php echo esc_attr( $class ) ?>">
                            <span class="block"><?php echo esc_html__( 'Hide Menu Label', 'octa' ); ?> </span>
                            <input type="hidden" id="<?php echo esc_attr($id); ?>" class="checktxt hid-lbl" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($htl); ?>" />
                            <span class="it_bx custom-checkbox"><span class="switcher"></span></span>
                        </p>  
                    </div>
                    <?php
                }    
                break;
                
            } 
            
        }
	}
    
    public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            return;
        }

        check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

        foreach ( self::$fields as $_key => $label ) {
            $key = sprintf( 'menu-item-%s', $_key );

            // Sanitize
            if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
                // Do some checks here...
                $value = $_POST[ $key ][ $menu_item_db_id ];
            }
            else {
                $value = null;
            }

            // Update
            if ( ! is_null( $value ) ) {
                update_post_meta( $menu_item_db_id, $key, $value );
            }
            else {
                delete_post_meta( $menu_item_db_id, $key );
            }
        }
    }
    
	public static function _columns( $columns ) {
		$columns = array_merge( $columns, self::$fields );

		return $columns;
	}
    
    public function it_nav_menu( $args = array() ) {
        static $menu_id_slugs = array();
        $walker = new it_walker();
        $defaults = array( 'menu' => '', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '',
        'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth' => 0, 'walker' => $walker, 'theme_location' => 'primary' );

        $args = wp_parse_args( $args, $defaults );
        $args = apply_filters( 'wp_nav_menu_args', $args );
        $args = (object) $args;

        $menu = wp_get_nav_menu_object( $args->menu );

        if ( ! $menu && $args->theme_location && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $args->theme_location ] ) )
            $menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );

        if ( ! $menu && !$args->theme_location ) {
            $menus = wp_get_nav_menus();
            foreach ( $menus as $menu_maybe ) {
                if ( $menu_items = wp_get_nav_menu_items( $menu_maybe->term_id, array( 'update_post_term_cache' => false ) ) ) {
                    $menu = $menu_maybe;
                    break;
                }
            }
        }

        if ( $menu && ! is_wp_error($menu) && !isset($menu_items) ) $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
        if ( ( !$menu || is_wp_error($menu) || ( isset($menu_items) && empty($menu_items) && !$args->theme_location ) )
            && $args->fallback_cb && is_callable( $args->fallback_cb ) )
                return call_user_func( $args->fallback_cb, (array) $args );
        if ( ! $menu || is_wp_error( $menu ) ) return false;

        $nav_menu = $items = $men_col = '';
        
        $menu_color = theme_option("sub_menu_color");
        $opts_menu_color = get_post_meta( c_page_ID() , 'meta_sub_menu_color' , true);
        $men = theme_option('header_layout');
        $header_style = get_post_meta(c_page_ID(),'meta_header_style',true);
        
        if ($opts_menu_color == '' ){
            $men_col = ' '.$menu_color;
        }else if($menu_color == '') {
            $men_col = ' '.$opts_menu_color;
        }

        if($men == 'header-left' || $men == 'header-right'){
            $nav_menu .= '<nav class="side-nav dl-menuwrapper">';    
        }else{
            $nav_menu .= '<nav class="navbar navbar-default pull-left'.$men_col.'">';
        }
        $nav_menu .= '<div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button></div>
        <div class="navbar-collapse collapse main-nav" id="navbar">';

        
        $show_container = false;
        if ( $args->container ) {
            $allowed_tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
            if ( in_array( $args->container, $allowed_tags ) ) {
                $show_container = true;
                $class = $args->container_class ? ' class="' . esc_attr( $args->container_class ) . '"' : ' class="menu-'. $menu->slug .'-container collapse navbar-collapse"';
                $id = $args->container_id ? ' id="' . esc_attr( $args->container_id ) . '"' : '';
                $nav_menu .= '<'. $args->container . $id . $class . '>';
            }
        }

        _wp_menu_item_classes_by_context( $menu_items );

        $sorted_menu_items = $menu_items_with_children = array();
        foreach ( (array) $menu_items as $menu_item ) {
            $sorted_menu_items[ $menu_item->menu_order ] = $menu_item;
            if ( $menu_item->menu_item_parent ) $menu_items_with_children[ $menu_item->menu_item_parent ] = true;
        }

        if ( $menu_items_with_children ) {
            foreach ( $sorted_menu_items as &$menu_item ) {
                if ( isset( $menu_items_with_children[ $menu_item->ID ] ) )
                    $menu_item->classes[] = 'menu-item-has-children';
            }
        }

        unset( $menu_items, $menu_item );
        $sorted_menu_items = apply_filters( 'wp_nav_menu_objects', $sorted_menu_items, $args );
        $items .= walk_nav_menu_tree( $sorted_menu_items, $args->depth, $args );
        unset($sorted_menu_items);
        if ( ! empty( $args->menu_id ) ) {
            $wrap_id = $args->menu_id;
        } else {
            $wrap_id = 'menu-' . $menu->slug;
            while ( in_array( $wrap_id, $menu_id_slugs ) ) {
                if ( preg_match( '#-(\d+)$#', $wrap_id, $matches ) )
                    $wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $wrap_id );
                else
                    $wrap_id = $wrap_id . '-1';
            }
        }
        $menu_id_slugs[] = $wrap_id;
        $wrap_class = $args->menu_class ? $args->menu_class.' it-menu' : 'nav navbar-nav';
        $items = apply_filters( 'wp_nav_menu_items', $items, $args );
        $items = apply_filters( "wp_nav_menu_{$menu->slug}_items", $items, $args );
        if ( empty( $items ) ) return false;
        $nav_menu .= sprintf( $args->items_wrap, esc_attr( $wrap_id ), esc_attr( $wrap_class ), $items );
        unset( $items );
        if ( $show_container ) $nav_menu .= '</' . $args->container . '>';
        $nav_menu .= '</div></nav>';
        $nav_menu = apply_filters( 'wp_nav_menu', $nav_menu, $args );
        if ( $args->echo ) echo $nav_menu;
        else
            return $nav_menu;
    }
    
}

it_custom_menu::init();