<?php
/**
 * Template Name: About Page
 * Description: Custom About Page template for NHN theme with dynamic fields from Customizer.
 */

get_header();
?>

<section class="about-style2-area pd120-0-0">
    <div class="container">
        <div class="row">

            <!-- Left Content -->
            <div class="col-xl-7 text-right-rtl">
                <div class="about-style2_content-box">

                    <!-- Shape -->
                    <div class="thm-shape1 wow slideInLeft animated" 
                        data-wow-delay="0ms" 
                        data-wow-duration="3500ms" 
                        style="visibility: visible; animation-duration: 3500ms; animation-delay: 0ms; animation-name: slideInLeft;">
                        <img class="rotate-me" 
                             src="<?php echo get_template_directory_uri(); ?>/images/thm-shape-1.png" 
                             alt="shape">
                    </div>

                    <!-- Section Title -->
                    <div class="sec-title">
                        <div class="sub-title martop0">
                            <div class="inner">
                                <h3 style="font-family: 'Great Vibes', cursive; color:rgb(77, 131, 201)">
                                    <?php echo esc_html(get_theme_mod('nhn_about_subtitle', 'Help With Featured Cause')); ?>
                                </h3>
                            </div>
                        </div>
                        <h2>
                            <?php echo wp_kses_post(get_theme_mod('nhn_about_title', 'Quality Healthcare In<br> Rural Areas Our Priority')); ?>
                        </h2>
                    </div>

                    <!-- About Description -->
                    <div class="inner-content">
                        <p style="text-align: justify;">
                            <?php echo wp_kses_post(get_theme_mod('nhn_about_desc', 'Nyaya Health Nepal (NHN) is a non-profit organization dedicated to strengthening healthcare access for underserved communities of rural Nepal since 2008.')); ?>
                        </p>

                        <!-- Counters Row -->
                        <ul class="about-counters-row">

                            <!-- Counter 1 -->
                            <li>
                                <div class="left">
                                    <div class="icon">
                                        <img width="85" height="80" 
                                             src="<?php echo esc_url(get_theme_mod('nhn_counter1_icon', 'https://loveicon.smartdemowp.com/wp-content/uploads/2021/06/world.png')); ?>" 
                                             alt="">
                                    </div>
                                    <div class="count-outer count-box style4 counted">
                                        <div class="count-number">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr(get_theme_mod('nhn_counter1_number', '1.3')); ?>">
                                                <?php echo esc_html(get_theme_mod('nhn_counter1_number', '1.3')); ?>
                                            </span>
                                            <span class="count-suffix">
                                                <?php echo esc_html(get_theme_mod('nhn_counter1_suffix', 'k')); ?>
                                            </span>
                                        </div>
                                        <h5><?php echo esc_html(get_theme_mod('nhn_counter1_title', 'Patient Treatments')); ?></h5>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="text">
                                        <p><?php echo wp_kses_post(get_theme_mod('nhn_counter1_desc', 'We have already treated 1.3M patients across Nepal.')); ?></p>
                                    </div>
                                </div>
                            </li>

                            <!-- Counter 2 -->
                            <li class="style2">
                                <div class="left">
                                    <div class="icon">
                                        <img width="84" height="80" 
                                             src="<?php echo esc_url(get_theme_mod('nhn_counter2_icon', 'https://loveicon.smartdemowp.com/wp-content/uploads/2021/06/doller.png')); ?>" 
                                             alt="">
                                    </div>
                                    <div class="count-outer count-box style4 counted">
                                        <div class="count-number">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr(get_theme_mod('nhn_counter2_number', '5')); ?>">
                                                <?php echo esc_html(get_theme_mod('nhn_counter2_number', '5')); ?>
                                            </span>
                                            <span class="count-suffix">
                                                <?php echo esc_html(get_theme_mod('nhn_counter2_suffix', 'm')); ?>
                                            </span>
                                        </div>
                                        <h5><?php echo esc_html(get_theme_mod('nhn_counter2_title', 'Finished Projects')); ?></h5>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="text">
                                        <p><?php echo wp_kses_post(get_theme_mod('nhn_counter2_desc', 'Donate money to build more healthcare and make primary care more accessible.')); ?></p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-xl-5">
                <div class="about-style2_image-box">
                    <img fetchpriority="high" decoding="async" width="485" height="530" 
                         src="<?php echo esc_url(get_theme_mod('nhn_about_image', get_template_directory_uri() . '/images/BH_01.jpg')); ?>" 
                         alt="">
                </div>
            </div>

        </div>
    </div>
</section>

<style>
/*** 
=============================================
    About Style2 Area Css   
=============================================
***/
.about-style2-area{
    position: relative;
    display: block;
    background: #ffffff;
    padding: 0px 0 120px;
}
.about-style2-area.pd120-0-0{
    padding: 120px 0 0;
}

.about-style2_content-box {
    position: relative;
    display: block;
    max-width: 570px;
}
.about-style2_content-box .thm-shape1{
    position: absolute;
    top: -60px;
    left: -70px;
    opacity: 0.10;
}

.about-style2_content-box .sec-title{
    padding-bottom: 32px;    
}

.about-style2_content-box .inner-content{
    position: relative;
    display: block;
}
.about-style2_content-box .inner-content p{
    margin: 0;
}
.about-style2_content-box .inner-content ul{
    position: relative;
    display: block;
    overflow: hidden;
    margin-top: 38px;
}
.about-style2_content-box .inner-content ul li{
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: 40px;
}
.about-style2_content-box .inner-content ul li:last-child{
    margin-bottom: 0;
}

.about-style2_content-box .inner-content ul li .left{
    position: relative;
    display: flex;
    align-items: center;
    width: 270px;
}
.about-style2_content-box .inner-content ul li .left .icon{
    position: relative;
    display: inline-block;
}
.about-style2_content-box .inner-content ul li .count-outer{
    position: relative;
    display: block;
    margin-left: 20px;
}
.about-style2_content-box .inner-content ul li .count-outer .count-number{
    display: flex;
    align-items: baseline;
    gap: 3px;
}
.about-style2_content-box .inner-content ul li .count-outer .count-number .count-text,
.about-style2_content-box .inner-content ul li .count-outer .count-number .count-suffix{
    font-size: 60px;
    line-height: 1;
    font-weight: 700;
}
.about-style2_content-box .inner-content ul li.style2 .count-outer .count-number .count-text,
.about-style2_content-box .inner-content ul li.style2 .count-outer .count-number .count-suffix{
    color: var(--thm-primary);
}

.about-style2_content-box .inner-content ul li .count-outer h5{
    color: var(--thm-black);
    font-size: 14px;
    line-height: 24px;
    font-weight: 600;
    margin: 3px 0 0;
}

.about-style2_content-box .inner-content ul li .right{
    position: relative;
    display: block;
    padding-left: 30px;
}
.about-style2_content-box .inner-content ul li .right:before{
    position: absolute;
    top: -10px;
    left: 0;
    bottom: -10px;
    width: 1px;
    background: #e3e9f4;
    content: "";
}
.about-style2_content-box .inner-content ul li .right .text{
    position: relative;
    display: block;
}
.about-style2_content-box .inner-content ul li .right .text p{
    margin: 0;
}

.about-style2_image-box {
    position: relative;
    display: block;
    margin-left: -28px;
    padding-left: 20px;
}
.about-style2_image-box img{
    width: 100%;
}
</style>

<?php get_footer(); ?>
