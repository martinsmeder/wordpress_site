<header>
    <h3><?php bloginfo('name'); ?></h3>

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