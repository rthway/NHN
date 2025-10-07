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
<style>

/* ===========================
   Partner Logos - Responsive CSS
=========================== */

.partner-logos {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 25px;
  align-items: center;
  justify-items: center;
  padding: 0 5%;
}

/* Logo card styling */
.logo-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
  padding: 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.logo-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
}

.logo-card img {
  width: 100%;
  height: auto;
  max-height: 80px;
  object-fit: contain;
  transition: transform 0.3s ease;
}

.logo-card img:hover {
  transform: scale(1.05);
}

/* ===========================
   Responsive Breakpoints
=========================== */

/* Tablets (≤992px) */
@media (max-width: 992px) {
  .partner-logos {
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 20px;
  }

  .logo-card {
    padding: 18px;
  }

  .logo-card img {
    max-height: 70px;
  }
}

/* Mobile (≤768px) */
@media (max-width: 768px) {
  .partner-logos {
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 18px;
  }

  .logo-card {
    padding: 15px;
  }

  .logo-card img {
    max-height: 60px;
  }
}

/* Small Mobile (≤480px) */
@media (max-width: 480px) {
  .partner-logos {
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 15px;
  }

  .logo-card {
    padding: 12px;
    border-radius: 10px;
  }

  .logo-card img {
    max-height: 50px;
  }
}

</style>