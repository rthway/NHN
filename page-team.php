<?php
/**
 * Template Name: Team Page
 * Description: Displays Team Members dynamically from Customizer settings
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="content-area">
        <section class="team-section">
            <?php
            $team_count = get_theme_mod('nhn_team_count', 3); // default 3 members

            for ($i = 1; $i <= $team_count; $i++) {
                $name     = get_theme_mod("nhn_team_name_$i");
                $position = get_theme_mod("nhn_team_position_$i");
                $bio      = get_theme_mod("nhn_team_bio_$i");
                $image    = get_theme_mod("nhn_team_image_$i");

                if ($name || $position || $bio || $image) {
                    echo '<div class="team-card">';
                    echo '<div class="image-info">';
                    if ($image) {
                        echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($name) . '" />';
                    }
                    echo '<div class="name-position">';
                    echo '<h3>' . esc_html($name) . '</h3>';
                    echo '<p class="position">' . esc_html($position) . '</p>';
                    echo '</div>'; // name-position
                    echo '</div>'; // image-info
                    echo '<div class="bio">' . wp_kses_post($bio) . '</div>';
                    echo '</div>'; // team-card
                }
            }
            ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
