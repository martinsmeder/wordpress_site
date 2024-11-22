<footer>
    <!-- Note: Should be customizable. -->

    <div class="top-left">
        <!-- Company icon + company name -->
        <!-- Fake address  -->
    </div>

    <div class="top-right">
        <!-- Home -->
        <!-- About us -->
        <!-- Projects -->
        <!-- Contact us -->
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