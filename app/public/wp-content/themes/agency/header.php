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
    // Display desktop menu
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => 'nav',          // Wraps the menu in a <nav> element
        'container_class' => 'main-nav', // Adds a class to the <nav> element
    ));
    ?>

    <div class="contact">
        <button onclick="window.location.href='<?php echo site_url('/contact'); ?>'">Contact Us</button>
    </div>

    <img src="<?php echo get_template_directory_uri(); ?>/images/menu-icons/hamburger-menu.png" class="menu-icon" alt="Menu">

    <div class="dropdown-menu">
        <?php
        // Display mobile menu
        wp_nav_menu(array(
            'theme_location' => 'header-menu-mobile',
            'container' => false,
            'menu_class' => '', // Avoid extra styling
        ));
        ?>
    </div>
</header>