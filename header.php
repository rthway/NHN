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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Top Bar -->
<div class="top-bar bg-primary text-white py-2">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex gap-2 align-items-center">
            <span><strong>Follow Us</strong></span>
            <span>|</span>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_facebook', '#')); ?>" class="text-white"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_twitter', '#')); ?>" class="text-white ms-2"><i class="bi bi-twitter"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_instagram', '#')); ?>" class="text-white ms-2"><i class="bi bi-instagram"></i></a>
            <a href="<?php echo esc_url(get_theme_mod('nhn_social_youtube', '#')); ?>" class="text-white ms-2"><i class="bi bi-youtube"></i></a>
        </div>
        <div class="d-flex gap-3 align-items-center flex-wrap mt-2 mt-md-0">
            <?php if(get_theme_mod('nhn_phone')): ?>
                <span><i class="bi bi-telephone-fill me-1"></i><?php echo esc_html(get_theme_mod('nhn_phone')); ?></span>
            <?php endif; ?>
            <?php if(get_theme_mod('nhn_address')): ?>
                <span><i class="bi bi-geo-alt-fill me-1"></i><?php echo esc_html(get_theme_mod('nhn_address')); ?></span>
            <?php endif; ?>
            <?php if(get_theme_mod('nhn_language')): ?>
                <span><i class="bi bi-globe2 me-1"></i><?php echo esc_html(get_theme_mod('nhn_language')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header py-3 bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <!-- Logo + Site Title -->
        <div class="d-flex align-items-center gap-2">
            <a href="<?php echo esc_url(home_url()); ?>">
                <?php if(get_theme_mod('nhn_logo')): ?>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'navbar-nav ms-auto',
                    'depth' => 2,
                    'fallback_cb' => '__return_false',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </nav>

        <!-- Donate Button -->
        <a href="#" class="donate-btn btn btn-success ms-3"><i class="bi bi-check-circle-fill"></i> DONATE NOW</a>
    </div>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Custom JS for Mobile Dropdown Fix -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const dropdownLinks = document.querySelectorAll('.navbar-nav .menu-item-has-children > a');

  dropdownLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      if (window.innerWidth < 992) {
        e.preventDefault();

        const dropdown = this.nextElementSibling;
        if (dropdown && dropdown.classList.contains('dropdown-menu')) {
          dropdown.classList.toggle('show');
        }
      }
    });
  });

  // Reset dropdowns when resizing back to desktop
  window.addEventListener('resize', function () {
    if (window.innerWidth >= 992) {
      document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.remove('show'));
    }
  });
});
</script>

<!-- Custom CSS -->
<style>
/* Desktop Only: Disable parent link click & show submenu on hover */
@media (min-width: 992px) {
  .navbar-nav .menu-item-has-children > a.dropdown-toggle {
    pointer-events: none;
    cursor: default;
  }

  .navbar-nav .menu-item-has-children:hover > .dropdown-menu {
    display: block;
  }
}

/* Dropdown arrow */
.navbar-nav .menu-item-has-children > a.dropdown-toggle::after {
  content: none;
  font-size: 0.6em;
  margin-left: 5px;
}

/* Mobile submenu styles */
@media (max-width: 991px) {
  .navbar-nav .dropdown-menu {
    display: none;
    position: static;
    float: none;
    width: 100%;
    margin: 0;
    padding: 0.5rem 1rem;
    background: #f8f9fa;
    border: none;
  }
  .navbar-nav .dropdown-menu.show {
    display: block;
  }
}
</style>

<?php wp_body_open(); ?>
