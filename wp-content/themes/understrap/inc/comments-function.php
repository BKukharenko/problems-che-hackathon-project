<?php
//Remove note of comments-form
function change_comment_form($fields) {

	$fields['comment_notes_before'] = '';
	return $fields;
}

add_filter('comment_form_defaults','change_comment_form');

//Creating custom markup for comment
function custom_comment ($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article class="d-flex pt-3 pb-3">
			<div class="avatar d-block">
				<?= get_avatar( $comment); ?>
			</div>
			<div class="comments-text">
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Ваш коментар очікує на модерацію') ?></em>
				<?php endif; ?>
				<h4 class="comment-author">
					<a href="<?php comment_author_link($comment); ?>">
						<?php
						if ( $comment->user_id != '0' ) {
							echo get_user_meta( $comment->user_id, 'nickname', true );
						} else {
							echo get_comment_author_link();
						}
						?>
					</a>
				</h4>
				<p> <?= get_comment_text($comment);?></p>
				<span>
				<?php
				comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
				?>
				</span>
			</div>
		</article>
	</li>
<?php } ?>
