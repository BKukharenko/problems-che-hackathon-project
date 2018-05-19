<?php
/**
 * Template name: Pit
 * The template for displaying pit page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' ); ?>


<div class="div-template-pit">
    <div class="<?php echo esc_attr($container); ?> pb-5 position-relative padding-page">


        <?php if ( get_field( 'page_title' ) ) { ?>
        <h1 class="page-template-title">
            <?= get_field( 'page_title' ) ?>
        </h1>
        <?php } ?>
        <?php if ( get_field( 'page_sub_title' ) ) { ?>
        <span class="page-template-span">
            <?= get_field( 'page_sub_title' ) ?>
        </span>
        <?php } ?>

        <div class="service-block block-shadow">
            <?php // check if the repeater field has rows of data
            if ( have_rows( 'services_phones' ) ) : ?>
            <ul class="services-phones">
             <?php
             while ( have_rows( 'services_phones' ) ) : the_row(); ?>
             <li class="service p-3">
               <h3 class="service-name d-inline-block pr-3">
                <?php the_sub_field( 'service_name' ); ?>
            </h3>
            <a href="tel:<?php the_sub_field( 'phone_number' ); ?>" class="service-tel">
                <?php the_sub_field( 'phone_number' ); ?>
            </a>
        </li>
        <?php
        endwhile; ?>
    </ul>
<?php endif; ?>
</div>

</div>
</div>


<div class="<?php echo esc_attr($container); ?> pt-5">
    <div class="pits-list-wrapper">
      <?php if ( get_field( 'complaints_title' ) ) { ?>
      <h2 class="section-title  title-padding text-center">
        <?= get_field( 'complaints_title' ) ?>
    </h2>
    <?php } ?>
    

    <?php // задаем нужные нам критерии выборки данных из БД
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $args = array(
     'post_type'      => 'pits',
     'post_status'    => 'publish',
     'paged' => $paged
 );

    $query = new WP_Query( $args );
    global $wp_query;
    $temp_query = $wp_query;
    $wp_query   = null;
    $wp_query   = $query;

		// Цикл
    if ( $query->have_posts() ) { ?>
    <ul class="pits-list row mt-5">
        <?php
        while ( $query->have_posts() ) { ?>
        <li class="pit-item col-md-6 d-flex flex-column pb-5">
            <div class="w-100 block-shadow p-3">
              <?php
              $query->the_post(); ?>
              <div class="img-wrapper pb-3">
                <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail(); ?>
             </a>
         </div>
         <dl class="pit-information">
            <div class="row no-gutters">
                <dt class="pr-2"><?= get_field( 'address_label' ) ?></dt>
                <dd><?php the_title(); ?></dd>
            </div>
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
                <dd><time datetime="<?= get_the_date( 'Y-m-d' ); ?>"><?= get_the_date( 'd. m. Y' ); ?></time></dd>
            </div>
        </dl>
        <a href="<?php the_permalink();?>" class="start-button d-inline-block mb-3">
            <?= get_field('button_text')?>
        </a>
    </div>
</li>
<?php } ?>
</ul>
<div class="p-0 pagination justify-content-center">
    <?php understrap_pagination () ; ?>
</div>
<?php
} else {
			// Постов не найдено

}
/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
wp_reset_postdata();
wp_reset_query();
$wp_query = null;
$wp_query = $temp_query;
?>

</div>

<div class="form-wrapper mt-5 pt-5 pb-5 mb-5 block-shadow">
  <?php if ( get_field( 'form_title' ) ) { ?>
  <h2 class="text-center section-title">
    <?= get_field( 'form_title' ) ?>
</h2>
<?php } ?>
<form method="post" enctype="multipart/form-data" id="add_object" class="mt-5 text-center">
    <div class="form-row justify-content-center">
        <div class="form-group col-md-5">
            <input class="input-border w-100 p-3" type="text" name="username" id="username" required placeholder="Ваше ім'я (нікнейм):"/>
        </div>
        <div class="form-group col-md-5">
            <input class="input-border w-100 p-3" type="email" name="email" id="email" placeholder="Email:" required/>
        </div>
    </div>

    <div class="form-row justify-content-center">
        <div class="form-group col-md-5">
            <input class="input-border w-100 p-3" type="text" name="post_title" class="address-input" placeholder="Адреса:" required/>
        </div>
        <div class="form-group col-md-5">
            <input class="input-border w-100 p-3" type="text" name="ref-point" class="ref-point-input" placeholder="Орієнтир:" required/>
        </div>
    </div>

    <div class="textarea-group mx-auto">
        <textarea class="input-border w-100 p-3" rows="5" name="post_content" id="post_content" placeholder="Опишіть детальніше" required/></textarea>
    </div>

    <div class="form-row justify-content-center p-3">
        <div class="form-group text-center">
            <label for="img">Фото:</label>
            <input type="file" name="img" id="img" required/>
        </div>
    </div>

    <input type="submit" name="button" class="submit-button start-button" value="Відправити" id="sub"/>
</form>
</div>

<div id="output"></div>

<?php if ( 'container' == $container ) : ?>
</div><!-- .container -->
<?php endif; ?>

<?php get_footer(); ?>
