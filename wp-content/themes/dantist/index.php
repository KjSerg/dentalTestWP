<?php
/* Template Name: Main page template */
$home_page_ID = get_option( 'page_on_front' );
$acf_screens      = get_field( 'screens', $home_page_ID );
get_header();
$screens = new \Dantist\View\Screens($acf_screens);
$screens->render();
get_footer();