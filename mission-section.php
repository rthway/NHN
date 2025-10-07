<?php
$header_small = get_theme_mod('mvc_header_small', 'QUALITY HEALTHCARE FOR ALL');
$header_title = get_theme_mod('mvc_header_title', 'OUR VISION, MISSION & CULTURE');
$vision = get_theme_mod('mvc_vision', 'Quality healthcare for all.');
$mission = get_theme_mod('mvc_mission', 'To improve healthcare for underserved populations by collaborating with the government of Nepal.');
$left_image = get_theme_mod('mvc_left_image', '');
?>

<!-- Mission, Vision & Culture Section -->
<section class="mvc-section container py-5">
  <header class="text-center mb-5">
    <p class="text-danger fs-6 fst-italic"><?php echo esc_html($header_small); ?></p>
    <h1 class="display-5 fw-bold text-dark"><?php echo esc_html($header_title); ?></h1>
  </header>

  <div class="row align-items-center">
    <?php if ($left_image): ?>
      <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
        <div class="mvc-image rounded-3 shadow-sm"
             style="background-image: url('<?php echo esc_url($left_image); ?>');">
        </div>
      </div>
    <?php endif; ?>

    <div class="col-lg-6 col-md-12">
      <div class="mvc-content p-3 p-md-4">
        <h3 class="fw-semibold text-dark mb-2">Our Vision</h3>
        <p class="text-secondary mb-4"><?php echo esc_html($vision); ?></p>

        <h3 class="fw-semibold text-dark mb-2">Mission</h3>
        <p class="text-secondary mb-4"><?php echo esc_html($mission); ?></p>

        <h3 class="fw-semibold text-dark mb-3">Culture Code</h3>
        <ul class="list-unstyled">
          <?php for ($i=1; $i<=4; $i++):
            $title = get_theme_mod("mvc_culture_title_$i");
            $desc = get_theme_mod("mvc_culture_desc_$i");
            if ($title && $desc):
          ?>
            <li class="mb-3">
              <b class="text-dark"><?php echo esc_html($title); ?>:</b>
              <span class="text-secondary"><?php echo esc_html($desc); ?></span>
            </li>
          <?php endif; endfor; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Custom Responsive Styles -->
<style>
.mvc-section {
  overflow: hidden;
}

.mvc-image {
  width: 100%;
  height: 400px;
  background-size: cover;
  background-position: center;
  border-radius: 20px;
}

@media (max-width: 991px) {
  .mvc-image {
    height: 300px;
  }
}

@media (max-width: 767px) {
  .mvc-section {
    padding: 2rem 1rem;
  }
  .mvc-image {
    height: 250px;
  }
  .mvc-content {
    padding: 1rem;
  }
  h1.display-5 {
    font-size: 1.75rem;
  }
  h3 {
    font-size: 1.25rem;
  }
}
</style>
