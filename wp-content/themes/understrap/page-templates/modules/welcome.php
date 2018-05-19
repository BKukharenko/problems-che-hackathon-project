<?php $container = get_theme_mod('understrap_container_type'); ?>

<section id="main" class="main-scroll" style="background-image: url(<?php echo get_theme_mod('welcome_image') ?>); background-repeat: no-repeat; background-position: center left;">

	<div class="<?php echo esc_attr($container); ?>">

		<?php if( get_sub_field('welcome_section_title') ): ?>
				<h1>
					<?= get_sub_field('welcome_section_title') ?>
					<span class="d-block"> <?= get_sub_field('welcome_title') ?> </span>
				</h1>
		<?php endif; ?>

		<?php if( get_sub_field('welcome_button') ): ?>
				<span>
					<?= get_sub_field('welcome_button') ?> 
				</span>
				<i class="fa fa-angle-down go-anchor" aria-hidden="true"></i>
		<?php endif; ?>
		
	</div>
</section>
