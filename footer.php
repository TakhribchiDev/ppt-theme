<?php 
/**
 * PPT Theme footer
 * 
 * @package ppttheme
 */
?>

<footer class="container footer-container">
    <div class="row justify-content-between">
        <div class="col-md-6 mr-auto">
            <div class="row">
                <div class="col-md-3">
					<?php
					wp_nav_menu([
						'theme_location' => 'footer-primary',
						'menu_class' => 'nav ppt-footer-nav'
					]);
					?>
                </div><!-- .col-md-3 -->
                <div class="col-md-3">
					<?php
					wp_nav_menu([
						'theme_location' => 'footer-secondary',
						'menu_class' => 'nav ppt-footer-nav'
					]);
					?>
                </div><!-- .col-md-3 -->
                <div class="col-md-3">
                    <div class="payment-icon">
                        <img src="<?php echo get_template_directory_uri() . '/img/zarinpal.png'; ?>" alt="payment-icon">
                    </div>
                </div><!-- .col-md-3 -->
                <div class="col-md-3">
                    <div class="site-license">
                        <img src="<?php echo get_template_directory_uri() . '/img/enamad.png'; ?>" alt="site-license">
                    </div>
                </div><!-- .col-md-3 -->
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-social-links">
                        <a class="social-link link-telegram" href="#" role="button">
                            <i class="ppt-icon ppt-telegram"></i>
                        </a>
                        <a class="social-link link-instagram" href="#" role="button">
                            <i class="ppt-icon ppt-instagram"></i>
                        </a>
                        <a class="social-link link-facebook" href="#" role="button">
                            <i class="ppt-icon ppt-facebook"></i>
                        </a>
                        <a class="social-link link-twitter" href="#" role="button">
                            <i class="ppt-icon ppt-twitter"></i>
                        </a>
                        <a class="social-link link-mail" href="#" role="button">
                            <i class="ppt-icon ppt-mail"></i>
                        </a>
                    </div>
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </div><!-- .col-md-6 -->
        <div class="col-md-4 ml-auto">
            <form class="news-subscribe-form" action="#" method="post">
                <label for="news-email" class="subscribe-label">
					<?php esc_html_e( 'عضویت در خبرنامه', 'ppttheme' ) ?>
                </label>
                <div class="input-group">
                    <input type="email" id="news-email" class="form-control subscribe-email"  name="news-email" placeholder="آدرس ایمیل" >
                    <button class="subscribe-btn" type="submit"><?php esc_html_e( 'عضویت', 'ppttheme' ) ?></button>
                </div>
                <p class="subscribe-description">با عضویت در خبرنامه دیگر لازم نیست برای آگاهی از قالب‌ها و ابزارهای جدید به سایت سر بزنید، ما همه را به اطلاع شما می رسانیم.</p>
            </form>

        </div><!-- .col-md-4 -->
    </div><!-- .row -->
    <div class="copyright">
        تمامی حقوق این وبسایت متعلق به پرده نگار&copy; می باشد.
    </div><!-- .copyright -->
</footer>

<?php wp_footer(); ?>

</body>
</html>