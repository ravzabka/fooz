<?php
/**
 * Theme assets.
 *
 */

class Fooz_Theme_Setup
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_theme_styles' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_theme_scripts' ] );
	}

	/**
	 * Enqueue theme styles.
	 */
	public function enqueue_theme_styles()
	{
		if ( is_admin() ) {
			return;
		}

        $parent_style = 'parent-style'; 
        wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
        wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/build/styles/theme.css' );
	}

	/**
	 * Enqueue theme scripts.
	 */
	public function enqueue_theme_scripts()
	{
		if ( is_admin() ) {
			return;
		}

        wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/build/js/scripts.js', array('jquery'), false, true );
        wp_enqueue_script('custom-ajax', get_stylesheet_directory_uri() . '/assets/js/modules/custom-ajax.js', array('jquery'), null, true );
        wp_localize_script('custom-ajax', 'ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
	}
}

new Fooz_Theme_Setup();