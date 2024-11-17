<?php

add_filter( 'acf/settings/path', 'acf_settings_path' );
function acf_settings_path( $path ) {
	$path = get_stylesheet_directory() . '/inc/plugins/advanced-custom-fields-pro/';

	return $path;
}

add_filter( 'acf/settings/dir', 'acf_settings_dir' );
function acf_settings_dir( $dir ) {
	$dir = get_stylesheet_directory_uri() . '/inc/plugins/advanced-custom-fields-pro/';

	return $dir;
}

include_once( get_stylesheet_directory() . '/inc/plugins/advanced-custom-fields-pro/acf.php' );
