<!-- Core Components -->
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
    <a href="<?php echo esc_url($link); ?>" class="model-card" style="background-image: url('<?php echo esc_url($image); ?>');">
      <div class="model-overlay">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($desc); ?></p>
      </div>
    </a>
  <?php endfor; ?>
</section>
