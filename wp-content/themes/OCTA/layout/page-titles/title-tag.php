<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' ); 
$title = wp_title( '', false, '' ); 
$hide_breadcrumbs = get_post_meta(c_page_ID(),'hide_breadcrumbs',true);
?>
<div class="page-title title-normal">
    <div class="container">
        <div class="title-container">
            <div class="in-page-title">
                <div class="title-headings">
                    <h1><?php printf( esc_html__( '%s', 'octa' ), single_tag_title( '', false ) ); ?></h1>
                    <h3 class="sub-title"><?php echo esc_html__('Tags Archive Page', 'octa') ?></h3>
                    <?php if(tag_description()){
                            echo '<div class="desc_text">';
                                echo tag_description( $tag_id );
                            echo '</div>';
                        }
                    ?>
                </div>
                <?php
                if( $br_style == 'style3' || $br_style == 'minimal' ){
                    site_breadcrumbs();
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php 
if( $br_style == '' || $br_style == 'style2' ){
    site_breadcrumbs();
}
