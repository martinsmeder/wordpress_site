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