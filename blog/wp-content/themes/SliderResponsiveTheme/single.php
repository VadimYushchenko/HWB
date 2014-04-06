<?php get_header(); ?>
	<?php $shortname = "typographic"; ?>
	
	<section id="single_cont">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>          
	
			<h1 class="single_title"><?php the_title(); ?></h1>
			<div class="single_inside_content">
			
			<?php the_content(); ?>
			
			</div><!--//single_inside_content-->
			<br /><br />
			
			<?php comments_template(); ?>
		
		<?php endwhile; else: ?>
			<h3>Sorry, no posts matched your criteria.</h3>
		<?php endif; ?>                    		
		
	</section><!--//single_cont-->
	
	<section class="single_rand_cont">
	
		<?php
		$args = array(
			 'post_type' => 'post',
			 'posts_per_page' => 4,
			 'orderby' => 'rand'
			 );
		query_posts($args);
		$x = 0;
		while (have_posts()) : the_post(); ?> 		
			
			<?php if($x == 3) { ?>
			<div class="home_post_box home_post_box_last">
			<?php } else { ?>
			<div class="home_post_box">
			<?php } ?>
			
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-post-box'); ?></a>
				<div class="home_post_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			</div><!--//home_post_box-->		
		
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	
	</section><!--//single_rand_cont-->
	
	<div class="clear"></div>
	
<?php get_footer(); ?>            	