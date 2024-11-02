<header>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>

    <?php
    // Display the registered menu
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => 'nav',          // Wraps the menu in a <nav> element
        'container_class' => 'main-nav', // Adds a class to the <nav> element
    ));
    ?>
</header>