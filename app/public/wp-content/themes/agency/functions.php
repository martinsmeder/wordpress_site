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
    wp_enqueue_style('home', get_template_directory_uri() . '/styles/home.css', array(), '1.0');
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

function visuals_customizer($wp_customize) {
    $wp_customize->add_section('visuals_section', array(
        'title'    => __('Visuals Section', 'theme-textdomain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('visuals_image1');
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'visuals_image1',
        array(
            'label'    => __('First Image', 'theme-textdomain'),
            'section'  => 'visuals_section',
            'settings' => 'visuals_image1',
        )
    ));

    $wp_customize->add_setting('visuals_image2');
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'visuals_image2',
        array(
            'label'    => __('Second Image', 'theme-textdomain'),
            'section'  => 'visuals_section',
            'settings' => 'visuals_image2',
        )
    ));

    $wp_customize->add_setting('visuals_image3');
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'visuals_image3',
        array(
            'label'    => __('Third Image', 'theme-textdomain'),
            'section'  => 'visuals_section',
            'settings' => 'visuals_image3',
        )
    ));
}
add_action('customize_register', 'visuals_customizer');

function projects_customizer($wp_customize) {
    $wp_customize->add_section('projects_section', array(
        'title'    => __('Projects Section', 'theme-textdomain'),
        'priority' => 30,
    ));

    // Add up to 5 images for projects
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("projects_image$i");
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "projects_image$i",
            array(
                'label'    => __("Project Image $i", 'theme-textdomain'),
                'section'  => 'projects_section',
                'settings' => "projects_image$i",
            )
        ));
    }
}
add_action('customize_register', 'projects_customizer');

?>