<!DOCTYPE html>
<html>
<head>
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
        <?php display_content(); ?>
    </main>

    <?php get_footer(); ?>
</body>
</html>
