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
    /* Template Name: Contact */
    get_header(); 
    ?>

    <main class="contact-wrapper">
    <?php
        // Main CTA
        $main_cta_heading1 = get_post_meta(get_the_ID(), 'main_cta_heading1', true) ?: 'Default Main CTA Heading 1';
        $main_cta_heading2 = get_post_meta(get_the_ID(), 'main_cta_heading2', true) ?: 'Default Main CTA Heading 2';

        // Contact info
        $contact_address = get_post_meta(get_the_ID(), 'contact_address', true) ?: 'Default Contact Address';
        $contact_city = get_post_meta(get_the_ID(), 'contact_city', true) ?: 'Default Contact City';
        $contact_postal = get_post_meta(get_the_ID(), 'contact_postal', true) ?: 'Default Contact Postal';
        $contact_country = get_post_meta(get_the_ID(), 'contact_country', true) ?: 'Default Contact Country';

        // Email
        $email_cta1 = get_post_meta(get_the_ID(), 'email_cta1', true) ?: 'Default Email CTA 1';
        $email_cta2 = get_post_meta(get_the_ID(), 'email_cta2', true) ?: 'Default Email CTA 2';
        $email_address = get_post_meta(get_the_ID(), 'email_address', true) ?: 'default@email.com';
    ?>
        <section class="contact-content">
            <div class="main-cta">
                <h1><?php echo esc_html($main_cta_heading1); ?></h1>
                <h2><?php echo esc_html($main_cta_heading2); ?></h2>
            </div>

            <div class="email-wrapper">
                <div class="email">
                    <h3><?php echo esc_html($email_cta1); ?></h3>
                    <p><?php echo esc_html($email_cta2); ?></p>
                    <a href="mailto:<?php echo esc_html($email_address); ?>"><?php echo esc_html($email_address); ?></a>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>
</body>
</html>

