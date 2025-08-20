<?php
/**
 * Template for displaying single Publication posts
 */

get_header(); ?>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <article id="post-<?php the_ID(); ?>" <?php post_class('publication-single'); ?>>

        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
          <div class="mb-4 text-center">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded shadow']); ?>
          </div>
        <?php endif; ?>

        <!-- Title -->
        <header class="mb-4 text-center">
          <h1 class="fw-bold text-dark"><?php the_title(); ?></h1>
          <p class="text-muted fst-italic">
            Published on <?php echo get_the_date(); ?>
            <?php if (get_the_author()) : ?> by <?php the_author(); ?><?php endif; ?>
          </p>
        </header>

        <!-- Content -->
        <div class="publication-content fs-5 mb-4">
          <?php
          while (have_posts()) : the_post();
            the_content();
          endwhile;
          ?>
        </div>

        <!-- Download PDF -->
        <?php
        $pdf_url = get_post_meta(get_the_ID(), '_nhn_publication_pdf', true);
        if ($pdf_url) : ?>
          <div class="mb-4 text-center">
            <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" class="btn btn-danger btn-lg">
              📄 Download Report
            </a>
          </div>
        <?php endif; ?>

        <!-- Meta -->
        <footer class="mt-5 border-top pt-3 text-center">
          <p class="small text-muted"><?php the_tags('Tags: ', ', '); ?></p>
          <a href="<?php echo get_post_type_archive_link('publications'); ?>" class="btn btn-outline-secondary btn-sm">
            ← Back to Publications
          </a>
        </footer>

      </article>
    </div>
  </div>
</div>

<?php get_footer(); ?>
