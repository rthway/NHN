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
        'priority'    => 30,
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
