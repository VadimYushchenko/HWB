<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 1/5/14
 * Time: 5:46 PM
 */
?>





<!--Blog posts-->


									<!--Post-->
									<div class="post ">


										<!--Meta-->
										<?php hbw_posted_on() ?>
										<!--End meta-->


										<!--Post inner-->
										<div class="postInner">
										<!--Post image-->
										<div class="postImage">
											<a href="<?php  ?>">
												<img src="images/sliderImages/post2.jpg" alt="">
											</a>
										</div>
									<!--End post image-->


									<!--Post content-->

 <div class="postContent">
     <div class="postTitle">
<?php
if ( is_single() ) :
    the_title( '<h1 class="entry-title">', '</h1>' );
else :
    the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
endif;
?>

<!--										<h1><a href="blog_single.html">Blog Post With Image</a></h1>-->
										<?php hwb_author() ?>
										<span class="metaCategory">| <?php the_category('|','',get_the_ID()) ?></span>
     <?php
     if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
     ?>
     <span class="metaComment">| <?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
     <?php
     endif;

     edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
     ?>



										<?php
                                            the_content( __( 'Read more', 'twentyfourteen' ) );
                                            wp_link_pages( array(
                                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
                                                'after'       => '</div>',
                                                'link_before' => '<span>',
                                                'link_after'  => '</span>',
                                            ) );
                                            ?>


									</div>
									<!--End post inner-->
									</div>
									<!--End post content-->

									</div>
									<!--End post-->
