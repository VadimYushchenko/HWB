<?php
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>
	<?php $shortname = "typographic"; ?>
	
	<?php
	$args = array(
		 'category_name' => 'blog',
		 'post_type' => 'post',
		 'posts_per_page' => 4,
		 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
		 );
	query_posts($args);
	while (have_posts()) : the_post(); ?> 	
	
		<article class="blog_box">
			
			<div class="left">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-image'); ?></a>
			</div><!--//left-->
			
			<div class="right">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="blog_date"><?php the_time('F d, Y'); ?></p>
				
				<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) { ?>
					<p><?php echo ds_get_excerpt('135'); ?></p>
				<?php } else { ?>
					<p><?php echo ds_get_excerpt('225'); ?></p>
				<?php } ?>
				
				<p><a href="<?php the_permalink(); ?>" class="read_more">Read more...</a></p>
			</div><!--//right-->
			
			<div class="clear"></div>
			
		</article><!--//blog_box-->
	
	<?php endwhile; ?>
	
	<div class="clear"></div>
	
	<div class="archive_nav">
		<div class="left"><?php previous_posts_link('&lt;&lt; PREVIOUS'); ?></div>
		<div class="right"><?php next_posts_link('NEXT &gt;&gt;'); ?></div>
		<div class="clear"></div>
	</div><!--//archive_nav-->
	
	<?php wp_reset_query(); ?>
	
	<div class="clear"></div>
	
<?php get_footer(); ?>            	