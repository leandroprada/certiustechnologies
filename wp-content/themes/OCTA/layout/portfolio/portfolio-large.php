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
?>
<?php if ( $lay == 'left' ) { ?>
    <?php get_sidebar(); ?>
<?php } ?>
<div class="md-padding col-md-<?php echo esc_attr($col); ?><?php echo esc_attr($cell).esc_attr($mcont) ?>">
    <?php if ( have_posts() ) { ?>
        <div class="blog-posts small-image portfolio-arch" id="content">
            <?php while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                
                <?php 
                if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                    
                    echo post_media( get_the_content() );
                    
                } else if ( get_post_format() == 'image' ) {
                    if( has_post_thumbnail()){
                        it_post_thumbnail();  
                    }else{
                        echo post_image(get_the_content());
                    }        
                } else {
                    it_post_thumbnail();
                } 
                ?>
                <article class="post-content">
                    
                
                    <div class="post-info-container">
                        <div class="post-info">
                            <?php if( get_post_format() == 'link' ){ ?>
                                <?php
                                 $title_format  = post_format_link( get_the_content(), get_the_title() );
                                  $it_title   = $title_format['title'];
                                  $it_link = getUrl( $it_title );
                                  echo esc_html($it_title);
                                ?>
                            <?php }else{ ?>
                                <h4><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo esc_html__('Permanent Link to', 'octa') ?> <?php esc_attr(the_title_attribute()); ?>"><?php esc_html(the_title()); ?></a></h4>
                            <?php } ?>
                            <ul class="post-meta">
                                <?php it_post_meta(); ?>
                                <?php if ( !is_singular() || ( is_singular() &&  theme_option('singledate_on') == "1" )){ ?>
                                <li class="meta-date"><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date()); ?></li>
                                <li>
                                <?php }
                                if ( ! is_search() ) {
                                  if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )  {
                                      if ( !is_singular() || ( is_singular() &&  theme_option('singlecomment_on') == "1" )){
                                          comments_popup_link( '', '<i class="fa fa-comments"></i>1', '<i class="fa fa-comments"></i>%', 'meta_comments' );
                                      }
                                  }else{
                                      ?>
                                      <i class="fa fa-comments"></i><span>0</span>
                                      <?php
                                  }
                                }
                                ?>
                                </li>
                                <?php if (class_exists( 'OCTA_Core' )) { ?>
                                <li><?php echo getPostLikeLink( $post->ID ); ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="entry-content">
                        <?php echo get_content_format(); ?>
                    </div>
                </article>
                
            </div>
            <div class="divider skimg"><i class="fa fa-star-o"></i></div>
            <?php endwhile; ?>
        </div>
    <?php } ?>
</div>
<?php if ( $lay == 'right' ) { ?>
    <?php get_sidebar(); ?>
<?php } ?>
