<!-- Partner Section -->
<header class="text-center mb-5">
  <p class="text-danger fs-6 fst-italic">Our Supporting Partner</p>
  <h1 class="display-4 fw-bold text-dark">Partner In Touch</h1>
</header>

<section class="partner-section">
  <div class="partner-header">
    <div class="partner-text">
      <h6>Become Support Partner</h6>
      <p>Provide financing support to help individuals healthcare</p>
    </div>
    <a href="#contact" class="partner-button">
      ✔ GET IN TOUCH
    </a>
  </div>

  <div class="partner-logos">
    <?php
    $partners_count = get_theme_mod('partners_count', 4);
    for ($i = 1; $i <= $partners_count; $i++) :
        $logo = get_theme_mod("partner_logo_$i");
        if ($logo) :
    ?>
        <div class="logo-card">
          <img src="<?php echo esc_url($logo); ?>" alt="Partner <?php echo $i; ?>">
        </div>
    <?php
        endif;
    endfor;
    ?>
  </div>

  <div class="partner-pagination">
    <?php for ($i = 0; $i < $partners_count; $i++) : ?>
      <span class="dot <?php echo $i === 0 ? 'active' : ''; ?>"></span>
    <?php endfor; ?>
  </div>
</section>
