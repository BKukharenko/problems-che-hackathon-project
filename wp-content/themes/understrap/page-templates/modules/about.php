<?php $container = get_theme_mod('understrap_container_type'); ?>

<section class="section-padding pt-md-5 pb-md-5">
	<div class="<?php echo esc_attr($container); ?> block-shadow pb-5">

		<?php if( get_sub_field('about_title') ): ?>
				<h2 class="section-title text-center pt-5">
					<?= get_sub_field('about_title') ?>
				</h2>
		<?php endif; ?>

		<?php if( get_sub_field('about_description') ): ?>
				<div class="about-project pt-3 pb-5 text-center m-auto">
					<?= get_sub_field('about_description') ?> 
				</div>
		<?php endif; ?>

		<?php if( get_sub_field('video_link') ): ?>
				<div class="embed-responsive embed-responsive-16by9 video m-auto pb-5">
					<?= get_sub_field('video_link') ?> 
				</div>
		<?php endif; ?>
	</div>
		
	</div>
</section>