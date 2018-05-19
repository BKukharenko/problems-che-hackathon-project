<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package understrap
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area" id="comments">

	<?php ?>

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">

			<?php
			$comments_number = get_comments_number();
			if ( 1 === (int)$comments_number ) {
				printf(
				/* translators: %s: post title */
					esc_html_x( '1 Коментар', 'comments title', 'understrap' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(

					esc_html( _nx(
						'%1$s Коментар',
						'%1$s Коментарів',
						$comments_number,
						'comments title',
						'understrap'
					) ),
					number_format_i18n( $comments_number ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>

		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-above">
				
				<h1 class="screen-reader-text"><?php esc_html_e( '', 'understrap' ); ?></h1>

				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Попередні коментарі',
							'understrap' ) ); ?></div>
				<?php }
				if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Останні коментарі &rarr;',
							'understrap' ) ); ?></div>
				<?php } ?>

			</nav>

		<?php endif;  ?>


		<ul class="comment-list text-left">

			<?php
			wp_list_comments( array(

				'type' => 'comment',
				'callback' => 'custom_comment',

				'style'      => 'ul',
				'short_ping' => true,

				'avatar_size' => '100',
				'reply_text' => 'Відповісти'
			) );
			?>

		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>

			<nav class="comment-navigation" id="comment-nav-below">

				<h1 class="screen-reader-text"><?php esc_html_e( '', 'understrap' ); ?></h1>

				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Попередні коментарі',
							'understrap' ) ); ?></div>
				<?php }
				if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( __( 'Останні коментарі &rarr;',
							'understrap' ) ); ?></div>
				<?php } ?>

			</nav>

		<?php endif;  ?>

	<?php endif;  ?>

	<?php

	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'коментарів' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Коментарі закриті', 'understrap' ); ?></p>

	<?php endif; ?>

	<?php comment_form(); ?>

</div>
