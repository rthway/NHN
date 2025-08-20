<?php
/**
 * The template for displaying the footer
 *
 * @package NHN_Theme
 */
?>

<footer id="site-footer" class="site-footer bg-dark text-light py-5">
    <div class="container">

        <div class="row">

            <!-- Footer Widget Area 1 -->
            <div class="col-md-4">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else: ?>
                    <h5>About Us</h5>
                    <p><?php echo get_theme_mod('footer_about_text', 'Add your footer about text here.'); ?></p>
                <?php endif; ?>
            </div>

            <!-- Footer Widget Area 2 -->
            <div class="col-md-4">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else: ?>
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Footer Widget Area 3 -->
            <div class="col-md-4">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else: ?>
                    <h5>Contact Info</h5>
                    <p>
                        <strong>Address:</strong> <?php echo get_theme_mod('footer_address', '123 Main Street, Kathmandu, Nepal'); ?><br>
                        <strong>Phone:</strong> <?php echo get_theme_mod('footer_phone', '+977-1-1234567'); ?><br>
                        <strong>Email:</strong> <a href="mailto:<?php echo get_theme_mod('footer_email', 'info@yourdomain.com'); ?>" class="text-light"><?php echo get_theme_mod('footer_email', 'info@yourdomain.com'); ?></a>
                    </p>

                    <!-- Social Links -->
                    <div class="footer-social mt-3">
                        <?php if(get_theme_mod('footer_facebook')): ?>
                            <a href="<?php echo esc_url(get_theme_mod('footer_facebook')); ?>" target="_blank" class="me-2"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if(get_theme_mod('footer_twitter')): ?>
                            <a href="<?php echo esc_url(get_theme_mod('footer_twitter')); ?>" target="_blank" class="me-2"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if(get_theme_mod('footer_instagram')): ?>
                            <a href="<?php echo esc_url(get_theme_mod('footer_instagram')); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div> <!-- .row -->

        <hr class="bg-secondary">

        <!-- Footer Bottom -->
        <div class="row">
            <div class="col text-center">
                <p class="mb-0">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
                </p>
            </div>
        </div>

    </div> <!-- .container -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
