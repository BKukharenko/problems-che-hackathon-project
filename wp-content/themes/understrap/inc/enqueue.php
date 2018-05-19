<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script('jquery-form');
		wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCjMZTjA0gheN1McgGmEbMkVL3uHWUEliY', array(), '3', true);
		wp_enqueue_script('google-map-init', get_template_directory_uri() . '/js/google-maps.js', array('google-map', 'jquery'), '0.1', true);
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		wp_localize_script( 'understrap-scripts', 'ajaxdata', // функция для передачи глобальных js переменных на страницу, первый аргумент означет перед каким скриптом вставить переменные, второй это название глобального js объекта в котором эти переменные будут храниться, последний аргумент это массив с самими переменными
			array(
				'url' => admin_url('admin-ajax.php'), // передадим путь до нативного обработчика аякс запросов в wp, в js можно будет обратиться к ней так: ajaxdata.url
				'nonce' => wp_create_nonce('add_object') // передадим уникальную строку для механизма проверки аякс запроса, ajaxdata.nonce
			)
		);
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
