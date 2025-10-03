<?php

namespace Dantist\View;

use WP_Query;

class CasesCatalog {
	private mixed $query_args;
	private WP_Query $query;

	public function __construct() {
		$this->query_args = $this->get_query_args();
		$this->query      = new WP_Query( $this->query_args );
	}


	public function get_query_args(): array {
		$default_posts_per_page = get_option( 'posts_per_page' );
		$current_page           = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
		$case_category          = filter_input( INPUT_GET, 'case-category' );
		$query_args             = [
			'post_type'      => 'case',
			'posts_per_page' => $default_posts_per_page,
			'paged'          => $current_page,
		];
		if ( $case_category ) {
			$query_args['tax_query'] = [
				[
					'taxonomy' => 'categories',
					'field'    => 'slug',
					'terms'    => $case_category
				]
			];
		}

		return $query_args;
	}

	public function render_pagination(): void {
		$total_pages  = $this->get_max_num_pages();
		$current_page = $this->query_args['paged'] ?? 1;

		if ( $total_pages > 1 ) {
			$base_url = get_pagenum_link( 999999999 );
			$base     = str_replace( 999999999, '%#%', $base_url );

			$pagination_args = [
				'base'      => $base,
				'format'    => '',
				'current'   => $current_page,
				'total'     => $total_pages,
				'prev_text' => __( '' ),
				'next_text' => __( '' ),
			];

			echo paginate_links( $pagination_args );
		}
	}

	public function get_max_num_pages(): int {
		return $this->query->max_num_pages;
	}

	public function render_catalog(): void {
		$query = $this->query;
		if ( ! $query->have_posts() ) {
			echo '<p style="width: 100%; text-align: center;">Not found</p>';

			return;
		}
		while ( $query->have_posts() ) {
            $query->the_post();
			get_template_part( 'template-parts/case-preview' );
		}
	}
}