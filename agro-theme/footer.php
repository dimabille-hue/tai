</main>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-widgets">
            <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            <?php else : ?>
                <p><?php esc_html_e( 'Add widgets to footer area in Appearance → Widgets.', 'agro-theme' ); ?></p>
            <?php endif; ?>
        </div>
        <div class="site-info">&copy; <?php echo date_i18n( 'Y' ); ?> <?php bloginfo( 'name' ); ?></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
