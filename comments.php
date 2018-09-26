<?php

/*
Comments Template
*/

if (post_password_required()) {
	return;
}

$soma_comments_args = array(
    'style'        => 'div',
	'callback'     => 'soma_comments_open',
	'end-callback' => 'soma_comments_close'
);

$soma_comment_form =  array(
    'logged_in_as' => null,
    'comment_notes_before' => null,
    'title_reply_before' => '<h6 id="reply-title" class="comments-title d-flex align-items-center">',
    'title_reply_after' => '</h6>',
    'title_reply' => 'Leave a Reply',
    'class_submit' => 'button',
    'submit_button' => '<div class="d-flex"><div class="form-submit shadow ml-auto"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div></div>',
    'comment_field' => "<div class='row'><div class='col-12 form-textarea'><div class='shadow'><textarea placeholder=". esc_html__('Comment', 'soma') ." type='text' name='comment' aria-required='true'/></textarea></div></div></div>",
    'fields' => apply_filters('comment_form_default_fields', array(
            'author' => "<div class='row'><div class='col-4'><div class='shadow'><input placeholder=". esc_html__('Name', 'soma') ." name='author' type='text' aria-required='true'/></div></div>",
        	'email' => "<div class='col-4'><div class='shadow'><input placeholder=". esc_html__('Email', 'soma') ." name='email' type='text' aria-required='true'/></div></div>",
        	'website' => "<div class='col-4'><div class='shadow'><input placeholder=". esc_html__('Website', 'soma') ." name='website' type='text'/></div></div></div>",
        )
    ),
);
?>
<div class="comments clear-both" id="comments">
    <?php if (have_comments()) : ?>
        <div class="comments-area">
        	<div class="container">
        		<h6 class="comments-title"><?php comments_number(esc_attr__('No Comments', 'soma'), esc_attr__('One Comment', 'soma'), esc_attr__('% Comments', 'soma')); ?></h6>
        		<div class="row">
        		    <?php wp_list_comments($soma_comments_args) ?>
        		</div>
                <?php paginate_comments_links(); ?>
        	</div>
        </div>
    <?php endif; ?>
    <?php if (comments_open()) : ?>
        <div class="comments-form">
            <div class="container">
                <?php comment_form($soma_comment_form); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
