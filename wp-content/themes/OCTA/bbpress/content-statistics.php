<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */
if ( ! defined( 'ABSPATH' ) ) exit( 'Access Denied.' );

// Get the statistics
$stats = bbp_get_statistics(); ?>

<table role="main" class="table table-bordered m-t-2">
    <tr>
    <th class="gry-bg p-l-2"><?php echo esc_html__("What's Going On?", 'octa') ?></th>
    </tr>
	<?php do_action( 'bbp_before_statistics' ); ?>
    <tr>
    <td class="p-a-2">
    <?php esc_html__("Our users have posted a total of :", 'octa') ?><strong><?php echo esc_html( $stats['topic_count'] ); ?></strong> <?php esc_html__( 'Topics', 'octa' ); ?> <?php esc_html__("in", 'octa') ?> <strong><?php echo esc_html( $stats['forum_count'] ); ?></strong> <?php esc_html__( 'Forums', 'octa' ); ?>
    <br>
    
    <?php esc_html__("We have", 'octa') ?> <strong><?php echo esc_html( $stats['user_count'] ); ?></strong> <?php esc_html__( 'Registered Users', 'octa' ); ?>
    <br>
	
	<?php esc_html__("Number of total replaies on all forums is", 'octa') ?> <strong><?php echo esc_html( $stats['reply_count'] ); ?></strong> <?php esc_html__( 'Replies', 'octa' ); ?>
	<br>
    
	<?php esc_html__( 'Topic Tags', 'octa' ); ?>:<strong><?php echo esc_html( $stats['topic_tag_count'] ); ?></strong>
	<br>
	<?php if ( !empty( $stats['empty_topic_tag_count'] ) ) : ?>

		<dt><?php esc_html__( 'Empty Topic Tags', 'octa' ); ?></dt>
		<dd>
			<strong><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></strong>
		</dd>

	<?php endif; ?>

	<?php if ( !empty( $stats['topic_count_hidden'] ) ) : ?>

		<dt><?php esc_html__( 'Hidden Topics', 'octa' ); ?></dt>
		<dd>
			<strong>
				<abbr title="<?php echo esc_attr( $stats['hidden_topic_title'] ); ?>"><?php echo esc_html( $stats['topic_count_hidden'] ); ?></abbr>
			</strong>
		</dd>

	<?php endif; ?>

	<?php if ( !empty( $stats['reply_count_hidden'] ) ) : ?>

		<dt><?php esc_html__( 'Hidden Replies', 'octa' ); ?></dt>
		<dd>
			<strong>
				<abbr title="<?php echo esc_attr( $stats['hidden_reply_title'] ); ?>"><?php echo esc_html( $stats['reply_count_hidden'] ); ?></abbr>
			</strong>
		</dd>

	<?php endif; ?>
    </td>
    </tr>
	<?php do_action( 'bbp_after_statistics' ); ?>

</table>

<?php unset( $stats );