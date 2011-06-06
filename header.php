<?php
/**
 * @package WordPress
 * @subpackage Organic Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/styles/<?php echo get_option('organic_theme_style'); ?>.css" type="text/css" media="screen, projection" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="rap">
<div id="header">
	<div id="head-top">
            <div id="head-box">
                    <img src="<?php echo bloginfo('template_directory'); ?>/img/header/header_logo.jpg" width="900" height="81" alt="" />
             </div>
	</div>
	<div id="head-sub">
                <h1 id="logo"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="blog-desc"><?php bloginfo('description'); ?></p>
                <p class="rss-feed"><a href="<?php bloginfo('url'); ?>/feed/" title="F&#248;lg med i seneste nyt via RSS feed"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></p>
	</div>
	<div id="navigation">
		<div id="nav-inner">
      			<div id="access" role="navigation">
                            <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array(
                                    'container_class' => 'menu-header',
                                    'theme_location' => 'primary',
                                    'walker' => new description_walker()
                                ) ); ?>
			</div><!-- #access -->
		</div>
	</div>
</div>

<div id="content">
