<!-- Core Components -->
<style>
/* ---------- General Layout ---------- */
.our-model-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
  margin: 0 auto;
  padding: 0 1.5rem 3rem;
  max-width: 1200px;
}

/* ---------- Model Card ---------- */
.model-card {
  position: relative;
  display: flex;
  align-items: end;
  justify-content: center;
  height: 320px;
  background-size: cover;
  background-position: center;
  border-radius: 16px;
  text-decoration: none;
  overflow: hidden;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  color: #fff;
}

.model-card:hover {
  transform: scale(1.03);
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* ---------- Overlay ---------- */
.model-overlay {
  background: linear-gradient(to top, rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.2));
  width: 100%;
  padding: 1.2rem;
  text-align: center;
  transition: background 0.3s ease;
}

.model-card:hover .model-overlay {
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3));
}

/* ---------- Text Styles ---------- */
.model-overlay h2 {
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  text-transform: uppercase;
  line-height: 1.3;
}

.model-overlay p {
  font-size: 0.95rem;
  line-height: 1.5;
  margin: 0;
}

/* ---------- Header ---------- */
header.text-center {
  padding: 2rem 1rem;
}

header h1 {
  font-size: 2.5rem;
  line-height: 1.3;
  margin-bottom: 0.5rem;
}

header p {
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

/* ---------- Responsive Design ---------- */

/* Tablets */
@media (max-width: 992px) {
  header h1 {
    font-size: 2rem;
  }

  .model-card {
    height: 280px;
  }

  .model-overlay h2 {
    font-size: 1.25rem;
  }

  .model-overlay p {
    font-size: 0.9rem;
  }
}

/* Mobile Devices */
@media (max-width: 600px) {
  header h1 {
    font-size: 1.75rem;
  }

  header p {
    font-size: 0.9rem;
  }

  .our-model-section {
    padding: 0 1rem 2rem;
    gap: 1rem;
  }

  .model-card {
    height: 240px;
    border-radius: 12px;
  }

  .model-overlay {
    padding: 1rem;
  }

  .model-overlay h2 {
    font-size: 1.1rem;
  }

  .model-overlay p {
    font-size: 0.85rem;
  }
}

/* Small Phones */
@media (max-width: 400px) {
  header h1 {
    font-size: 1.5rem;
  }

  .model-card {
    height: 200px;
  }
}
</style>

<!-- ---------- PHP / HTML ---------- -->
<header class="text-center mb-5">
  <p class="text-danger fs-6 fst-italic">
    <?php echo esc_html(get_theme_mod('charity_core_subtitle', 'Core Components of NHN')); ?>
  </p>
  <h1 class="display-4 fw-bold text-dark">
    <?php echo esc_html(get_theme_mod('charity_core_title', 'OUR MODELS')); ?>
  </h1>
</header>

<section class="our-model-section">
  <?php for ($i = 1; $i <= 3; $i++) :
    $title = get_theme_mod("charity_core_model_title_$i", "Model $i");
    $desc  = get_theme_mod("charity_core_model_desc_$i", "Model $i short description");
    $link  = get_theme_mod("charity_core_model_link_$i", "#");
    $image = get_theme_mod("charity_core_model_image_$i", "");
  ?>
    <a href="<?php echo esc_url($link); ?>" 
       class="model-card" 
       style="background-image: url('<?php echo esc_url($image); ?>');">
      <div class="model-overlay">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($desc); ?></p>
      </div>
    </a>
  <?php endfor; ?>
</section>
