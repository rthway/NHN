<div id="charityCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="custom-indicators">
        <?php for ($i=0; $i<3; $i++) : ?>
            <button type="button" data-bs-target="#charityCarousel" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo ($i==0) ? 'active' : ''; ?>">
                <?php echo sprintf('%02d', $i+1); ?>
            </button>
        <?php endfor; ?>
    </div>

    <div class="carousel-inner">
        <?php for ($i=1; $i<=3; $i++) : ?>
            <div class="carousel-item <?php echo ($i==1) ? 'active' : ''; ?>" style="background-image: url('<?php echo get_theme_mod("slide_{$i}_image"); ?>');">
                <div class="carousel-caption">
                    <h6><?php echo get_theme_mod("slide_{$i}_subtitle"); ?></h6>
                    <h1><?php echo get_theme_mod("slide_{$i}_title"); ?></h1>
                    <p><?php echo get_theme_mod("slide_{$i}_description"); ?></p>
                    <a href="<?php echo get_theme_mod("slide_{$i}_btn1_url"); ?>" class="btn btn-yellow">
                        <?php echo get_theme_mod("slide_{$i}_btn1_text"); ?>
                    </a>
                    <a href="<?php echo get_theme_mod("slide_{$i}_btn2_url"); ?>" class="btn btn-red">
                        <?php echo get_theme_mod("slide_{$i}_btn2_text"); ?>
                    </a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>
