<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

add_theme_support('woocommerce');
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// Add the img wrap
add_action( 'woocommerce_before_shop_loop_item_title', create_function('', 'echo "<div class=\"catalog-wrap\">";'), 5, 2);
add_action( 'woocommerce_before_shop_loop_item_title',create_function('', 'echo "</div>";'), 12, 2);

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_second_product_thumbnail' );
add_filter( 'post_class', 'product_has_gallery');

add_filter('add_to_cart_fragments', 'it_icon_add_to_cart_fragment');
function it_icon_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <b class="cart-num main-bg white"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'octa'), $woocommerce->cart->cart_contents_count);?></b>
    <?php
    $fragments['.cart-num'] = ob_get_clean();
    return $fragments;
}

add_filter('add_to_cart_fragments', 'it_add_to_cart_fragment');
if (!function_exists('it_add_to_cart_fragment')) {
    function it_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        ?>
        <div class="mini-cart">
            <ul class="cart_list mini-cart-list product_list_widget">

            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) { ?>

                <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                            $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                            $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                            ?>
                            <li>
                            <?php if ( ! $_product->is_visible() ) { ?>
                                <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                            <?php } else { ?>
                                <a class="cart-mini-lft" href="<?php echo esc_url(get_permalink( $product_id )); ?>">
                                    <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                </a>
                            <?php } ?>
                                <div class="cart-body"><?php echo WC()->cart->get_item_data( $cart_item ); ?>
                                <a href="<?php echo esc_url(get_permalink( $product_id )); ?>"><?php echo $product_name ?></a>
                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price, 'octa' ) . '</span>', $cart_item, $cart_item_key ); ?></div>
                            </li>
                            <?php
                        }
                    }
                ?>

            <?php } else { ?>

                <li class="empty"><?php _e( 'Your Shopping cart is empty.', 'octa' ); ?></li>

            <?php } ?>

        </ul>

            <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                <div class="mini-cart-total"><div class="pull-left"><?php _e( 'Subtotal', 'octa' ); ?>:</div><div class="pull-right"> <?php echo WC()->cart->get_cart_subtotal(); ?></div></div>
                <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
                <div class="checkout">
                    <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="btn btn-sm main-bg"><?php _e( 'View Cart', 'octa' ); ?></a>
                    <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="btn btn-sm btn-default"><?php _e( 'Checkout', 'octa' ); ?></a>
                </div>
            <?php endif; ?>
        </div>  
        <?php
        $fragments['div.mini-cart'] = ob_get_clean();
        return $fragments;
        
    }
}

// woo shopping cart in header & top bar.
if ( ! function_exists( 'it_wo_cart' ) ){
   function it_wo_cart(){
        global $woocommerce;
        ?>
        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="cart-ic lineaico-uni107"></i><b class="cart-num main-bg white"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'octa'), $woocommerce->cart->cart_contents_count);?></b></a>
        <div class="cart-box dropdown-menu">
            <div class="mini-cart">
                <ul class="cart_list mini-cart-list product_list_widget">

                    <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) {

                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                    $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                    $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                    $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                                    ?>
                                    <li>
                                    <?php if ( ! $_product->is_visible() ) { ?>
                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                    <?php } else { ?>
                                        <a class="cart-mini-lft" href="<?php echo esc_url(get_permalink( $product_id )); ?>">
                                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                        </a>
                                    <?php } ?>
                                        <div class="cart-body"><?php echo WC()->cart->get_item_data( $cart_item ); ?>
                                        <a href="<?php echo esc_url(get_permalink( $product_id )); ?>"><?php echo $product_name ?></a>
                                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price , 'octa' ) . '</span>', $cart_item, $cart_item_key ); ?></div>
                                    </li>
                                    <?php
                                }
                            }
                    } else { ?>

                        <li class="empty"><?php _e( 'Your Shopping cart is empty.', 'octa' ); ?></li>

                    <?php } ?>

                </ul>

                <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                    <div class="mini-cart-total"><div class="pull-left"><?php _e( 'Subtotal', 'octa' ); ?>:</div><div class="pull-right"> <?php echo WC()->cart->get_cart_subtotal(); ?></div></div>
                    <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
                    <div class="checkout">
                        <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="btn btn-sm main-bg"><?php _e( 'View Cart', 'octa' ); ?></a>
                        <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="btn btn-sm btn-default"><?php _e( 'Checkout', 'octa' ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>                                  
        <?php
    } 
}

// Add pif-has-gallery class to products that have a gallery
function product_has_gallery( $classes ) {
    global $product;

    $post_type = get_post_type( get_the_ID() );

    if ( ! is_admin() ) {

        if ( $post_type == 'product' ) {

            $attachment_ids = $product->get_gallery_attachment_ids();

            if ( $attachment_ids ) {
                $classes[] = 'it-has-gallery';
            }
        }

    }

    return $classes;
}

// Display the second thumbnails
function woocommerce_template_loop_second_product_thumbnail() {
    global $product, $woocommerce;

    $attachment_ids = $product->get_gallery_attachment_ids();

    if ( $attachment_ids ) {
        $secondary_image_id = $attachment_ids['0'];
        echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'second-shop-catalog' ) );
    }   
}


add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
    
      $rppage = theme_option('related_per_page');
      $args['posts_per_page'] = $rppage; // 4 related products
      return $args;
      
}

if(theme_option('show_related_woo') == '0' && is_product()){
    function wc_remove_related_products( $args ) {
        return array();
    }
    add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);
}

add_filter( 'post_class', 'it_post_classes', 21 );
function it_post_classes( $classes ) {
    if ( 'product' == get_post_type() ) {
        $classes = array_diff( $classes, array( 'first', 'last' ) );
    }
    return $classes;
}

add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if ( $image ) {
            echo '<div class="woo_cat_img"><img src="' . $image . '" alt="" /></div>';
        }
    }
} 