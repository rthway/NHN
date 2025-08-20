<section id="about-us" class="container px-4 py-5">
    <header class="text-center mb-5">
        <p class="text-danger fs-6 fst-italic"><?php echo get_theme_mod('about_front_subtitle', 'WE PUT OUR PATIENT FIRST'); ?></p>
        <h1 class="display-4 fw-bold text-dark"><?php echo get_theme_mod('about_front_title', 'ABOUT US'); ?></h1>
    </header>

    <div class="content-section">
        <div class="container">
            <div class="row g-4 align-items-center">

                <!-- Left Image -->
                <div class="col-md-6">
                    <div class="image-wrapper">
                        <img src="<?php echo get_theme_mod('about_front_image', get_template_directory_uri() . '/images/about-style2_image1.jpg'); ?>" 
                             alt="<?php echo get_theme_mod('about_front_org_name', 'Nyaya Health Nepal'); ?>" 
                             class="img-fluid w-100 hover-zoom">
                        <div class="overlay"></div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-md-6 d-flex align-items-center">
                    <div class="about-box">
                        <h2 class="about-title"><?php echo get_theme_mod('about_front_org_name', 'Nyaya Health Nepal'); ?></h2>
                        <p class="about-text"><?php echo get_theme_mod('about_front_description', 'Nyaya Health Nepal (NHN) is a non-profit organization...'); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<br><br>