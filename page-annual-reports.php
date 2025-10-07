<?php
/**
 * Template Name: Annual Reports Page
 * Description: Displays all Annual Reports from the Publications post type.
 */


get_header(); ?>

<!-- Hero Section -->
<section class="publications-hero py-5 text-center bg-light">
    <div class="container">
        <p class="text-danger fs-6 fst-italic">
            <?php echo esc_html(get_theme_mod('nhn_publications_subheading', 'Latest reports, research and publications')); ?>
        </p>
        <h1 class="display-4 fw-bold text-dark">
            <?php echo esc_html(get_theme_mod('nhn_publications_heading', 'Our Publications')); ?>
        </h1>
    </div>
</section>

<!-- Publications Grid -->
<section class="publications-section py-5">
    <div class="container">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'post_type'      => 'publications',
                'posts_per_page' => 9,
                'paged'          => $paged,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );

            $publications = new WP_Query($args);

            if ($publications->have_posts()) :
                while ($publications->have_posts()) : $publications->the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top rounded-top']); ?>
                                </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>" class="text-dark fw-bold text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination justify-content-center mt-4">
            <?php
            echo paginate_links(array(
                'total'     => $publications->max_num_pages,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
            ));
            ?>
        </div>

        <?php else : ?>
            <p class="text-center text-muted">No publications found.</p>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>

<!-- Inline Styles -->
<style>
.publications-hero {
    background: linear-gradient(135deg, #f9f9f9, #f1f5ff);
}
.card {
    transition: all 0.3s ease-in-out;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}
.card-title a:hover {
    color: #dc3545;
}
.pagination .page-numbers {
    padding: 8px 14px;
    margin: 2px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
}
.pagination .current {
    background: #dc3545;
    color: #fff;
    border-color: #dc3545;
}
.pagination .page-numbers:hover {
    background: #dc3545;
    color: #fff;
}
@media (max-width: 768px) {
    .card-img-top {
        height: auto;
    }
}
</style>
