<?php
/**
 *
 * octa theme Header
 * @version 1.0.0
 *
 */ 
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

 <!-- Global Site Tag (gtag.js) - Google Analytics -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107497004-1"></script>
 <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments)};
       gtag('js', new Date());

       gtag('config', 'UA-107497004-1');
 </script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MCBPFXD');</script>
<!-- End Google Tag Manager -->

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        <?php 
        oc_loader();
        it_sliding_bar(); 
        octa_header();
        if ( get_header_image() ) { ?>
            <div class="custom-header">
                <img src="<?php esc_url(header_image()); ?>" class="header-image" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" />
            </div>
        <?php } ?>
        <div class="pageContent">
            
        