<?php
namespace Dantist\View\Screens;

class BannerScreen implements ScreenInterface {
	public function render(array $screen_data): void {
		$context = [
			'image_url' => esc_url($screen_data['image'] ?? ''),
			'title'     => wp_kses_post($screen_data['title'] ?? ''),
		];
		get_template_part('template-parts/screens/banner', null, $context);
	}
}