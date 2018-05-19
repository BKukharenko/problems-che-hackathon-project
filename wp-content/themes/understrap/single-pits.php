<?php
/**
 * Template name: Pit
 * The template for displaying pit page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' ); ?>

<?php if ( 'container' == $container ) : ?>
<div class="container pits-single-wrapper">
	<?php endif; ?>
    <div class="pit-wrapper row">
        <div class="image-wrapper col-lg-6 text-center">
			<?php the_post_thumbnail() ?>
        </div>
        <div class="pit-content-wrapper col-lg-6">
            <h2 class="pit-title text-center mb-3 mt-4 mt-lg-0"><?php the_title(); ?></h2>
			<?php
			if ( get_field( 'field_5b003fc63bf92' ) === 'consideration: На розгляді' ): ?>
                <p class="complaint-waiting text-right">На розгляді</p>
			<?php endif;
			if ( get_field( 'field_5b003fc63bf92' ) === 'working: Опрацьовується' ): ?>
                <p class="complaint-working text-right">Опрацьовується</p>
			<?php endif;
			if ( get_field( 'field_5b003fc63bf92' ) === 'done: Виконано' ): ?>
                <p class="complaint-done text-right">Виконано</p>
			<?php endif; ?>

            <dl class="pit-information">
                <div class="row no-gutters">
                    <dt class="pr-2"><?= get_field( 'name_label' ) ?></dt>
                    <dd><?php echo the_field( 'name' ); ?></dd>
                </div>
                <div class="row no-gutters">
                    <dt class="pr-2"><?= get_field( 'reference_point_label' ) ?></dt>
                    <dd><?php echo the_field( 'reference_point' ); ?></dd>
                </div>
                <div class="row no-gutters">
                    <dt class="pr-2"><?= get_field( 'date_label' ) ?></dt>
                    <dd>
                        <time datetime="<?= get_the_date( 'Y-m-d' ); ?>"><?= get_the_date( 'd. m. Y' ); ?></time>
                    </dd>
                </div>
            </dl>
            <div class="pit-description">
				<?php
				while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
            </div>
        </div>
    </div>

	<?php

	$location = get_field( 'google_map' );

	if ( ! empty( $location ) ):
		?>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                 data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
	<?php endif; ?>
	<?php if ( 'container' == $container ) : ?>
</div><!-- .container -->
<?php endif; ?>

<?php get_footer(); ?>
