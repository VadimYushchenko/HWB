<?php get_header(); ?>
	<?php $shortname = "typographic"; ?>
	
	<?php if(get_option($shortname.'_disable_slideshow','') != "Yes") { ?>
	
		<section id="slideshow_cont">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide-prev.png" alt="prev" class="slide_prev" />
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide-next.png" alt="next" class="slide_next" />
			<div id="slideshow">
			
				<?php
				$slider_arr = array();
				$x = 0;
				$args = array(
					 'post_type' => 'post',
					 'meta_key' => 'ex_show_in_slideshow',
					 'meta_value' => 'Yes',
					 'posts_per_page' => 10
					 );
				query_posts($args);
				while (have_posts()) : the_post(); ?>                        
				
					<?php if($x == 0) { ?>
					<div class="slide_box first_slide_box">
					<?php } else { ?>
					<div class="slide_box">
					<?php } ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image'); ?></a>
						
					</div><!--//slide_box-->
				
				<?php array_push($slider_arr,get_the_ID()); ?>
				<?php $x++; ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>                                    							
			</div><!--//slideshow-->
		</section><!--//slideshow_cont-->
	<?php } ?>
	
	
	<?php
	$category_ID = get_category_id('blog');
	$args = array(
		 'post_type' => 'post',
		
		 'post__not_in' => $slider_arr,
		 //'cat' => '-' . $category_ID,
		 //'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
	 );
	query_posts($args);
	$x = 0;
	while (have_posts()) : the_post(); ?>                        			
	
		<?php if($x == 0) { ?>
			
			
		<?php } elseif($x == 1) { ?>
			
				
		<?php } elseif($x == 2) { ?>
			
				
		<?php } else { ?>
			
				
		<?php } ?>
		
			
		</div>
		
		<?php if($x == 2) { ?>
			<div class="clear"></div>
		<?php } ?>
	
	<?php $x++; ?>
	<?php endwhile; ?>        				
	
	
	<div class="clear"></div>
	
<?php get_footer(); ?>            	