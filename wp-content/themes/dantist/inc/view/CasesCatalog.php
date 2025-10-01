<?php

namespace Dantist\View;

use WP_Query;

class CasesCatalog {
	private mixed $query_args;
	private WP_Query $posts;

	public function __construct( $query_args = [] ) {
		$this->query_args = $query_args;
		$this->posts      = new WP_Query( $query_args );
	}

	public static function get_query_args(): array {
		$default_posts_per_page = get_option( 'posts_per_page' );
		$current_page           = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
		$case_category          = filter_input( INPUT_GET, 'case-category' );
		$query_args             = [
			'post_type'      => 'case',
			'posts_per_page' => $default_posts_per_page,
			'paged'          => $current_page,
			'fields'         => 'ids',
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
		$total_pages = $this->get_max_num_pages();
		$current_page = $this->query_args['paged'] ?? 1;

		if ( $total_pages > 1 ) {
			$base_url = get_pagenum_link( 999999999 );
			$base = str_replace( 999999999, '%#%', $base_url );

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
		return $this->posts->max_num_pages;
	}

	public function render_catalog(): void {
		$posts = $this->posts;
		if ( ! $posts->have_posts() ) {
			echo '<p style="width: 100%; text-align: center;">Not found</p>';

			return;
		}
		foreach ( $posts->posts as $post_id ) {
			the_case_preview( $post_id );
		}
	}

	public function render_categories(): void {
		$categories = get_terms( [
			'hide_empty' => false,
			'taxonomy'   => 'categories'
		] );
		if ( ! $categories ) {
			return;
		}
		$site_url = site_url();
		?>
        <ul class="gallery-categories">
            <li class="gallery-categories__item">
                <a href="<?php echo esc_url( $site_url ) ?>" class="gallery-categories__link active">All</a>
            </li>
			<?php foreach ( $categories as $category ):
				?>
                <li class="gallery-categories__item">
                    <a href="<?php echo esc_url( site_url( '?case-category=' . $category->slug ) ) ?>"
                       class="gallery-categories__link ">
						<?php echo esc_html( $category->name ) ?>
                    </a>
                </li>
			<?php endforeach; ?>
        </ul>
		<?php
	}
}