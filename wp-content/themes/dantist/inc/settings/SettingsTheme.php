<?php

namespace Dantist\Core;
class SettingsTheme {
	public function enable_menus( $menus ): void {
		add_action( 'after_setup_theme', function () use ( $menus ) {
			register_nav_menus( $menus );
		} );
	}

	public function enable_thumbnails(): void {
		add_action( 'after_setup_theme', function () {
			add_theme_support( 'post-thumbnails' );
		} );
	}

	public function disable_content_editor( $template_files = [] ): void {
		add_action( 'admin_init', function () use ( $template_files ) {
			$post_id = $_GET['post'] ?? ( $_POST['post_ID'] ?? '' );
			if ( ! $post_id ) {
				return;
			}

			$template_file = get_post_meta( $post_id, '_wp_page_template', true );
			if ( in_array( $template_file, $template_files, true ) ) {
				remove_post_type_support( 'page', 'editor' );
			}
		} );
	}


}

$settings = new SettingsTheme();
$settings->enable_thumbnails();