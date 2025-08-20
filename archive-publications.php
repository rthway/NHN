<?php
/**
 * Archive template for Publications
 */

get_header(); ?>

<div class="container py-5">
  <header class="mb-5 text-center">
    <h1 class="fw-bold text-dark"><?php post_type_archive_title(); ?></h1>
    <p class="text-muted">Browse all reports, research, and publications.</p>
  </header>

  <div class="row">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
            </a>
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title">
              <a href="<?php the_permalink(); ?>" class="text-dark fw-bold"><?php the_title(); ?></a>
            </h5>
            <p class="card-text"><?php echo get_the_excerpt(); ?></p>
          </div>
          <div class="card-footer bg-white">
            <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-sm">Read More</a>
          </div>
        </div>
      </div>
    <?php endwhile; else : ?>
      <p class="text-center">No publications found.</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
