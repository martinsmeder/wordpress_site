<?php

// Register the primary navigation menu
function register_my_menus() {
    register_nav_menu('header-menu', __('Header Menu'));
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
    wp_enqueue_style('index', get_template_directory_uri() . '/styles/index.css', array(), '1.0');
    wp_enqueue_style('header', get_template_directory_uri() . '/styles/header.css', array(), '1.0');
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css', array(), '1.0');
    wp_enqueue_style('footer', get_template_directory_uri() . '/styles/footer.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
add_filter('show_admin_bar', '__return_false'); // Hide invisible admin bar

?>