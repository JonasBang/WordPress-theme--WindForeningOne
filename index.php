<?php
/**
 * @package WordPress
 * @subpackage Organic_Theme
 */
get_header();
?>

<div id="page-wrap">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <?php if (!is_page()) : ?>
	<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<p class="comment-count"><?php comments_popup_link(__('<span class="count">0</span> kommentarer'), __('<span class="count">1</span> kommentar'), __('<span class="count">%</span> kommentarer')); ?></p>
	<p class="meta">Skrevet <?php the_time('j. F Y') ?> af <?php the_author() ?>  i <?php the_category(' |') ?><br><?php edit_post_link( __( 'Rediger', 'jbwindtwo' ), '<span class="edit-link">', '</span>' ); ?></p>
	<p class="the-tags"><?php the_tags(__(''), ', ', ''); ?></p>
    <?php elseif (!is_front_page()) : ?>
	<h3 class="pagetitle"><?php the_title(); ?></h3>
    <?php endif; ?>
	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
		<div class="clr"></div>
	</div>
    <?php if (!is_page()) { include("includes/social.php"); } ?>
	<div class="feedback">
		<?php wp_link_pages(); ?>
	</div>
</div>

<?php if (!is_page()) { comments_template(); } ?>

<?php if (is_page()) : ?>
    <?php edit_post_link( __( 'Rediger', 'jbwindtwo' ), '<span class="edit-link">', '</span>' ); ?>
<?php endif; ?>

<?php endwhile; else: ?>
<p><?php _e('Beklager, ingen indlæg matcher dine kriterier.'); ?></p>
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
        <div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; &#198;ldre indl&#230;g') ?></div>
		<div class="alignright"><?php previous_posts_link('Nyere indl&#230;g &raquo;') ?></div>
	</div>
<?php } ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
