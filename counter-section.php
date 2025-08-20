<?php
$video_url = get_theme_mod('counter_video_url', 'https://www.youtube.com/watch?v=pNje3bWz7V8');
$counter_bg = get_theme_mod('counter_bg_image', get_template_directory_uri() . '/images/BH_01.jpg');
$play_image = get_theme_mod('counter_play_image', get_template_directory_uri() . '/images/play.png');

?>

<!-- <section class="-counter-area"> -->
<section class="-counter-area" style="background: url('<?php echo esc_url($counter_bg); ?>') center center / cover no-repeat;">
    <div class="fact-counter-area_bg"></div>
    <div class="counter-container">
        <div class="counter-row">
            <div class="col-xl-7">
                <div class="fact-counter_box">
                    <ul>
                        <?php for($i = 1; $i <= 4; $i++): 
                            $icon = get_theme_mod("counter_icon_$i", get_template_directory_uri() . "/images/icon-$i.svg");
                            $number = get_theme_mod("counter_number_$i", '100');
                            $suffix = get_theme_mod("counter_suffix_$i", '');
                            $text = get_theme_mod("counter_text_$i", "Counter $i Description");
                        ?>
                        <li class="single-fact-counter">
                            <div class="outer-box">
                                <div class="top">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <img src="<?php echo esc_url($icon); ?>" alt="icon">
                                        </div>
                                    </div>
                                    <div class="count-outer count-box">
                                        <span class="count-text"><?php echo esc_html($number); ?></span>
                                        <span><?php echo esc_html($suffix); ?></span>
                                    </div>
                                </div>
                                <div class="text">
                                    <?php echo nl2br(esc_html($text)); ?>
                                </div>
                            </div>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="video-holder-box">
                    <div class="icon">
                        <a class="video-popup" title="Watch Video" href="<?php echo esc_url($video_url); ?>" target="_blank">
                            <img src="<?php echo esc_url($play_image); ?>" alt="Watch Video" style="width:50px;height:50px;">
                        </a>
                    </div>
                    <div class="title">
                        <h5 style="color:aliceblue">Watch Video</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
