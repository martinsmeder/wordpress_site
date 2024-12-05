<?php

// Register navigation menus
function register_my_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
        'header-menu-mobile' => __('Header Menu Mobile'),
    ));
}
add_action('init', 'register_my_menus');

function display_content() {
    if (have_posts()) : 
        while (have_posts()) : 
            the_post(); // Displays the post
            ?>
            <!-- Wraps the title in an <h2> tag and displays it -->
            <h2><?php the_title(); ?></h2> 
            <?php
            the_content(); // Displays the post content
        endwhile;
    else :
        echo '<p>No content available.</p>'; 
    endif;
}

function agency_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 40,  // Expected height
        'width'       => 40, // Expected width
        'flex-height' => true, // Flexible height
        'flex-width'  => true, // Flexible width
    ));
}
add_action('after_setup_theme', 'agency_custom_logo_setup');

function enqueue_styles() {
    // Enqueue global styles
    wp_enqueue_style('index', get_template_directory_uri() . '/styles/index.css', array(), '1.0');
    wp_enqueue_style('header', get_template_directory_uri() . '/styles/header.css', array(), '1.0');
    wp_enqueue_style('footer', get_template_directory_uri() . '/styles/footer.css', array(), '1.0');

    // Enqueue specific styles
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css', array(), '1.0');
    wp_enqueue_style('page-projects', get_template_directory_uri() . '/styles/page-projects.css', array(), '1.0');
    wp_enqueue_style('page-about-us', get_template_directory_uri() . '/styles/page-about-us.css', array(), '1.0');
    wp_enqueue_style('page-contact', get_template_directory_uri() . '/styles/page-contact.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
add_filter('show_admin_bar', '__return_false'); // Hide invisible admin bar

function enqueue_scripts() {
    wp_enqueue_script('navigation', get_template_directory_uri() . '/javascript/navigation.js', array('jquery'), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function mytheme_register_footer_widgets() {
    register_sidebar([
        'name'          => 'Footer Social Icons',
        'id'            => 'footer-social-icons',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'mytheme_register_footer_widgets');

?>