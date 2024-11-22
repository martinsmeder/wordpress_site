<footer>
    <!-- Note: Should be customizable. -->

    <div class="top">
        <div class="left">
            <div class="name-and-logo">
                <?php 
                // Display logo from: appearance > customize > site identity
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <h3><?php bloginfo('name'); ?></h3>
            </div>
            
            <div class="address">
                <p>1234 Fake Street</p>
                <p>Fake City, IL 00000</p>
                <p>Fake Country</p>
            </div>
            
        </div>

        <div class="right">
            <h3>Navigation</h3>
            <?php
                // Display mobile menu
                wp_nav_menu(array(
                    'theme_location' => 'header-menu-mobile',
                    'container' => false,
                    'menu_class' => '', // Avoid extra styling
                ));
            ?>
        </div>
    </div>

    <div class="bottom">
        <div class="left">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
        </div>
        
        <div class="right">
            <?php if (is_active_sidebar('footer-social-icons')) : ?>
                <?php dynamic_sidebar('footer-social-icons'); ?>
            <?php endif; ?>
        </div>
    </div>
    
</footer>

