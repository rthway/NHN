<?php
/**
 * Template Name: Community Based Care
 * Description: Custom template for displaying community based healthcare page.
 */

get_header(); ?>

<!-- Hero Section -->
<section class="ehr-hero">
  <div class="digital-container">
    <div class="ehr-content">
      <div class="ehr-text">
        <h1><?php echo esc_html(get_theme_mod('community_heading1')); ?></h1>
        <h1><?php echo esc_html(get_theme_mod('community_heading2')); ?></h1>
        <p><?php echo wp_kses_post(get_theme_mod('community_description')); ?></p>
        <a href="<?php echo esc_url(get_theme_mod('community_button_link')); ?>" class="demo-btn">
          <?php echo esc_html(get_theme_mod('community_button_text')); ?>
        </a>
      </div>
      <div class="ehr-video">
        <iframe width="640" height="360"
          src="<?php echo esc_url(get_theme_mod('community_video_url')); ?>"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- Community Program 1 -->
<section class="hospital-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="<?php echo esc_url(get_theme_mod('community_program1_image')); ?>" 
             alt="<?php echo esc_attr(get_theme_mod('community_program1_title')); ?>" 
             class="img-fluid hospital-img-top">
      </div>
      <div class="col-md-6 hospital-text">
        <h2 class="hospital-title"><?php echo esc_html(get_theme_mod('community_program1_title')); ?></h2>
        <p><?php echo wp_kses_post(get_theme_mod('community_program1_desc')); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Community Program 2 -->
<section class="hospital-section bg-light">
  <div class="container">
    <div class="row align-items-center flex-md-row-reverse">
      <div class="col-md-6">
        <img src="<?php echo esc_url(get_theme_mod('community_program2_image')); ?>" 
             alt="<?php echo esc_attr(get_theme_mod('community_program2_title')); ?>" 
             class="img-fluid hospital-img-bottom">
      </div>
      <div class="col-md-6 hospital-text">
        <h2 class="hospital-title"><?php echo esc_html(get_theme_mod('community_program2_title')); ?></h2>
        <p><?php echo wp_kses_post(get_theme_mod('community_program2_desc')); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Gallery Section -->
<section class="hospital-care-gallery">
  <div class="container">
    <h2 class="display-4 fw-bold text-dark text-center">Community Care Dashboard</h2>
    <div class="gallery-grid">
      <?php for ($i = 1; $i <= 10; $i++) : 
        $img     = get_theme_mod("community_gallery_image_$i");
        $large   = get_theme_mod("community_gallery_large_$i");
        $desc    = get_theme_mod("community_gallery_desc_$i");
        if ($img) : ?>
          <div class="gallery-item">
            <img src="<?php echo esc_url($img); ?>" 
                 data-large="<?php echo esc_url($large ?: $img); ?>" 
                 data-desc="<?php echo esc_attr($desc); ?>" 
                 alt="<?php echo esc_attr($desc); ?>" 
                 class="popup-img">
            <p><?php echo esc_html($desc); ?></p>
          </div>
      <?php endif; endfor; ?>
    </div>
  </div>

  <!-- Lightbox Modal -->
  <div id="lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
    <div class="lightbox-desc" id="lightbox-desc"></div>
  </div>
</section>

<?php get_footer(); ?>

<!-- Reuse same styles and scripts as Hospital Based Care page -->
