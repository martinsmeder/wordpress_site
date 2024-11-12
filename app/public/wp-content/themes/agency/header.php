<header>
    <div class="name-and-logo"> 
    
    <?php 
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    ?>
        <!-- <img src="http://wordpress-site.local/wp-content/uploads/2024/11/glorious-software-logo.png" alt="Logo" class="header-logo" /> -->
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
</header>