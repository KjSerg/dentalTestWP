<?php
namespace Dantist\View\Screens;

use WP_Query;

class ReviewsScreen implements ScreenInterface {
	public function render(array $screen_data): void {
		$review_ids = $screen_data['reviews'] ?? [];
		if (empty($review_ids)) {
			return;
		}
		$reviews_query = new WP_Query([
			'post_type'      => 'review',
			'post__in'       => $review_ids,
			'posts_per_page' => count($review_ids),
			'orderby'        => 'post__in',
		]);
		$context = [
			'title' => wp_kses_post($screen_data['title'] ?? ''),
			'query' => $reviews_query,
		];
		get_template_part('template-parts/screens/reviews', null, $context);
	}
}