<!DOCTYPE html>
<html>
<head>
    <!-- bloginfo: Pulls values from WordPress settings   -->
    <title><?php bloginfo('name'); ?></title> 
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
    <?php get_header(); ?>
    
    <main>
        <?php 
        if (have_posts()) : 
            while (have_posts()) : 
                the_post(); 
                the_content(); // Displays content from WordPress editor
            endwhile; 
        else :
            echo '<p>No content available.</p>'; 
        endif; 
        ?>
    </main>

    <?php get_footer(); ?>
</body>
</html>
