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
    <?php
    /* Template Name: Projects */
    get_header(); 
    ?>

    <main class="projects-wrapper">
    <?php
        // Heading
        $heading = get_post_meta(get_the_ID(), 'heading', true) ?: 'Default Heading';

        // Cards
        $description1 = get_post_meta(get_the_ID(), 'description1', true) ?: 'Default Description 1';
        $description2 = get_post_meta(get_the_ID(), 'description2', true) ?: 'Default Description 2';
        $description3 = get_post_meta(get_the_ID(), 'description3', true) ?: 'Default Description 3';
        $description4 = get_post_meta(get_the_ID(), 'description4', true) ?: 'Default Description 4';
        $description5 = get_post_meta(get_the_ID(), 'description5', true) ?: 'Default Description 5';
        
        $button_text1 = get_post_meta(get_the_ID(), 'button_text1', true) ?: 'Default Button Text 1';
        $button_text2 = get_post_meta(get_the_ID(), 'button_text2', true) ?: 'Default Button Text 2';
        $button_text3 = get_post_meta(get_the_ID(), 'button_text3', true) ?: 'Default Button Text 3';
        $button_text4 = get_post_meta(get_the_ID(), 'button_text4', true) ?: 'Default Button Text 4';
        $button_text5 = get_post_meta(get_the_ID(), 'button_text5', true) ?: 'Default Button Text 5';
        
        $button_link1 = get_post_meta(get_the_ID(), 'button_link1', true) ?: '#';
        $button_link2 = get_post_meta(get_the_ID(), 'button_link2', true) ?: '#';
        $button_link3 = get_post_meta(get_the_ID(), 'button_link3', true) ?: '#';
        $button_link4 = get_post_meta(get_the_ID(), 'button_link4', true) ?: '#';
        $button_link5 = get_post_meta(get_the_ID(), 'button_link5', true) ?: '#';

        // Link to full portfolio
        $portfolio_link_text = get_post_meta(get_the_ID(), 'portfolio_link_text', true) ?: 'Default Portfolio Link Text';
        $portfolio_link = get_post_meta(get_the_ID(), 'portfolio_link', true) ?: '#';
    ?>


        <section class="projects-content">
            <h1 class="projects-heading"><?php echo esc_html($heading); ?></h1>

            <div class="cards-list">
                <div class="card">
                    <?php if ($image1 = get_theme_mod('projects_image1')): ?>
                        <img src="<?php echo esc_url($image1); ?>" class="projects-image" alt="Image 1">
                    <?php endif; ?>
                    <div class="info">
                        <p><?php echo esc_html($description1); ?></p>
                        <button class="link-button" onclick="window.open('<?php echo esc_url($button_link1); ?>', '_blank');">
                            <?php echo esc_html($button_text1); ?>
                        </button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image2 = get_theme_mod('projects_image2')): ?>
                        <img src="<?php echo esc_url($image2); ?>" class="projects-image" alt="Image 2">
                    <?php endif; ?>
                    <div class="info">
                        <p><?php echo esc_html($description2); ?></p>
                        <button class="link-button" onclick="window.open('<?php echo esc_url($button_link2); ?>', '_blank');">
                            <?php echo esc_html($button_text2); ?>
                        </button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image3 = get_theme_mod('projects_image3')): ?>
                        <img src="<?php echo esc_url($image3); ?>" class="projects-image" alt="Image 3">
                    <?php endif; ?>
                    <div class="info">
                        <p><?php echo esc_html($description3); ?></p>
                        <button class="link-button" onclick="window.open('<?php echo esc_url($button_link3); ?>', '_blank');">
                            <?php echo esc_html($button_text3); ?>
                        </button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image4 = get_theme_mod('projects_image4')): ?>
                        <img src="<?php echo esc_url($image4); ?>" class="projects-image" alt="Image 4">
                    <?php endif; ?>
                    <div class="info">
                        <p><?php echo esc_html($description4); ?></p>
                        <button class="link-button" onclick="window.open('<?php echo esc_url($button_link4); ?>', '_blank');">
                            <?php echo esc_html($button_text4); ?>
                        </button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image5 = get_theme_mod('projects_image5')): ?>
                        <img src="<?php echo esc_url($image5); ?>" class="projects-image" alt="Image 5">
                    <?php endif; ?>
                    <div class="info">
                        <p><?php echo esc_html($description5); ?></p>
                        <button class="link-button" onclick="window.open('<?php echo esc_url($button_link5); ?>', '_blank');">
                            <?php echo esc_html($button_text5); ?>
                        </button>
                    </div>
                </div>
            </div>
            
            <a class="portfolio-link" target="_blank" href="<?php echo esc_url($portfolio_link); ?>">
                <?php echo esc_html($portfolio_link_text); ?>
            </a>
        </section>
    </main>

    <?php get_footer(); ?>
</body>
</html>