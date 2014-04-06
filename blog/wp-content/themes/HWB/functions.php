<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 1/5/14
 * Time: 1:27 AM
 */

function hwb_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->add_section( 'featured_content', array(
        'title'       => __( 'Featured Content', 'twentyfourteen' ),
        'description' => sprintf( __( 'Use a <a href="%1$s">tag</a> to feature your posts. If no posts match the tag, <a href="%2$s">sticky posts</a> will be displayed instead.', 'twentyfourteen' ), admin_url( '/edit.php?tag=featured' ), admin_url( '/edit.php?show_sticky=1' ) ),
        'priority'    => 130,
    ) );

}
add_action( 'customize_register', 'hwb_customize_register' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

function twentyfourteen_widgets_init() {
    require get_template_directory() . '/inc/widgets.php';
    register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

if ( ! function_exists( 'hwb_setup' ) ) :
    /**
     * Twenty Fourteen setup.
     *
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support post thumbnails.
     *
     * @since Twenty Fourteen 1.0
     */
    function hwb_setup() {

        /*
         * Make Twenty Fourteen available for translation.
         *
         * Translations can be added to the /languages/ directory.
         * If you're building a theme based on Twenty Fourteen, use a find and
         * replace to change 'twentyfourteen' to the name of your theme in all
         * template files.
         */
//        load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

        // This theme styles the visual editor to resemble the theme style.
//        add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // Enable support for Post Thumbnails, and declare two sizes.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 672, 372, true );
        add_image_size( 'twentyfourteen-full-width', 630, 0, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
            'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list',
        ) );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ) );

        // This theme allows users to set a custom background.
//        add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
//            'default-color' => 'f5f5f5',
//        ) ) );

        // Add support for featured content.
//        add_theme_support( 'featured-content', array(
//            'featured_content_filter' => 'twentyfourteen_get_featured_posts',
//            'max_posts' => 6,
//        ) );

        // This theme uses its own gallery styles.
        add_filter( 'use_default_gallery_style', '__return_false' );
    }
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'hwb_setup' );