<?php
/**
 * Comment layout.
 *
 * @package understrap
 */

// Comments form.
add_filter( 'comment_form_default_fields', 'understrap_bootstrap_comment_form_fields' );

/**
 * Creates the comments form.
 *
 * @param string $fields Form fields.
 *
 * @return array
 */
function understrap_bootstrap_comment_form_fields($fields)
{
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');
	$html5 = current_theme_supports('html5', 'comment-form') ? 1 : 0;
	$fields = array(
		'author' => '<div class="column"><div class="form-group comment-form-author leave-comment-form">
                    <label for="author" class="d-none">' . __("Ім'я", 'understrap') . ($req ? '' : '') . '</label> ' .
			'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" ' . $aria_req . ' placeholder="' . __("Ваше ім'я ...", 'understrap') . '"></div>',
		'email' => '<div class="form-group comment-form-email leave-comment-form"><label for="email" class="d-none">' . __('Ваш Email',
				'understrap') . ($req ? '' : '') . '</label> ' .
			'<input class="form-control" id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" ' . $aria_req . ' placeholder="' . __('Bаш email...', 'understrap') . '"></div></div>',
	);

	return $fields;
}

add_filter('comment_form_defaults', 'understrap_bootstrap_comment_form');

/**
 * Builds the form.
 *
 * @param string $args Arguments for form's fields.
 *
 * @return mixed
 */
function understrap_bootstrap_comment_form($args)
{
	$args ['class_form'] = 'd-flex flex-column comments-list';
	$args['title_reply'] = '<h3 class="leave-comment-title d-inline-block">' . __('Залиште коментар', 'understrap') . '</h3>';
	$args['comment_field'] = '<div class="form-group leave-comment-form">
    <label for="comment" class="d-none">' . _x('Comment', 'noun', 'understrap') . (' <span class="required">*</span>') . '</label>
    <textarea class="form-control" id="comment" name="comment" aria-required="true" cols="45" rows="4" placeholder="' . __('Коментар', 'understrap') . '"></textarea>
    </div>';
	$args['label_submit'] = __('Надіслати', 'understrap');
	$args['class_submit'] = 'comment-button ml-auto'; // since WP 4.1.
	return $args;
}

//Move comments textarea to bottom of the form
function wpb_move_comment_field_to_bottom($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');
