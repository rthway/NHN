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

<section id="timeline" class="container px-4 py-5">
    <header class="text-center mb-5">
        <p class="text-danger fs-6 fst-italic"><?php echo esc_html(get_theme_mod('nhn_timeline_subtitle', 'MAJOR MILESTONE WE GRAB')); ?></p>
        <h1 class="display-4 fw-bold text-dark"><?php echo esc_html(get_theme_mod('nhn_timeline_title', 'NHN Timeline')); ?></h1>
    </header>

    <ul class="timeline">
        <?php
        $timeline_count = get_theme_mod('nhn_timeline_count', 3);
        for ($i = 1; $i <= $timeline_count; $i++):
            $date = get_theme_mod("nhn_timeline_date_$i");
            $title = get_theme_mod("nhn_timeline_title_$i");
            $descr = get_theme_mod("nhn_timeline_descr_$i");
            $color = get_theme_mod("nhn_timeline_color_$i", "#41516C");
        ?>
        <li class="timeline-item" style="--accent-color: <?php echo esc_attr($color); ?>; --bgColor: #fff;">
            <div class="date"><?php echo esc_html($date); ?></div>
            <div class="title"><?php echo esc_html($title); ?></div>
            <div class="descr"><?php echo esc_html($descr); ?></div>
        </li>
        <?php endfor; ?>
    </ul>
</section>
<header class="text-center mb-5">
  <p class="text-danger fs-6 fst-italic">Where we are:</p>
  <h1 class="display-4 fw-bold text-dark">NHN Footprint</h1>
</header>

<div id="map"></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (typeof L !== 'undefined' && nhnMapData.sites.length > 0) {
        // Initialize Map
        var map = L.map('map').setView([28.3949, 84.1240], 7); // Center Nepal

        // Load OpenStreetMap Tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Add Pins with Names
        nhnMapData.sites.forEach(function(site) {
            if(site.lat && site.lng) {
                L.marker([site.lat, site.lng])
                    .addTo(map)
                    .bindPopup("<b>" + site.name + "</b>")
                    .bindTooltip(site.name, { 
                        permanent: true, 
                        direction: "top", 
                        offset: [0, -10] 
                    }); 
            }
        });
    }
});
</script>

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

/* timeline  */
.timeline {
  --col-gap: 2rem;
  --row-gap: 2rem;
  --line-w: 0.25rem;
  display: grid;
  grid-template-columns: var(--line-w) 1fr;
  grid-auto-columns: max-content;
  column-gap: var(--col-gap);
  list-style: none;
  width: min(60rem, 90%);
  margin-inline: auto;
}

.timeline::before {
  content: "";
  grid-column: 1;
  grid-row: 1 / span 20;
  background: rgb(225, 225, 225);
  border-radius: calc(var(--line-w) / 2);
}

.timeline-item:not(:last-child) {
  margin-bottom: var(--row-gap);
}

.timeline-item {
  grid-column: 2;
  --inlineP: 1.5rem;
  margin-inline: var(--inlineP);
  grid-row: span 2;
  display: grid;
  grid-template-rows: min-content min-content min-content;
}

.timeline-item .date {
  --dateH: 3rem;
  height: var(--dateH);
  margin-inline: calc(var(--inlineP) * -1);
  text-align: center;
  background-color: var(--accent-color);
  color: white;
  font-size: 1.25rem;
  font-weight: 700;
  display: grid;
  place-content: center;
  position: relative;
  border-radius: calc(var(--dateH) / 2) 0 0 calc(var(--dateH) / 2);
}

.timeline-item .date::before {
  content: "";
  width: var(--inlineP);
  aspect-ratio: 1;
  background: var(--accent-color);
  background-image: linear-gradient(rgba(0, 0, 0, 0.2) 100%, transparent);
  position: absolute;
  top: 100%;
  clip-path: polygon(0 0, 100% 0, 0 100%);
  right: 0;
}

.timeline-item .date::after {
  content: "";
  position: absolute;
  width: 2rem;
  aspect-ratio: 1;
  background: var(--bgColor);
  border: 0.3rem solid var(--accent-color);
  border-radius: 50%;
  top: 50%;
  transform: translate(50%, -50%);
  right: calc(100% + var(--col-gap) + var(--line-w) / 2);
}

.timeline-item .title,
.timeline-item .descr {
  background: var(--bgColor);
  position: relative;
  padding-inline: 1.5rem;
}
.timeline-item .title {
  overflow: hidden;
  padding-block-start: 1.5rem;
  padding-block-end: 1rem;
  font-weight: 500;
}
.timeline-item .descr {
  padding-block-end: 1.5rem;
  font-weight: 300;
}

.timeline-item .title::before,

.timeline-item .title::before {
  bottom: calc(100% + 0.125rem);
}
.timeline-item .descr::before {
  z-index: -1;
  bottom: 0.25rem;
}

@media (min-width: 40rem) {
  .timeline {
    grid-template-columns: 1fr var(--line-w) 1fr;
  }
  .timeline::before {
    grid-column: 2;
  }
  .timeline-item:nth-child(odd) {
    grid-column: 1;
  }
  .timeline-item:nth-child(even) {
    grid-column: 3;
  }
  .timeline-item:nth-child(2) {
    grid-row: 2/4;
  }
  .timeline-item:nth-child(odd) .date::before {
    clip-path: polygon(0 0, 100% 0, 100% 100%);
    left: 0;
  }
  .timeline-item:nth-child(odd) .date::after {
    transform: translate(-50%, -50%);
    left: calc(100% + var(--col-gap) + var(--line-w) / 2);
  }
  .timeline-item:nth-child(odd) .date {
    border-radius: 0 calc(var(--dateH) / 2) calc(var(--dateH) / 2) 0;
  }
}
/* map */
#map {
    width: 80%;       /* 100% - 10% left - 10% right = 80% */
    height: 500px;
    margin: 0 auto;   /* centers it horizontally */
}

</style>

<?php get_footer(); ?>
