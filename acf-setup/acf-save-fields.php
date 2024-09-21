<?php

add_filter( 'acf/settings/save_json', function ( $path ) {
	$path = get_stylesheet_directory() . '/acf-setup/acf-json';

	return $path;
} );

add_filter( 'acf/settings/load_json', function ( $paths ) {
	unset( $paths[0] );
	$paths[] = get_stylesheet_directory() . '/acf-setup/acf-json';

	return $paths;
} );
