<?php get_header(); ?>
	<?php $shortname = "typographic"; ?>
	
	<?php
	global $wp_query;
	$args = array_merge( $wp_query->query, array( 'posts_per_page' => 15 ) );
	query_posts( $args );        
	$x = 0;
	while (have_posts()) : the_post(); ?>                    		
	
		<?php if($x == 0) { ?>
			<div class="home_post_wide">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-post-wide'); ?></a>
		<?php } elseif($x == 1) { ?>
			<div class="home_post_tall">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-post-tall'); ?></a>
		<?php } elseif($x == 2) { ?>
			<div class="home_post_tall home_post_tall_last">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-post-tall'); ?></a>
		<?php } ?>
		
			<div class="home_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		</div>
		
		<?php if($x == 2) { $x = -1; ?>
			<div class="clear"></div>
		<?php } ?>
	
	<?php $x++; ?>
	<?php endwhile; ?>            		
	
	<div class="archive_nav">
		<div class="left"><?php previous_posts_link('&lt;&lt; PREVIOUS'); ?></div>
		<div class="right"><?php next_posts_link('NEXT &gt;&gt;'); ?></div>
		<div class="clear"></div>
	</div><!--//archive_nav-->	
	
	<div class="clear"></div>
	
<?php get_footer(); ?>            	