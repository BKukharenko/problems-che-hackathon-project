<?php
/**
 * The template for displaying front-page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>
<!-- CONTENT -->
<?php
while (have_rows('main_page')) :the_row();
	switch (get_row_layout()) {
		case 'welcome_section' :
		get_template_part('page-templates/modules/welcome');
		break;
		case 'about_section':
		get_template_part('page-templates/modules/about');
		break;
		case 'steps_section':
		get_template_part('page-templates/modules/steps');
		break;
		case 'problems_section':
		get_template_part('page-templates/modules/problems');
		break;
		default:
		break;
	}
	endwhile; ?>

	<?php get_footer(); ?>