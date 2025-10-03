<?php
/* Template Name: Main page template */
get_header();
$acf_screens = get_field( 'screens', get_option( 'page_on_front' ) );
$screens     = new \Dantist\View\Screens( $acf_screens );
$screens->render();
get_footer();