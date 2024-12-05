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
    /* Template Name: About Us */
    get_header(); 
    ?>

    <main>
        <section class="about-us-content">
            <h1>Welcome to about us</h1>
            <p>This is a custom template with its own styles.</p>

            <hr>
            <!-- ====================== Or ========================= -->
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </section>
    </main>

    <?php get_footer(); ?>
</body>
</html>