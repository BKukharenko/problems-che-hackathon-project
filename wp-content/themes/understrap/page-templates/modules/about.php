<?php $container = get_theme_mod('understrap_container_type'); ?>

<section>
	<div class="<?php echo esc_attr($container); ?>">

		<?php if( get_sub_field('about_title') ): ?>
				<h2>
					<?= get_sub_field('about_title') ?>
				</h2>
		<?php endif; ?>

		<?php if( get_sub_field('about_description') ): ?>
				<p>
					<?= get_sub_field('about_description') ?> 
				</p>
		<?php endif; ?>

		<?php if( get_sub_field('video_link') ): ?>
				<div>
					<?= get_sub_field('video_link') ?> 
				</div>
		<?php endif; ?>
		
	</div>
</section>