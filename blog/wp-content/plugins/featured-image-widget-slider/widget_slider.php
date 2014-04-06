<?php
/**
 * Plugin Name:  Widget Slider
 * Description: Featured Image Widget Slider is a plugin by which you can get 10 newest featured image from a selected category in a sidebar widget as a slider -- Published by CuvixSystem.com

 * Version: 1.0
 * Author: Sourav Sarkar
 * Author URI: http://CuvixSystem.com/
 */



function my_scripts_method() {
		//wp_deregister_script('jquery');
		//wp_register_script('jquery', plugins_url() .'/featured-image-widget-slider/jquery.min.js', false, '1.9');
		wp_enqueue_script('featured-image-widget-slider', plugins_url() . '/featured-image-widget-slider/jquery.tinycarousel.min.js', array( 'jquery' ));
		wp_enqueue_script('jquery');
		
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' ); // wp_enqueue_scripts action hook to link only on the front-end


function theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'custom-style', 
    plugins_url() . '/featured-image-widget-slider/custom-style.css', 
    array(), 
    '20120208', 
    'all' );

  // enqueing:
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');


add_action( 'widgets_init', 'category_widget' );


function category_widget() {
	register_widget( 'Category_Widget' );
}

class Category_Widget extends WP_Widget {

	function Category_Widget() {
		$widget_ops = array( 'classname' => 'example', 'description' => __('A widget that displays Category featured Image in Slider ', 'example') );
		
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'category_slider' );
		
		$this->WP_Widget( 'category_slider', __('Featured Image Widget Slider', 'example'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$category_name = $instance['category_name'];
		$sl_width = $instance['sl_width'];
		$sl_height = $instance['sl_height'];
		/*$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;*/

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

			

		
		?>
        <script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#slideshow').fadeSlideShow();
});
</script>
	<div id="slideshowWrapper" style="width:<?php echo $sl_width+10; ?>px;height:<?php echo $sl_height+50; ?>px;">
		
		<div class="viewport" >
			<ul  id="slideshow" style="width:<?php echo $sl_width+5; ?>px;height:<?php echo $sl_height+20; ?>px;">
<?php									global $wp_query;
//$args = array('category_name' => 'slider' );

query_posts( 'category_name='.$category_name );
$i=0;
while ( have_posts() ) : the_post();
	if (has_post_thumbnail()){
	 ?>
	 <li style="width:<?php echo $sl_width+10; ?>px;height:<?php echo $sl_height+20; ?>px">
	 <center><b><?php the_title() ?></b></center>
	<?php 
	add_image_size( 'category-thumb', $sl_width ); 
	?><a href="<?php the_permalink(); ?>">
	<?php
	the_post_thumbnail('category-thumb',array('title' => get_the_title())); ?>
	<?php
	/*the_content();*/
	/*echo '</div>';*/
	?>
	</a>
	<?php
	
	echo '</li>';
		$i=$i+1;
		if($i==10)
		{
			break;
		}
	}
endwhile;

// Reset Query
wp_reset_query();
  ?> 
  </ul>
	
				</div>
		
			</div>


		
		<?php

		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['sl_width'] = strip_tags( $new_instance['sl_width'] );
		$instance['sl_height'] = strip_tags( $new_instance['sl_height'] );
		$instance['category_name'] = strip_tags( $new_instance['category_name'] );
		/*$instance['show_info'] = $new_instance['show_info'];*/

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Category Slider', 'example'), 'name' => __('Category Slider', 'example'),'sl_width' => __('150', 'sl_width'),'sl_height' => __('190', 'sl_height'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:80%;" />
		</p>
<p>
<?php  $cate= $instance['category_name'];  ?>
		<select id="<?php echo $this->get_field_id( 'category_name' ); ?>" name="<?php echo $this->get_field_name( 'category_name' ); ?>" > 
 <option value=""><?php echo esc_attr(__('Select Category')); ?></option> 
 <?php 
  $categories=  get_categories(); 
  foreach ($categories as $category) {
  	$option = '<option value="'.$category->category_nicename.'" ';
	if($category->category_nicename==$cate){
		$option .='selected >';
	}
	else{
		$option .=' >';
	}
	$option .= $category->cat_name;	
	$option .= '</option>';
	echo $option;
  }
 ?>
</select> </p>
		
<p>
			<label for="<?php echo $this->get_field_id( 'sl_width' ); ?>"><?php _e('Width:', 'sl_width'); ?></label>
			<input id="<?php echo $this->get_field_id( 'sl_width' ); ?>" name="<?php echo $this->get_field_name( 'sl_width' ); ?>" value="<?php echo $instance['sl_width']; ?>" style="width:20%;" /> px
		</p>
<p>
			<label for="<?php echo $this->get_field_id( 'sl_height' ); ?>"><?php _e('Height:', 'sl_height'); ?></label>
			<input id="<?php echo $this->get_field_id( 'sl_height' ); ?>" name="<?php echo $this->get_field_name( 'sl_height' ); ?>" value="<?php echo $instance['sl_height']; ?>" style="width:20%;" /> px
		</p>		

	<?php
	}
}

?>