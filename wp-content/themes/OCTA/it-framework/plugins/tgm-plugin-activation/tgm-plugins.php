<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

locate_template('it-framework/plugins/tgm-plugin-activation/class-tgm-plugin-activation.php',true);

add_action( 'tgmpa_register', 'register_required_plugins' );

function register_required_plugins() {

  
  $plugins = array(

    // Visual Composer : Page Builder 
    array(
      'name'      => 'Visual Composer : Page Builder',
      'slug'      => 'js_composer',
      'source'    => 'http://wp.it-rays.net/octa/wp-plugins/js_composer.zip',
      'required'  => false,
    ),
    
    // Revolution Slider
    array(
      'name'      => 'Slider Revolution',
      'slug'      => 'revslider',
      'source'    => 'http://wp.it-rays.net/octa/wp-plugins/revslider.zip',
      'required'  => false,
    ),
    
    // octa Shortcodes 
    array(
      'name'      => 'OCTA Core',
      'slug'      => 'octa-core',
      'source'    => 'http://wp.it-rays.net/octa/wp-plugins/octa-core.zip',
      'required'  => false,
    ),
    
    // Groty Grid 
    array(
      'name'      => 'OCTA Portfolio',
      'slug'      => 'octa-portfolio',
      'source'    => 'http://wp.it-rays.net/octa/wp-plugins/octa-portfolio.zip',
      'required'  => false,
    ),
    
    // Go Pricing
    array(
      'name'      => 'Go - Responsive Pricing & Compare Tables',
      'slug'      => 'go_pricing',
      'source'    => 'http://wp.it-rays.net/octa/wp-plugins/go_pricing.zip',
      'required'  => false,
    ),

    // Contact Form 7
    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => false,
    ),
    
    // Really Simple CAPTCHA
    array(
      'name'      => 'Really Simple CAPTCHA',
      'slug'      => 'really-simple-captcha',
      'required'  => false,
    ),
    
    // Breadcrumb NavXT
    array(
      'name'      => 'Breadcrumb NavXT',
      'slug'      => 'breadcrumb-navxt',
      'required'  => false,
    ),
    
    // MailChimp
    array(
      'name'      => 'MailChimp for WordPress',
      'slug'      => 'mailchimp-for-wp',
      'required'  => false,
    )
    

  );

  /**
   * Array of configuration settings. Amend each line as needed.
   * If you want the default strings to be available under your own theme domain,
   * leave the strings uncommented.
   * Some of the strings are added into a sprintf, so see the comments at the
   * end of each line for what each argument will be.
   */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to pre-packaged plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
    'strings'      => array(
      'page_title'                      => esc_html__( 'Install Required Plugins', 'octa' ),
      'menu_title'                      => esc_html__( 'Install Plugins', 'octa' ),
      'installing'                      => esc_html__( 'Installing Plugin: %s', 'octa' ), // %s = plugin name.
      'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'octa' ),
      'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'octa' ), // %1$s = plugin name(s).
      'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'octa' ), // %1$s = plugin name(s).
      'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'octa' ), // %1$s = plugin name(s).
      'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'octa' ), // %1$s = plugin name(s).
      'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'octa' ), // %1$s = plugin name(s).
      'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'octa' ), // %1$s = plugin name(s).
      'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'octa' ), // %1$s = plugin name(s).
      'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'octa' ), // %1$s = plugin name(s).
      'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'octa' ),
      'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'octa' ),
      'return'                          => esc_html__( 'Return to Required Plugins Installer', 'octa' ),
      'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'octa' ),
      'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'octa' ), // %s = dashboard link.
      'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
    )
  );

  tgmpa( $plugins, $config );

}