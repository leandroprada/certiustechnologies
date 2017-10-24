<?php 
/*
Template Name: One-Page Template
*/
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
get_header(); 

while ( have_posts() ) {
    the_post();
    the_content();
}

get_footer();
