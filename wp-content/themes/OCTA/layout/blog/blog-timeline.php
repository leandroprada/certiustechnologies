<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );
  
$clas = $hold = $tline = '';
$lay = theme_option('blog_sidebar');
if($lay == 'right'){
    $clas = 'timeline-left';
}else if ($lay == 'left'){
    $clas = 'timeline-right';
}else{
    $tline = ' timeline_no_bar';
}
$holder = theme_option('img_placeholder');
?>
<?php while ( have_posts() ) : the_post(); 
if(!get_the_post_thumbnail() && $holder == '' ){
    $hold = ' no-holder';
}
?>
<div class="<?php echo esc_attr($tline); ?>">
    <div class="<?php echo esc_attr($clas); ?>">
        <div id="post-<?php the_ID(); ?>" <?php post_class('post-item'.$hold); ?>>
           <div class="timeline_date">
               <span class="inner_date main-bg">
                    <span class="day"><?php echo esc_html(get_the_date('j')); ?></span>
                    <span class="month"><?php echo esc_html(get_the_date('M')); ?></span>
               </span>
               <span class="year"><?php echo esc_html(get_the_date('Y')); ?></span>
           </div>
            <article class="post-content">
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
                        
                        if ( get_the_post_thumbnail() ){
                            it_post_thumbnail();
                        }else if($holder) {
                            echo '<div class="post-image">';
                                echo '<a href="'. esc_url(get_the_permalink()) .'" class="post-thumbnail">';
                                    echo '<img alt="" src="' . esc_url(get_parent_theme_file_uri("/assets/images/blog/placeholder.jpg")) .'" />';
                                echo '</a>';
                            echo '</div>';
                        }
                        
                    } 
               ?>
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
                            <?php it_post_meta_single(); ?>
                        </ul>
                    </div>

                    <div class="entry-content-tl">
                        <?php echo get_content_format(); ?>
                    </div>
                </div>
                <?php wp_link_pages( array(
                    'before'      => '<div class="sub-pager"><span class="page-links-title">' . esc_html__( 'Pages:', 'octa' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    ) );
                ?>
            </article>

        </div>
    </div>
</div>
<?php
$lay = theme_option('blog_sidebar');
if($lay == 'right' || $lay == 'left'){
?>
<div class="divider dashed-sm blo-divid"></div>
<?php
}
?>

<?php endwhile; ?>
