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
    
    <main>
    <?php
    if (is_front_page()) { 
        $headline = get_post_meta(get_the_ID(), 'headline', true) ?: 'Default Headline';
        $subtext = get_post_meta(get_the_ID(), 'subtext', true) ?: 'Default Subtext';
        $cta_text = get_post_meta(get_the_ID(), 'cta_text', true) ?: 'Default CTA Text';
        $cta_link = get_post_meta(get_the_ID(), 'cta_link', true) ?: '#';
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
        <!-- Add visuals: A clean hero image or graphic showcasing a website design.  -->
        </section>

       
    <?php
    } else {
        if (have_posts()) {
            while (have_posts()) {
                the_post();
    ?>
                <section class="page-content">
                    <h1><?php the_title(); ?></h1>
                    <div><?php the_content(); ?></div>
                </section>
    <?php
            }
        }
    }
    ?>
    </main>

    <?php get_footer(); ?>
</body>
</html>
