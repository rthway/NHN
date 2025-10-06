<?php
/**
 * Template Name: Digital Health
 * Description: Custom template for displaying Digital Health page with Key Features and Implementation Sites.
 */

get_header(); ?>

<!-- Hero Section -->
<section class="ehr-hero">
  <div class="digital-container">
    <div class="ehr-content">
      <div class="ehr-text">
        <h1><?php echo esc_html(get_theme_mod('digital_heading1', 'Digital Health Transformation')); ?></h1>
        <h1><?php echo esc_html(get_theme_mod('digital_heading2', 'Empowering Healthcare Through Technology')); ?></h1>
        <p><?php echo wp_kses_post(get_theme_mod('digital_description', 'NepalEHR is a comprehensive, open-source electronic health record platform designed to improve patient care and streamline clinical workflows across Nepal.')); ?></p>
        <a href="<?php echo esc_url(get_theme_mod('digital_button_link', '#')); ?>" class="demo-btn">
          <?php echo esc_html(get_theme_mod('digital_button_text', 'Learn More')); ?>
        </a>
      </div>
      <div class="ehr-video">
        <iframe width="640" height="360"
          src="<?php echo esc_url(get_theme_mod('digital_video_url', 'https://www.youtube.com/embed/your-video')); ?>"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- Key Features Section -->
<section class="ehr-features-section bg-light">
  <div class="container">
    <h2 class="section-title text-center">Key Features of NepalEHR</h2>
    <div class="features-grid">
      <?php 
        $feature_count = get_theme_mod('digital_feature_count', 6);
        for ($i = 1; $i <= $feature_count; $i++): 
          $icon = get_theme_mod("digital_feature_icon_$i");
          $title = get_theme_mod("digital_feature_title_$i");
          $desc = get_theme_mod("digital_feature_desc_$i");
          if ($title): ?>
            <div class="feature-card">
              <?php if ($icon): ?><img src="<?php echo esc_url($icon); ?>" alt="" class="feature-icon"><?php endif; ?>
              <h3><?php echo esc_html($title); ?></h3>
              <p><?php echo wp_kses_post($desc); ?></p>
            </div>
      <?php endif; endfor; ?>
    </div>
  </div>
</section>

<!-- Implementation Sites -->
<section class="ehr-sites-section">
  <div class="container">
    <h2 class="section-title text-center">Implementation Sites</h2>
    <div class="sites-grid">
      <?php 
        $site_count = get_theme_mod('digital_site_count', 8);
        for ($i = 1; $i <= $site_count; $i++): 
          $img = get_theme_mod("digital_site_image_$i");
          $title = get_theme_mod("digital_site_title_$i");
          $location = get_theme_mod("digital_site_location_$i");
          if ($img): ?>
            <div class="site-card">
              <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" class="site-img">
              <div class="site-info">
                <h4><?php echo esc_html($title); ?></h4>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($location); ?></p>
              </div>
            </div>
      <?php endif; endfor; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>

<style>
/* ================================
   DIGITAL HEALTH PAGE STYLES
================================ */

/* Reset */
* {margin:0; padding:0; box-sizing:border-box;}

/* Hero Section */
.ehr-hero {
  font-family: 'Segoe UI', sans-serif;
  padding: 60px 20px;
  background: #f9f9f9;
}
.digital-container {
  max-width: 1200px;
  margin: auto;
}
.ehr-content {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}
.ehr-text {
  flex: 1;
  min-width: 300px;
  padding: 20px;
}
.ehr-text h1 {
  font-size: 2.6rem;
  font-weight: 700;
  margin-bottom: 15px;
}
.ehr-text p {
  font-size: 1rem;
  line-height: 1.6;
  margin-bottom: 25px;
  color: #444;
  max-width: 600px;
}
.demo-btn {
  display: inline-block;
  padding: 12px 25px;
  background: #002244;
  color: #fff;
  border-radius: 6px;
  font-weight: 600;
  text-decoration: none;
  transition: 0.3s;
}
.demo-btn:hover { background: #003366; }
.ehr-video iframe {
  width: 600px;
  max-width: 100%;
  height: 340px;
  border: none;
  border-radius: 10px;
}

/* Section Titles */
.section-title {
  font-size: 2.2rem;
  color: #002244;
  font-weight: 700;
  margin-bottom: 40px;
}

/* Key Features Section */
.ehr-features-section {
  padding: 70px 0;
}
.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 25px;
}
.feature-card {
  background: #fff;
  border-radius: 12px;
  padding: 30px 20px;
  text-align: center;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}
.feature-card:hover { transform: translateY(-5px); }
.feature-icon {
  width: 60px;
  height: 60px;
  margin-bottom: 15px;
}
.feature-card h3 {
  font-size: 1.3rem;
  font-weight: 600;
  color: #003366;
  margin-bottom: 10px;
}
.feature-card p {
  font-size: 0.95rem;
  color: #555;
  line-height: 1.5;
}

/* Implementation Sites Section */
.ehr-sites-section {
  padding: 70px 0;
  background: #f5f7fa;
}
.sites-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
  gap: 25px;
}
.site-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}
.site-card:hover { transform: scale(1.03); }
.site-img {
  width: 100%;
  height: 180px;
  object-fit: cover;
}
.site-info {
  padding: 15px;
}
.site-info h4 {
  font-size: 1.2rem;
  font-weight: 600;
  color: #002244;
}
.site-info p {
  color: #555;
  margin-top: 5px;
  font-size: 0.95rem;
}

/* Responsive */
@media (max-width: 992px) {
  .ehr-content {
    flex-direction: column;
    text-align: center;
  }
  .ehr-video iframe {
    width: 100%;
    height: auto;
  }
}
@media (max-width: 500px) {
  .ehr-text h1 {
    font-size: 2rem;
  }
  .section-title {
    font-size: 1.7rem;
  }
}
</style>
