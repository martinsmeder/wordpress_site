<?php
// Register the primary navigation menu
function register_my_menus() {
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menus');
?>

<?php
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
?>

<?php
function agency_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 40,  // Expected height
        'width'       => 40, // Expected width
        'flex-height' => true, // Flexible height
        'flex-width'  => true, // Flexible width
    ));
}
add_action('after_setup_theme', 'agency_custom_logo_setup');
?>