<?php
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

if ( post_password_required() ) return;

if ( have_comments() ) { ?>
    <div id="comments" class="comments">    
        
        <h3><?php echo esc_html__('Comments','octa'); ?></h3>

        <p class="hint text-right bold">
            <?php ob_start(); ?>
            <?php comments_number( esc_html__( 'No Comments Found!', 'octa' ), esc_html__( 'One Comment', 'octa' ), '<span class="main-color">%</span> ' . esc_html__( 'Comments', 'octa' ) ); ?>
        </p>
        
		<ul class="comment-list">
			<?php wp_list_comments('callback=IT_comment_template'); ?>
		</ul>
        
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		    <nav id="comment-nav-below" class="navigation" role="navigation">
			    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'octa' ) ); ?></div>
			    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'octa' ) ); ?></div>
		    </nav>
		<?php }
        
		if ( ! comments_open() && get_comments_number() ) { ?>
		    <p class="nocomments"><?php __( 'Comments are closed.' , 'octa' ); ?></p>
	    <?php } ?>
        
    </div>
<?php }

comment_form();

