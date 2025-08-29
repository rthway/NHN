<?php
// Include WP Bootstrap Navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Enqueue styles and scripts
function nhn_enqueue_assets() {
    // Main theme stylesheet
    wp_enqueue_style('nhn-style', get_stylesheet_uri());

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');

    // Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', array(), '1.10.5');

    // Custom CSS (if using css/style.css)
    wp_enqueue_style('nhn-custom-style', get_template_directory_uri() . '/css/style.css', array(), '1.0');

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap', array(), null);

    // Bootstrap JS + Popper.js
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'nhn_enqueue_assets');


// Register primary menu
function nhn_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nhn'),
    ));
}
add_action('after_setup_theme', 'nhn_register_menus');


// Theme support
function nhn_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'nhn_theme_support');


// Register sidebar
function nhn_register_sidebar() {
    register_sidebar(array(
        'name' => __('Sidebar', 'nhn'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar for the theme', 'nhn'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'nhn_register_sidebar');


// Customizer Settings
function nhn_customize_register($wp_customize) {

    // Logo
    $wp_customize->add_setting('nhn_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nhn_logo', array(
        'label' => __('Header Logo', 'nhn'),
        'section' => 'title_tagline',
        'settings' => 'nhn_logo',
    )));

    // Phone
    $wp_customize->add_setting('nhn_phone', array('default' => '11987654321'));
    $wp_customize->add_control('nhn_phone', array(
        'label' => __('Phone Number', 'nhn'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    // Address
    $wp_customize->add_setting('nhn_address', array('default' => '83 Andy St. Madison NJ 78002'));
    $wp_customize->add_control('nhn_address', array(
        'label' => __('Address', 'nhn'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    // Language
    $wp_customize->add_setting('nhn_language', array('default' => 'English'));
    $wp_customize->add_control('nhn_language', array(
        'label' => __('Language', 'nhn'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    // Social Links
    $socials = ['facebook', 'twitter', 'instagram', 'youtube'];
    foreach ($socials as $social) {
        $wp_customize->add_setting("nhn_social_$social", array('default' => '#'));
        $wp_customize->add_control("nhn_social_$social", array(
            'label' => ucfirst($social) . ' URL',
            'section' => 'title_tagline',
            'type' => 'url',
        ));
    }

    // Donate Button Text & Link
    $wp_customize->add_setting('nhn_donate_text', array('default' => 'DONATE NOW'));
    $wp_customize->add_control('nhn_donate_text', array(
        'label' => __('Donate Button Text', 'nhn'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    $wp_customize->add_setting('nhn_donate_link', array('default' => '#'));
    $wp_customize->add_control('nhn_donate_link', array(
        'label' => __('Donate Button Link', 'nhn'),
        'section' => 'title_tagline',
        'type' => 'url',
    ));
}
add_action('customize_register', 'nhn_customize_register');

// Slider Customizer
// This function adds settings and controls for a slider section in the Customizer. 
function charity_slider_customizer($wp_customize) {
    // Section for sliders
    $wp_customize->add_section('charity_slider_section', array(
        'title'    => __('Slider Section', 'your-textdomain'),
        'priority' => 30,
    ));

    // Repeatable slides (for simplicity, let's do 3)
    for ($i = 1; $i <= 3; $i++) {
        // Slide image
        $wp_customize->add_setting("slide_{$i}_image");
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "slide_{$i}_image", array(
            'label'    => __("Slide {$i} Image", 'your-textdomain'),
            'section'  => 'charity_slider_section',
            'settings' => "slide_{$i}_image",
        )));

        // Slide subtitle (h6)
        $wp_customize->add_setting("slide_{$i}_subtitle", array('default' => ''));
        $wp_customize->add_control("slide_{$i}_subtitle", array(
            'label'   => __("Slide {$i} Subtitle", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'text',
        ));

        // Slide title (h1)
        $wp_customize->add_setting("slide_{$i}_title", array('default' => ''));
        $wp_customize->add_control("slide_{$i}_title", array(
            'label'   => __("Slide {$i} Title", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'text',
        ));

        // Slide description (p)
        $wp_customize->add_setting("slide_{$i}_description", array('default' => ''));
        $wp_customize->add_control("slide_{$i}_description", array(
            'label'   => __("Slide {$i} Description", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'textarea',
        ));

        // Slide button 1
        $wp_customize->add_setting("slide_{$i}_btn1_text", array('default' => ''));
        $wp_customize->add_control("slide_{$i}_btn1_text", array(
            'label'   => __("Slide {$i} Button 1 Text", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'text',
        ));
        $wp_customize->add_setting("slide_{$i}_btn1_url", array('default' => '#'));
        $wp_customize->add_control("slide_{$i}_btn1_url", array(
            'label'   => __("Slide {$i} Button 1 URL", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'url',
        ));

        // Slide button 2
        $wp_customize->add_setting("slide_{$i}_btn2_text", array('default' => ''));
        $wp_customize->add_control("slide_{$i}_btn2_text", array(
            'label'   => __("Slide {$i} Button 2 Text", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'text',
        ));
        $wp_customize->add_setting("slide_{$i}_btn2_url", array('default' => '#'));
        $wp_customize->add_control("slide_{$i}_btn2_url", array(
            'label'   => __("Slide {$i} Button 2 URL", 'your-textdomain'),
            'section' => 'charity_slider_section',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'charity_slider_customizer');



// Customize About Front Section
// This function adds settings and controls for the About Front section in the Customizer.
// Register About-Front section in Customizer
function charity_customize_register_about($wp_customize) {

    // Section
    $wp_customize->add_section('about_front_section', array(
        'title'       => __('About Front Section', 'charity'),
        'priority'    => 35,
        'description' => __('Edit the About Us section content here.', 'charity'),
    ));

    // Subtitle
    $wp_customize->add_setting('about_front_subtitle', array(
        'default'           => 'WE PUT OUR PATIENT FIRST',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_front_subtitle', array(
        'label'    => __('Subtitle', 'charity'),
        'section'  => 'about_front_section',
        'type'     => 'text',
    ));

    // Title
    $wp_customize->add_setting('about_front_title', array(
        'default'           => 'ABOUT US',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_front_title', array(
        'label'    => __('Title', 'charity'),
        'section'  => 'about_front_section',
        'type'     => 'text',
    ));

    // Organization Name
    $wp_customize->add_setting('about_front_org_name', array(
        'default'           => 'Nyaya Health Nepal',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_front_org_name', array(
        'label'    => __('Organization Name', 'charity'),
        'section'  => 'about_front_section',
        'type'     => 'text',
    ));

    // Description
    $wp_customize->add_setting('about_front_description', array(
        'default'           => 'Nyaya Health Nepal (NHN) is a non-profit organization...',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_front_description', array(
        'label'    => __('Description', 'charity'),
        'section'  => 'about_front_section',
        'type'     => 'textarea',
    ));

    // Image
    $wp_customize->add_setting('about_front_image', array(
        'default'           => get_template_directory_uri() . '/images/about-style2_image1.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_front_image', array(
        'label'    => __('Image', 'charity'),
        'section'  => 'about_front_section',
        'settings' => 'about_front_image',
    )));
}
add_action('customize_register', 'charity_customize_register_about');


// Counter Section Customizer
// This function adds settings and controls for the Counter section in the Customizer.
// Counter Section Customizer
function charity_customizer_counter_section($wp_customize) {
    
    // Section
    $wp_customize->add_section('counter_section', array(
        'title' => __('Counter Section', 'charity'),
        'priority' => 40,
        'description' => 'Manage counters and video section',
    ));

    // Video URL
    $wp_customize->add_setting('counter_video_url', array(
        'default' => 'https://www.youtube.com/watch?v=pNje3bWz7V8',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('counter_video_url', array(
        'label' => __('Intro Video URL', 'charity'),
        'section' => 'counter_section',
        'type' => 'url',
    ));
    $wp_customize->add_setting('counter_bg_image', array(
        'default' => get_template_directory_uri() . '/images/BH_01.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'counter_bg_image', array(
        'label' => __('Counter Section Background', 'charity'),
        'section' => 'counter_section',
    )));
    $wp_customize->add_setting('counter_play_image', array(
        'default' => get_template_directory_uri() . '/images/play.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'counter_play_image', array(
        'label' => __('Counter Section Play Button', 'charity'),
        'section' => 'counter_section', // same section as counters
    )));

    // Counters (Repeatable 4 counters)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("counter_icon_$i", array(
            'default' => get_template_directory_uri() . "/images/icon-$i.svg",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "counter_icon_$i", array(
            'label' => "Counter $i Icon",
            'section' => 'counter_section',
        )));

        $wp_customize->add_setting("counter_number_$i", array(
            'default' => '100',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("counter_number_$i", array(
            'label' => "Counter $i Number",
            'section' => 'counter_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("counter_suffix_$i", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("counter_suffix_$i", array(
            'label' => "Counter $i Suffix (e.g., K, M)",
            'section' => 'counter_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("counter_text_$i", array(
            'default' => "Counter $i Description",
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("counter_text_$i", array(
            'label' => "Counter $i Text",
            'section' => 'counter_section',
            'type' => 'textarea',
        ));
    }

}
add_action('customize_register', 'charity_customizer_counter_section');


// Mission / Vision / Culture Customizer
// This function adds settings and controls for the Mission, Vision, and Culture section in the Customizer.
// Mission / Vision / Culture Customizer
function charity_mission_vision_customize_register($wp_customize) {

    // Section for Mission / Vision / Culture
    $wp_customize->add_section('mvc_section', [
        'title' => __('Mission / Vision / Culture', 'charity'),
        'priority' => 45,
    ]);

    // Header small text
    $wp_customize->add_setting('mvc_header_small', [
        'default' => 'QUALITY HEALTHCARE FOR ALL',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('mvc_header_small', [
        'label' => __('Header small text', 'charity'),
        'section' => 'mvc_section',
        'type' => 'text',
    ]);

    // Header title
    $wp_customize->add_setting('mvc_header_title', [
        'default' => 'OUR VISION, MISSION & CULTURE',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('mvc_header_title', [
        'label' => __('Header title', 'charity'),
        'section' => 'mvc_section',
        'type' => 'text',
    ]);

    // Vision
    $wp_customize->add_setting('mvc_vision', [
        'default' => 'Quality healthcare for all.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('mvc_vision', [
        'label' => __('Vision', 'charity'),
        'section' => 'mvc_section',
        'type' => 'textarea',
    ]);

    // Mission
    $wp_customize->add_setting('mvc_mission', [
        'default' => 'To improve healthcare for underserved populations by collaborating with the government of Nepal.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('mvc_mission', [
        'label' => __('Mission', 'charity'),
        'section' => 'mvc_section',
        'type' => 'textarea',
    ]);

    // Culture items (4 items)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("mvc_culture_title_$i", [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("mvc_culture_title_$i", [
            'label' => __("Culture $i Title", 'charity'),
            'section' => 'mvc_section',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("mvc_culture_desc_$i", [
            'default' => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        $wp_customize->add_control("mvc_culture_desc_$i", [
            'label' => __("Culture $i Description", 'charity'),
            'section' => 'mvc_section',
            'type' => 'textarea',
        ]);
    }

    // Left image
    $wp_customize->add_setting('mvc_left_image', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mvc_left_image', [
        'label' => __('Left Image', 'charity'),
        'section' => 'mvc_section',
        'settings' => 'mvc_left_image',
    ]));

    
}
add_action('customize_register', 'charity_mission_vision_customize_register');

// Core Components Customizer
// This function adds settings and controls for the Core Components section in the Customizer.
// Core Components Customizer

function core_components_customize_register($wp_customize) {
    // Panel / Section
    $wp_customize->add_section('charity_core_components_section', array(
        'title'    => __('Core Components', 'nhn'),
        'priority' => 50,
    ));

    // Subtitle
    $wp_customize->add_setting('charity_core_subtitle', array(
        'default'   => 'Core Components of NHN',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('charity_core_subtitle', array(
        'label'   => __('Subtitle', 'nhn'),
        'section' => 'charity_core_components_section',
        'type'    => 'text',
    ));

    // Title
    $wp_customize->add_setting('charity_core_title', array(
        'default'   => 'OUR MODELS',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('charity_core_title', array(
        'label'   => __('Main Title', 'nhn'),
        'section' => 'charity_core_components_section',
        'type'    => 'text',
    ));

    // Loop for 3 models
    for ($i = 1; $i <= 3; $i++) {
        // Title
        $wp_customize->add_setting("charity_core_model_title_$i", array(
            'default'   => "Model Title $i",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("charity_core_model_title_$i", array(
            'label'   => __("Model $i Title", 'nhn'),
            'section' => 'charity_core_components_section',
            'type'    => 'text',
        ));

        // Description
        $wp_customize->add_setting("charity_core_model_desc_$i", array(
            'default'   => "Model $i short description",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("charity_core_model_desc_$i", array(
            'label'   => __("Model $i Description", 'nhn'),
            'section' => 'charity_core_components_section',
            'type'    => 'textarea',
        ));

        // Link
        $wp_customize->add_setting("charity_core_model_link_$i", array(
            'default'   => "#",
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("charity_core_model_link_$i", array(
            'label'   => __("Model $i Link", 'nhn'),
            'section' => 'charity_core_components_section',
            'type'    => 'url',
        ));

        // Image
        $wp_customize->add_setting("charity_core_model_image_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "charity_core_model_image_$i", array(
            'label'   => __("Model $i Image", 'nhn'),
            'section' => 'charity_core_components_section',
        )));
    }
}
add_action('customize_register', 'core_components_customize_register');




// ===== Register Custom Post Type: Publications =====
function nhn_register_publications_cpt() {
    $labels = array(
        'name'               => __('Publications', 'nhn'),
        'singular_name'      => __('Publication', 'nhn'),
        'menu_name'          => __('Publications', 'nhn'),
        'name_admin_bar'     => __('Publication', 'nhn'),
        'add_new'            => __('Add New', 'nhn'),
        'add_new_item'       => __('Add New Publication', 'nhn'),
        'new_item'           => __('New Publication', 'nhn'),
        'edit_item'          => __('Edit Publication', 'nhn'),
        'view_item'          => __('View Publication', 'nhn'),
        'all_items'          => __('All Publications', 'nhn'),
        'search_items'       => __('Search Publications', 'nhn'),
        'not_found'          => __('No publications found.', 'nhn'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'publications'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail'),
    );

    register_post_type('publications', $args);
}
add_action('init', 'nhn_register_publications_cpt');

// ===== Publications Section Customizer =====
function nhn_publications_customize_register($wp_customize) {
    $wp_customize->add_section('nhn_publications_section', array(
        'title'    => __('Publications Section', 'nhn'),
        'priority' => 55,
    ));

    // Heading
    $wp_customize->add_setting('nhn_publications_heading', array(
        'default'   => 'Our Publications',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('nhn_publications_heading', array(
        'label'   => __('Section Heading', 'nhn'),
        'section' => 'nhn_publications_section',
        'type'    => 'text',
    ));

    // Subheading
    $wp_customize->add_setting('nhn_publications_subheading', array(
        'default'   => 'Latest reports, research and publications',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('nhn_publications_subheading', array(
        'label'   => __('Section Subheading', 'nhn'),
        'section' => 'nhn_publications_section',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'nhn_publications_customize_register');


// ===== Add PDF Upload for Publications =====
function nhn_add_pdf_meta_box() {
    add_meta_box(
        'nhn_publication_pdf',
        __('Publication PDF', 'nhn'),
        'nhn_publication_pdf_callback',
        'publications',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'nhn_add_pdf_meta_box');

function nhn_publication_pdf_callback($post) {
    wp_nonce_field('nhn_save_pdf_meta', 'nhn_pdf_meta_nonce');
    $pdf_url = get_post_meta($post->ID, '_nhn_publication_pdf', true);
    ?>
    <p>
        <label for="nhn_publication_pdf"><?php _e('Upload or paste PDF URL:', 'nhn'); ?></label>
        <input type="text" name="nhn_publication_pdf" id="nhn_publication_pdf"
               value="<?php echo esc_url($pdf_url); ?>" style="width:100%;" />
    </p>
    <p>
        <input type="button" id="nhn_pdf_upload_btn" class="button" value="<?php _e('Upload PDF', 'nhn'); ?>" />
    </p>
    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('#nhn_pdf_upload_btn').click(function(e){
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose PDF',
                button: { text: 'Select PDF' },
                multiple: false
            });
            mediaUploader.on('select', function(){
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#nhn_publication_pdf').val(attachment.url);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

// Save PDF Meta
function nhn_save_pdf_meta($post_id) {
    if (!isset($_POST['nhn_pdf_meta_nonce']) || !wp_verify_nonce($_POST['nhn_pdf_meta_nonce'], 'nhn_save_pdf_meta')) {
        return;
    }
    if (array_key_exists('nhn_publication_pdf', $_POST)) {
        update_post_meta($post_id, '_nhn_publication_pdf', esc_url_raw($_POST['nhn_publication_pdf']));
    }
}
add_action('save_post', 'nhn_save_pdf_meta');



// ===== Add Register Customizer settings for Partners =====
// Register Customizer settings for Partners
function nhn_partners_customize_register($wp_customize) {

    // GET IN TOUCH button link
    $wp_customize->add_setting('partner_button_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('partner_button_link', array(
        'label' => __('GET IN TOUCH Button Link', 'nhn'),
        'section' => 'partners_section',
        'type' => 'url',
    ));
    // Section for Partners
    $wp_customize->add_section('partners_section', array(
        'title' => __('Partners Section', 'nhn'),
        'priority' => 60,
        'description' => 'Manage your supporting partners logos',
    ));

    // Number of partners
    $wp_customize->add_setting('partners_count', array(
        'default' => 4,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('partners_count', array(
        'label' => __('Number of Partner Logos', 'nhn'),
        'section' => 'partners_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));

    // Partner logos loop
    $partners_count = get_theme_mod('partners_count', 4);
    for ($i = 1; $i <= $partners_count; $i++) {
        $wp_customize->add_setting("partner_logo_$i", array(
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "partner_logo_$i", array(
            'label' => "Partner Logo $i",
            'section' => 'partners_section',
            'settings' => "partner_logo_$i",
        )));
    }
    
}
add_action('customize_register', 'nhn_partners_customize_register');

// 
// Register Contact Us Section in Customizer
function nhn_contact_customize_register($wp_customize) {

    // Section for Contact Us
    $wp_customize->add_section('contact_us_section', array(
        'title' => __('Contact Us Section', 'nhn'),
        'priority' => 70,
        'description' => __('Manage the Contact Us section content', 'nhn'),
    ));

    // Subheading
    $wp_customize->add_setting('contact_subheading', array(
        'default' => 'Help With Featured Cause',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_subheading', array(
        'label' => __('Subheading', 'nhn'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));

    // Heading
    $wp_customize->add_setting('contact_heading', array(
        'default' => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_heading', array(
        'label' => __('Heading', 'nhn'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'nhn_contact_customize_register');



// Register 2 Locations in Customizer
function nhn_contact_locations_customize($wp_customize) {

    $wp_customize->add_section('contact_locations_section', array(
        'title' => __('Contact Locations', 'nhn'),
        'priority' => 31,
    ));

    // ----- Head Office -----
    $wp_customize->add_setting('head_office_title', array(
        'default' => 'Head Office',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('head_office_title', array(
        'label' => __('Head Office Title', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('head_office_address', array(
        'default' => "123 Main Street,\nKathmandu, Nepal",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('head_office_address', array(
        'label' => __('Head Office Address', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('head_office_phone', array(
        'default' => '+977-1-1234567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('head_office_phone', array(
        'label' => __('Head Office Phone', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('head_office_email', array(
        'default' => 'info@yourdomain.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('head_office_email', array(
        'label' => __('Head Office Email', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'email',
    ));

    // ----- Branch Office -----
    $wp_customize->add_setting('branch_office_title', array(
        'default' => 'Branch Office',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('branch_office_title', array(
        'label' => __('Branch Office Title', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('branch_office_address', array(
        'default' => "456 City Road,\nPokhara, Nepal",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('branch_office_address', array(
        'label' => __('Branch Office Address', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('branch_office_phone', array(
        'default' => '+977-61-7654321',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('branch_office_phone', array(
        'label' => __('Branch Office Phone', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('branch_office_email', array(
        'default' => 'contact@yourdomain.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('branch_office_email', array(
        'label' => __('Branch Office Email', 'nhn'),
        'section' => 'contact_locations_section',
        'type' => 'email',
    ));
}
add_action('customize_register', 'nhn_contact_locations_customize');

function nhn_footer_widgets() {
    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'before_widget' => '<div class="footer-widget mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer-2',
        'before_widget' => '<div class="footer-widget mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => 'Footer 3',
        'id' => 'footer-3',
        'before_widget' => '<div class="footer-widget mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ));
}
add_action('widgets_init', 'nhn_footer_widgets');


// ===== Contact Form 7 Integration =====

// Check if CF7 is installed, if not prompt admin
function mytheme_cf7_check() {
    if (!is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-warning is-dismissible">
            <p><strong>Contact Form 7</strong> is not installed. Please install & activate <a href="' . admin_url('plugin-install.php?tab=search&s=contact+form+7') . '">Contact Form 7</a>.</p>
            </div>';
        });
    }
}
add_action('admin_init', 'mytheme_cf7_check');


// Create a default CF7 form on theme activation
function mytheme_create_cf7_form() {
    if (class_exists('WPCF7_ContactForm')) {
        // Check if a form with this title already exists
        $form_title = 'Contact Us';
        $existing_forms = get_posts(array(
            'post_type' => 'wpcf7_contact_form',
            'title' => $form_title,
            'posts_per_page' => 1,
        ));

        if (empty($existing_forms)) {
            $form = WPCF7_ContactForm::get_template();
            $form->set_title($form_title);
            $form->set_properties(array(
                'form' => '[text* your-name placeholder "Your Name"]<br>
                           [email* your-email placeholder "Your Email"]<br>
                           [textarea your-message placeholder "Your Message"]<br>
                           [submit "Send"]',
                'mail' => array(
                    'subject' => 'New message from [your-name]',
                    'recipient' => get_option('admin_email'),
                    'sender' => '[your-name] <[your-email]>',
                    'body' => "[your-name] <[your-email]> wrote:\n\n[your-message]",
                ),
            ));
            $form->save();
        }
    }
}
add_action('after_switch_theme', 'mytheme_create_cf7_form');



// ===== About Page Customizer Settings =====
/**
 * NHN Theme Customizer - About Page Settings
 */
function nhn_customize_register_about( $wp_customize ) {

    // === Panel: About Page Settings ===
    $wp_customize->add_panel('nhn_about_panel', array(
        'title'       => __('About Page Settings', 'nhn'),
        'priority'    => 20,
    ));

    /**
     * ======================
     * Section 1: About Content
     * ======================
     */
    $wp_customize->add_section('nhn_about_section', array(
        'title'    => __('About Content', 'nhn'),
        'priority' => 10,
        'panel'    => 'nhn_about_panel',
    ));

    // Sub Title
    $wp_customize->add_setting('nhn_about_subtitle', array(
        'default'   => 'Help With Featured Cause',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('nhn_about_subtitle', array(
        'label'    => __('Sub Title', 'nhn'),
        'section'  => 'nhn_about_section',
        'type'     => 'text',
    ));

    // Main Title
    $wp_customize->add_setting('nhn_about_title', array(
        'default'   => 'Quality Healthcare In Rural Areas Our Priority',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('nhn_about_title', array(
        'label'    => __('Main Title', 'nhn'),
        'section'  => 'nhn_about_section',
        'type'     => 'textarea',
    ));

    // Description
    $wp_customize->add_setting('nhn_about_desc', array(
        'default'   => 'Nyaya Health Nepal (NHN) is a non-profit organization dedicated to strengthening healthcare access for underserved communities of rural Nepal since 2008.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('nhn_about_desc', array(
        'label'    => __('Description', 'nhn'),
        'section'  => 'nhn_about_section',
        'type'     => 'textarea',
    ));

    // Right Side Image
    $wp_customize->add_setting('nhn_about_image', array(
        'default'   => get_template_directory_uri() . '/images/BH_01.jpg',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nhn_about_image', array(
        'label'    => __('Right Side Image', 'nhn'),
        'section'  => 'nhn_about_section',
    )));

    // Example Counter (repeat same pattern for counter2,3 etc.)
    $wp_customize->add_setting('nhn_counter1_icon', array(
        'default' => 'https://loveicon.smartdemowp.com/wp-content/uploads/2021/06/world.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nhn_counter1_icon', array(
        'label'    => __('Counter 1 Icon', 'nhn'),
        'section'  => 'nhn_about_section',
    )));

    $wp_customize->add_setting('nhn_counter1_number', array(
        'default' => '1.3',
    ));
    $wp_customize->add_control('nhn_counter1_number', array(
        'label'   => __('Counter 1 Number', 'nhn'),
        'section' => 'nhn_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('nhn_counter1_suffix', array(
        'default' => 'k',
    ));
    $wp_customize->add_control('nhn_counter1_suffix', array(
        'label'   => __('Counter 1 Suffix', 'nhn'),
        'section' => 'nhn_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('nhn_counter1_title', array(
        'default' => 'Patient Treatments',
    ));
    $wp_customize->add_control('nhn_counter1_title', array(
        'label'   => __('Counter 1 Title', 'nhn'),
        'section' => 'nhn_about_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('nhn_counter1_desc', array(
        'default' => 'We have already treated 1.3M patients across Nepal.',
    ));
    $wp_customize->add_control('nhn_counter1_desc', array(
        'label'   => __('Counter 1 Description', 'nhn'),
        'section' => 'nhn_about_section',
        'type'    => 'textarea',
    ));

    /**
     * ======================
     * Section 2: Timeline Settings
     * ======================
     */
    $wp_customize->add_section('nhn_timeline_section', array(
        'title'    => __('Timeline Settings', 'nhn'),
        'priority' => 20,
        'panel'    => 'nhn_about_panel',
    ));

    $wp_customize->add_setting('nhn_timeline_count', array(
        'default' => 3,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('nhn_timeline_count', array(
        'label' => __('Number of Timeline Items', 'nhn'),
        'section' => 'nhn_timeline_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));

    // Loop dynamic timeline items
    $timeline_count = get_theme_mod('nhn_timeline_count', 3);
    for ($i = 1; $i <= $timeline_count; $i++) {
        $wp_customize->add_setting("nhn_timeline_date_$i", array(
            'default' => "20$i",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("nhn_timeline_date_$i", array(
            'label' => __("Timeline #$i Date", 'nhn'),
            'section' => 'nhn_timeline_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("nhn_timeline_title_$i", array(
            'default' => "Timeline Event $i",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("nhn_timeline_title_$i", array(
            'label' => __("Timeline #$i Title", 'nhn'),
            'section' => 'nhn_timeline_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("nhn_timeline_descr_$i", array(
            'default' => "Description for timeline event $i",
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("nhn_timeline_descr_$i", array(
            'label' => __("Timeline #$i Description", 'nhn'),
            'section' => 'nhn_timeline_section',
            'type' => 'textarea',
        ));

        $wp_customize->add_setting("nhn_timeline_color_$i", array(
            'default' => "#41516C",
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            "nhn_timeline_color_$i",
            array(
                'label' => __("Timeline #$i Accent Color", 'nhn'),
                'section' => 'nhn_timeline_section',
            )
        ));
    }

    /**
     * ======================
     * Section 3: Map Locations
     * ======================
     */
    $wp_customize->add_section('nhn_map_section', array(
        'title'    => __('Map Locations', 'nhn'),
        'priority' => 30,
        'panel'    => 'nhn_about_panel',
    ));

    $wp_customize->add_setting('nhn_map_sites', array(
        'default' => '[]',
        'sanitize_callback' => 'wp_kses_post'
    ));
    $wp_customize->add_control('nhn_map_sites', array(
        'label'       => __('Hospital Locations (JSON Format)', 'nhn'),
        'description' => __('Enter sites as JSON: 
[
 {"name":"Bayalpata Hospital","lat":29.225,"lng":81.198},
 {"name":"KTM Hospital","lat":27.7172,"lng":85.3240}
]', 'nhn'),
        'section'     => 'nhn_map_section',
        'type'        => 'textarea',
    ));

}
add_action('customize_register', 'nhn_customize_register_about');


// === Enqueue Leaflet.js ===
function nhn_enqueue_leaflet() {
    wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
    wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), null, true);

    // Pass PHP data (Customizer JSON) to JS
    $sites = get_theme_mod('nhn_map_sites', '[]');
    wp_localize_script('leaflet-js', 'nhnMapData', array(
        'sites' => json_decode($sites, true)
    ));
}
add_action('wp_enqueue_scripts', 'nhn_enqueue_leaflet');


// ===== Team Page Customizer Settings =====
function nhn_customize_register_team($wp_customize) {

    // === Panel: Team Page Settings ===
    $wp_customize->add_panel('nhn_team_panel', array(
        'title'       => __('Team Page Settings', 'nhn'),
        'priority'    => 25,
    ));

    // === Section: Team Members ===
    $wp_customize->add_section('nhn_team_section', array(
        'title'       => __('Board Members', 'nhn'),
        'panel'       => 'nhn_team_panel',
        'priority'    => 1,
    ));

    // Number of Team Members
    $wp_customize->add_setting('nhn_team_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('nhn_team_count', array(
        'label'       => __('Number of Team Members', 'nhn'),
        'section'     => 'nhn_team_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));

    // Get current number of members
    $team_count = get_theme_mod('nhn_team_count', 3);

    // Dynamically create fields for each team member according to the selected number
    for ($i = 1; $i <= $team_count; $i++) {
        // Settings
        $wp_customize->add_setting("nhn_team_name_$i", array('sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_setting("nhn_team_position_$i", array('sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_setting("nhn_team_bio_$i", array('sanitize_callback' => 'wp_kses_post'));
        $wp_customize->add_setting("nhn_team_image_$i", array('sanitize_callback' => 'esc_url'));

        // Controls
        $wp_customize->add_control("nhn_team_name_$i", array(
            'label'    => "Team Member $i Name",
            'section'  => 'nhn_team_section',
            'type'     => 'text',
        ));
        $wp_customize->add_control("nhn_team_position_$i", array(
            'label'    => "Team Member $i Position",
            'section'  => 'nhn_team_section',
            'type'     => 'text',
        ));
        $wp_customize->add_control("nhn_team_bio_$i", array(
            'label'    => "Team Member $i Bio",
            'section'  => 'nhn_team_section',
            'type'     => 'textarea',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "nhn_team_image_$i", array(
            'label'    => "Team Member $i Photo",
            'section'  => 'nhn_team_section',
            'settings' => "nhn_team_image_$i",
        )));
    }
    // === Section: Our Team Members under Team Page Settings panel ===
    $wp_customize->add_section('nhn_our_team_section', array(
        'title'       => __('Our Team Members', 'nhn'),
        'panel'       => 'nhn_team_panel', // assign to existing panel
        'priority'    => 2, // priority after Board Members (which is 1)
    ));

    // Number of Our Team Members
    $wp_customize->add_setting('nhn_our_team_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('nhn_our_team_count', array(
        'label'       => __('Number of Our Team Members', 'nhn'),
        'section'     => 'nhn_our_team_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));

    // Get current number of members
    $our_team_count = get_theme_mod('nhn_our_team_count', 3);

    // Dynamically create fields for each team member
    for ($i = 1; $i <= $our_team_count; $i++) {
        // Settings
        $wp_customize->add_setting("nhn_our_team_name_$i", array('sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_setting("nhn_our_team_position_$i", array('sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_setting("nhn_our_team_bio_$i", array('sanitize_callback' => 'wp_kses_post'));
        $wp_customize->add_setting("nhn_our_team_image_$i", array('sanitize_callback' => 'esc_url'));

        // Controls
        $wp_customize->add_control("nhn_our_team_name_$i", array(
            'label'    => "Our Team Member $i Name",
            'section'  => 'nhn_our_team_section',
            'type'     => 'text',
        ));
        $wp_customize->add_control("nhn_our_team_position_$i", array(
            'label'    => "Our Team Member $i Position",
            'section'  => 'nhn_our_team_section',
            'type'     => 'text',
        ));
        $wp_customize->add_control("nhn_our_team_bio_$i", array(
            'label'    => "Our Team Member $i Bio",
            'section'  => 'nhn_our_team_section',
            'type'     => 'textarea',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "nhn_our_team_image_$i", array(
            'label'    => "Our Team Member $i Photo",
            'section'  => 'nhn_our_team_section',
            'settings' => "nhn_our_team_image_$i",
        )));
    }

}
add_action('customize_register', 'nhn_customize_register_team');




