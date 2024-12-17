<?php
/**
 * Plugin Name: Simple Welcome Message
 * Description: A very simple plugin that adds a welcome message via a shortcode.
 * Version: 1.0
 * Author: Martin Smeder
 */

// Register the shortcode
function simple_welcome_message() {
    return '<div class="welcome-message"><h2>Welcome to Our Web Agency!</h2><p>We create beautiful and functional websites tailored to your needs.</p></div>';
}
add_shortcode('welcome_message', 'simple_welcome_message');