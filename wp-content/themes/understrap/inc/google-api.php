<?php
function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyCjMZTjA0gheN1McgGmEbMkVL3uHWUEliY';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');