<?php get_header(); ?>

<main id="primary" class="site-main container py-5">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                
                <!-- Post Title -->
                <header class="mb-4">
                    <h1 class="fw-bold text-dark"><?php the_title(); ?></h1>
                    <p class="text-muted">
                        Posted on <?php echo get_the_date(); ?> by <?php the_author(); ?>
                    </p>
                </header>

                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-4">
                        <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                    </div>
                <?php endif; ?>

                <!-- Post Content -->
                <div class="post-content mb-5">
                    <?php the_content(); ?>
                </div>

                <!-- Categories & Tags -->
                <footer class="post-footer border-top pt-3">
                    <p class="mb-2"><strong>Categories:</strong> <?php the_category(', '); ?></p>
                    <p><strong>Tags:</strong> <?php the_tags('', ', ', ''); ?></p>
                </footer>
            </article>

            <!-- Comments -->
            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        <?php endwhile;
    else :
        echo '<p>No post found.</p>';
    endif;
    ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
