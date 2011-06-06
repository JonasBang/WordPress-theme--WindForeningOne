<div id="menu">
<ul>
	<?php if ( ! dynamic_sidebar( 'sidebar-widget-area' ) ) : ?>
		<?php wp_list_categories('show_count=1&title_li=' . __('<h3>Categories</h3>')); ?>
			<li><h3>Calendar</h3><?php get_calendar(); ?></li>
			
			<li><h3>Archives</h3>
				<ul>
					<?php wp_get_archives('show_post_count=1&type=monthly'); ?>
				</ul>
			</li>
			
			<li><h3>Blogroll</h3>
				<ul>
					<?php wp_list_bookmarks('categorize=0&title_li='); ?>
				</ul>
			</li> 
	<?php endif; ?>
</ul>
</div>
