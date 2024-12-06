<!DOCTYPE html>
<html>
<head>
    <!-- Match viewport to device's screen width to prevent automatic scaling -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bloginfo: Pulls values from WordPress settings   -->
    <title><?php bloginfo('name'); ?></title> 
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Style -->
    <?php 
    wp_head(); 
    ?>
</head>
<body>
    <?php get_header(); ?>
    
    <main class="home">
    <?php
        // Hero section
        $headline = get_post_meta(get_the_ID(), 'headline', true) ?: 'Default Headline';
        $subtext = get_post_meta(get_the_ID(), 'subtext', true) ?: 'Default Subtext';
        $cta_text = get_post_meta(get_the_ID(), 'cta_text', true) ?: 'Default CTA Text';
        $cta_link = get_post_meta(get_the_ID(), 'cta_link', true) ?: '#';

        // Visuals section
        $visuals_heading = get_post_meta(get_the_ID(), 'visuals_heading', true) ?: 'Default Visuals Heading';
        $visuals_description = get_post_meta(get_the_ID(), 'visuals_description', true) ?: 'Default Visuals Description';
        $visuals_button_text = get_post_meta(get_the_ID(), 'visuals_button_text', true) ?: 'Default Visuals Button Text';
        $visuals_button_link = get_post_meta(get_the_ID(), 'visuals_button_link', true) ?: '#';
    ?>
        <section class="hero">
            <div class="intro">
                <h1><?php echo esc_html($headline); ?></h1>
                <p><?php echo esc_html($subtext); ?></p>
                <button class="cta-button" onclick="window.location.href='<?php echo esc_url($cta_link); ?>';">
                    <?php echo esc_html($cta_text); ?>
                </button>
            </div>
            
           <div class="arrow">
                <img src="<?php echo get_template_directory_uri(); ?>/images/misc-icons/arrow.png" class="arrow-icon" alt="Down Arrow">
           </div>
        </section>

        <section class="visuals">
            <div class="description">
                <h1><?php echo esc_html($visuals_heading); ?></h1>
                <p><?php echo esc_html($visuals_description); ?></p>
            </div>

            <button class="projects-button" onclick="window.location.href='<?php echo esc_url($visuals_button_link); ?>';">
                <?php echo esc_html($visuals_button_text); ?>
            </button>

            <div class="images">
                <?php if ($image1 = get_theme_mod('visuals_image1')): ?>
                    <img src="<?php echo esc_url($image1); ?>" class="visual-image" alt="Image 1">
                <?php endif; ?>

                <?php if ($image2 = get_theme_mod('visuals_image2')): ?>
                    <img src="<?php echo esc_url($image2); ?>" class="visual-image" alt="Image 2">
                <?php endif; ?>

                <?php if ($image3 = get_theme_mod('visuals_image3')): ?>
                    <img src="<?php echo esc_url($image3); ?>" class="visual-image" alt="Image 3">
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>
</body>
</html>

