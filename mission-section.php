<?php
$header_small = get_theme_mod('mvc_header_small', 'QUALITY HEALTHCARE FOR ALL');
$header_title = get_theme_mod('mvc_header_title', 'OUR VISION, MISSION & CULTURE');
$vision = get_theme_mod('mvc_vision', 'Quality healthcare for all.');
$mission = get_theme_mod('mvc_mission', 'To improve healthcare for underserved populations by collaborating with the government of Nepal.');
$left_image = get_theme_mod('mvc_left_image', '');
?>

<!-- Mission Section -->
<header class="text-center mb-5">
  <p class="text-danger fs-6 fst-italic"><?php echo esc_html($header_small); ?></p>
  <h1 class="display-4 fw-bold text-dark"><?php echo esc_html($header_title); ?></h1>
</header>

<section class="mission-section d-flex">
  <?php if ($left_image): ?>
    <div class="left-image" style="background-image: url('<?php echo esc_url($left_image); ?>'); width: 50%; background-size: cover;"></div>
  <?php endif; ?>
  
  <div class="right-content" style="width: 50%; padding: 20px;">
    <h3>Our Vision</h3>
    <p><?php echo esc_html($vision); ?></p>

    <h3>Mission</h3>
    <p><?php echo esc_html($mission); ?></p>

    <h3>Culture Code</h3>
    <ul>
      <?php for ($i=1; $i<=4; $i++):
        $title = get_theme_mod("mvc_culture_title_$i");
        $desc = get_theme_mod("mvc_culture_desc_$i");
        if ($title && $desc):
      ?>
        <li><b><?php echo esc_html($title); ?>:</b> <?php echo esc_html($desc); ?></li>
      <?php endif; endfor; ?>
    </ul>
  </div>
</section>

<br><br>

