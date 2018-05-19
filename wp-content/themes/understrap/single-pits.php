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
<div class="container">
	<?php endif; ?>
    <div class="pit-wrapper row mt-5">
        <div class="image-wrapper col-md-6">
            <?php the_post_thumbnail() ?>
        </div>
        <div class="pit-content-wrapper col-md-6">
            <dl class="pit-information">
                <div class="row no-gutters">
                    <dt><?= get_field( 'address_label' ) ?></dt>
                    <dd><?php the_title(); ?></dd>
                </div>
                <div class="row no-gutters">
                    <dt><?= get_field( 'name_label' ) ?></dt>
                    <dd><?php echo the_field( 'name' ); ?></dd>
                </div>
                <div class="row no-gutters">
                    <dt><?= get_field( 'reference_point_label' ) ?></dt>
                    <dd><?php echo the_field( 'reference_point' ); ?></dd>
                </div>
                <div class="row no-gutters">
                    <dt><?= get_field( 'date_label' ) ?></dt>
                    <dd><time datetime="<?= get_the_date( 'Y-m-d' ); ?>"><?= get_the_date( 'd, m, Y' ); ?></time></dd>
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

	<?php if ( 'container' == $container ) : ?>
</div><!-- .container -->
<?php endif; ?>

<?php get_footer(); ?>
