<!-- bloginfo: Pulls values from WordPress settings   -->

<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
    <?php get_header(); ?>
    
    <main>
        <p>Greetings!</p>
        <p><?php echo 'This is a glorious custom theme for my ' . get_bloginfo('name') . '!' ?></p>
    </main>

    <?php get_footer(); ?>
</body>
</html>
