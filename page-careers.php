<?php
/**
 * Template Name: Careers Page
 * Description: Displays all published Career posts.
 */

get_header(); ?>

<section class="careers-hero py-5 bg-light text-center">
  <div class="container">
    <h1 class="display-5 fw-bold text-primary">Careers</h1>
    <p class="lead text-muted">Explore current job opportunities and join our team.</p>
  </div>
</section>

<section class="careers-list py-5">
  <div class="container">
    <div class="row">
      <?php
      $args = array(
        'post_type'      => 'career',
        'posts_per_page' => 6,
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1
      );
      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top rounded-top']); ?>
                </a>
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark fw-semibold">
                    <?php the_title(); ?>
                  </a>
                </h5>
                <p class="card-text text-muted small mb-2">
                  <i class="dashicons dashicons-calendar"></i>
                  Posted on <?php echo get_the_date(); ?>
                </p>
                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
              </div>
              <div class="card-footer bg-white border-0">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-success btn-sm">View Details</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center mt-4">
      <?php
      echo paginate_links(array(
        'total' => $query->max_num_pages,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;'
      ));
      ?>
    </div>

    <?php else : ?>
      <p class="text-center">No career openings at this moment. Please check back later.</p>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</section>

<?php get_footer(); ?>

<style>
.careers-hero {
  background: linear-gradient(135deg, #f9fff9, #eaffef);
}
.card {
  transition: all 0.3s ease;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
</style>
