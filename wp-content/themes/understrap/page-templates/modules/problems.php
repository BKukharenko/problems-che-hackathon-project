<?php $container = get_theme_mod('understrap_container_type'); ?>

<section class="section-padding pt-md-5 pb-md-5 div-on-click">
	<div class="<?php echo esc_attr($container); ?> block-shadow pb-5 text-center">
		<?php if( get_sub_field('problems_section_title') ): ?>
			<h2 class="section-title text-center pt-5">
				<?= get_sub_field('problems_section_title') ?>
			</h2>
		<?php endif; ?>

		<?php if( get_sub_field('problems_section_subtitle') ): ?>
			<span class="section-subtitle">
				<?= get_sub_field('problems_section_subtitle') ?>
			</span>
		<?php endif; ?>

		<div class="pt-5 pb-md-5">
			<?php $navMenu = wp_get_nav_menu_items('Pages Menu');
			echo '<ul class="container d-flex flex-wrap">';
			foreach (array_reverse($navMenu) as $menu) {
				$post_id = (int)$menu->object_id;
				echo '<li class="d-flex align-items-strech col-lg-3  mb-3"> <div class="block-shadow w-100">';
				if(has_post_thumbnail( $post_id )){
					echo '<a href="'. $menu->url .'">' . get_the_post_thumbnail( $post_id) .'</a>';
				}
				echo '<a class="p-3 d-inline-block problems-name" href="'. $menu->url .'">'. $menu->title .'</a>';
				echo '</div></li>';
			}
			echo '</ul>';
			?>
		</div>
	</section>