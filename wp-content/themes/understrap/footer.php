<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="footer-back pt-2 pb-2">
	<ul class="<?php echo esc_attr($container); ?> pt-2 pb-2 d-flex flex-wrap justify-content-between align-items-center">
		<?php if( get_theme_mod('tel-label') ): ?>
			<li class="pt-2 pb-2">
				<i class="fa fa-whatsapp top-header-i"></i>
				<span class="top-header-i pr-2 pl-1"> <?php echo get_theme_mod('tel-label'); ?> </span>
				<a href="tel:<?php echo get_theme_mod('tel'); ?>" class="header-contact-link">
					<?php echo get_theme_mod('tel'); ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod('site') ): ?>
			<li class="pt-2 pb-2">
				<i class="fa fa-envelope top-header-i"></i>
				<a href="mailto:<?php echo get_theme_mod('site'); ?>" class="header-contact-link">
					<?php echo get_theme_mod('site'); ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod('social-link') ): ?>
			<li class="pt-2 pb-2">
				<ul class="d-flex">
					<li class="pr-2 pl-2">
						<a href="<?php echo get_theme_mod('social-link'); ?>" class="header-social-link">
							<i class="fa fa-twitter-square" aria-hidden="true"></i>
						</a>
					</li>
				<?php endif; ?>
				<?php if( get_theme_mod('social-link2') ): ?>
					<li class="pr-2 pl-2">
						<a href="<?php echo get_theme_mod('social-link2'); ?>" class="header-social-link">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					</li>
				<?php endif; ?>
				<?php if( get_theme_mod('social-link3') ): ?>
					<li class="pr-2 pl-2">
						<a href="<?php echo get_theme_mod('social-link3'); ?>" class="header-social-link">
							<i class="fa fa-facebook-square" aria-hidden="true"></i>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</li>
	</ul>
	
</div>
<?php if( get_theme_mod('copyright_text') ): ?>
		<div class="copyright-block text-center">
			<span> &copy; </span>
			<span> <?php echo get_theme_mod('copyright_text'); ?> </span>
			<time datetime="<?php echo date('Y');?>"> <?php echo date('Y');?> </time>
		</div>
	<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>

