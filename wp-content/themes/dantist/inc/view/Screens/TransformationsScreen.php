<?php
namespace Dantist\View\Screens;

class TransformationsScreen implements ScreenInterface {
	public function render( array $screen_data ): void {
		$context = [
			'text'  => wp_kses_post( $screen_data['text'] ?? '' ),
			'title' => wp_kses_post( $screen_data['title'] ?? '' ),
		];
		get_template_part( 'template-parts/screens/transformations', null, $context );
	}
}