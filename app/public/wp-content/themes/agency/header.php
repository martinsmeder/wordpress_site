<header>
    <div class="name-and-logo"> 
        <?php 
        // Display logo from: appearance > customize > site identity
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?>
        <h3><?php bloginfo('name'); ?></h3>    
    </div>
    
    <?php
    // Display the registered menu
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => 'nav',          // Wraps the menu in a <nav> element
        'container_class' => 'main-nav', // Adds a class to the <nav> element
    ));
    ?>

    <div class="contact">
            <a href="<?php echo site_url('/contact'); ?>">Contact Us</a>
    </div> 

    <img src="<?php echo get_template_directory_uri(); ?>/images/hamburger-menu.png" class="menu-icon" alt="Hamburger Menu">

    <div class="dropdown-menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'container' => false,
            'menu_class' => '', // Avoid extra styling
        ));
        ?>
        <a href="<?php echo site_url('/contact'); ?>" class="contact">Contact Us</a>
    </div>
</header>