<?php $container = get_theme_mod('understrap_container_type'); ?>

<section class="about-section section-padding pt-md-5 pb-md-5">
	<div class="<?php echo esc_attr($container); ?> block-shadow pb-5">

		<?php if( get_sub_field('about_title') ): ?>
			<h2 class="section-title text-center pt-5">
				<?= get_sub_field('about_title') ?>
			</h2>
		<?php endif; ?>

		<?php if( get_sub_field('about_description') ): ?>
			<div class="about-project pt-5 pb-5 text-center m-auto">
				<?= get_sub_field('about_description') ?> 
			</div>
		<?php endif; ?>
		<div class="video m-auto text-center">
			<video class="w-100" autoplay loop> 
				<source src="wp-content/themes/understrap/video/main-video.mp4">
			</video>
		</div>
	</div>
</section>