<?php $container = get_theme_mod('understrap_container_type'); ?>

<section>
	<div class="<?php echo esc_attr($container); ?>">

		<?php if( get_sub_field('steps_section_title') ): ?>
				<h2>
					<?= get_sub_field('steps_section_title') ?>
				</h2>
		<?php endif; ?>
		

		<?php if (have_rows ('steps_list')): ?>
			<ul>
				<?php while (have_rows ('steps_list')) : the_row(); ?>
					<li class="col-6 col-sm-4 col-md-3 col-lg-2 pb-5">
						<img src="<?= get_sub_field('step_image'); ?>" alt="">
						<h3><?= get_sub_field('step_name'); ?></h3>
					</li>
				<?php endwhile;?>
			</ul>
		<?php endif; ?>

		<span> <?= get_sub_field('step_start_button') ?> </span>
	</div>
</section>