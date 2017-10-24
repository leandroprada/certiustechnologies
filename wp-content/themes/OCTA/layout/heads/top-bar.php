<?php 
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

$cl                 = '';
$meta_bar_color     = esc_html(get_post_meta(c_page_ID(),'meta_topbar_color',true));
$meta_border        = esc_html(get_post_meta(c_page_ID(),'meta_bar_border',true));
$meta_full          = esc_html(get_post_meta(c_page_ID(),'meta_bar_full',true));
$top_color          = theme_option("topbar_color");
$top_full           = theme_option("bar_full");
$t_border           = theme_option('topbar_border');
$lbar               = theme_option('top_left_mod');
$rbar               = theme_option('top_right_mod');

if($meta_bar_color != ''){
    $cl .= $meta_bar_color;    
}else {
    $cl .= $top_color;
}

if( $meta_border != '' && $meta_border == '1' ){
    $cl .= ' bord';
} else if($meta_border == '' && $t_border == '1'){
    $cl .= ' bord';
}

if($meta_full != '' && $meta_full == '1'){
    $cl .= ' full-bar';
}else if ($meta_full == '' && $top_full == '1'){
    $cl .= ' full-bar';
}
?>
<div class="top-bar <?php echo esc_attr($cl); ?>">
    <div class="container">
        <?php if ($lbar !== 0) { ?>
             <div class="pull-left">   
                <?php for ( $i = 1; $i <= $lbar ; $i++ ) {  
                    $mod = theme_option('top_bar_left_'.$i); 
                    top_bar_mods($mod,$i,'left');    
                } ?>
             </div>   
        <?php } ?>  

        <?php if ($rbar !== 0) { ?>
            <div class="pull-right">
                <?php for ( $i = 1; $i <= $rbar ; $i++ ) {   
                    $mod = theme_option('top_bar_right_'.$i);
                    top_bar_mods($mod,$i,'right');    
                } ?>
            </div>
        <?php } ?>
    </div>
</div>

<?php
  
function top_bar_mods($module,$num,$bar){
    $langcode = '';
    global $user_ID; 
    $it_custom_menu = new it_custom_menu();
    if ( class_exists( 'SitePress' ) ) {
        $langcode = '-'.ICL_LANGUAGE_CODE;
    }
    $b_menu = theme_option("top_".$bar."_menu_".$num);
    $b_menu_css = theme_option("top_".$bar."_menu_css_".$num);
    $b_menu_hide = theme_option("top_".$bar."_menu_hide_".$num);
    
    $b_text = theme_option("top_".$bar."_text_".$num.$langcode);
    $b_text_icon = theme_option("top_".$bar."_text_icon_".$num);
    $b_text_css = theme_option("top_".$bar."_text_css_".$num);
    $b_text_hide = theme_option("top_".$bar."_text_hide_".$num);
    
    $b_link_txt = theme_option("top_".$bar."_link_text_".$num.$langcode);
    $b_link_icon = theme_option("top_".$bar."_link_icon_".$num);
    $b_link_url = theme_option("top_".$bar."_link_url_".$num.$langcode);
    $b_link_target = theme_option("top_".$bar."_link_target_".$num);
    $b_link_css = theme_option("top_".$bar."_link_css_".$num);
    $b_link_hide = theme_option("top_".$bar."_link_hide_".$num);
    
    $b_search_css = theme_option("top_".$bar."_search_css_".$num);
    $b_search_hide = theme_option("top_".$bar."_search_hide_".$num);
    
    $b_socials_txt = theme_option("top_".$bar."_socials_txt_".$num.$langcode);
    $b_socials_css = theme_option("top_".$bar."_socials_css_".$num);
    $b_socials_hide = theme_option("top_".$bar."_socials_hide_".$num);
    
    $b_login_css = theme_option("top_".$bar."_login_css_".$num);
    
    $b_wpml_css = theme_option("top_".$bar."_wpml_css_".$num);
    $b_wpml_hide = theme_option("top_".$bar."_wpml_hide_".$num);
    
    $b_woocart_css = theme_option("top_".$bar."_woocart_css_".$num);
    $b_woocart_hide = theme_option("top_".$bar."_woocart_hide_".$num);
        
    $b_soc_txt = theme_option("socials_".$bar."_txt_".$num.$langcode);      
      
    switch($module){
                
        case 'menu':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_menu_hide != 1) ) { ?>
                <div class="top-bar-menu topbar-box <?php echo esc_attr($b_menu_css) ?>">
                    <?php if($b_menu != ''){
                        if (has_nav_menu($b_menu)) {
                            $it_custom_menu->it_nav_menu( array( 'theme_location' => $b_menu) );
                        }
                    }else{
                        echo '<span class="menu-message">' . esc_html__('No menu selected! Please select menu first.', 'octa').'</span>';
                    } ?>
                </div>
            <?php }
        break;
        
        case 'text':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_text_hide != 1) ) { ?>     
                <span class="top-bar-txt topbar-box <?php echo esc_attr($b_text_css) ?>">
                    <i class="<?php echo esc_attr($b_text_icon) ?>"></i><?php echo wp_kses($b_text,it_allowed_tags()); ?>
                </span>
            <?php }
        break;
            
        case 'link':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_link_hide != 1) ) { ?>
                <span class="top-bar-txt topbar-box <?php echo esc_attr($b_link_css) ?>">
                    <a href="<?php echo esc_url($b_link_url); ?>" target="<?php echo esc_attr($b_link_target); ?>"><i class="<?php echo esc_attr($b_link_icon) ?>"></i><?php echo wp_kses($b_link_txt,it_allowed_tags()); ?></a>
                </span>
            <?php }
        break;
            
        case 'search':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_search_hide != 1) ) { ?>
                <span class="topbar-box top-bar-search <?php echo esc_attr($b_search_css) ?>">
                    <?php get_search_form(); ?>
                </span>
            <?php } 
        break;
        
        case 'socials':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_socials_hide != 1) ) { ?>
                <span class="no-border top-socials topbar-box <?php echo esc_attr($b_socials_css) ?>">
                    <span class="lbl-txt"><?php echo wp_kses($b_socials_txt,it_allowed_tags()); ?></span><span class="pull-right"><?php echo display_social_icons(); ?></span>
                </span>
            <?php }
        break;
                        
        case 'login':
            ?>
            <ul class="top-info topbar-box <?php echo esc_attr($b_login_css) ?>">
                <?php if ( $user_ID ) { ?>
                    <?php global $user_identity; ?>
                    <li class="welcome-user"><b><?php echo esc_html__('Welcome', 'octa') ?></b>, <a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/profile.php"><?php loggedUser(); ?></a></li>
                    <li><a href="<?php echo esc_url(wp_logout_url()); ?>" title="<?php echo esc_html__('Log out of this account', 'octa') ?>"><?php echo esc_html__('Log Out', 'octa') ?></a></li>
                <?php } else { ?>
                    
                    <?php if (get_option('users_can_register')) { ?>
                    <li><a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php?action=register"><i class="fa fa-user"></i><?php _e('Register', 'octa') ?></a></li>
                    <?php } ?>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="login-bx3"><i class="fa fa-unlock-alt"></i> <?php echo esc_html__('Login', 'octa') ?></a>
                        <div class="dropdown-menu login-popup">
                            <form name="loginform3" id="loginform3" action="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php" method="post">
                                <div class="login-controls">
                                    <div class="form-group">
                                        <input value="" class="form-control" type="text" size="20" placeholder="<?php echo esc_html__('User name Or Email', 'octa'); ?>" tabindex="10" name="log" id="user_login" />
                                    </div>
                                    <div class="form-group">
                                        <input value="" class="form-control" placeholder="<?php echo esc_html__('Password', 'octa'); ?>" type="password" size="20" tabindex="20" name="pwd" id="user_pass" />
                                    </div>
                                    <div class="form-group">
                                        <span class="block checkbox-block"><input name="rememberme" id="rememberme" value="forever" tabindex="90" type="checkbox"><span><?php echo esc_html__('Remember me !', 'octa'); ?></span></span>
                                    </div>
                                    <div>
                                        <input name="wp-submit" id="wp-submit" value="<?php echo esc_html__('Login', 'octa'); ?>" tabindex="100" type="submit" class="btn main-bg btn-block">
                                    </div>
                                    <input name="redirect_to" value="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/" type="hidden">
                                    <input name="testcookie" value="1" type="hidden">
                                </div>        
                            </form>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <?php
        break;
            
        case 'wpml':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_wpml_hide != 1) ) { ?>
                <span class="topbar-box <?php echo esc_attr($b_wpml_css) ?>">
                    <?php if(if_wpml_activated()){
                        do_action('icl_language_selector');
                    }else{
                        echo '<span class="menu-message">'. esc_html__('Please Install and Activate WPML Plugin', 'octa'). '</span>';
                    } ?>
                </span>
            <?php }
        break;
        
        case 'woocart':
            if ( !is_user_logged_in() || ( is_user_logged_in() && $b_woocart_hide != 1) ) {
                if ( class_exists( 'woocommerce' ) ){ ?>
                    <span class="topbar-box top-cart <?php echo esc_attr($b_woocart_css) ?>"><?php echo it_wo_cart(); ?></span>
                <?php } else { ?>
                    <span class="topbar-box menu-message"><?php echo esc_html__('Please Install and Activate Woocommerce Plugin.', 'octa'); ?></span>
                <?php    
                }
            } 
        break; 
    }   
}
