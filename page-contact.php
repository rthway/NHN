<?php
$contact_subheading = get_theme_mod('contact_subheading', 'Help With Featured Cause');
$contact_heading = get_theme_mod('contact_heading', 'Contact Us');
$locations = unserialize(get_theme_mod('contact_locations', ''));

?>

<!-- CONTACT US -->
<header class="text-center mb-5">
  <p class="text-danger fs-6 fst-italic"><?php echo esc_html($contact_subheading); ?></p>
  <h1 class="display-4 fw-bold text-dark"><?php echo esc_html($contact_heading); ?></h1>
</header>
<section class="contact-section">
  <div class="contact-wrapper">

    <!-- Left Column: Contact Form -->
    <div class="contact-form">
      <?php echo do_shortcode('[contact-form-7 id="123" title="Contact form 1"]'); ?>
    </div>

    <!-- Right Column: Locations -->
    <div class="contact-info">
    <h3>Our Locations</h3>

    <!-- Head Office -->
    <div class="location">
        <h4><?php echo esc_html(get_theme_mod('head_office_title', 'Head Office')); ?></h4>
        <p><?php echo nl2br(esc_html(get_theme_mod('head_office_address', ''))); ?></p>
        <p><strong>Phone:</strong> <?php echo esc_html(get_theme_mod('head_office_phone', '')); ?></p>
        <p><strong>Email:</strong> <?php echo esc_html(get_theme_mod('head_office_email', '')); ?></p>
    </div>

    <!-- Branch Office -->
    <div class="location">
        <h4><?php echo esc_html(get_theme_mod('branch_office_title', 'Branch Office')); ?></h4>
        <p><?php echo nl2br(esc_html(get_theme_mod('branch_office_address', ''))); ?></p>
        <p><strong>Phone:</strong> <?php echo esc_html(get_theme_mod('branch_office_phone', '')); ?></p>
        <p><strong>Email:</strong> <?php echo esc_html(get_theme_mod('branch_office_email', '')); ?></p>
    </div>

</div>

  </div>
</section>

<style>
    .contact-form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form textarea {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
}

.contact-form button.wpcf7-submit {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 0.75rem 1.5rem;
    cursor: pointer;
    border-radius: 0.25rem;
    font-size: 1rem;
}

.contact-form button.wpcf7-submit:hover {
    background-color: #b02a37;
}
</style>
