	<?php $shortname = "typographic"; ?>
	<div class="clear"></div>
	<footer id="footer">
		<div class="left">
			<?php if(get_option($shortname.'_twitter_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_twitter_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter-icon.png" alt="twitter" /></a>
			<?php } ?>
			<?php if(get_option($shortname.'_facebook_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_facebook_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook-icon.png" alt="facebook" /></a>
			<?php } ?>
			<?php if(get_option($shortname.'_google_plus_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_google_plus_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/google-plus-icon.png" alt="google plus" /></a>
			<?php } ?>
			<?php if(get_option($shortname.'_dribbble_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_dribbble_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/dribbble-icon.png" alt="dribbble" /></a>
			<?php } ?>
			<?php if(get_option($shortname.'_pinterest_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_pinterest_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/pinterest-icon.png" alt="pinterest" /></a>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<div class="right">&copy; 2013 SLIDER WORDPRESS THEME.DEVELOPED BY <a href="http://www.dessign.net">DESSIGN.NET</a></div>
		<div class="clear"></div>
	</footer><!--//footer-->
 
 </section><!--//main_container-->
 
 <?php wp_footer(); ?>
 </body>
 </html>