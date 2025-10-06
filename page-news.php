<?php
/**
 * Template Name: News Page
 * Description: Displays all blog/news posts dynamically.
 */

get_header(); ?>

<!-- Hero Section -->
<section class="news-hero py-5 bg-light text-center">
  <div class="container">
    <h1 class="display-5 fw-bold text-primary">Latest News & Updates</h1>
    <p class="lead text-muted">Stay informed with the latest stories, events, and announcements.</p>
  </div>
</section>

<!-- News Posts Section -->
<section class="news-list py-5">
  <div class="container">
    <div class="row">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $paged
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
                <h5 class="card-title fw-semibold">
                  <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                    <?php the_title(); ?>
                  </a>
                </h5>
                <p class="card-text text-muted small mb-2">
                  <i class="dashicons dashicons-calendar"></i>
                  <?php echo get_the_date(); ?>
                  &nbsp; | &nbsp;
                  <i class="dashicons dashicons-admin-users"></i>
                  <?php the_author(); ?>
                </p>
                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 22, '...'); ?></p>
              </div>

              <div class="card-footer bg-white border-0">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">Read More</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center mt-4">
      <?php
      echo paginate_links(array(
        'total'     => $query->max_num_pages,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;'
      ));
      ?>
    </div>

    <?php else : ?>
      <p class="text-center text-muted">No news articles found at the moment.</p>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</section>

<?php get_footer(); ?>

<style>
/* News Page Styles */
.news-hero {
  background: linear-gradient(135deg, #f0f7ff, #eaf1ff);
}
.card {
  transition: all 0.3s ease;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
.card-title a {
  color: #002244;
}
.card-title a:hover {
  color: #0056b3;
}
.pagination .page-numbers {
  padding: 8px 14px;
  margin: 2px;
  border: 1px solid #ddd;
  border-radius: 4px;
  text-decoration: none;
}
.pagination .current {
  background: #0056b3;
  color: #fff;
  border-color: #0056b3;
}
.pagination .page-numbers:hover {
  background: #0056b3;
  color: #fff;
}
@media (max-width: 767px) {
  .card-img-top {
    height: auto;
  }
}
</style>
