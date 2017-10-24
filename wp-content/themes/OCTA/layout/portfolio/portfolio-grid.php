<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
$mcont = $cell = $col = ''; 
$blogstyle = theme_option('blogstyle');
$portfoliostyle = theme_option('portfoliostyle');

$lay = theme_option('portfolio_sidebar');

if($lay == 'right' || $lay == 'left'){
    $col = '9';
    $mcont = ' main-content';
}else{
    $col = '12';
}
if ($lay == "left"){
    $cell = ' rit-cell';
}
$curCat = ''; 
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$curCat = $term->slug;

?>
<?php if ( $lay == 'left' ) { get_sidebar(); } ?>

<div class="md-padding col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont) ?>">
    <div class="cat_grid">
        <?php echo do_shortcode( '[octa_portfolio alias="archive-grid" cats="'.$curCat.'" tags="'.$curCat.'"]' ); ?>
    </div>
</div>

<?php if ( $lay == 'right' ) { get_sidebar(); } ?>