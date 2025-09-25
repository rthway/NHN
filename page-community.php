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
    <h2 class="display-4 fw-bold text-dark text-center">Community Dashboard</h2>
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
<style>
    /* =============================
   Community Based Care Styles
   ============================= */

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
  font-size: 2.8rem;
  font-weight: 700;
  margin-bottom: 20px;
}
.ehr-text p {
  font-size: 1rem;
  line-height: 1.6;
  margin-bottom: 30px;
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
.demo-btn:hover {
  background: #003366;
}
.ehr-video iframe {
  width: 600px;
  max-width: 640px;
  height: 360px;
  border: none;
  border-radius: 10px;
}

/* Program Sections */
.hospital-section {
  padding: 60px 0;
}
.hospital-img-top {
  height: 450px;
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}
.hospital-img-bottom {
  height: 300px;
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}
.hospital-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 20px;
}
.hospital-title {
  font-size: 2rem;
  font-weight: bold;
  color: #007bff;
  margin-bottom: 15px;
  border-left: 5px solid #007bff;
  padding-left: 10px;
}
.hospital-text p {
  font-size: 1.1rem;
  line-height: 1.6;
  color: #444;
  text-align: justify;
}

/* Gallery Section */
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}
.gallery-item {
  background: #fff;
  border-radius: 8px;
  padding: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}
.gallery-item:hover {
  transform: scale(1.02);
}
.gallery-item img {
  width: 100%;
  height: 200px;
  border-radius: 5px;
  cursor: pointer;
}
.gallery-item p {
  margin-top: 10px;
  text-align: center;
  font-size: 0.95em;
  color: #555;
}

/* Lightbox Modal */
.lightbox {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.9);
  text-align: center;
  padding-top: 60px;
  color: #fff;
}
.lightbox-content {
  max-width: 90%;
  max-height: 70vh;
  border-radius: 8px;
}
.lightbox-close {
  position: absolute;
  top: 30px;
  right: 40px;
  font-size: 40px;
  font-weight: bold;
  cursor: pointer;
}
.lightbox-close:hover {
  color: #ccc;
}
.lightbox-desc {
  margin-top: 20px;
  font-size: 1.1em;
  max-width: 90%;
  margin-left: auto;
  margin-right: auto;
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
  h2.hospital-title {
    font-size: 1.5em;
  }
  .lightbox-close {
    font-size: 30px;
    right: 20px;
  }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const popupImages = document.querySelectorAll('.popup-img');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const lightboxDesc = document.getElementById('lightbox-desc');
  const closeBtn = document.querySelector('.lightbox-close');

  if (!popupImages.length) return;

  // Build array of images and descriptions
  const images = Array.from(popupImages).map(img => ({
    src: img.dataset.large,
    desc: img.dataset.desc
  }));

  let currentIndex = 0;

  // Open lightbox
  function openLightbox(index) {
    currentIndex = index;
    lightboxImg.src = images[currentIndex].src;
    lightboxDesc.textContent = images[currentIndex].desc;
    lightbox.style.display = 'block';
  }

  // Close lightbox
  function closeLightbox() {
    lightbox.style.display = 'none';
    lightboxImg.src = '';
  }

  // Click on gallery image
  popupImages.forEach((img, index) => {
    img.addEventListener('click', () => openLightbox(index));
  });

  // Click on close button
  closeBtn.addEventListener('click', closeLightbox);

  // Click outside image closes lightbox
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  // Keyboard navigation
  window.addEventListener('keydown', (e) => {
    if (lightbox.style.display === 'block') {
      if (e.key === 'ArrowRight') {
        currentIndex = (currentIndex + 1) % images.length;
        openLightbox(currentIndex);
      } else if (e.key === 'ArrowLeft') {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        openLightbox(currentIndex);
      } else if (e.key === 'Escape') {
        closeLightbox();
      }
    }
  });
});
</script>
