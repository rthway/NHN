<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Hero Section -->
<section class="post-hero d-flex align-items-center justify-content-center text-center text-white" 
  style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
  <div class="overlay"></div>
  <div class="container position-relative">
    <h1 class="fw-bold mb-3"><?php the_title(); ?></h1>
    <p class="post-meta mb-0">
      <i class="fas fa-user"></i> <?php the_author(); ?> |
      <i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?>
    </p>
  </div>
</section>

<!-- Main Content -->
<main id="primary" class="site-main py-5">
  <div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-card shadow-lg rounded-4 p-4 bg-white'); ?>>

      <!-- Featured Image (for non-hero fallback) -->
      <?php if ( !has_post_thumbnail() ) : ?>
        <div class="mb-4 text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-thumbnail.jpg" 
               alt="Post Image" class="img-fluid rounded">
        </div>
      <?php endif; ?>

      <!-- Post Content -->
      <div class="post-content">
        <?php the_content(); ?>
      </div>

      <!-- Post Footer -->
      <footer class="post-footer border-top pt-4 mt-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <p><strong>Categories:</strong> <?php the_category(', '); ?></p>
            <p><strong>Tags:</strong> <?php the_tags('', ', ', ''); ?></p>
          </div>
          <div class="col-md-6 text-md-end">
            <div class="social-share">
              <span class="fw-semibold me-2">Share:</span>
              <a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </footer>

    </article>

    <!-- Post Navigation -->
    <div class="post-navigation mt-5 d-flex justify-content-between flex-wrap gap-3">
      <div class="prev-post">
        <?php previous_post_link('%link', '<i class="fas fa-arrow-left me-2"></i> %title'); ?>
      </div>
      <div class="next-post text-end ms-auto">
        <?php next_post_link('%link', '%title <i class="fas fa-arrow-right ms-2"></i>'); ?>
      </div>
    </div>

    
  </div>
</main>

<?php endwhile; else : ?>
  <section class="py-5 text-center">
    <div class="container">
      <h2>No Post Found</h2>
      <p>It seems the content you’re looking for doesn’t exist.</p>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>

<!-- Inline Styles -->
<style>
/* Hero Section */
.post-hero {
  position: relative;
  min-height: 50vh;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
.post-hero .overlay {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.55);
  z-index: 1;
}
.post-hero .container {
  position: relative;
  z-index: 2;
}
.post-hero h1 {
  font-size: 2.5rem;
}
.post-meta {
  font-size: 0.95rem;
  opacity: 0.9;
}

/* Single Post Card */
.single-post-card {
  margin-top: -80px;
  position: relative;
  z-index: 10;
  background: #fff;
}
.post-content {
  line-height: 1.8;
  color: #333;
}
.post-content img {
  max-width: 100%;
  border-radius: 8px;
  margin: 20px 0;
}

/* Footer Meta */
.post-footer {
  font-size: 0.95rem;
}
.social-share a {
  display: inline-block;
  margin-right: 10px;
  font-size: 1.1rem;
  color: #555;
  transition: color 0.3s ease;
}
.social-share a:hover {
  color: #dc3545;
}

/* Navigation */
.post-navigation a {
  color: #333;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}
.post-navigation a:hover {
  color: #dc3545;
}

/* Responsive */
@media (max-width: 768px) {
  .post-hero {
    min-height: 40vh;
  }
  .post-hero h1 {
    font-size: 1.8rem;
  }
  .single-post-card {
    margin-top: -50px;
    padding: 20px;
  }
  .social-share {
    text-align: center;
  }
  .post-navigation {
    flex-direction: column;
    align-items: center;
  }
}
</style>

<!-- FontAwesome Icons (if not already loaded) -->
<script src="https://kit.fontawesome.com/a2e0e6e9d6.js" crossorigin="anonymous"></script>
