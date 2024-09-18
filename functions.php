<?php
/**
 * Theme functions
 *
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$files_to_include = [
	'setup',
];

foreach ( $files_to_include as $file ) {
	$file = "includes/{$file}.php";
	if ( ! locate_template( $file, true, true ) ) {
		wp_die( sprintf( __( 'Error locating <code>%s</code> for inclusion.', 'helinat' ), $file ) );
	}
}

// Post types
foreach ( glob( get_stylesheet_directory() . '/includes/post-types/*.php' ) as $file ) {
	require_once $file;
}

// Shortcodes
foreach ( glob( get_stylesheet_directory() . '/includes/shortcodes/*.php' ) as $file ) {
	require_once $file;
}

// Actions
foreach ( glob( get_stylesheet_directory() . '/includes/actions/*.php' ) as $file ) {
	require_once $file;
}