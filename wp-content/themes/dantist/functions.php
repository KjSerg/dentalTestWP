<?php


function dentist_scripts(): void {
	wp_enqueue_style( 'dentist-main', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0.1' );
	wp_enqueue_script( 'dentist-scripts', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0.0', true );
	wp_localize_script( 'dentist-scripts', 'AJAX', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'dentist_scripts' );

get_template_part( 'inc/helpers/helpers' );
get_template_part( 'inc/core/CustomPostTypeCreator' );
get_template_part( 'inc/settings/SettingsTheme' );
get_template_part( 'inc/components/components' );
get_template_part( 'inc/view/CasesCatalog' );
get_template_part( 'inc/view/Screens/ScreenInterface' );
get_template_part( 'inc/view/Screens/BannerScreen' );
get_template_part( 'inc/view/Screens/ReviewsScreen' );
get_template_part( 'inc/view/Screens/TransformationsScreen' );
get_template_part( 'inc/view/Screens' );