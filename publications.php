<!-- Publications Section -->
 <header class="text-center mb-5">
  <p class="text-danger fs-6 fst-italic"><?php echo esc_html(get_theme_mod('nhn_publications_subheading', 'Latest reports, research and publications')); ?></p>
  <h1 class="display-4 fw-bold text-dark"><?php echo esc_html(get_theme_mod('nhn_publications_heading', 'Our Publications')); ?></h1>
</header>
<section class="publications-section py-5">
  <div class="container">

    

    <!-- Publications Loop -->
    <div class="row">
      <?php
      $args = array(
          'post_type'      => 'publications',
          'posts_per_page' => 3, // Show latest 3 publications
      );
      $publications = new WP_Query($args);

      if ($publications->have_posts()) :
          while ($publications->have_posts()) : $publications->the_post(); ?>
            <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm">
                <?php if (has_post_thumbnail()) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                  </a>
                <?php endif; ?>
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="<?php the_permalink(); ?>" class="text-dark fw-bold">
                      <?php the_title(); ?>
                    </a>
                  </h5>
                  <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                </div>
                <div class="card-footer bg-white">
                  <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-sm">Read More</a>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
      else : ?>
        <p class="text-center">No publications found.</p>
      <?php endif; ?>
    </div>

  </div>
</section>
