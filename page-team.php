<?php
/**
 * Template Name: Team Page
 * Description: Displays Team Members dynamically from Customizer settings
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Board Section -->
    <section id="our-board" class="container px-4 py-5">
        <header class="text-center mb-5">
            <p class="text-danger fs-6 fst-italic">WE PUT OUR PATIENT FIRST</p>
            <h1 class="display-4 fw-bold text-dark">OUR BOARD</h1>
        </header>

        <div class="content-area">
            <section class="team-section">
                <?php
                $team_count = get_theme_mod('nhn_team_count', 3); // default 3 members

                for ($i = 1; $i <= $team_count; $i++) {
                    $name     = get_theme_mod("nhn_team_name_$i");
                    $position = get_theme_mod("nhn_team_position_$i");
                    $bio      = get_theme_mod("nhn_team_bio_$i");
                    $image    = get_theme_mod("nhn_team_image_$i");

                    if ($name || $position || $bio || $image) :
                ?>
                        <div class="team-card">
                            <div class="image-info">
                                <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" />
                                <?php endif; ?>
                                <div class="name-position">
                                    <?php if ($name) : ?>
                                        <h3><?php echo esc_html($name); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($position) : ?>
                                        <p class="position"><?php echo esc_html($position); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($bio) : ?>
                                <div class="bio"><?php echo wp_kses_post($bio); ?></div>
                            <?php endif; ?>
                        </div>
                <?php
                    endif;
                }
                ?>
            </section>
        </div>
    </section>

    <!-- Our Team Section -->
    <section id="our-team" class="container px-4 py-5">
        <header class="text-center mb-5">
            <p class="text-danger fs-6 fst-italic">We currently have 200+ staff in Achham and Kathmandu.</p>
            <h1 class="display-4 fw-bold text-dark">OUR TEAM</h1>
        </header>

        <section class="our-team-section">
            <div class="our-team-container">
                <?php 
                $our_team_count = get_theme_mod('nhn_our_team_count', 3);

                for ($i = 1; $i <= $our_team_count; $i++) {

                    $name = get_theme_mod("nhn_our_team_name_$i");
                    $position = get_theme_mod("nhn_our_team_position_$i");
                    $bio = get_theme_mod("nhn_our_team_bio_$i");
                    $image = get_theme_mod("nhn_our_team_image_$i");

                    if ($name || $position || $bio || $image) : ?>
                        <div class="our-team-card">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>">
                            <?php endif; ?>
                            <?php if ($name) : ?>
                                <h3><?php echo esc_html($name); ?></h3>
                            <?php endif; ?>
                            <?php if ($position) : ?>
                                <p class="our-role"><?php echo esc_html($position); ?></p>
                            <?php endif; ?>
                            <?php if ($bio) : ?>
                                <p class="our-bio"><?php echo esc_html($bio); ?></p>
                            <?php endif; ?>
                        </div>
                <?php 
                    endif; 
                } 
                ?>
            </div>
        </section>
    </section>

</main>

<?php get_footer(); ?>
