<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="Charity, NGO, Nonprofit, Fundraising, Donations, Social Work, Health, Education, NHN">
    <meta name="author" content="<?php bloginfo('name'); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:url" content="<?php echo esc_url(home_url()); ?>">
    <?php if (get_theme_mod('nhn_logo')): ?>
        <meta property="og:image" content="<?php echo esc_url(get_theme_mod('nhn_logo')); ?>">
    <?php else: ?>
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/logo-01.png">
    <?php endif; ?>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <?php if (get_theme_mod('nhn_logo')): ?>
        <meta name="twitter:image" content="<?php echo esc_url(get_theme_mod('nhn_logo')); ?>">
    <?php else: ?>
        <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/logo-01.png">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Top Bar -->
<div class="top-bar bg-primary text-white py-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-2 align-items-center">
            <span><strong>Follow Us</strong></span>
            <span>|</span>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_facebook', '#')); ?>" class="text-white"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_twitter', '#')); ?>" class="text-white ms-2"><i class="bi bi-twitter"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_instagram', '#')); ?>" class="text-white ms-2"><i class="bi bi-instagram"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_youtube', '#')); ?>" class="text-white ms-2"><i class="bi bi-youtube"></i></a>
        </div>
        <div class="d-flex gap-3 align-items-center">
            <span><i class="bi bi-telephone-fill me-1"></i><?php echo esc_html(get_theme_mod('nhn_phone')); ?></span>
            <span><i class="bi bi-geo-alt-fill me-1"></i><?php echo esc_html(get_theme_mod('nhn_address')); ?></span>
            <span><i class="bi bi-globe2 me-1"></i><?php echo esc_html(get_theme_mod('nhn_language')); ?></span>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="d-flex align-items-center gap-2">
            <a href="<?php echo home_url(); ?>">
                <?php if (get_theme_mod('nhn_logo')): ?>
                    <img src="<?php echo esc_url(get_theme_mod('nhn_logo')); ?>" alt="Logo" width="70" height="70">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-01.png" alt="Logo" width="70" height="70">
                <?php endif; ?>
            </a>
            <div>
                <h4 class="mb-0"><?php bloginfo('name'); ?></h4>
                <small><?php bloginfo('description'); ?></small>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg p-0">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'navbar-nav me-lg-3',
                'fallback_cb' => '__return_false',
                'depth' => 2,
                'walker' => new WP_Bootstrap_Navwalker(), // optional: use a bootstrap walker
            ));
            ?>
        </nav>

        <!-- Donate Button & Mobile Toggle -->
        <div class="d-flex align-items-center gap-3">
            <a href="#" class="donate-btn btn btn-success"><i class="bi bi-check-circle-fill"></i> DONATE NOW</a>
            <button class="navbar-toggler d-lg-none border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <i class="bi bi-grid-3x3-gap-fill fs-4 text-muted"></i>
            </button>
        </div>
    </div>
</header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>