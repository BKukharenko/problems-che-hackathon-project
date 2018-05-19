<?php $container = get_theme_mod('understrap_container_type'); ?>

<section id="steps-section" class="section-padding pt-md-5">
	<div class="<?php echo esc_attr($container); ?> block-shadow pb-5 text-center">

		<?php if( get_sub_field('steps_section_title') ): ?>
			<h2 class="section-title text-center pt-5">
				<?= get_sub_field('steps_section_title') ?>
			</h2>
		<?php endif; ?>
		

		<?php if (have_rows ('steps_list')): ?>
			<ul class="d-flex flex-wrap justify-content-between pt-5 pb-5">
				<?php while (have_rows ('steps_list')) : the_row(); ?>
					<li class="d-flex align-items-strech col-12 col-sm-6 col-md-6 col-lg-3 pt-3 pb-3 mb-3 text-center ">
						<div class="block-shadow w-100">
							<img src="<?= get_sub_field('step_image'); ?>" alt="steps-image" class="pb-3">
							<h3 class="pb-3 steps-name"><?= get_sub_field('step_name'); ?></h3>
						</li>
					<?php endwhile;?>
				</ul>
			<?php endif; ?>

			<span class="start start-button d-inline-block text-center"> 
				<?= get_sub_field('step_start_button') ?>
			</span>

		</div>
	</section>