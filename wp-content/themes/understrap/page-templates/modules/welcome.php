<?php $container = get_theme_mod('understrap_container_type'); ?>

<section class="welcome-back" style="background-image: url(<?= get_sub_field('welcome_image') ?>); background-repeat: no-repeat; background-position: center;">

	<div class="<?php echo esc_attr($container); ?> d-flex welcome-section">

		<?php if( get_sub_field('welcome_section_title') ): ?>
				<h1 class="col-12 col-md-6 d-flex flex-column section-main-title text-center">
					<?= get_sub_field('welcome_section_title') ?>
					<span class="d-inline-block section-span"> <?= get_sub_field('welcome_title') ?> </span>
				</h1>
		<?php endif; ?>

		<?php if( get_sub_field('welcome_button') ): ?>
			<div class="read-more text-center go-anchor">
				<span class="d-block pb-3">
					<?= get_sub_field('welcome_button') ?> 
				</span>
				<i class="fa fa-2x fa-chevron-circle-down" aria-hidden="true"></i>
			</div>
		<?php endif; ?>
		
	</div>
</section>
