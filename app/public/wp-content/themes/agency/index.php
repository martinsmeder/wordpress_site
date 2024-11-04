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
        <?php display_content(); ?>
    </main>

    <?php get_footer(); ?>
</body>
</html>
