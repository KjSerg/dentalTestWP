<?php
function _s( $path, $return = false ) {
	if ( $return ) {
		return file_get_contents( $path );
	} else {
		echo file_get_contents( $path );
	}
}

function _i( $image_name ): string {
	$assets = esc_url( get_template_directory_uri() . '/assets/' );

	return esc_attr( $assets . 'img/' . $image_name . '.svg' );
}


function the_phone_link( $phone_number ): void {
	$s = array( '+', '-', ' ', '(', ')' );
	$r = array( '', '', '', '', '' );
	echo esc_attr( 'tel:' . str_replace( $s, $r, $phone_number ) );
}

function the_phone_number( $phone_number ): void {
	$s = array( '', '-', ' ', '(', ')' );
	$r = array( '', '', '', '', '' );
	echo str_replace( $s, $r, $phone_number );
}

function the_image( $id ): void {
	if ( $id ) {
		$url = wp_get_attachment_url( $id );
		$pos = strripos( $url, '.svg' );
		if ( $pos === false ) {
			echo '<img  src="' . $url . '" alt="">';
		} else {
			_s( $url );
		}

	}
}

function get_image( $id ) {
	if ( $id ) {

		$url = wp_get_attachment_url( $id );

		$pos = strripos( $url, '.svg' );

		if ( $pos === false ) {
			return img_to_base64( $url );
		} else {
			return _s( $url, 1 );
		}

	}
}
