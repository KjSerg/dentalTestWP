<?php

namespace Dantist\View;

use Dantist\View\Screens\ScreenInterface;
use Dantist\View\Screens\BannerScreen;
use Dantist\View\Screens\ReviewsScreen;
use Dantist\View\Screens\TransformationsScreen;

class Screens {
	private array $screens;

	private array $screen_map = [
		'banner'          => BannerScreen::class,
		'reviews'         => ReviewsScreen::class,
		'transformations' => TransformationsScreen::class,
	];

	public function __construct( array $screens ) {
		$this->screens = array_filter( $screens, function ( $screen ) {
			return empty( $screen['hide_screen'] );
		} );
	}

	public function render(): void {
		if ( empty( $this->screens ) ) {
			return;
		}
		foreach ( $this->screens as $screen_index => $screen ) {
			$layout = $screen['acf_fc_layout'] ?? '';

			$renderer = $this->screen_map[ $layout ];
			if ( $renderer ) {
				$renderer_class = new $renderer();
				$renderer_class->render( $screen );
			}
		}
	}

}
