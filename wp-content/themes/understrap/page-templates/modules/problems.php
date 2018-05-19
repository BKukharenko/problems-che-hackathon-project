<?php $container = get_theme_mod('understrap_container_type'); ?>

<section>
	<div class="<?php echo esc_attr($container); ?>">
		<?php if( get_sub_field('problems_section_title') ): ?>
			<h2>
				<?= get_sub_field('problems_section_title') ?>
			</h2>
		<?php endif; ?>

		<?php if( get_sub_field('problems_section_subtitle') ): ?>
			<p>
				<?= get_sub_field('problems_section_subtitle') ?>
			</p>
		<?php endif; ?>

<div class="div-on-click">
		<?php $navMenu = wp_get_nav_menu_items('Pages Menu');
			echo '<ul class="container d-flex flex-wrap">';
			foreach ($navMenu as $menu) {
				$post_id = (int)$menu->object_id;
				echo '<li class="col-lg-4 d-flex flex-column">';
					if(has_post_thumbnail( $post_id )){
						echo '<a href="'. $menu->url .'">' . get_the_post_thumbnail( $post_id) .'</a>';
					}
				echo '<a href="'. $menu->url .'">'. $menu->title .'</a>';
				echo '</li>';
			}
			echo '</ul>';
		?>
	</div>
</section>