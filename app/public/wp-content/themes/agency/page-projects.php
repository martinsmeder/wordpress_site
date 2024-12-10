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
        <section class="projects-content">
            <h1>
                <!-- Custom field for heading -->
            </h1>
            <div class="cards-list">
                <div class="card">
                    <?php if ($image1 = get_theme_mod('projects_image1')): ?>
                        <img src="<?php echo esc_url($image1); ?>" class="projects-image" alt="Image 1">
                    <?php endif; ?>
                    <div class="info">
                        <p>Description 1</p>
                        <button>Link 1</button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image1 = get_theme_mod('projects_image2')): ?>
                        <img src="<?php echo esc_url($image1); ?>" class="projects-image" alt="Image 2">
                    <?php endif; ?>
                    <div class="info">
                        <p>Description 2</p>
                        <button>Link 2</button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image1 = get_theme_mod('projects_image3')): ?>
                        <img src="<?php echo esc_url($image1); ?>" class="projects-image" alt="Image 3">
                    <?php endif; ?>
                    <div class="info">
                        <p>Description 3</p>
                        <button>Link 3</button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image1 = get_theme_mod('projects_image4')): ?>
                        <img src="<?php echo esc_url($image1); ?>" class="projects-image" alt="Image 4">
                    <?php endif; ?>
                    <div class="info">
                        <p>Description 4</p>
                        <button>Link 4</button>
                    </div>
                </div>
                <div class="card">
                    <?php if ($image1 = get_theme_mod('projects_image5')): ?>
                        <img src="<?php echo esc_url($image1); ?>" class="projects-image" alt="Image 5">
                    <?php endif; ?>
                    <div class="info">
                        <p>Description 5</p>
                        <button>Link 5</button>
                    </div>
                </div>
            </div>
            <button>
                <!-- Custom field for CTA button -->
            </button>
        </section>
    </main>

    <?php get_footer(); ?>
</body>
</html>