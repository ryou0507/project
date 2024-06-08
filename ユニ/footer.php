<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-logo.webp" alt="栗栖ユニロゴ" /></a>
        </div>
        <div class="footer-nav">
            <ul>
                <li><a href="<?php echo home_url('/'); ?>">HOME</a></li>
                <li><a href="<?php echo home_url(); ?>/about">ABOUT</a></li>
                <li><a href="<?php echo home_url(); ?>/goods">GOODS</a></li>
                <li><a href="<?php echo home_url(); ?>/works">WORKS</a></li>
                <li><a href="<?php echo home_url('/policy'); ?>">POLICY</a></li>
            </ul>
        </div>
        <div class="footer-icons">
            <div class="footer-X-icon">
                <a href="https://x.com/P_yun1">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-X icon.webp" alt="X icon" class="footer-X-img" />
                </a>
            </div>
            <div class="footer-youtube-icon">
                <a href="https://www.youtube.com/@CrisYuni">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/yuni-youtube-icon.webp" alt="youtube icon" class="footer-youtube-img" />
                </a>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <small>© 2024 CrisYuni. All Rights Reserved.</small>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>