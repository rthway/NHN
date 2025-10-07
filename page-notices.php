<?php
/* Template Name: Notices Page */

get_header(); ?>

<div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>

    <?php
    // WP_Query for Notices
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'notice',
        'posts_per_page' => 10,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $notices = new WP_Query($args);

    if ($notices->have_posts()) : ?>
        <div class="notices-list">
            <?php while ($notices->have_posts()) : $notices->the_post(); ?>
                <div class="notice-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="notice-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="notice-content">
                        <h2 class="notice-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="notice-excerpt">
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
                'total' => $notices->max_num_pages,
            ));
            ?>
        </div>

    <?php else : ?>
        <p>No notices found.</p>
    <?php endif;

    wp_reset_postdata();
    ?>
</div>

<?php get_footer(); ?>
