<?php
/**
 * Template Name: Contact us Page
 * Description: Custom template for displaying a Contact Us page.
 */

get_header(); ?>

<!-- Hero Section -->
<section class="contact-hero">
  <div class="container">
    <div class="hero-content">
      <h1><?php echo esc_html(get_theme_mod('contact_heading', 'Get in Touch')); ?></h1>
      <p><?php echo wp_kses_post(get_theme_mod('contact_subheading', 'We’d love to hear from you! Please reach out with any questions or feedback.')); ?></p>
    </div>
  </div>
</section>

<!-- Contact Info Section -->
<section class="contact-info-section">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-card">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Address</h3>
        <p><?php echo esc_html(get_theme_mod('contact_address', 'Kathmandu, Nepal')); ?></p>
      </div>
      <div class="contact-card">
        <i class="fas fa-envelope"></i>
        <h3>Email</h3>
        <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@example.com')); ?>">
          <?php echo esc_html(get_theme_mod('contact_email', 'info@example.com')); ?></a></p>
      </div>
      <div class="contact-card">
        <i class="fas fa-phone-alt"></i>
        <h3>Phone</h3>
        <p><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+977-9800000000')); ?>">
          <?php echo esc_html(get_theme_mod('contact_phone', '+977-9800000000')); ?></a></p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<!-- <section class="contact-form-section bg-light">
  <div class="container">
    <h2 class="section-title text-center">Send Us a Message</h2>
    <form class="contact-form" action="<?php 
    // echo esc_url(get_theme_mod('contact_form_action', '#')); 
    ?>" method="POST">
      <div class="form-group">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
      </div>
      <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
      <button type="submit" class="send-btn">Send Message</button>
    </form>
  </div>
</section> -->

<!-- Map Section -->
<section class="contact-map-section">
  <div class="container">
    <iframe 
      src="<?php echo esc_url(get_theme_mod('contact_map_iframe', 'https://www.google.com/maps/embed?...')); ?>" 
      width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</section>

<?php get_footer(); ?>

<style>
/* ================================
   CONTACT PAGE STYLES
================================ */

* {margin:0; padding:0; box-sizing:border-box; font-family: 'Segoe UI', sans-serif;}

/* Hero */
.contact-hero {
  background: #f4f7fb;
  padding: 80px 20px;
  text-align: center;
}
.hero-content h1 {
  font-size: 2.8rem;
  font-weight: 700;
  color: #002244;
}
.hero-content p {
  max-width: 700px;
  margin: 20px auto 0;
  color: #555;
  font-size: 1.1rem;
}

/* Contact Info */
.contact-info-section {
  padding: 60px 20px;
}
.contact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
  text-align: center;
}
.contact-card {
  background: #fff;
  padding: 30px 20px;
  border-radius: 10px;
  box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}
.contact-card:hover { transform: translateY(-5px); }
.contact-card i {
  font-size: 2.2rem;
  color: #007bff;
  margin-bottom: 15px;
}
.contact-card h3 {
  color: #002244;
  font-weight: 600;
  margin-bottom: 10px;
}
.contact-card p, .contact-card a {
  color: #444;
  font-size: 1rem;
  text-decoration: none;
}

/* Contact Form */
.contact-form-section {
  padding: 70px 20px;
}
.section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #002244;
  margin-bottom: 40px;
}
.contact-form {
  max-width: 700px;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.form-group {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}
.form-group input {
  flex: 1;
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 1rem;
}
textarea {
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  resize: none;
  font-size: 1rem;
}
.send-btn {
  align-self: center;
  padding: 12px 35px;
  background: #002244;
  color: #fff;
  font-size: 1rem;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.3s;
}
.send-btn:hover { background: #003366; }

/* Map */
.contact-map-section {
  margin-top: 50px;
}
.contact-map-section iframe {
  border-radius: 10px;
}

/* Responsive */
@media (max-width: 768px) {
  .hero-content h1 { font-size: 2.2rem; }
  .form-group { flex-direction: column; }
  .contact-card i { font-size: 2rem; }
}
</style>
