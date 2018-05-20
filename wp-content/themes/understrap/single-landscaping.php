<?php


get_header();
$container = get_theme_mod( 'understrap_container_type' ); ?>

<?php if ( 'container' == $container ) : ?>
    <div class="container pits-single-wrapper">
    <?php endif; ?>
    <div class="block-shadow py-5 px-3">
        <div class="pit-wrapper row">
            <div class="image-wrapper col-lg-6 text-center">
             <?php the_post_thumbnail() ?>
             <div class="sharing justify-content-center justify-content-lg-start pt-3 row no-gutters align-items-center">
                <span>Поділитись: </span>
                <?= do_shortcode('[addtoany buttons="facebook,twitter,linkedin,google_plus"]') ?>
            </div>
        </div>
        <div class="pit-content-wrapper col-lg-6">
            <h2 class="pit-title text-center mb-3 mt-4 mt-lg-0 section-title"><?php the_title(); ?></h2>
            <?php
            if ( get_field( 'field_5b00cc30143b1' ) === 'consideration: На розгляді' ): ?>
            <p class="complaint-waiting text-right pb-3">На розгляді</p>
        <?php endif;
        if ( get_field( 'field_5b00cc30143b1' ) === 'working: Опрацьовується' ): ?>
        <p class="complaint-working text-right pb-3">Опрацьовується</p>
    <?php endif;
    if ( get_field( 'field_5b00cc30143b1' ) === 'done: Виконано' ): ?>
    <p class="complaint-done text-right pb-3">Виконано</p>
<?php endif; ?>

<dl class="pit-information">
    <div class="row no-gutters">
        <dt class="pr-2"><?= get_field( 'name_label' ) ?></dt>
        <dd><?php echo the_field( 'name' ); ?></dd>
    </div>
    <div class="row no-gutters">
        <dt class="pr-2"><?= get_field( 'damege_label' ) ?></dt>
        <dd><?php echo the_field( 'damege' ); ?></dd>
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
</div>

<?php

$location = get_field( 'google_map' );

if ( ! empty( $location ) ):
  ?>
  <div class="acf-map my-5">
    <div class="marker" data-lat="<?php echo $location['lat']; ?>"
       data-lng="<?php echo $location['lng']; ?>"></div>
   </div>
<?php endif; ?>

<!--Comments List -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="text-center pt-5 pb-5">
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>
<?php endwhile; ?>
<?php endif; ?>


<?php if ( 'container' == $container ) : ?>
</div><!-- .container -->
<?php endif; ?>





<?php get_footer(); ?>
