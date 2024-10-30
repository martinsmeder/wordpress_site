<?php
// Enqueue Styles and Scripts
function agency_theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'agency_theme_enqueue_styles');

// Theme Support Features
function agency_theme_setup() {
    add_theme_support('post-thumbnails'); // Enable featured images
}
add_action('after_setup_theme', 'agency_theme_setup');
?>