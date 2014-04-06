<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 1/4/14
 * Time: 8:49 PM
 */

get_header();

?>

<!--Blog section-->
<section id="blog" class="clearfix  secSingle">


<!--Section title-->
<div class="secTitle external">

    <!--Overlay-->
    <div class="overlay">


    </div>
    <!--End overlay-->
</div>
<!--End section title-->


<!--Holder 1140-->
<div class="holder1140 clearfix">

<!--Blog content-->
<div id="blogContainer" class="clearfix">


<!--Blog posts-->
<div class="blogHolder blogPosts top">

    <?php
    if ( have_posts() ) :
        // Start the Loop.
        while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );

        endwhile;
        // Previous/next post navigation.
        twentyfourteen_paging_nav();

    else :
        // If no content, include the "No posts found" template.
        get_template_part( 'content', 'none' );

    endif;
    ?>


<!--Pagination-->
<div class=" postPagination clearfix">

    <div class="np">
        <div class="next"><a href="http://blog.hwb.uk.com"><i class="icon-left-thin"></i></a></div>
    </div>
</div>
<!--End pagination-->


</div>
<!--End blog posts-->
    <?php //get_sidebar( 'content' ); ?>
 <?php   //get_sidebar(); ?>

</div>
<!--End blog content-->

</div>
<!--End Holder 1140-->

<!--Call to action area-->
<div class="cta external">
    <p>Need our help, or want to get involved? <br>Do not hesitate to <a href="http://hwb.uk.com/index.html#contacts2">contact us</a>.</p>
</div>
<!--End call to action area-->

</section>
<!--End blog section-->

<?php
get_footer();
?>
</div>
<!--ENd wrapper-->

<!--Javascript-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-migrate-1.2.1.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.quicksand.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slides.min.jquery.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.tweet.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.totop.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/waypoints.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.appear.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.appear.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.timer.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.simple-text-rotator.js" type="text/javascript" ></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js" type="text/javascript"></script>





<script>

    //<![CDATA[

    //--------------------------------- Twitter feed --------------------------------//


    jQuery(".tweets").tweet({
        join_text: false,
        username: "BenaissaGhrib", // Change username here
        modpath: './twitter/',
        avatar_size: false,
        count: 1,
        auto_join_text_default: ' we said, ',
        auto_join_text_ed: ' we ',
        auto_join_text_ing: ' we were ',
        auto_join_text_reply: ' we replied to ',
        auto_join_text_url: ' we were checking out ',
        loading_text: 'Loading tweets...'

    });






    //--------------------------------- End twitter feed --------------------------------//

    //]]>
</script>


<!-- Google analytics -->


<!-- End google analytics -->


</body>
</html>