</main>
<!-- Footer -->
<footer>
	<div class="supfooter">
		<div class="container">
			<div class="widget">
				<h3 class="widget-title">Navigation</h3>
					<?php 
						wp_nav_menu([
							'theme_location' => 'footer_menu',
                            'container' => false,
                            'menu_class' => 'footer-menu',
						]);
					?>
			</div>
			<div class="widget">
				<h3 class="widget-title">Contacts</h3>
				<div class="phone-item">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/phone.png" alt="">
					<p><?php echo get_option('my_phone'); ?></p>
				</div>
				<div class="mail-item">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/envelope.png" alt="">
					<p><?php echo get_option('my_mail'); ?></p>
				</div>
				<div class="address-item">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/map-pin.png" alt="">
					<p><?php echo get_option('my_address'); ?></p>
				</div>
			</div>
			<div class="widget">
				<?php echo do_shortcode('[contact-form-7 id="56" title="Contact form 1"]');?>
			</div>
		</div>
	</div>
	<div class="main-footer">
		<div class="container">
			<p class="footer-copyright">&copy; Copyright <script>document.write(new Date().getFullYear());</script>  |  Powered By <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_option('twentytwenty_copyright'); ?></a></p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>