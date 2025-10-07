<?php
/* Template Name: Careers Page */

get_header(); ?>

<div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>

    <?php
    // WP_Query for Careers
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'career',
        'posts_per_page' => 10,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $careers = new WP_Query($args);

    if ($careers->have_posts()) : ?>
        <div class="careers-list">
            <?php while ($careers->have_posts()) : $careers->the_post(); ?>
                <div class="career-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="career-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="career-content">
                        <h2 class="career-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="career-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $careers->max_num_pages,
            ));
            ?>
        </div>

    <?php else : ?>
        <p>No careers found.</p>
    <?php endif;

    wp_reset_postdata();
    ?>
</div>

<?php get_footer(); ?>
