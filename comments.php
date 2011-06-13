<?php
/**
 * @package WordPress
 * @subpackage Organic_Theme
 */

if ( post_password_required() ) : ?>
<p><?php _e('Login for at se kommentarer.'); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
<h6><span class="blue"><?php comments_number(__('0 kommentarer'), __('1 kommentar'), __('% kommentarer')); ?></h6>
<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<?php echo get_avatar( $comment, 50 ); ?>
	<p><cite><?php comment_author_link() ?>:</cite></p>
	<?php comment_text() ?>
	<p class="commentdate"><?php the_time('j. F Y') ?> kl. <?php comment_time() ?><?php edit_comment_link(__(" Rediger"), ' |'); ?></p>
	</li>

<?php endforeach; ?>

</ol>

<?php else : // If there are no comments yet ?>

<?php endif; ?>


<?php if ( is_user_logged_in() ) : ?>
<?php if ( comments_open() ) : ?>
<h6 id="postcomment"><?php _e('Skriv kommentar'); ?></h6>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('Du skal <a href="%s">logge ind</a> for at kommentere.'), wp_login_url( get_permalink() ) );?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p class="user-in"><?php printf(__('Logged ind som %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)');?> <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website'); ?></small></label></p>

<?php endif; // is_user_logged_in() ?>

<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; // comments_open() ?>
<?php endif; // is_user_logged_in() ?>