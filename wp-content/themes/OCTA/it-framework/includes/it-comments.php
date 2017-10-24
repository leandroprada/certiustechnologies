<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

function IT_comment_template($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <article id="div-comment-<?php comment_ID() ?>" class="comment">
    <?php endif; ?>
    <div class="comment-avatar">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="comment-content">
        <h6 class="comment-author"><?php printf( esc_html__( '%s', 'octa' ), get_comment_author_link() ); ?></h6>
        <div class="meta">
            <span class="comment-date">
                <?php
                /* translators: 1: date, 2: time */
                printf( esc_html__('%1$s at %2$s', 'octa'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'octa' ), '  ', '' );
            ?></span>
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        <p>
            <?php comment_text(); ?>
        </p>
        
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'octa' ); ?></em>
    <?php endif; ?>
    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"></a></div>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </article>
    <?php endif; ?>
<?php
}
